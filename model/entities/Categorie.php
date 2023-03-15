<?php
    namespace Model\Entities;

    use App\Entity;

    final class Categorie extends Entity {       //final = empêche de créer des classes filles -> si utilisé sur fonction, empêche redéfinition dans classe fille
        private $id;
        private $nom;
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

        public function getNom() {
            return $this->nom;
        }

        public function setNom($nom) {
            $this->nom = $nom;
            return $this;
        }

        public function getDate() {
            return $this->date_creation->format("d/m/Y H:i:s");
        }

        public function setDate($date) {
            $this->date_creation = new \DateTime($date);
            return $this;
        }
    }