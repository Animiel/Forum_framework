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

        public function listPosts($id) {

            $topicManager = new TopicManager();
            $postManager = new PostManager();
            return [
                "view" => VIEW_DIR."forum/listPosts.php",
                "data" => [
                    "topic" => $topicManager->findOneById($id),
                    "posts" => $postManager->findPostById($id)
                ],
            ];
        }

        public function listTopiCat() {

            $TopicManager = new TopicManager();
            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $TopicManager->findTopicById($_GET['id'])
                ],
            ];
        }

        public function ajoutTopic() {
            if (isset($_POST['submit'])) {
                if (isset($_GET['id'])) {
                    $categorie_id = $_GET['id'];
                    $title = filter_input(INPUT_POST, "nom_topic", FILTER_SANITIZE_SPECIAL_CHARS);
                    $contenu = filter_input(INPUT_POST, "contenu", FILTER_SANITIZE_SPECIAL_CHARS);
                    
                    $topicManager = new TopicManager();
                    $data = [
                        "user_id" => 1,
                        "categorie_id" => $categorie_id,
                        "title" => $title,
                    ];
                    $lastId = $topicManager->add($data);

                    $postManager = new PostManager();

                    $postManager->add([
                        "user_id" => 1,
                        "topic_id" => $lastId,
                        "contenu" => $contenu
                    ]);
                }
                $this->redirectTo("forum", "listPosts", $lastId);
            }
            //on redirige vers la page
            return [
                "view" => VIEW_DIR."forum/ajoutTopic.php",
            ];
        }

        public function ajoutPost() {
            if (isset($_POST['submit'])) {
                if (isset($_GET['id'])) {
                    $topicId = $_GET['id'];
                    $contenu = filter_input(INPUT_POST, "contenu", FILTER_SANITIZE_SPECIAL_CHARS);

                    $postManager = new PostManager();

                    $postManager->add([
                        "user_id" => 1,
                        "topic_id" => $topicId,
                        "contenu" => $contenu
                    ]);
                }
                $this->redirectTo("forum", "listPosts", $topicId);
            }
            //on redirige vers la page
            return [
                "view" => VIEW_DIR."forum/ajoutPost.php",
            ];
        }
    }
