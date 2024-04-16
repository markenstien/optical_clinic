<?php
	use Form\AppointmentForm;
	load(['AppointmentForm'] , APPROOT.DS.'form');
	
	class HomeController extends Controller
	{
		private
		$reservationFeeModel;
		public $_form;

		public function sms() {
			$numbers = [
				'09063387451'
			];
			sms_open_sms("Sample text from infobib", $numbers);
		}

		public function __construct()
		{
			parent::__construct();

			$this->service = model('ServiceModel');
			$this->service_bundle = model('ServiceBundleModel');
			$this->category = model('CategoryModel');
			$this->service_cart_model = model('ServiceCartModel');
			$this->model = model('AppointmentModel');
			$this->reservationFeeModel  = model('ReservationFeeSettingModel');

			$this->_form = new AppointmentForm();
		}

		public function index()
		{	
			$this->_form->init([
				'method' => 'post',
				'url' => _route('appointment:appointment_form')
			]);
			
			$this->data['form'] = $this->_form;
			$this->data['reservationFee']  = $this->reservationFeeModel->getActive();
			return view('home/index', $this->data);
		}
	}