<?php 

	class PaymentController extends Controller
	{	
		private $paymentModel;
		public function __construct()
		{
			parent::__construct();
			$this->paymentModel = model('PaymentModel');
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

				if(upload_empty('file_attachment')) {
					Flash::set("File upload is required", 'danger');
					return request()->return();
				} else {
					$fileType = upload_type('file_attachment');
					if(!isEqual($fileType, FILE_IMAGE_TYPES)) {
						Flash::set("Invalid upload file type", 'danger');
						return request()->return();
					}
					$paymentIsOkay = $this->paymentModel->create($post);

					if($paymentIsOkay) {
						$this->_attachmentModel->upload([
							'display_name' => $this->paymentModel->_getRetval('reference'),
							'label' => 'RESERVATION_PAYMENT_PHOTO',
							'global_key' => 'RESERVATION_PAYMENT_PHOTO',
							'global_id' => $this->paymentModel->_getRetval('payment_id')
						],'file_attachment');
					}
				}
				dd([
					$post,
					$_FILES
				]);
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