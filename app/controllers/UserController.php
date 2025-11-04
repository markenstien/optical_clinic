<?php
	load(['UserForm' , 'DoctorForm', 'AddressForm'] , APPROOT.DS.'form');
	use Form\UserForm;
	use Form\DoctorForm;
	use Form\AddressForm;


	class UserController extends Controller
	{
		private $_form;
		public function __construct()
		{
			parent::__construct();

			$this->_form = new UserForm('form_user');
			$this->_form_address = new AddressForm();

			$this->model = model('UserModel');
			$this->session = model('SessionModel');
			$this->appointment = model('AppointmentModel');
			$this->adddess_model = model('AddressModel');
			$this->service_bundle_model = model('ServiceBundleModel');
			$this->user_service_specialization_model = model('UserServiceSpecializationModel');
		}

		public function verification($user_id_sealed)
		{
			$user_id = unseal($user_id_sealed);
			$res = $this->model->verification($user_id);

			if($res) {
				Flash::set($this->model->getMessageString());
				return redirect($this->model->redirect_to);
			}

			Flash::set($this->model->getErrorString(), 'danger');
			return redirect(_route('user:register'));
		}

		public function register()
		{	

			$req = request()->inputs();

			//if who is logged in then logout
			if(whoIs()) {
				session_destroy();
			}

			if(isSubmitted())
			{
				$post = request()->posts();

				if(!isset($post['from_another_form'])) {
					request()->saveEntries();
				}

				//check if backer_user_code is not empty
				if(!empty($post['backer_user_code'])) {
					$backer = $this->model->single(['user_code' => $post['backer_user_code']]);
					if(!$backer) {
						Flash::set("Invalid Referral Code");
						return request()->return();
					}
					$post['backer_id'] = $backer->id;
				}

				$profileFileName = isset($_FILES['profile']) ? 'profile' : null;
				$res = $this->model->register($post , $profileFileName);

				Flash::set($this->model->getMessageString().  " Please Check your email '{$post['email']}' and verify your account. ");
				if(!$res) {
					Flash::set( $this->model->getErrorString() , 'danger');
					return request()->return();
				}

				return redirect(_route('page:login'));
			}

			$this->_form->init([
				'url' => _route('user:register')
			]);

			if(isset($req['backer_id'])) {
				$backerData = unseal($req['backer_id']);
				//check from user
				$user = $this->model->single([
					'id' => $backerData[1]
				]);

				if($user && isEqual($user->user_code, $backerData[0])) {
					$backerData = $user;

					//add to form
					$this->_form->add([
						'name' => 'backer_id',
						'type' => 'hidden',
						'value' => $user->id
					]);

					$this->_form->add([
						'name' => 'backer_name',
						'type' => 'text',
						'value' => $user->first_name . ' '.$user->last_name,
						'class' => 'form-control',
						'options' => [
							'label' => 'Referrer Name'
						],
						'attributes' => [
							'readonly' => true
						]
					]);
				}
			} else {
				$this->_form->add([
					'name' => 'backer_user_code',
					'type' => 'text',
						'value' => '',
						'class' => 'form-control',
						'options' => [
							'label' => 'Referrer Code (if any)'
						],
				]);
			}
			

			$this->_form->setValue('submit' , 'Register');
			$this->_form->remove('user_type');
			$this->_form->addIsVerified(false);

			$this->_form->add([
				'type' => 'hidden',
				'value' => 'patient',
				'name'  => 'user_type'
			]);
			
			$data = [
				'title' => 'User Registration',
				'form'  => $this->_form,
				'backerData' => $backerData ?? false
			];

			return $this->view('user/register' , $data);
		}

		public function index()
		{
			_authRequired([
				'admin'
			]);
			
			$data = [
				'users' => $this->model->getAll([
					'where' => [
						'user_type' => [
							'condition' => 'not equal',
							'value' => 'admin'
						]
					]
				]),
				'title' => 'Users'
			];

			return $this->view('user/index' , $data);
		}

		public function create()
		{
			_authRequired([
				'staff',
				'admin'
			]);
			if(isSubmitted())
			{
				$post = request()->posts();
				$res = $this->model->create($post , 'profile');

				Flash::set($this->model->getMessageString());

				if(!$res) {
					Flash::set($this->model->getErrorString(), 'danger');
					return request()->return();
				}

				return redirect(_route('user:index'));
			}
			$doc_form = new DoctorForm();
			$data = [
				'title' => 'Create User',
				'form'  => $this->_form,
				'form_address' => $this->_form_address,
				'doc_form' => $doc_form
			];

			return $this->view('user/create_edit' , $data);
		}


		public function edit($id)
		{

			if( isSubmitted() )
			{
				$post = request()->posts();

				$post['profile'] = 'profile';
				
				$res = $this->model->save($post , $id);

				if($res) {
					Flash::set( "User updated !");
					return redirect( _route('user:show' , $id));
				}else{
					Flash::set( $this->model->getErrorString() );
				}
			}

			$user = $this->model->get($id);
			$user_address = $this->adddess_model->get($user->address_id);

			$doc_form = new DoctorForm();

			$this->_form->setUrl(_route('user:edit' , $id));

			$this->_form->addId($id);

			$doc_form->setValue('license_number' , $user->license_number ?? 0);

			$this->_form->setValueObject($user);

			$this->_form_address->remove('submit');

			$data = [
				'title' => 'Create User',
				'form'  => $this->_form,
				'doc_form' => $doc_form,
				'user'   => $user,
				'form_address' => $this->_form_address,
				'user_id' => $id,
				'type' => 'edit'
			];

			return $this->view('user/create_edit' , $data);
		}

		public function profile()
		{
			// _authRequired();
			return $this->show( whoIs('id') );
		}

		public function show($id)
		{
			_authRequired();
			$user = $this->model->get($id);

			if(!$user){
				Flash::set("Doctor not found" , 'danger');
				return request()->return();
			}

			$data = [
				'user' => $user,
				'userForm' => $this->_form,
				'serviceBundles' => $this->service_bundle_model->getAll([
					'where' => [
						'bundle.status' => 'available'
					]
					]),
				'userSpecializations' => $this->user_service_specialization_model->getAll([
					'where' => [
						'user_id' => $user->id
					]
				]),
				'appointments' => []
			];

			if(isEqual($user->user_type, USER_TYPES['DOCTOR'])) {
				$data['appointments'] = $this->appointment->all([
					'staff_assigned_id' => $user->id
				]);
			} else {
				$data['appointments'] = $this->appointment->all([
					'user_id' => $user->id
				]);
			}

			
			$this->view('user/admin_view' , $data);
		}

		public function sendAuth()
		{
			if( isSubmitted() )
			{
				$post = request()->posts();


				$user = $this->model->get( $post['user_id'] );

				$recipients = explode(',' , $post['recipients']);

				$content = pull_view('tmp/emails/user_auth_email_view_tmp' , [
					'user' => $user,
					'system_name' => COMPANY_NAME
				]);

				_mail($recipients , "User Auth" , $content);

				_notify_operations("Account details has been sent, recipients {$post['recipients']} ");

				Flash::set("Auth has been sent");

				return request()->return();
			}
		}

		public function referrral() {

			$req = request()->inputs();
			/*registration with backer*/
		}

		public function sendVerification() {
			$req = request()->inputs();
			$user = $this->model->get(unseal($req['userId']));
			$email_body = $this->model->verifyAccount($user->id);

			_mail($user->email , "Complete your registration on ".COMPANY_NAME , $email_body);
			Flash::set("Verification has been sent.");
			return request()->return();
		}

		public function admin()
		{
			if(isEqual(whoIs('user_type'), USER_TYPES['CUSTOMER'])) {
				$appointments = $this->appointment->all([
					'user_id' => whoIs('id'),
					'date' => date('Y-m-d')
				]);
			} else if(isEqual(whoIs('user_type'), USER_TYPES['DOCTOR'])) {
				$appointments = $this->appointment->all([
					'staff_assigned_id' => whoIs('id'),
					'date' => date('Y-m-d')
				]);
			}else {
				$appointments = $this->appointment->all([
					'date' => date('Y-m-d')
				]);
			}
			$data = [
				'appointments' => $appointments,
				'todaysAppointmentCount' => count($appointments),
				'lowCount' => 0,
				'nearExpiryCount' => 0,
			];
			return $this->view('user/admin', $data);
		}

		public function addSpecialization() {
			$req = request()->inputs();

			$resp = $this->user_service_specialization_model->addSpecialization(...[
				$req['user_id'],
				$req['service_id']
			]);
			Flash::set($this->user_service_specialization_model->getMessageString(), $resp == true? 'success' : 'danger');
			return request()->return();
		}

		public function removeSpecialization($id) {
			Flash::set("Specialization Removed");
			$this->user_service_specialization_model->delete($id);
			return request()->return();
		}

		public function disable($id) {
			$resp = $this->model->disable($id);
			Flash::set($this->model->getMessageString());
			return request()->return();
		}

		public function enable($id) {
			$resp = $this->model->enable($id);
			Flash::set($this->model->getMessageString());
			return request()->return();
		}
	}