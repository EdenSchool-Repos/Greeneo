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
            if(isLoggedIn()){header('Location:'.URL_ROOT.'/profile');}

            $data = [
                'headTitle' => 'S\'identifier',
                'title' => 'Ce connecter a mon compte',
                'cssFile' => 'login',
                'title' => 'Login page',
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => ''
            ];

            // Vérifie si méthode POST est utilisé
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'headTitle' => 'S\'identifier',
                    'title' => 'Ce connecter a mon compte',
                    'cssFile' => 'login',
                    'title' => 'Login page',
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'emailError' => '',
                    'passwordError' => ''
                ];

                if(empty($data['email'])){
                    $data['emailError'] = 'Veuillez entrer un username';
                }

                if(empty($data['password'])){
                    $data['passwordError'] = 'Veuillez entrer un password';
                }

                if(empty($data['emailError']) && empty($data['passwordError'])){
                    $loggedInUser = $this->loginModel->login($data['email'], $data['password']);

                    if($loggedInUser){
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['passwordError'] = 'Username ou password incorrect. Ressayez !!!';
                        $this->render('login/index', $data);
                    }
                }
            }

            $this->render('login/index', $data);
		}

        public function create()
        {
            if(isLoggedIn()){header('Location:'.URL_ROOT.'/profile');}

            $data = [
                'headTitle' => 'Créer un compte',
                'title' => 'Se créer mon compte',
                'cssFile' => 'login',
                'firstname' => '',
                'lastname' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'firstnameError' => '',
                'lastnameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'headTitle' => 'Créer un compte',
                    'title' => 'Se créer mon compte',
                    'cssFile' => 'login',
                    'firstname' => trim($_POST['firstname']),
                    'lastname' => trim($_POST['lastname']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'firstnameError' => '',
                    'lastnameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmPasswordError' => ''
                ];

                // Validation username & email
                $nameValidation = "/^[a-zA-Z0-9]*$/";
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

                if(empty($data['email'])){
                    $data['emailError'] = 'Veuillez entrer un email';
                } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                    $data['emailError'] = 'Veuillez entrer un email au bon format !!';
                } else {
                    if($this->loginModel->findUserbyEmail($data['email'])){
                        $data['emailError'] = 'Email déjà utilisé !!';
                    }
                }

                if(empty($data['password'])){
                    $data['passwordError'] = 'Veuillez entrer un password';
                } elseif(strlen($data['password']) < 6) {
                    $data['passwordError'] = 'Le mot de passe doit contenir au moins 8 caractères';
                } elseif(preg_match($passwordValidation, $data['password'])){
                    $data['passwordError'] = 'Le mot de passes doit contenir au moins 1 chiffre';
                }

                if(empty($data['confirmPassword'])){
                    $data['confirmPasswordError'] = 'Veuillez entrer la confirmation de mot de passe';
                } else {
                    if($data['password'] != $data['confirmPassword']){
                        $data['confirmPasswordError'] = 'Les mot de passe ne correspondent pas !';
                    }
                }

                if(empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])){
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if($this->loginModel->register($data)){
                        header("Location: ".URL_ROOT."/login");
                    } else {
                        die('Une erreur est survenue !!');
                    }
                }
            }
            $this->render('login/register', $data);
        }

        public function createUserSession($loggedInUser)
        {
            $_SESSION['profile_id'] = $loggedInUser->profile_id;
            $_SESSION['email'] = $loggedInUser->email;
            $_SESSION['role'] = $loggedInUser->role;
            header('Location: '.URL_ROOT);
        }

        public function logout()
        {
            unset($_SESSION['profile_id']);
            unset($_SESSION['email']);
            unset($_SESSION['role']);
            header('Location: '.URL_ROOT.'/login');
        }
	}
