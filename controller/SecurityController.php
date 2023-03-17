<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\CategorieManager;

    class SecurityController extends AbstractController implements ControllerInterface {
        
        public function index() {}

        public function inscription() {
            if (isset($_POST['submit'])) {
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $mdp = filter_input(INPUT_POST, "mdp", FILTER_SANITIZE_SPECIAL_CHARS);
                $mdpConf = filter_input(INPUT_POST, "mdp_confirm", FILTER_SANITIZE_SPECIAL_CHARS);
                $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_SPECIAL_CHARS);

                if ($email && ($mdp && length($mdp) >= 8 && $mdp === $mdpConf) && $pseudo) {
                    
                }
            }
        }
    }