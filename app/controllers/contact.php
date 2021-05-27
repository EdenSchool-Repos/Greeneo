<?php
	/**
	 * Class contact
	 */
	class contact extends Controller {
		/**
		 * contact constructor.
		 */
		public function __construct() {
		    // Import SQL commands
			if(!empty(DB_HOST)){
			    $this->contactModel = $this->loadModel('contactModel');
			}
		}
		
		/**
		 * views/contact/index.php
		 */
		public function index() {
			$data = [
                'headTitle' => 'contact',
				'title' => 'contact has been generated',
                'cssFile' => 'contact'
			];
			
			$this->render('contact/index', $data);
		}
	}
