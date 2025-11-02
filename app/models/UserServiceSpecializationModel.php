<?php 

    class UserServiceSpecializationModel extends Model
    {
        public $table = 'users_service_specializations';
		protected $_fillables = [
			'id',
			'user_id',
			'service_id',
			'is_active'
		];

		public function addSpecialization($userId, $serviceBundleId) {
			//check if already exists
			$resp = parent::single([
				'user_id' => $userId,
				'service_id' => $serviceBundleId
			]);

			if(!$resp) {
				$resp = parent::store([
					'user_id' => $userId,
					'service_id' => $serviceBundleId
				]);
				$this->addMessage("Specialization Added");
				return true;
			} else {
				$this->addMessage("Specialization Already Exists");
				return false;
			}
		}

		public function getAll($params = []) {
			$where = null;
			$order = null;

			if(!empty($params['where'])) {
				$where = " WHERE ". parent::conditionConvert($params['where']);
			}

			if(!empty($params['order'])) {
				$order = " ORDER BY {$params['order']}";
			}

			$this->db->query(
				"SELECT sb.*,
					uss.id as uss_id 
					FROM {$this->table} as uss
					LEFT JOIN service_bundles as sb
						ON sb.id = uss.service_id
					{$where}
					{$order} "
			);

			return $this->db->resultSet();
		}
    }