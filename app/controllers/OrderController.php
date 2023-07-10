<?php 
	use Form\PaymentForm;
	use Form\OrderForm;
	use Form\OrderItemForm;

	use Services\OrderService;
	use Services\StockService;



	load(['PaymentForm', 'OrderForm', 'OrderItemForm'], FORMS);
	load(['OrderService','StockService'], SERVICES);

	class OrderController extends Controller
	{
		private $model,
		$formPayment,$formOrder,$modelStock;
		public $serviceOrder;

		public function __construct() {
			parent::__construct();

			$this->model = model('OrderModel');
			$this->modelOrderItemModel = model('OrderItemModel');
			$this->modelPayment = model('PaymentModel');
			$this->modelStock = model('StockModel');

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

		public function cashierMode() 
		{
			$req = request()->inputs();

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

				if(isset($post['btn_edit_item'])) {
					$this->modelOrderItemModel->updateItem($post, $post['id']);
				}
				return redirect(_route('order:cashier'));
			}

			$order =  $this->model->getComplete([
				'tmp_token' => $this->_curOrderSession()
			]);

			$this->data['order'] = $order;
			$this->data['req'] = $req;

			if($order) {
				$this->data['formOrder']->setValueObject($order);
			}

			if(isset($req['order_item_id'])) {
				$orderItem = $this->modelOrderItemModel->get($req['order_item_id']);
				$this->data['formOrderItem']->setValueObject($orderItem);
				$this->data['orderItem'] = $orderItem;
			}
			return $this->view('order/cashier_mode', $this->data);
		}

		public function show($id) {
			$order = $this->model->getComplete([
				'id' => $id
			]);
			$this->data['order'] = $order;
			$this->data['formOrder']->setValueObject($order);

			$this->data['formPayment']->setValue('bill_id', $order->id);
			$this->data['formPayment']->setValue('amount', $order->current_balance);

			$this->data['payments'] = $this->modelPayment->getAll([
				'where' => [
					'payment.bill_id' => $id
				]
			]);

			return $this->view('order/show', $this->data);
		}

		public function replacement($id) 
		{
			$req = request()->inputs();

			if(isSubmitted()) {
				$post = request()->posts();

				if(!empty($post['btn_replace_order'])) {

					/*
					*check replace type
					*/
					switch($post['reason']) {
						case 'CHANGE_ITEM':
							//get item on order item.
							//deduct balance and initial balance on order.
							//return item to stock
							$orderItem = $this->modelOrderItemModel->get($post['order_item_id']);
							
							$order = $this->model->getComplete([
								'id' => $orderItem->order_id
							]);

							$initialAmount = $order->initial_amount - $orderItem->purchased_amount;
							$currentBalance = $order->current_balance - $orderItem->purchased_amount;


							$isOkay = $this->model->update([
								'initial_amount' => $initialAmount,
								'current_balance' => $currentBalance
							], $order->id);


							$this->modelStock->createOrUpdate([
								'item_id' => $orderItem->item_id,
								'quantity' => 1,
								'entry_type' => StockService::ENTRY_ADD,
								'entry_origin' => StockService::ENTRY_ORIGIN_CHANGE_ITEM,
								'remarks' => "Reason : {$post['reason']} \n {$post['notes']}",
							]);

							if($orderItem->quantity < 2) {
								$this->modelOrderItemModel->delete($post['order_item_id']);
							} else {
								$this->modelOrderItemModel->update([
									'quantity' => ($orderItem->quantity - 1)
								], $post['order_item_id']);	
							}
							

							return redirect(_route('order:replacement', $id));
						break;

						case 'DEFECTIVE_ITEM':
							$orderItem = $this->modelOrderItemModel->get($post['order_item_id']);
							
							$order = $this->model->getComplete([
								'id' => $orderItem->order_id
							]);

							$initialAmount = $order->initial_amount - $orderItem->purchased_amount;
							$currentBalance = $order->current_balance - $orderItem->purchased_amount;


							$isOkay = $this->model->update([
								'initial_amount' => $initialAmount,
								'current_balance' => $currentBalance
							], $order->id);


							$this->modelStock->createOrUpdate([
								'item_id' => $orderItem->item_id,
								'quantity' => 1,
								'entry_type' => StockService::ENTRY_ADD,
								'entry_origin' => StockService::ENTRY_ORIGIN_CHANGE_ITEM,
								'remarks' => "Defective Item",
							]);

							$this->modelStock->createOrUpdate([
								'item_id' => $orderItem->item_id,
								'quantity' => 1,
								'entry_type' => StockService::ENTRY_DEDUCT,
								'entry_origin' => StockService::ENTRY_ORIGIN_DEFECTIVE_ITEM,
								'remarks' => "Reason : {$post['reason']} \n {$post['notes']}",
							]);

							if($orderItem->quantity < 2) {
								$this->modelOrderItemModel->delete($post['order_item_id']);
							} else {
								$this->modelOrderItemModel->update([
									'quantity' => ($orderItem->quantity - 1)
								], $post['order_item_id']);
							}
							return redirect(_route('order:replacement', $id));
						break;
					}
				}
			}
			$order = $this->model->getComplete([
				'id' => $id
			]);
			$this->data['order'] = $order;
			$this->data['formOrder']->setValueObject($order);
			$this->data['formPayment']->setValue('bill_id', $order->id);
			$this->data['formPayment']->setValue('amount', $order->current_balance);
			$this->data['req'] = $req;


			if(!empty($req['order_item_id'])) {
				$this->data['orderItem'] =  $this->modelOrderItemModel->get($req['order_item_id']);
			}

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
			$this->_curOrderSessionReset();
			return redirect(_route('order:cashier'));
		}

		private function _curOrderSession() {
			return Session::get('cashier_mode_token');
		}

		private function _curOrderSessionReset() {
			return Session::set('cashier_mode_token',get_token_random_char(12));
		}
	}