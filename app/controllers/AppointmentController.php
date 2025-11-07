<?php 	
	use Form\AppointmentForm;
	use Form\PaymentForm;
	use Form\UserForm;
	use Services\StockService;

	load(['AppointmentForm','PaymentForm', 'UserForm'] , APPROOT.DS.'form');
	load(['StockService'] , APPROOT.DS.'services');

	class AppointmentController extends Controller
	{
		private $model,$service,
		$service_bundle,
		$category,
		$service_cart_model,
		$reservationFeeModel,
		$modelPayment, $modelOrder, $modelSession,
		$userServiceSpecializationModel,
		$userModel;

		public $_form,$_paymentForm,$_userForm;

		public function __construct()
		{
			parent::__construct();
			$this->service = model('ServiceModel');
			$this->modelPayment = model('PaymentModel');
			$this->modelOrder = model('OrderModel');
			$this->userModel = model('userModel');

			$this->service_bundle = model('ServiceBundleModel');
			$this->category = model('CategoryModel');
			$this->service_cart_model = model('ServiceCartModel');
			$this->model = model('AppointmentModel');
			$this->reservationFeeModel  = model('ReservationFeeSettingModel');
			$this->modelSession = model('SessionModel');
			$this->userServiceSpecializationModel = model('UserServiceSpecializationModel');

			$this->_form = new AppointmentForm();
			$this->_paymentForm = new PaymentForm();
			$this->_userForm = new UserForm();
		}

		/**
		 * Temporary to keep order glasses online
		 * */
		public function appointment_form() {
			if(isSubmitted()) {
				$post = request()->posts();

				$res = $this->model->create($post);

				if(!$res) {
					Flash::set($this->model->getErrorString(), 'danger');
					if(isset($post['returnTo'])) {
						request()->saveEntries();
						return redirect(unseal($post['returnTo']));
					} else {
						return request()->return();
					}
				} else {
					Flash::set($this->model->getMessageString());

					if(!empty($post['reservation_fee'])) {
						//reservation fee
						return redirect(_route('appointment:payment-add',null,[
							'appointmentID' => seal($this->model->_getRetval('appointment_id'))
						]));
					}
					return redirect(_route('auth:login'));
				}
			}
			$this->data['form'] = $this->_form;
			$this->data['reservationFee']  = $this->reservationFeeModel->getActive();

			return $this->view('appointment/appointment_form', $this->data);
		}

		public function index()
		{
			_authRequired();
			/*
			*select service that you want
			*/
			$auth = whoIs();

			if(isEqual($auth->user_type , [USER_TYPES['CUSTOMER']])){
				$appointments = $this->model->all([
					'user_id' => $auth->id
				], "FIELD(status, 'scheduled', 'pending', 'arrived', 'cancelled','completed') asc, date asc");
			}else if(isEqual($auth->user_type , [USER_TYPES['DOCTOR']])) {
				$appointments = $this->model->all([
					'staff_assigned_id' => $auth->id
				], "FIELD(status, 'scheduled', 'pending', 'arrived', 'cancelled','completed') asc, date asc");
			}else{
				$appointments = $this->model->all(null, "FIELD(status, 'scheduled', 'pending', 'arrived', 'cancelled', 'completed') asc, id desc, date asc");
			}

			$data = [
				'title' => 'Appointments',
				'appointments' => $appointments
			];

			return $this->view('appointment/index' , $data);
		}


		public function createWithBill()
		{
			_authRequired();
			if( isSubmitted() )
			{
				$post = request()->posts();

				$res = $this->model->createWithBill( $post );

				if(!$res) 
				{
					Flash::set( $this->model->getErrorString() , 'danger') ;
					return request()->return();
				}

				//kill reservation

				$this->service_cart_model->destroyCart();

				Flash::set("Appointment Created");

				$auth = auth();

				if( !$auth) 
					return redirect( _route('bill:show' , $res) );

				if( isEqual($post['type'] , 'walk-in') )
					return redirect( _route('appointment:show' , $res) );
				
				return redirect( _route('appointment:show' , $res) );	
			}
		}

		public function create()
		{	
			$req = request()->inputs();
			$data = [];

			if($req['page'] ?? '' == 'customize-appointment') {
				$isCompleteCycle = true;
				$completeCycle = [
					'service_id',
					'doctor_id',
					'date',
					'time'
				];

				if(!whoIs()) {
					array_push($completeCycle, 'guest_data');
				}

				foreach($completeCycle as $key => $row) {
					if(empty($req[$row])) {
						$isCompleteCycle = false;
					}
				}

				/**
				 * get appointments of selected date
				 */
				
				if(!empty($req['date'])) {
					$appointments = $this->model->all([
						'date' => $req['date'],
						'staff_assigned_id' => $req['doctor_id']
					]);

					$data['appointments'] = $appointments;
					/**
					 * group appointments by date
					 */

					/**
					 * group by start time
					 */
					$data['groupByStartTime'] = [];
					foreach($appointments as $key => $row) {
						$startTime = date('h:i A', strtotime($row->start_time));
						if(!isset($data['groupByStartTime'][$startTime])) {
							$data['groupByStartTime'][$startTime] = [];
						}
						$data['groupByStartTime'][$startTime][] = $row;
					}
				}
				
				if($isCompleteCycle) {

					$time = unseal($req['time']);
					$startAndEnd = explode('-', $time);
					foreach($startAndEnd as $key => $row) {
						$startAndEnd[$key] = trim($row);
					}

					$service = $this->service_bundle->get($req['service_id']);

					$createAppointmentData = [
						'date' => $req['date'],
						'staff_assigned_id' => $req['doctor_id'],
						'service_inquired_id' => $req['service_id'],
						'start_time' => $startAndEnd[0],
						'end_time' => $startAndEnd[1],
						'reservation_fee' => $service->price_custom,
					];

					if(isSubmitted()) {
						$postData = request()->posts();
						$createAppointmentData['user_id'] = '';
						$createAppointmentData['guest_email'] = $postData['email'];
						$createAppointmentData['guest_name'] = $postData['first_name'] . ' '. $postData['last_name'];
						$createAppointmentData['guest_phone'] = $postData['phone_number'];
					} else {
						$createAppointmentData['user_id'] = whoIs('id');
						$createAppointmentData['guest_email'] = whoIs('email');
						$createAppointmentData['guest_name'] = whoIs('first_name') . ' '. whoIs('last_name');
						$createAppointmentData['guest_phone'] = whoIs('phone_number');
					}
					
					$resp = $this->model->create($createAppointmentData);

					if($resp) {
						Flash::set("Reservation Sent");
						if(!empty(whoIs())) {
							return redirect(_route('appointment:index'));
						} else {
							return redirect(_route('appointment:blank-page'));
						}
					}
				}

				$data['service'] = $this->service_bundle->getWithItems($req['service_id']);
				$data['doctors'] = $this->userServiceSpecializationModel->getAll([
					'where' => [
						'service_id' => $req['service_id']
					]
				]);
				$data['userForm'] = $this->_userForm;

				if(!empty($req['doctor_id'])){
					$data['doctor'] = $this->userModel->get($req['doctor_id']);
				}

				return $this->view('appointment_booking/customize_appointment' , $data);
			} else {
				return $this->view('appointment_booking/index' , $data);
			}
		}


		public function edit($id)
		{
			
			_authRequired();
			if( isSubmitted() )
			{
				$post = request()->posts();

				$res = $this->model->save($post , $post['id']);

				if(!$res){
					Flash::set( $this->model->getErrorString() , 'danger');
				}else{
					Flash::set("Appointment updated!");
				}

				return request()->return();
			}

			$appointment = $this->model->get($id);
	
			$form = $this->_form;

			$form->init([
				'url' => _route('appointment:edit' , $id)
			]);

			$form->setValueObject( $appointment );

			$form->addId($id);
			$form->customSubmit('Save Changes' , 'submit');

			$data = [
				'title' => 'Update Appointment',
				'form'  => $form,
				'appointment' => $appointment,
				'bill'  => $this->model->getBill($id)
			];

			return $this->view('appointment/edit' , $data);
		}

		public function show($id)
		{
			
			$appointment = $this->model->getComplete($id);
			$payment = $this->modelPayment->getByKey([
				'origin' => 'RESERVATION_FEE',
				'bill_id' => $id
			]);

			$session = $this->modelSession->single([
				'appointment_id' => $id
			]);

			$attachment = $this->_attachmentModel->single([
				'global_key' => 'RESERVATION_PAYMENT_PHOTO',
				'global_id' => $payment->id ?? 0
			]);

			if($appointment->service_inquired_id) {
				$appointment->service_bundle = $this->service_bundle->get($appointment->service_inquired_id);
			}

			if($appointment->staff_assigned_id) {
				$appointment->doctor = $this->userModel->get($appointment->staff_assigned_id);
			}

			$data = [
				'appointment' => $appointment,
				'title' => '#'.$appointment->reference. ' | Appointment',
				'payment' => $payment,
				'session' => $session,
				'attachment' => $attachment
			];
			return $this->view('appointment/show' , $data);
		}

		public function addPayment() {
			$req = request()->inputs();

			$appointmentId = unseal($req['appointmentID']);
			$appointment = $this->model->get($appointmentId);

			$this->_paymentForm->setValue('amount', $appointment->reservation_fee);

			$this->_paymentForm->add([
				'name' => 'method',
				'type' => 'text',
				'class' => 'form-control',
				'required' => true,
				'options' => [
					'label' => 'Payment Method'
				],
				'attributes' => [
					'readonly' => true
				],
				'value' => 'Online'
			]);

			$this->data['paymentForm'] = $this->_paymentForm;
			$this->data['appointment'] = $appointment;
			return $this->view('appointment/payment', $this->data);
		}

		public function cancel($id)
		{
			$appointment = $this->model->get($id);
			if($appointment->user_id)
			{
				_notify("Your Appointment {$appointment->reference} has been cancelled" , [$appointment->user_id], [
					'href' => _route('appointment:show', $appointment->id)
				]);
			}

			_notify_operations("Appointment {$appointment->reference} has been cancelled", [
				'href' => _route('appointment:show', $appointment->id)
			]);
			
			//update status
			$this->model->update([
				'status' => 'cancelled'
			], $appointment->id);
			Flash::set("Appointment Has been cancelled");
			return redirect(_route('appointment:show', $appointment->id));
		}

		public function approve($id) {
			$appointment = $this->model->get($id);

			if($appointment->user_id)
			{
				_notify("Your Appointment {$appointment->reference} has been approved" , [$appointment->user_id], [
					'link' => _route('appointment:show', $appointment->id)
				]);
			}

			_notify_operations("Appointment {$appointment->reference} has been approved", [
				'link' => _route('appointment:show', $appointment->id)
			]);

			_mail($appointment->guest_email, "Appointment Updated to Approved", $this->model->emailFormat($appointment->id));
			
			//update status
			$this->model->update([
				'status' => 'approved'
			], $appointment->id);
			Flash::set("Appointment Approved");
			return redirect(_route('appointment:show', $appointment->id));
		}

		public function arrived($id) {
			$appointment = $this->model->get($id);

			if($appointment->user_id)
			{
				_notify("Your Appointment {$appointment->reference} has been updated to arrived" , [$appointment->user_id], [
					'link' => _route('appointment:show', $appointment->id)
				]);
			}

			_notify_operations("Appointment {$appointment->reference} has been updated to arrived", [
				'link' => _route('appointment:show', $appointment->id)
			]);

			_mail($appointment->guest_email, "Appointment Updated to Arrived", $this->model->emailFormat($appointment->id));
			
			//update status
			$this->model->update([
				'status' => 'arrived'
			], $appointment->id);
			Flash::set("Appointment is updated to arrived");
			return redirect(_route('appointment:show', $appointment->id));
		}
		
		public function complete($id) {
			$this->stockModel = model('StockModel');
			$appointment = $this->model->get($id);
			if(!isEqual($appointment->status, 'completed')) {
				//get service_inquired_id
				$service_bundle = $this->service_bundle->getWithItems($appointment->service_inquired_id);
				foreach($service_bundle->items as $key => $item) {
					$this->stockModel->createOrUpdate([
						'item_id' => $item->service_id,
						'quantity' => $item->quantity_per_usage,
						'entry_type' => StockService::ENTRY_DEDUCT,
						'entry_origin' => StockService::ENTRY_ORIGIN,
						'date' => date('Y-m-d'),
						'remarks' => 'Appointment# '. $appointment->reference
					]);
				}

				/**
				 * notification
				 */
				if($appointment->user_id)
				{
					_notify("Your Appointment {$appointment->reference} has been completed" , [$appointment->user_id], [
						'link' => _route('appointment:show', $appointment->id)
					]);
				}

				_notify_operations("Appointment {$appointment->reference} has been completed", [
					'link' => _route('appointment:show', $appointment->id)
				]);


				_mail($appointment->guest_email, "Appointment Updated to Complete", $this->model->emailFormat($appointment->id));
				
				//update status
				$this->model->update([
					'status' => 'completed'
				], $appointment->id);
				Flash::set("Appointment Complete");
				return redirect(_route('appointment:show', $appointment->id));
			}
		}

		public function blankPage() {
			return $this->view('pages/blank-page');
		}
	}