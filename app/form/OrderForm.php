<?php 
	namespace Form;
	use Core\Form;

	use Services\OrderService;

	load(['Form'], CORE);
	load(['OrderService'], SERVICES);

	class OrderForm extends Form {

		public function __construct() {
			parent::__construct();

			$this->serviceOrder = new OrderService();

			$this->addCustomerName();
			$this->addCustomerPhone();
			$this->addCustomerEmail();
			$this->addCustomerAddress();

			$this->enableDiscount();
		}

		public function addCustomerName() {
			$this->add([
				'name' => 'customer_name',
				'type' => 'text',
				'required' => true,
				'class' => 'form-control',
				'options' => [
					'label' => 'Customer Name'
				],
				'attributes' => [
					'id' => 'customerName'
				]
			]);
		}

		public function addCustomerPhone() {
			$this->add([
				'name' => 'customer_number',
				'type' => 'text',
				'required' => true,
				'class' => 'form-control',
				'options' => [
					'label' => 'Customer Mobile Number'
				],
				'attributes' => [
					'id' => 'customerNumber'
				]
			]);
		}

		public function addCustomerEmail() {
			$this->add([
				'name' => 'customer_email',
				'type' => 'email',
				'class' => 'form-control',
				'options' => [
					'label' => 'Customer Email'
				],
				'attributes' => [
					'id' => 'customerEmail'
				]
			]);
		}

		public function addCustomerAddress() {
			$this->add([
				'name' => 'customer_address',
				'type' => 'textarea',
				'class' => 'form-control',
				'options' => [
					'label' => 'Customer Address'
				],
				'attributes' => [
					'id' => 'customerAddress'
				]
			]);
		}

		private function enableDiscount() {
			$this->addDiscountAmount();
			$this->addDiscountType();
			$this->addDiscountNotes();
		}

		public function addDiscountAmount() {
			$this->add([
				'name' => 'discount_amount',
				'type' => 'text',
				'class' => 'form-control',
				'requried' => true,
				'options' => [
					'label' => 'Discount Amount'
				]
			]);
		}

		public function addDiscountType() {
			$this->add([
				'name' => 'discount_type',
				'type' => 'select',
				'class' => 'form-control',
				'requried' => true,
				'options' => [
					'label' => 'Discount Type',
					'option_values' => $this->serviceOrder->getDiscounts()
				]
			]);
		}


		public function addDiscountNotes() {
			$this->add([
				'name' => 'discount_notes',
				'type' => 'text',
				'class' => 'form-control',
				'requried' => true,
				'options' => [
					'label' => 'Notes'
				]
			]);
		}
	}