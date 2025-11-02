<?php 	

	function db_get_user($userId)
	{
		$db = Database::getInstance();

		$tableUser  = DB_PREFIX.'users';
		$tablePersonal  = DB_PREFIX.'personal';

		$db->query(
			"SELECT user.* , personal.* , user.id as id 
				FROM $tableUser as user 

				LEFT JOIN $tablePersonal as personal
				ON user.id = personal.user_id

				WHERE user.id = {$userId} "
		);

		return $db->single();
	}

	function db_get_notifications($where = null, $order = 'asc', $limit = '30') {
		$notificationModel = model('NotificationModel');
		return $notificationModel->getAll([
			'where' => $where,
			'limit' => $limit,
			'order' => $order ?? '' == 'desc' ? 'id desc' : 'id asc'
		]);
	}


	function db_get_images($globalKey, $globalId) {

		if(!isset($attachmentModel)) {
			$attachmentModel = model('AttachmentModel');
		}

		return $attachmentModel->all([
			'global_key' => $globalKey,
			'global_id'  => $globalId
		]);
	}

	function db_get_service_bundles($where = null, $order = 'id asc', $limit = '30') {
		$serviceBundleModel = model('ServiceBundleModel');

		return $serviceBundleModel->getAll([
			'where' => $where,
			'order' => $order,
			'limit' => $limit
		]);
	}
