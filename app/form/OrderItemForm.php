<?php 

	namespace Form;
	use Core\Form;

	load(['Form'], CORE);

	class OrderItemForm extends Form {

		private $itemModel = null;

		public function __construct() {
			parent::__construct();

			if(!isset($this->itemModel)) {
				$this->itemModel = model('ServiceModel');
			}

			$this->addItem();
			$this->addQuantity();
			$this->addPrice();
		}

		public function addItem() {
			$items = $this->itemModel->getAll([
				'order' => 'service.service asc',
				'where' => [
					'service.is_visible' => true,
					'service.status' => 'available'
				]
			]);

			$itemArray = arr_layout_keypair($items,['id' , 'code@service@price'], [
				'concatinator' => [
					' - ',
					' - '
				],
				'textWrapper' => [
					['(', ')']
				]
			]);

			$this->add([
				'type' => 'select',
				'name' => 'item_id',
				'options' => [
					'label' => 'Product',
					'option_values' => $itemArray
				],
				'required' => true,
				'attributes' => [
					'id' => 'orderItemProductId'
				],
				'class' => 'form-control'
			]);
		}

		public function addQuantity() {
			$this->add([
				'type' => 'number',
				'name' => 'quantity',
				'options' => [
					'label' => 'quantity'
				],
				'required' => true,
				'attributes' => [
					'id' => 'orderItemQuantity'
				],
				'class' => 'form-control'
			]);
		}

		public function addPrice() {
			$this->add([
				'type' => 'text',
				'name' => 'purchased_amount',
				'options' => [
					'label' => 'Price'
				],
				'required' => true,
				'attributes' => [
					'id' => 'orderItemPrice',
					'readonly' => true
				],
				'class' => 'form-control'
			]);
		}
	}