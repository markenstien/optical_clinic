<?php
    use Form\StockForm;
    load(['StockForm'], APPROOT.DS.'form');

    class StockController extends Controller
    {
        public function __construct()
        {
            parent::__construct();
            _authRequired([
				'staff',
				'admin',
				'sub_admin'
			]);
            $this->data['stock_form'] = new StockForm();
            $this->model = model('StockModel');
            $this->itemModel = model('ServiceModel');
        }
        public function index() {
            $this->data['stocks'] = $this->model->getStocks();
            return $this->view('stock/index', $this->data);
        }

        public function addStock() {
            $request = request()->inputs();

            if(isSubmitted()) {
                $res = $this->model->createOrUpdate($request);

                if($res) {
                    Flash::set("Stock added");
                    return redirect(_route('service:show', $request['item_id']));
                } else {
                    Flash::set($this->model->getErrorString(), 'danger');
                    return request()->return();
                }
            }

            //required fields
            
            if(!isset($request['item_id'])) {
                Flash::set("Invalid Request",'danger');
                csrfValidate();
            }
            $this->data['item'] = $this->itemModel->get($request['item_id']);
            $this->data['stock_form']->setValue('item_id', $request['item_id']);
            return $this->view('stock/add_stock', $this->data);
        }

        public function log() {
            $request = request()->inputs();

            $condition = [];

            if(!empty($request['item_id'])) {
                $condition['item_id'] = $request['item_id'];
            }

            if(!empty($request['start_date'])) {
                $condition['date'] = [
					'condition' => 'between',
					'value' => [
						$request['start_date'],
						$request['end_date'],
					]
				];
            }

            $logs = $this->model->getAll([
                'order' => 'stock.id desc',
                'where' => $condition
            ]);

            if(isset($request['excel_export'])) {
                $date = date('Y-m-d');
				_load_helper(ExcelExport::class);
				$newExcelExport = new ExcelExport();

                foreach($logs as $key => $row) {
                    $row->days_to_expire = '';
                    if($row->expiry_date) {
                        $row->days_to_expire = date_difference_number_format($date, $row->days_to_expire);
                    }
                }

				$newExcelExport->setHeader([
					'Product',
					'Stock Reference',
					'Quantity',
					'Origin',
					'Days To Expire',
					'Entry Date',
					'Expiry Date',
					'Remarks',
					'Record Stamp',
				]);

				$exportData = G_PickDataFromArray($logs, [
					'service',
					'stock_reference',
					'quantity',
					'entry_origin',
					'days_to_expire',
					'date',
					'expiry_date',
					'remarks',
					'created_at',
				], 'array');

				$newExcelExport->setData($exportData);	
				$newExcelExport->exportFile();
			}

            $this->data['logs'] = $logs;
            return $this->view('stock/logs', $this->data);
        }

        /**
         * do not product report
         * if completed
         */
        public function completed($id) {
            $this->model->update([
                'meta_status' => 'consumed'
            ], $id);
            
            Flash::set('Stock Record Moved to Consumed');
            return request()->return();
        }
    }