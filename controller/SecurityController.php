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
            $this->redirectTo("security", "connexion");
            echo $message;
        }

        public function connexion() {
            $message = "";
            $userManager = new UserManager();

            if (isset($_POST['submit'])) {
                $identifiant = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $mdp = filter_input(INPUT_POST, "mdp", FILTER_SANITIZE_SPECIAL_CHARS);
                $hash = $userManager->passwordHash($identifiant);
                // var_dump(password_verify($mdp, $hash["mot_de_passe"]));die;
                if ($identifiant && !$userManager->emailCheck($identifiant) == null) {
                    if ($mdp && password_verify($mdp, $hash["mot_de_passe"])) {
                       // var_dump($userManager->findUserByEmail($identifiant));die;
                        Session::setUser($userManager->findUserByEmail($identifiant));
                        $message = "La connexion a réussi. Bienvenue.";
                    }
                }
                else {
                    $message = "Informations invalides.";
                }
            }
            $this->redirectTo("home");
            echo $message;
        }

        public function logout() {
            $message = "";
            if (isset($_SESSION['user'])) {
                Session::setUser(null);
            }
            $message = "Vous vous êtes déconnecté.";
            $this->redirectTo(("home"));
        }
    }