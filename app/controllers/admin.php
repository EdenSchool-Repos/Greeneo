<?php
	/**
	 * Class admin
	 */
	class admin extends Controller {
		/**
		 * admin constructor.
		 */
		public function __construct() {
		    // Import SQL commands
			if(!empty(DB_HOST)){
			    $this->adminModel = $this->loadModel('adminModel');
			}
		}
		
		/**
		 * views/admin/index.php
		 */
		public function index() {
			$data = [
                'headTitle' => 'admin',
				'title' => 'admin has been generated',
                'cssFile' => 'admin'
			];
			
			$this->render('admin/index', $data);
		}
	}
