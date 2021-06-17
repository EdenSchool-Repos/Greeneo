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
		 * views/blog/blog.php
		 */
		public function index($id = null) {

		    if($id === null):

                $articles = $this->blogModel->findAllArticle();

                $data = [
                    'headTitle' => 'Blog',
                    'title' => 'Blog',
                    'cssFile' => 'blog',
                    'articles_content' => $articles
                ];

                $this->render('blog/index', $data);

			else:

                $article = $this->blogModel->findArticle($id);

			    if(is_bool($article) != 1):
                    $data = [
                        'headTitle' => $article->title,
                        'title' => $article->title,
                        'cssFile' => 'view.blog',
                        'article_content' => $article
                    ];

                    $this->render('blog/view', $data);
			    else:
                    $this->renderError(404);
                endif;

            endif;
		}
	}
