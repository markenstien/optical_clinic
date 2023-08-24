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
			$this->_form = new UserForm('form_user');
			$this->_form_address = new AddressForm();

			$this->model = model('UserModel');
			$this->session = model('SessionModel');
			$this->appointment = model('AppointmentModel');
			$this->adddess_model = model('AddressModel');
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

				return redirect(_route('auth:login'));
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

			$data = [
				'users' => $this->model->getAll(),
				'title' => 'Users'
			];

			return $this->view('user/index' , $data);
		}

		public function create()
		{

			if(isSubmitted())
			{
				$post = request()->posts();
				dump($post);
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

			if( $user_address )
			$this->_form_address->setValueObject($user_address);

			$this->_form_address->remove('submit');

			$data = [
				'title' => 'Create User',
				'form'  => $this->_form,
				'doc_form' => $doc_form,
				'user'   => $user,
				'form_address' => $this->_form_address
			];

			return $this->view('user/create_edit' , $data);
		}

		public function profile()
		{
			return $this->show( whoIs('id') );
		}

		public function show($id)
		{
			$user = $this->model->get($id);

			if(!$user){
				Flash::set("Doctor not found" , 'danger');
				return request()->return();
			}

			$data = [
				'user' => $user
			];

			$backer = false;

			switch(strtolower($user->user_type))
			{
				case 'patient':
				
				$data['appointments'] = $this->appointment->getDesc('id' , ['user_id' => $user->id]);
				
				$data['sessions'] = $this->session->getAll([
					'where' => [
						'user_id' => $user->id
					]
				]);

				if(!is_null($user->backer_id)) {
					$backer = $this->model->get($user->backer_id);
				}
				$data['backer'] = $backer;
				$this->view('user/patient_view' , $data);
				break;

				default:
					//admin
				$this->view('user/admin_view' , $data);
				break;
			}
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

			echo $email_body;
			die();
			
			_mail($user->email , "Verify Account" , $email_body);

			Flash::set("Verification has been sent.");
			return request()->return();
		}
	}