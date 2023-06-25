<?php 
	/**
	 *display lists of page which has configuration settings*
	 * */
	class SettingController extends Controller {

		public function index() {
			return $this->view('setting/index');
		}
	}