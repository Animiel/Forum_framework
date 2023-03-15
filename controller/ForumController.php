<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\CategorieManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

           $topicManager = new TopicManager();
            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findAll(["creationdate", "DESC"])       //"topics" = le nom envoyé dans affichage pour foreach par exemple
                ]
            ];
        
        }

        public function listCategories() {

            $categorieManager = new CategorieManager();
            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categorieManager->findAll(["date", "DESC"])
                ],
            ];
        }

        public function listPosts() {

            $postManager = new PostManager();
            return [
                "view" => VIEW_DIR."forum/listPosts.php",
                "data" => [
                    "posts" => $postManager->findPostById($_GET['id'])
                ],
            ];
        }

        public function listTopics() {

            $TopicManager = new TopicManager();
            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $TopicManager->findTopicById($_GET['id'])
                ],
            ];
        }
    }
