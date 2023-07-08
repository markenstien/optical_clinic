<?php

	class API_Product extends Controller {
		
		public function __construct() {
			parent::__construct();
			$this->modelService = model('ServiceModel');
		}

		public function getItem() {
			$req = request()->inputs();

			$product = $this->modelService->get($req['id']);

			parent::_jsonResponse($product, false, "Product Fetched");
		}	
	}
?>