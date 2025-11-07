<?php
    use Form\StockForm;
    use Services\StockService;

    load(['StockForm'], APPROOT.DS.'form');
    load(['StockService'], APPROOT.DS.'services');

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

            $gropuedByItems = _group_db_result_by_column($logs, 'item_id');
            $reportData = [];
            foreach($gropuedByItems as $key => $itemElements) {
                foreach($itemElements as $element => $row) {
                    if(!isset($reportData[$key])) {
                        $reportData[$key] = [
                            'service' => [
                                'id' => $row->item_id,
                                'name' => $row->service,
                                'code' => $row->code,
                            ],
                            'attributes' => [
                                'initialQuantity' => 0,
                                'remainingQuantity' => 0,
                                'usagePercentage' => 0
                            ]
                        ];
                    }
                    if(isEqual($row->entry_type, StockService::ENTRY_ADD)) {
                        $reportData[$key]['attributes']['initialQuantity'] += $row->quantity;
                    }
                    $reportData[$key]['attributes']['remainingQuantity'] += $row->quantity;
                }
            }


            $startDate = request()->get('start_date', 'not set');
            $endDate = request()->get('end_date', 'not set');
            foreach($reportData as $key => &$row) {
                //compute the percentage for slowmving and fast moving
                $attributes = $row['attributes'];
                if($attributes['initialQuantity'] > 0 && ($attributes['initialQuantity'] != $attributes['remainingQuantity'])) {
                    $usagePercentage = (100) - round(($attributes['remainingQuantity'] / $attributes['initialQuantity']) * 100, 2) ;
                    $row['attributes']['usagePercentage'] = $usagePercentage;
                }
                $row['start_date'] = $startDate;
                $row['end_date'] = $endDate;
            }

            $reportData = sortByUsagePercentageDesc($reportData);

            if(isset($request['excel_export'])) {
				_load_helper(ExcelExport::class);
				$newExcelExport = new ExcelExport();
                $date = date('Y-m-d');
                if(isEqual(request()->get('report_type'), 'fastmoving')) {

                    $arrangeReportData = [];

                    foreach($reportData as $key => $row) {
                        $arrangeReportData[] = [
                            'product' => $row['service']['name'],
                            'code' => $row['service']['code'],
                            'initialQuantity' => $row['attributes']['initialQuantity'],
                            'remainingQuantity' => $row['attributes']['remainingQuantity'],
                            'usagePercentage' => $row['attributes']['usagePercentage'],
                            'start_date' => $row['start_date'],
                            'end_date' => $row['end_date'],
                        ];
                    }

                    // dump($arrangeReportData);

                    $exportData = G_PickDataFromArray($arrangeReportData, [
                        'product',
                        'code',
                        'initialQuantity',
                        'remainingQuantity',
                        'usagePercentage',
                        'start_date',
                        'end_date',
                    ], 'array');

                    $newExcelExport->setHeader([
                        'Product',
                        'Code',
                        'Initial Quantity',
                        'Remaining Quantity',
                        'Usage Percentage',
                        'From',
                        'To'
                    ]);
                    
                } else {
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
                }	
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