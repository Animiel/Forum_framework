<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;

    class SecurityController extends AbstractController implements ControllerInterface {
        
        public function index() {}

        public function inscription() {
            $message = "";
            $userManager = new UserManager();
            if (isset($_POST['submit'])) {
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $mdp = filter_input(INPUT_POST, "mdp", FILTER_SANITIZE_SPECIAL_CHARS);
                $mdpConf = filter_input(INPUT_POST, "mdp_confirm", FILTER_SANITIZE_SPECIAL_CHARS);
                $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_SPECIAL_CHARS);

                if ($email && $userManager->emailCheck($email) == null) {
                    if ($pseudo && $userManager->pseudoCheck($pseudo) == null) {
                        if ($mdp && $mdp === $mdpConf && strlen($mdp) >= 8) {
                            $data = ["mot_de_passe" => password_hash($mdp, PASSWORD_DEFAULT),
                                "pseudo" => $pseudo,
                                "email_membre" => $email
                            ];
                            $userManager->add($data);
                            $message = "Utilisateur ajouté.";
                        }
                        else {
                            $message = "Mot de passe invalide.";
                        }
                    }
                    else {
                        $message = "Pseudo déjà utilisé.";
                    }
                }
                else {
                    $message = "Email déjà utilisé.";
                }
            }
            echo $message;
            $this->redirectTo("florian_LEININGER", "Forum_framework", "index");
        }
    }