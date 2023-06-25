<?php
	use Form\AppointmentForm;
	load(['AppointmentForm'] , APPROOT.DS.'form');
	
	class HomeController extends Controller
	{
		private $model,$service,
		$service_bundle,
		$category,
		$service_cart_model,
		$reservationFeeModel;

		public $_form;

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