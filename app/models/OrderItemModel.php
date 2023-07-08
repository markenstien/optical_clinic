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
				"SELECT oi.*, service.price as item_price , 
					service as item_name , service.code as item_code FROM {$this->table} as oi
					LEFT JOIN services as service 
					on oi.item_id = service.id
					{$where} {$order} {$limit}"
			);

			return $this->db->resultSet();
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