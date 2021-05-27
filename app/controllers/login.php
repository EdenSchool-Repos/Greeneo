<?php
	/**
	 * Class login
	 */
	class login extends Controller {
		/**
		 * login constructor.
		 */
		public function __construct() {
		    // Import SQL commands
			if(!empty(DB_HOST)){
			    $this->loginModel = $this->loadModel('loginModel');
			}
		}
		
		/**
		 * views/login/index.php
		 */
		public function index() {
			$data = [
                'headTitle' => 'login',
				'title' => 'login has been generated',
                'cssFile' => 'login'
			];
			
			$this->render('login/index', $data);
		}
	}
