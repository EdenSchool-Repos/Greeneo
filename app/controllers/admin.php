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
                $this->blogModel = $this->loadModel('blogModel');
			}

			if(!isLoggedIn()) $this->renderError(401);
            if(!isAdmin()) $this->renderError(403);
		}
		
		/**
		 * views/admin/blog.php
		 */
		public function index() {
			header('Location: '.URL_ROOT.'/admin/blog');
		}

		public function blog($action = null, $id = null) {
		    if($action === null):

                $allArticles = $this->blogModel->findAllArticle();

                $data = [
                    'headTitle' => 'Administration du Blog',
                    'title' => 'Blog Admin has been generated',
                    'cssFile' => 'admin',
                    'articles' => $allArticles
                ];

                $this->render('admin/blog', $data);

            elseif($action === "edit"):

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                    if($this->blogModel->editBlog($id, $_POST['title'], $_POST['slug'], $_POST['image'], $_POST['body'])){
                        header('Location: '.URL_ROOT.'/admin/blog');
                    }
                }

                if($id === null){
                    $this->renderError(400);
                }

                $article = $this->blogModel->findArticle($id);

                if(is_bool($article) != 1):
                    if($article->profile_id === $_SESSION['profile_id']){
                        $data = [
                            'headTitle' => 'Modification de '.$article->title,
                            'title' => $article->title,
                            'cssFile' => 'admin',
                            'article_content' => $article
                        ];

                        $this->render('admin/blog/edit', $data);
                    } else {
                        $this->renderError(401);
                    }
                else:
                    $this->renderError(404);
                endif;

            elseif($action === "create"):

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                    if($this->blogModel->createBlog($_SESSION['profile_id'], $_POST['title'], $_POST['slug'], $_POST['image'], $_POST['body'])){
                        header('Location: '.URL_ROOT.'/admin/blog');
                    }
                } else {
                    $data = [
                        'headTitle' => 'Creation d\'un Article',
                        'title' => 'Creer mon Article',
                        'cssFile' => 'admin'
                    ];

                    $this->render('admin/blog/create', $data);
                }

            else:
                $this->renderError(404);
            endif;
        }
	}
