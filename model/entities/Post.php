<?php
    namespace Model\Entities;

    use App\Entity;

    final class Post extends Entity {       //final = empêche de créer des classes filles -> si utilisé sur fonction, empêche redéfinition dans classe fille
        private $id;
        private $user;
        private $topic;
        private $contenu;
        private $date_creation;
      

        public function __construct($data) {         
            $this->hydrate($data);        
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
            return $this;
        }

        public function getUser() {
            return $this->user;
        }

        public function setUser($user) {
            $this->user = $user;
            return $this;
        }

        public function getSujet() {
            return $this->topic;
        }

        public function setSujet($sujet) {
            $this->topic = $sujet;
            return $this;
        }

        public function getContenu() {
            return $this->contenu;
        }

        public function setContenu($contenu) {
            $this->contenu = $contenu;
            return $this;
        }

        public function getDate() {
            return $this->date_creation->format("d/m/Y, H:i:s");        //Attention le fichier Entity supprime ce qu'il y a après "_" => dans bdd 'date_creation' doit être 'date'
        }

        public function setDate($date) {
            $this->date_creation = new \DateTime($date);
            return $this;
        }
    }