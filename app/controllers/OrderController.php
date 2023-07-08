<?php 
	use Form\PaymentForm;
	use Form\OrderForm;
	use Form\OrderItemForm;

	use Services\OrderService;


	load(['PaymentForm', 'OrderForm', 'OrderItemForm'], FORMS);
	load(['OrderService'], SERVICES);

	class OrderController extends Controller
	{
		private $model,
		$formPayment,$formOrder;
		public $serviceOrder;

		public function __construct() {
			parent::__construct();

			$this->model = model('OrderModel');
			$this->modelOrderItemModel = model('OrderItemModel');

			$this->formPayment = new PaymentForm();
			$this->formOrder = new OrderForm();
			$this->formOrderItem = new OrderItemForm();

			$this->serviceOrder = new OrderService();

			$this->data['formPayment'] = $this->formPayment;
			$this->data['formOrder'] = $this->formOrder;
			$this->data['formOrderItem'] = $this->formOrderItem;
			$this->data['serviceOrder'] = $this->serviceOrder;
		}

		public function index() {

			$this->data['orders'] = $this->model->getAll();

			return $this->view('order/index', $this->data);
		}

		public function cashierMode() {

			if(empty($this->_curOrderSession())) {
				$this->_curOrderSessionReset();
			}

			if(isSubmitted()) {
				$post = request()->posts();

				if(isset($post['btn_checkout'])) {
					$this->model->checkOut($this->_curOrderSession(),$post);
					$this->_curOrderSessionReset();
				}

				if(isset($post['btn_add_item'])) {
					$this->model->addItem($this->_curOrderSession(), $post);
				}

				return redirect(_route('order:cashier'));
			}

			$order =  $this->model->getComplete([
				'tmp_token' => $this->_curOrderSession()
			]);

			$this->data['order'] = $order;

			if($order) {
				$this->data['formOrder']->setValueObject($order);
			}
			return $this->view('order/cashier_mode', $this->data);
		}

		public function show($id) {

			$order = $this->model->getComplete($id);
			dump($order);

			return $this->view('order/show', $this->data);
		}

		public function replacement() {

			return $this->view('order/replace', $this->data);
		}

		public function itemReplacement($orderItemId) {
			return $this->view('order/replace_item', $this->data);
		}

		public function cancelOrderSession() {

			$token = Session::get('cashier_mode_token');

			if(!empty($token)) {
				$resp = $this->model->cancelSession($token);

				if($resp) {
					Flash::set("Order Session Cancelled");
				}
			} else {
				Flash::set("No order session to cancel");
			}

			return redirect(_route('order:cashier'));
		}

		private function _curOrderSession() {
			return Session::get('cashier_mode_token');
		}

		private function _curOrderSessionReset() {
			return Session::set('cashier_mode_token',get_token_random_char(12));
		}
	}