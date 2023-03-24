<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;

    class SecurityController extends AbstractController implements ControllerInterface {
        
        public function index() {}

        public function inscription() {
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
                            Session::addFlash("success", "Utilisateur ajouté.");
                        }
                        else {
                            Session::addFlash("error", "Mot de passe invalide.");
                        }
                    }
                    else {
                        Session::addFlash("error", "Pseudo déjà utilisé.");
                    }
                }
                else {
                    Session::addFlash("error", "Email déjà utilisé.");
                }
            }
            $this->redirectTo("security", "connexion");
        }

        public function connexion() {
            $userManager = new UserManager();

            if (isset($_POST['submit'])) {
                $identifiant = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $mdp = filter_input(INPUT_POST, "mdp", FILTER_SANITIZE_SPECIAL_CHARS);
                $hash = $userManager->passwordHash($identifiant);
                // var_dump(password_verify($mdp, $hash["mot_de_passe"]));die;
                if ($identifiant && !$userManager->emailCheck($identifiant) == null) {
                    if ($mdp && password_verify($mdp, $hash["mot_de_passe"])) {
                        if ($userManager->checkBanned($identifiant) == 1) {
                            Session::setUser(null);
                            Session::addFlash("error", "Vous êtes banni, connexion impossible.");
                            $this->redirectTo("home");
                        }
                        else {
                            // var_dump($userManager->findUserByEmail($identifiant));die;
                             Session::setUser($userManager->findUserByEmail($identifiant));
                             Session::addFlash("success", "La connexion a réussi. Bienvenue.");
                        }
                    }
                }
                else {
                    Session::addFlash("error", "Informations invalides.");
                }
            }
            $this->redirectTo("home");
        }

        public function logout() {
            if (isset($_SESSION['user'])) {
                Session::setUser(null);
            }
            Session::addFlash("success", "Vous vous êtes déconnecté.");
            $this->redirectTo(("home"));
        }

        public function viewProfile() {
            if (isset($_GET['id'])) {
                $userManager = new UserManager();
                // var_dump($userManager->findOneById($_GET['id'])); die;
                return [
                    "view" => VIEW_DIR."security/viewProfile.php",
                    "data" => [
                        "profile" => $userManager->findOneById($_GET['id'])
                    ],
                ];
            }
            $this->redirectTo("home");
        }

        public function userBan() {
            if (isset($_GET['id'])) {
                $userManager = new UserManager();

                $user = $userManager->findOneById($_GET['id']);
                $userManager->ban($_GET['id']);
            }
            Session::addFlash("success", "Vous avez banni l'utilisateur");
            $this->redirectTo("home");
        }
    }