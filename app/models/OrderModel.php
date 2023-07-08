<?php 

	class OrderModel extends Model {

		public $table = 'orders';
		public $modelOrderItem;

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
			return parent::getDesc('id');
		}

		public function addItem($token, $itemData) {

			$order = $this->_tokenExists($token);
			if(!$order) {
				//create order session
				$orderId = parent::store([
					'tmp_token' => $token
				]);

				$order = parent::single($orderId);
			}

			$itemData['order_id'] = $order->id;

			$res = $this->modelOrderItem->addItem($itemData);

			return $res;
		}

		public function checkOut($token, $orderData) {
			$hasDiscount = true;
			if(!empty($orderData['discount_check'])) {
				//check discount data
				if($orderData['discount_amount'] <= 0) {
					$this->addError("Invalid Discount Amount");
					return false;
				} else {
					$hasDiscount = true;
				}
			}
			$order = $this->_tokenExists($token);
			//update customerData

			//set initial amount and balance

			$orderItems = $this->getItems($order->id);

			$orderTotal = $this->_totalOrderItems($orderItems);
			//if empty do not allow			

			$_fillables = parent::getFillablesOnly($orderData);
			$_fillables['initial_amount'] = $orderTotal;
			// $_fillables['current_balance'] = 
			if($hasDiscount) {
				$_fillables['current_balance'] = ($_fillables['initial_amount'] - $orderData['discount_amount']);
			}

			$_fillables['order_reference'] = 'ORDR-'.number_series(parent::lastId()+1);
			return parent::update($_fillables, $order->id);
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