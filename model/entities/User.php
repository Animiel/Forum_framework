<?php
    namespace Model\Entities;

    use App\Entity;

    final class User extends Entity {
        private $id;
        private $pseudo;
        private $email;
        private $mdp;
        private $role;
        private $inscription;

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

        public function getMdp() {
            return $this->mdp;
        }

        public function setMdp($mdp) {
            $this->mdp = $mdp;
            return $this;
        }

        public function getRole() {
            return $this->role;
        }

        public function setRole($role) {
            $this->role = $role;
            return $this;
        }

        public function getInscription() {
            return $this->inscription->format("d/m/Y");
        }

        public function setInscription($inscription) {
            $this->inscription = new \DateTime($inscription);
            return $this;
        }
    }