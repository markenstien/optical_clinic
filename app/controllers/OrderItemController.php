<?php 

	class OrderItemController extends Controller
	{
		public function __construct() {
			parent::__construct();
			$this->model = model('OrderItemModel');
		}

		public function destroy($id) {
			$this->model->delete($id);
			Flash::set("Item  Removed");
			return request()->return();
		}
	}