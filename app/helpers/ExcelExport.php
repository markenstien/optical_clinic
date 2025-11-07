<?php 	
	require_once APPROOT.DS.'libraries/spreadsheet/vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



	class ExcelExport
	{
		/*get the data*/
		public function setData($data)
		{
			$this->data = $data;
		}

		public function getData()
		{
			return $this->data;
		}

		public function setHeader($header)
		{
			$this->header = $header;
		}
		public function setName($name)
		{
			$this->name = $name;
		}

		public function setDescription($desc)
		{
			$this->desc = $desc;
		}
		public function exportFile()
		{
			$this->formatExcel();
		}
		private function formatExcel()
		{
			$defaultCellValue = 'n/a';
			$data = $this->data;
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();


		    if(is_array($data))
		    {
		    	$rowCount = 0;
		    	$alphabhet = range('A' , 'Z');

		    	if(isset($this->header))
		    	{
		    		$header = $this->header;

		    		foreach($header as $key=> $h) 
		    		{
		    			$sheet->setCellValue($alphabhet[$key].'1' , $h);
		    		}

		    		$rowCount = 2;
		    		foreach($data as $key => $columns)
			    	{
			    		// $rowCount = 1;
			    		$colCounter = 0;

						if(is_object($columns)) {
							$columns = (array) $columns;
						}

			    		if(is_array($columns)) {
							foreach($columns as $colCount => $col)
							{
								$sheet->getColumnDimension($alphabhet[$colCounter])
								->setAutoSize(true);
								if(empty($col)) {
									$col = $defaultCellValue;
								} else {
									$col = is_null($col) ? $defaultCellValue : $col;
									$sheet->setCellValue($alphabhet[$colCounter].''.($rowCount) , $col);
								}
								
								$colCounter++;
							}
						}

			    		$rowCount++;
			    	}
		    	}else{
			    	foreach($data as $rowCount => $columns)
			    	{
			    		$colCounter = 0;
						if(is_object($columns)) {
							$columns = (array) $columns;
						}
						if(is_array($columns)) {
							foreach($columns as $colCount => $col)
							{
								if(empty($col)) {
									$col = $defaultCellValue;
								} else {
									$col = is_null($col) ? $defaultCellValue : $col;
									$sheet->setCellValue($alphabhet[$colCounter].''.($rowCount+1) , $col);
								}
								$colCounter++;
							}
						}
			    	}
		    	}

		    	$name = uniqid();

		    	if(isset($this->name) && !empty($this->name)){
		    		$name = $this->name;
		    	}
		    	
		    	$file = $name . '.xlsx';
				$path = BASE_DIR . DS . 'public/assets/uploads/office';
				$writer = new Xlsx($spreadsheet);

				try {
					if (ob_get_length()) ob_end_clean(); // clear existing output buffers

					header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					header('Content-Disposition: attachment; filename="' . $file . '"');
					header('Cache-Control: max-age=0');

					$writer->save('php://output');
					exit; // important to stop any further output
				} catch (Exception $e) {
					Flash::set($e->getMessage(), 'danger');
				}
		    }
		}
	}