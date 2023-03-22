<?php
    namespace Model\Entities;

    use App\Entity;

    final class User extends Entity {
        private $id;
        private $pseudo;
        private $email;
        private $mot_de_passe;
        private $role;
        private $registerdate;

        public function __construct($data){         
            $this->hydrate($data);        
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
            return $this;
        }

        public function getPseudo() {
            return $this->pseudo;
        }

        public function setPseudo($pseudo) {
            $this->pseudo = $pseudo;
            return $this;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
            return $this;
        }

        public function getRole() {
            return $this->role;
        }

        public function setRole($role) {
            $this->role = $role;
            return $this;
        }

        public function hasRole($role) {
            if ($this->role == $role) {
                $bool = true;
            }
            else {
                $bool = false;
            }
            return $bool;
        }

        public function __toString()
        {
            return $this->pseudo;
        }

        /**
         * Get the value of mot_de_passe
         */ 
        public function getMot_de_passe()
        {
                return $this->mot_de_passe;
        }

        /**
         * Set the value of mot_de_passe
         *
         * @return  self
         */ 
        public function setMot_de_passe($mot_de_passe)
        {
                $this->mot_de_passe = $mot_de_passe;

                return $this;
        }

        /**
         * Get the value of registerdate
         */ 
        public function getRegisterdate()
        {
                return $this->registerdate->format("d/m/Y");
        }

        /**
         * Set the value of registerdate
         *
         * @return  self
         */ 
        public function setRegisterdate($registerdate)
        {
                $this->registerdate = new \DateTime($registerdate);

                return $this;
        }
    }