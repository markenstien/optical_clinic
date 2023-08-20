<?php 
	use Services\StockService;
	load(['StockService'], SERVICES);

	class OrderModel extends Model {

		public $table = 'orders';
		public $modelOrderItem;
		public $modelStock;

		public $_fillables = [
			'customer_name',
			'customer_number',
			'customer_email',
			'customer_address',
			'initial_amount',
			'current_balance',
			'discount_amount',
			'discount_type',
			'discount_notes',
			'customer_id',
			'user_id',
		];

		public function __construct() {
			parent::__construct();

			if(!isset($this->modelOrderItem)) {
				$this->modelOrderItem = model('OrderItemModel');
			}
		}

		public function getAll($params = []) {
			$where = null;
			$order = null;
			$limit = null;

			if(!empty($params['where'])){
				$where = " WHERE ".parent::conditionConvert($params['where']);
			}

			if(!empty($params['order'])){
				$order = " ORDER BY {$params['order']} ";
			}

			if(!empty($params['order'])){
				$limit = " LIMIT {$params['limit']} ";
			}
			$this->db->query(
				"SELECT * FROM {$this->table} as ordr
					{$where}{$order}{$limit}"
			);

			return $this->db->resultSet();
		}

		public function addItem($token, $itemData) {
			$order = $this->_tokenExists($token);
			if(!$order) {
				//create order session
				$orderId = parent::store([
					'tmp_token' => $token
				]);
				$order = parent::get($orderId);
			}

			$itemData['order_id'] = $order->id;
			$res = $this->modelOrderItem->addItem($itemData);
			return $res;
		}

		public function addPayment($orderId, $amount) {
			// addPayment
			$order = $this->get($orderId);
			$balance = $order->current_balance - $amount;

			return parent::update([
				'current_balance' => $balance
			], $order->id);
		}

		public function checkOut($token, $orderData) {
			$hasDiscount = false;
			
			if(!empty($orderData['discount_check'])) {
				//check discount data
				if(!is_numeric($orderData['discount_amount'])){
					$this->addError("Invalid Discount Amount");
					return false;
				}elseif($orderData['discount_amount'] <= 0) {
					$this->addError("Invalid Discount Amount");
					return false;
				} else {
					$hasDiscount = true;
				}
			}
			$order = $this->_tokenExists($token);

			if(!$order){
				$this->addError("Invalid Order Checkout");
				return false;
			}
			//update customerData
			//set initial amount and balance
			$orderItems = $this->getItems($order->id);

			if(empty($orderItems)) {
				$this->addError("There are no order items, invalid order checkout");
				return false;
			}

			$orderTotal = $this->_totalOrderItems($orderItems);
			//if empty do not allow			

			$_fillables = parent::getFillablesOnly($orderData);
			$_fillables['initial_amount'] = $orderTotal;
			// $_fillables['current_balance'] = 
			if($hasDiscount) {
				$_fillables['current_balance'] = ($_fillables['initial_amount'] - $orderData['discount_amount']);
			} else {
				$_fillables['current_balance'] = $_fillables['initial_amount'];
			}

			$_fillables['order_reference'] = 'ORDR-'.number_series(parent::lastId()+1);
			$updateOrder = parent::update($_fillables, $order->id);

			if($updateOrder) {
				if(!isset($this->modelStock)) {
					$this->modelStock = model('StockModel');
				}

				foreach($orderItems as $key => $row) {
					$this->modelStock->createOrUpdate([
						'item_id'        => $row->item_id,
						'quantity'       => $row->quantity,
						'remarks'        => 'Order Reference : #'.$_fillables['order_reference'],
						'date'           => today(),
						'entry_origin'   => StockService::ENTRY_ORIGIN,
						'entry_type'     => StockService::ENTRY_DEDUCT,
					]);
				}
			}

			//check if user exists

			if(!isset($this->modelUserModel)) {
				$this->modelUserModel = model('UserModel');
			}


			$user = $this->modelUserModel->single([
				'phone_number' => [
					'condition' => 'equal',
					'value' => $orderData['customer_number'],
				]
			]);

			if($user) {
				parent::update([
					'user_id' => $user->id
				], $order->id);
			}

			$this->_addRetval('order', $order);
			return $updateOrder;
		}

		public function getComplete($condition) {
			$order = parent::single($condition);
			if(!$order) {
				$this->addError("Order not found");
				return false;
			}

			$order->items = $this->getItems($order->id);
			return $order;
		}

		public function getItems($orderId) {
			return $this->modelOrderItem->getAll([
				'where' => [
					'order_id' => $orderId
				]
			]);
		}

		public function cancelSession($token) {

			$order = $this->_tokenExists($token);
			if($order) {
				//cancel
				$isItemRemoved = $this->modelOrderItem->delete([
					'order_id' => $order->id
				]);

				$isOrderRemoved = parent::delete($order->id);

				if($isItemRemoved && $isOrderRemoved) {
					return true;
				} else {
					return false;
				}				
			}

			return false;
		}

		private function _totalOrderItems($orderItems) {
			$total = 0;

			foreach($orderItems as $key => $row) {
				$total += ($row->item_price * $row->quantity);
			}

			return $total;
		}
		private function _tokenExists($token) {
			return parent::single([
				'tmp_token' => $token
			]);
		}
	}