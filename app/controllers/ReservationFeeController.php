<?php 

	class ReservationFeeController extends Controller
	{
		private $model;

		public function __construct() {
			parent::__construct();
			$this->model = model('ReservationFeeSettingModel');
		}

		public function index() {
			$this->edit();
		}

		public function edit() {
			if(isSubmitted()) {
				$post = request()->posts();
				$response = $this->model->update($post, $post['id']);

				if($response) {
					Flash::set("Reservation Fee has been updated");
				} else {
					Flash::set("Reservation Fee update failed");
				}

				return redirect(_route('rsv-setting:index'));
			}
			$reservationFee = $this->model->getActive();
			$this->data['reservationFee'] = $reservationFee;
			return $this->view('reservation_fee/edit', $this->data);
		}
	}