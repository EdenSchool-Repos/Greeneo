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

            if(!isLoggedIn()) $this->renderError(401);
		}
		
		/**
		 * views/profile/index.php
		 */
		public function index($id = null) {
		    if($id === null) $id = $_SESSION['profile_id'];

		    $profileInformation = $this->profileModel->profileInformation($id);

			if(is_bool($profileInformation) != 1){
                $data = [
                    'headTitle' => 'profile',
                    'title' => 'Mon profile',
                    'cssFile' => 'profile',
                    'profileInformation' => $profileInformation,
                    'profileID' => $profileInformation->profile_id,
                    'profileFirstName' => $profileInformation->firstname,
                    'profileLastName' => $profileInformation->lastname,
                    'profileEmail' => $profileInformation->email,
                    'profileRole' => $profileInformation->role
                ];
            } else {
			    $this->renderError(404);
            }
			
			$this->render('profile/index', $data);
		}

        public function edit(){
            $profileInformation = $this->profileModel->profileInformation($_SESSION['profile_id']);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                if($this->profileModel->editProfile($_SESSION['profile_id'], $_POST['firstname'], $_POST['lastname'], $_POST['email'])){
                    $data = [
                        'body' => json_encode($_POST)
                    ];
                }
            } else {
                $data = [
                    'body' => json_encode($profileInformation)
                ];
            }

            $this->render('profile/edit', $data);
        }
	}
