<?php 

	class UserModel extends Model
	{

		public $table = 'users';

		protected $_fillables = [
			'id',
			'user_code' ,
			'first_name',
			'middle_name',
			'last_name',
			'birthdate',
			'gender',
			'address',
			'phone_number',
			'email',
			'username',
			'password',
			'created_at',
			'created_by',
			'user_type',
			'user_preference',
			'profile',
			'updated_at',
			'backer_id',
			'is_verified'
		];

		public function verification($id)
		{
			$user = parent::get($id);

			if($user->is_verified) {
				$this->addError("User is already verified");
				return false;
			}

			parent::update([
				'is_verified' => true
			] , $id);


			$authenticated = $this->authenticate($user->email , $user->password);

			if(!$authenticated){
				$this->addMessage("User Verified");
				$this->redirect_to = _route('auth:login');
			}

			$this->addMessage("User Verified , Welcome to your appointments!");
			$this->redirect_to = _route('appointment:index');
			return true;
		}

		public function save($user_data , $id = null)
		{
			$user_id = $id;

			$fillable_datas = $this->getFillablesOnly($user_data);

			$validated = $this->validate($fillable_datas , $id);

			if(!$validated) return false;

			if(!is_null($id))
			{
				//change password also
				if(empty($fillable_datas['password']))
					unset($fillable_datas['password']);
				$res = parent::update($fillable_datas , $id);

				if(isset($user_data['profile']) ){
					$this->uploadProfile('profile' , $id);
				}

				$user_id = $id;
			}else
			{
				$fillable_datas['user_code'] = $this->generateCode($user_data['user_type']);
				$user_id = parent::store($fillable_datas);
			}

			return $user_id;
		}


		private function validate(&$user_data , $id = null)
		{	
			if(!empty($user_data['email']))
			{
				$is_exist = $this->getByKey('email' , $user_data['email'])[0] ?? '';

				if($is_exist && !isEqual($is_exist->id , $id) ){
					$this->addError("Email {$user_data['email']} already used");
					return false;
				}
			}

			if(!empty($user_data['username']))
			{
				$is_exist = $this->getByKey('username' , $user_data['username'])[0] ?? '';

				if( $is_exist && !isEqual($is_exist->id , $id) ){
					$this->addError("Username {$user_data['email']} already used");
					return false;
				}
			}

			if(!empty($user_data['phone_number']))
			{
				$user_data['phone_number'] = trim($user_data['phone_number']);

				if( !is_mobile_number($user_data['phone_number']) ){
					$this->addError("Invalid Phone Number {$user_data['phone_number']}");
					return false;
				}

				$is_exist = $this->getByKey('phone_number' , $user_data['phone_number'])[0] ?? '';

				if( $is_exist && !isEqual($is_exist->id , $id) ){
					$this->addError("Phonne Number {$user_data['phone_number']} already used");
					return false;
				}
			}

			$limitCheck = [
				'user_name' => 'Username',
				'password' => 'Password',
			];
			
			foreach($limitCheck as $key => $row) {
				if(!empty($user_data[$key])) {
					if(!$this->validateStringLength($user_data[$key], 12, $row)) {
						return false;
					}
				}
			}

			return true;
		}

		private function validateStringLength($value, $length, $label) {
			if(strlen($value) > $length) {
				$this->addError("Invalid {$label} character length.");
				return false;
			}

			return true;
		}

		public function create($user_data , $profile = '')
		{
			$res = $this->save($user_data);

			if(!$res) {
				$this->addError("Unable to create user");
				return false;
			}


			if(!empty($profile) )
				$this->uploadProfile($profile , $res);

			$this->addMessage("User {$user_data['first_name']} Created");
			return $res;
		}

		public function register($user_data , $profile = '')
		{
			$res = $this->create($user_data , $profile);

			if(!$res){
				return false;
			}

			$email_body = $this->verifyAccount($res);
			_mail($user_data['email'] , "Complete your registration on ".COMPANY_NAME , $email_body);
			return $res;
		}

		public function verifyAccount($userId) {
			//create user-verification-link //send-to-email
			//seal user-id
			$_href = URL.DS._route('user:verification' , seal($userId));
			$_anchor = "<a href='{$_href}'>Verify your registration by clicking this link.</a>";

			$email_content = <<<EOF
				<h3> User Verification </h3>
				<p> Thank you for registering on out platform <br/>{$_anchor}</p>
			EOF;

			// $email_body = wEmailComplete($email_content);
			return $email_content;
		}

		public function uploadProfile($file_name , $id)
		{
			$is_empty = upload_empty($file_name);

			if($is_empty){
				$this->addError("No file attached upload profile failed!");
				return false;
			}

			$upload = upload_image($file_name, PATH_UPLOAD);
			
			if( !isEqual($upload['status'] , 'success') ){
				$this->addError(implode(',' , $upload['result']['err']));
				return false;
			}

			//save to profile

			$res = parent::update([
				'profile' => GET_PATH_UPLOAD.DS.$upload['result']['name']
			] , $id);

			if($res) {
				$this->addMessage("Profile uploaded!");
				return true;
			}
			$this->addError("UPLOAD PROFILE DATABASE ERROR");
			return false;
		}

		public function changePassword($password,$userId) {
			return parent::update([
				'password' => $password
			], $userId);
		}
		
		public function update($user_data , $id)
		{
			$res = $this->save($user_data , $id);

			//check muna if doctor


			if(!$res) {
				$this->addError("Unable to create user");
				return false;
			}

			$this->addMessage("User {$user_data['first_name']} has been updated!");

			return true;
		}

		public function get($id)
		{
			$user = parent::get($id);

			if(!$user) {
				$this->addError("No User");
				return false;
			}
			
			if( isEqual($user->user_type , 'doctor') )
			{
				$this->doctor = model('DoctorModel');
				$user->license_number = $this->doctor->getByUser($id)->license_number ?? null;
			}

			return $user;
		}

		public function getByKey($column , $key , $order = null)
		{
			if( is_null($order) )
				$order = $column;

			return parent::getAssoc($column , [
				$column => "{$key}"
			]);
		}


		public function getAll($params = null )
		{
			if(!is_null($params))
				$params = $this->conditionConvert($params['where']);
			
			return parent::getAssoc('first_name' , $params);
		}

		public function generateCode($user_type)
		{
			$pfix = null;

			switch(strtolower($user_type))
			{
				case 'admin':
					$pfix = 'ADMN';
				break;

				case 'patient':
					$pfix = 'CX';
				break;

				case 'doctor':
					$pfix = 'DOC';
				break;
			}

			$last_id = $this->last()->id ?? 000;

			return strtoupper($pfix.get_token_random_char(4).$last_id);
		}


		public function authenticate($email , $password)
		{
			$errors = [];

			$user = parent::single(['email' => $email]);

			if(!$user) {
				$errors[] = " Email '{$email}' does not exists in any account";
			}

			if(!isEqual($user->password ?? '' , $password)){
				$errors[] = " Incorrect Password ";
			}

			if(!empty($errors)){
				$this->addError( implode(',', $errors));
				return false;
			}

			if(!$user->is_verified){

				$link = wLinkDefault(_route('user:send-verification', null, [
					'userId' => seal($user->id)
				]), 'Send Verification Again');
				
				$this->addError("Verify your account to access " . COMPANY_NAME . "Platform {$link}" );
				return false;
			}

			return $this->startAuth($user->id);
		}

		/*
		*can be used to reset and start auth
		*/
		public function startAuth($id)
		{
			$user = parent::get($id);

			if(!$user){
				$this->addError("Auth cannot be started!");
				return false;
			}

			$auth = null;

			while( is_null($auth) )
			{
				Session::set('auth' , $user);
				$auth = Session::get('auth');
			}

			return $auth;
		}

	}