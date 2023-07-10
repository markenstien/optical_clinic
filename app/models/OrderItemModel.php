<?php 

	class OrderItemModel extends Model {

		public $table = 'order_items';
		public $_fillables = [
			'order_id',
			'item_id',
			'quantity',
			'purchased_amount'
		];

		public function addItem($orderData) {
			$_fillables = parent::getFillablesOnly($orderData);

			if($this->_checkItemOnOrder($orderData['order_id'], $orderData['item_id'])) {
				$this->addError("Item already exists.");
				return false;
			}
			return parent::store($_fillables);
		}

		public function updateItem($orderData, $id) {
			$_fillables = parent::getFillablesOnly($orderData);
			return parent::update($_fillables, $id);
		}
		public function getAll($params = []) {
			$where = null;
			$order = null;
			$limit = null;

			if(!empty($params['where'])) {
				$where = " WHERE ". parent::conditionConvert($params['where']);
			}

			if(!empty($params['order'])) {
				$order = " ORDER BY {$params['order']} ";
			}

			if(!empty($params['limit'])) {
				$limit = " LIMIT {$params['limit']} ";
			}
			$this->db->query(
				"SELECT ordr.order_reference, ordr.customer_name, ordr.order_status as order_status, oi.*, 
					service.price as item_price , 
					service as item_name , service.code as item_code,
					oi.order_id as order_id
					FROM {$this->table} as oi
					LEFT JOIN services as service 
						ON oi.item_id = service.id

					LEFT JOIN orders as ordr 
						ON ordr.id = oi.order_id
					{$where} {$order} {$limit}"
			);

			return $this->db->resultSet();
		}

		public function get($id) {
			return $this->getAll([
				'where' => [
					'oi.id' => $id
				]
			])[0] ?? false;
		}

		public function deleteItem($id) {
			$orderItem = $this->getAll([
				'where' => [
					'oi.id' => $id
				]
			])[0] ?? false;

			if(!$orderItem) {
				$this->addError("Order item not exist");
				return false;
			}

			return parent::delete($orderItem->id);
			//check order statuss
		}

		private function _checkItemOnOrder($orderId, $itemId) {
			return parent::single([
				'order_id' => $orderId,
				'item_id' => $itemId
			]);
		}

		private function calcPriceMultQty($price,$quantity) {
			return $price * $quantity;
		}
	}