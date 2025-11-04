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
			$groupBy = null;

			if(!empty($params['where'])) {
				$where = " WHERE ". parent::conditionConvert($params['where']);
			}
			if(!empty($params['order'])) {
				$order = " ORDER BY {$params['order']}";
			}
			if(!empty($params['group'])) {
				$groupBy = " GROUP BY {$params['group']}";
			}
			$this->db->query(
				"SELECT uss.id as uss_id, uss.user_id as user_id,
					sb.*,user.first_name, user.last_name, user.is_disabled
						FROM {$this->table} as uss
							LEFT JOIN service_bundles as sb
								ON uss.service_id = sb.id
							LEFT JOIN users as user 
								ON uss.user_id = user.id

					{$where}
					{$groupBy}
					{$order} "
			);

			return $this->db->resultSet();
		}
    }