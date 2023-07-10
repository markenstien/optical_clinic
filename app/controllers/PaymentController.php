<?php 

	class PaymentController extends Controller
	{	
		private $paymentModel;
		private $modelOrder;
		public function __construct()
		{
			parent::__construct();
			$this->paymentModel = model('PaymentModel');
			$this->modelOrder = model('OrderModel');
		}
		
		public function index()
		{	
			$auth = auth();


			$payments = $this->paymentModel->getDesc('id');
			$data = [
				'title' => 'Payments',
				'payments' => $payments
			];

			return $this->view('payment/index' , $data);
		}

		public function create() {
			if(isSubmitted()) {
				$post = request()->posts();
				$paymentIsOkay = $this->paymentModel->create($post);
				
				if($paymentIsOkay) {
					$message = "Payment Saved";
					//update order
					$this->modelOrder->addPayment($post['bill_id'], $post['amount']);
					#image upload things
					// if(!upload_empty('file_attachment')) {
					// 	if(!isEqual($fileType, FILE_IMAGE_TYPES)) {
					// 		Flash::set("Invalid upload file type", 'danger');
					// 		return request()->return();
					// 	} else {
					// 		$this->_attachmentModel->upload([
					// 		'display_name' => $this->paymentModel->_getRetval('reference'),
					// 			'label' => 'RESERVATION_PAYMENT_PHOTO',
					// 			'global_key' => 'RESERVATION_PAYMENT_PHOTO',
					// 			'global_id' => $this->paymentModel->_getRetval('payment_id')
					// 		],'file_attachment');
					// 	}
					// }

					return;
				} else {
					Flash::set("Invalid Payment", 'danger');
					return request()->return();
				}
			}
		}

		public function show($id)
		{
			$payment = $this->paymentModel->get( $id );
			$data = [
				'title' => 'Payment-Overview',
				'payment' => $payment
			];
			return $this->view('payment/show' , $data);
		}

		public function confirmation()
		{
			echo ' payment-confirmed ';
		}
	}