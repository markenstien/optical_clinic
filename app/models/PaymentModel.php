<?php

	class PaymentModel extends Model
	{	
		public $table = 'payments';

		protected $_fillables = [
			'id' , 'reference','amount',
			'method' , 'notes', 'org',
			'external_reference' , 'acc_no',
			'acc_name' , 'bill_id' , 'created_by'
		];

		public function create($payment_data)
		{

			$payment_data['reference'] = $this->getReference();
			$fillable_datas = $this->getFillablesOnly($payment_data);
			$payment_id = parent::store($fillable_datas);
			$payment_link = _route('payment:show' , $payment_id);

			parent::_addRetval('payment_id', $payment_id);
			parent::_addRetval('reference', $payment_data['reference']);

			return $payment_id;
			// return false;
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