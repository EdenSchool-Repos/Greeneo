<?php
	/**
	 * Class profile
	 */
	class profile extends Controller {
		/**
		 * profile constructor.
		 */
		public function __construct() {
		    // Import SQL commands
			if(!empty(DB_HOST)){
			    $this->profileModel = $this->loadModel('profileModel');
			}
		}
		
		/**
		 * views/profile/index.php
		 */
		public function index() {
			$data = [
                'headTitle' => 'profile',
				'title' => 'profile has been generated',
                'cssFile' => 'profile'
			];
			
			$this->render('profile/index', $data);
		}
	}
