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
            return $this->sujet;
        }

        public function setSujet($sujet) {
            $this->sujet = $sujet;
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
            return $this->date->format("d/m/Y, H:i:s");
        }

        public function setDate($date) {
            $this->date = new \DateTime($date);
            return $this;
        }
    }