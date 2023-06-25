<?php 

	class ReservationFeeSettingModel extends Model
	{
		public $_fillables = [
			'display_name',
			'amount',
			'is_active',
			'description',
			'amount_fee'
		];

		public $table = 'reservation_fee_setting';

		public function update($data, $id) {
			$updateFields = parent::getFillablesOnly($data);
			return parent::update($updateFields, $id);
		}

		public function getActive() {
			return parent::get(1);
		}
	}