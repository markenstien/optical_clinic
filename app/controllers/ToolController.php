<?php 
    class ToolController extends Controller
    {
        public function index() {

        }

        public function bot() {
            $this->data['viewType'] = empty(whoIs()) ? 'public': 'auth';
            return $this->view('tool/bot', $this->data);
        }
    }