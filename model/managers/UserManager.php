<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\UserManager;

    class UserManager extends Manager{

        protected $className = "Model\Entities\User";
        protected $tableName = "user";


        public function __construct(){
            parent::connect();
        }

        public function emailCheck($email) {
            $sql = "SELECT *
                    FROM ".$this->tableName." u
                    WHERE u.email_membre = :email";

            return $this->getOneOrNullResult(
                DAO::select($sql, [':email' => $email]),
                $this->className);
        }

        public function pseudoCheck($pseudo) {
            $sql = "SELECT *
                    FROM ".$this->tableName." u
                    WHERE u.pseudo = :pseudo";

            return $this->getOneOrNullResult(
                DAO::select($sql, [':pseudo' => $pseudo]),
                $this->className);
        }

        public function passwordHash($email) {
            $sql = "SELECT mot_de_passe
                    FROM ".$this->tableName." u
                    WHERE u.email_membre = :email";

            return $this->getSingleScalarResult(
                DAO::select($sql, [':email' => $email]));
        }

        public function findUserByEmail($email) {
            $sql = "SELECT *
                    FROM ".$this->tableName." u
                    WHERE u.email_membre = :email";

            return $this->getOneOrNullResult(
                DAO::select($sql, [':email' => $email],false),
                $this->className);
        }

        public function ban($id) {
            $sql = "UPDATE user
                    SET banned = 1
                    WHERE id_user = :id";

            return DAO::update($sql, [":id" => $id]);
        }

        public function checkBanned($email) {
            $sql = "SELECT banned
                    FROM ".$this->tableName." u
                    WHERE u.email_membre = :email";

            return $this->getOneOrNullResult(
                DAO::select($sql, [":email" => $email], false),
                $this->className);
        }

    }