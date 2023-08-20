<?php

	class PaymentModel extends Model
	{	
		public $table = 'payments';

		protected $_fillables = [
			'id' , 'reference','amount',
			'method' , 'notes', 'org',
			'external_reference' , 'acc_no',
			'acc_name' , 'bill_id' , 'created_by',
			'origin','status'
		];

		public function create($payment_data)
		{
			$payment_data['reference'] = $this->getReference();
			$fillable_datas = $this->getFillablesOnly($payment_data);
			$payment_id = parent::store($fillable_datas);

			parent::_addRetval('payment_id', $payment_id);
			parent::_addRetval('reference', $payment_data['reference']);

			return $payment_id;
		}

		public function getAll($params = [], $parent = 'RESERVATION_FEE') {
			$where = null;
			$order = null;
			$limit = null;

			if(!empty($params['where'])) {
				$where = " WHERE ".parent::conditionConvert($params['where']);
			}

			if(!empty($params['order'])) {
				$order = " ORDER BY {$params['order']} ";
			}

			if(!empty($params['limit'])) {
				$limit = " LIMIT {$params['limit']} ";
			}

			$sql = $parent == 'RESERVATION_FEE' ? $this->sqlReservationFee($where, $order, $limit) : $this->sqlOrders($where, $order, $limit);
			$sql = trim($sql);
			
			$this->db->query($sql);
			return $this->db->resultSet();
		}

		private function sqlReservationFee($where, $order = '', $limit = '') {
			return <<<EOF
				SELECT parent.*, payment.id as id, payment.*, 
					payment.status as payment_status, payment.reference as payment_reference
						FROM {$this->table} as payment 
							LEFT JOIN appointments as parent
							ON parent.id = payment.bill_id
					{$where} {$order} {$limit}
			EOF;
		}

		private function sqlOrders($where, $order = '', $limit = '') {
			return <<<EOF
				SELECT payment.*, parent.*, payment.id as id 
						FROM {$this->table} as payment 
							LEFT JOIN orders as parent 
							ON parent.id = payment.bill_id
					{$where} {$order} {$limit}
			EOF;
		}

		public function getByKey($condition, $parent ='RESERVATION_FEE') {
			return $this->getAll([
				'where' => $condition
			], $parent)[0] ?? false;;
		}

		public function getReference()
		{
			return strtoupper('PMT-'.get_token_random_char(7));
		}


		public function getByBill($bill_id)
		{
			return $this->getAssoc('id' , [
				'bill_id' => $bill_id
			]);
		}
	}