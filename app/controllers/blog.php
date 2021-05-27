<?php
	/**
	 * Class blog
	 */
	class blog extends Controller {
		/**
		 * blog constructor.
		 */
		public function __construct() {
		    // Import SQL commands
			if(!empty(DB_HOST)){
			    $this->blogModel = $this->loadModel('blogModel');
			}
		}
		
		/**
		 * views/blog/index.php
		 */
		public function index() {
			$data = [
                'headTitle' => 'blog',
				'title' => 'blog has been generated',
                'cssFile' => 'blog'
			];
			
			$this->render('blog/index', $data);
		}
	}
