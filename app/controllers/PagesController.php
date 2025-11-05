
<?php 

    class PagesController extends Controller
    {
        public function index() 
        {
            return $this->landing();
        }

        public function landing() 
        {
            return $this->view('pages.landing');
        }

        public function login()
        {
            return $this->view('pages.sign-in');
        }

        public function register()
        {
            return $this->view('pages.sign-up');
        }

        public function blankPage() {
            return $this->view('pages.blank-page');
        }
    }