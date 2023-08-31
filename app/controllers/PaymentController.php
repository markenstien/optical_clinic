<?php 

	class PaymentController extends Controller
	{	
		private $paymentModel;
		private $modelOrder;
		private $modelAppointment;
		public function __construct()
		{
			parent::__construct();
			_authRequired();
			$this->paymentModel = model('PaymentModel');
			$this->modelOrder = model('OrderModel');
			$this->modelAppointment = model('AppointmentModel');
		}
		
		public function index()
		{	
			if(isEqual(whoIs('user_type'), 'patient')) {
				$payments = $this->paymentModel->getAll([
					'where' => [
						'payment.user_id' => whoIs('id')
					]
				]);
			} else {
				$payments = $this->paymentModel->getAll();
			}
			
			$data = [
				'title' => 'Payments',
				'payments' => $payments
			];
			return $this->view('payment/index' , $data);
		}

		public function create() {
			if(isSubmitted()) {
				$post = request()->posts();
				$route = _route('auth:login');

				if(isEqual($post['origin'],'Reservation')) {
					$post['bill_id'] = $post['appointment_id'];
					$post['origin'] = 'RESERVATION_FEE';
					$post['status'] = 'for-approval';
					$paymentIsOkay = $this->paymentModel->create($post);
					$message = "Reservation and Payment sent.";

					#image upload things
					if(!upload_empty('file_attachment')) {
						$this->_attachmentModel->upload([
							'display_name' => $this->paymentModel->_getRetval('reference'),
							'label' => 'RESERVATION_PAYMENT_PHOTO',
							'global_key' => 'RESERVATION_PAYMENT_PHOTO',
							'global_id' => $this->paymentModel->_getRetval('payment_id')
						],'file_attachment');
					}

					if(!$paymentIsOkay) {
						Flash::set("Invalid Payment", 'danger');
						return request()->return();	
					}

					
					
					if(whoIs()) {
						$route = _route('appointment:show', $post['bill_id']);;
					} else {
						$route = _route('auth:login');
					}
				} else {
					$paymentIsOkay = $this->paymentModel->create($post);
					//update order
					$this->modelOrder->addPayment($post['bill_id'], $post['amount']);

					if(!$paymentIsOkay) {
						Flash::set("Invalid Payment", 'danger');
						return request()->return();	
					}

					Flash::set('Payment Saved');
					$route = _route('order:show', $post['bill_id']);
				}
				
				return redirect($route);
			}
		}

		public function show($id)
		{
			$payment = $this->paymentModel->get($id);
			$attachment = $this->_attachmentModel->single([
				'global_key' => 'RESERVATION_PAYMENT_PHOTO',
				'global_id' => $id
			]);

			$data = [
				'title' => 'Payment-Overview',
				'payment' => $payment,
				'attachment' => $attachment
			];
			return $this->view('payment/show' , $data);
		}

		public function approve()
		{
			$req = request()->inputs();
			
			$payment = $this->paymentModel->getByKey([
				'payment.id' => $req['payment_id']
			], $req['origin']);

			if(!isEqual($payment->payment_status, 'for-approval')) {
				Flash::set("Unable to approve payment", 'danger');
				return request()->return();
			}

			$this->paymentModel->update([
				'status' => 'approved'
			],$payment->id);

			if(isEqual($req['origin'], 'RESERVATION_FEE')) {
				$this->modelAppointment->update([
					'status' => 'scheduled'
				], $payment->bill_id);
			} else {
				$this->modelOrder->addPayment($payment->bill_id, $payment->amount);
			}
			
			Flash::set("Payment Approved");
			return request()->return();
		}
	}	