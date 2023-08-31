<?php 
	/**
	 *display lists of page which has configuration settings*
	 * */
	class SettingController extends Controller {

		public function index() {
			_authRequired([
				'staff',
				'admin',
				'sub_admin'
			]);

			return $this->view('setting/index');
		}
	}