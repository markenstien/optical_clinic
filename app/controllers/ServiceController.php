<?php
	use Form\ServiceForm;
    use Services\StockService;

	load(['ServiceForm'] , APPROOT.DS.'form');
	load(['StockService'] , APPROOT.DS.'services');



	class ServiceController extends Controller
	{
		
		public function __construct()
		{
			$this->_form = new ServiceForm();
			$this->model = model('ServiceModel');
			$this->modelStock = model('StockModel');
			parent::__construct();
		}

		public function index()
		{
			_authRequired();
			$request = request()->get();
			$date = date('Y-m-d');

			$stockCondition = [
				'entry_origin' => StockService::ENTRY_PURCHASE_ORDER
			];

			if(!empty($request['start_date'])) {
				$stockCondition['date'] = [
					'condition' => 'between',
					'value' => [
						$request['start_date'],
						$request['end_date'],
					]
				];
			}

			$services = $this->model->getAll();
			$stocks = $this->modelStock->getAll([
				'where' => $stockCondition
			]);

			$stocksForFastMoving = $this->modelStock->getAll();
			//fast moving
			$expiringStocks = [];
			foreach($stocks as $key => $row) {
				if(empty($row->expiry_date)) continue;
				if(date_difference_number_format($date, $row->expiry_date) <= request()->get('days_to_expire', 20)) {
					$row->days_to_expire = date_difference_number_format($date, $row->expiry_date);
					$expiringStocks [] = $row;
				}
			}
			/**
			 * stocks from purcahse order
			 */

			if(isset($request['excel_export'])) {
				_load_helper(ExcelExport::class);
				$newExcelExport = new ExcelExport();
				$newExcelExport->setHeader([
					'Product',
					'Stock Reference',
					'Days To Expire',
					'Entry Date',
					'Expiry Date'
				]);

				$exportData = G_PickDataFromArray($expiringStocks, [
					'service',
					'stock_reference',
					'days_to_expire',
					'date',
					'expiry_date'
				], 'array');

				$newExcelExport->setData($exportData);	
				$newExcelExport->exportFile();
			}

			$data = [
				'title' => 'Products',
				'services' => $services,
				'form' => $this->_form,
				'expiringStocks' => $expiringStocks
			];
			return $this->view('service/index' , $data);
		}


		public function create()
		{
			_authRequired([
				'staff',
				'admin',
				'sub_admin'
			]);

			if( isSubmitted() )
			{
				$post = request()->posts();

				$res = $this->model->save($post);

				Flash::set( $this->model->getMessageString() );

				if(!$res){
					Flash::set( $this->model->getErrorString() , 'danger');
					return request()->return();
				}

				if(!upload_empty('images')) {
					//upload images
					$this->_attachmentModel->upload_multiple([
						'global_key' => 'PRODUCT_IMAGES',
						'global_id'  => $this->model->_getRetval('id')
					], 'images');
				}

				return redirect( _route('service:show', $res) );
			}

			$data = [
				'title' => 'Create Product',
				'form'  => $this->_form
			];

			return $this->view('service/create' , $data);
		}


		public function edit($id)
		{
			_authRequired([
				'staff',
				'admin',
				'sub_admin'
			]);

			if( isSubmitted() )
			{
				$post = request()->posts();

				$res = $this->model->save($post , $post['id']);

				Flash::set( $this->model->getMessageString() );

				if(!$res){
					Flash::set( $this->model->getErrorString() , 'danger');
					return request()->return();
				}

				return redirect( _route('service:index') );
			}

			$service = $this->model->get($id);

			$this->_form->init([
				'url' => _route('service:edit' , $service->id)
			]);

			$this->_form->addId( $service->id );

			$this->_form->setValueObject( $service );

			$data = [
				'title' => 'Edit Product',
				'form'  => $this->_form
			];

			return $this->view('service/edit' , $data);
		}

		public function show($id) {
			$service = $this->model->get($id);
			$this->_form->setValueObject( $service );
			$this->data['service'] = $service;
			$this->data['_form'] = $this->_form;

			$this->data['images'] = $this->_attachmentModel->all([
				'global_key' => _asset_key('PRODUCT_IMAGES'),
				'global_id'  => $id
			]);

			$this->data['_attachmentForm']->setValue('global_id', $id);
			$this->data['_attachmentForm']->setValue('global_key', _asset_key('PRODUCT_IMAGES'));

			$this->data['logs'] = $this->modelStock->getProductLogs($id);
			return $this->view('service/show' , $this->data);
		}
		
		public function archive($id) {
			$current = $this->model->get($id);
			$currentState = $current->is_visible;
			$this->model->update([
				'is_visible' => $currentState == 1 ? 0 : 1
			], $id);

			if($currentState) {
				Flash::set("Product Moved to archived");
			} else {
				Flash::set("Product Restored from archive");
			}
			return request()->return();
		}
	}