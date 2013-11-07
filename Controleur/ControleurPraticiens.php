<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Praticien.php';

// Contrôleur des actions liées aux praticiens
class ControleurPraticiens extends Controleur {
    
    private $praticiens;

    public function __construct() {
        $this->praticiens = new Praticien();
    }
    
    // Affiche la liste des praticiens
    public function index() {
        $praticiens = $this->praticiens->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }
    
    // Affiche les informations détaillées sur un praticien
    public function details() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }
    
    // Affiche l'interface de recherche d'un praticien
    public function recherche() {
        $praticiens = $this->praticiens->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }
    
    // Affiche l'interface de recherche d'un praticien
    public function rechercheAvancee() {
        $praticiens = $this->praticiens->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }
    
    // Affiche le résultat de la recherche d'un praticien
    public function resultat() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }

    // Affiche le résultat de la recherche d'un type de praticien
    public function resultatType() {
        if ($this->requete->existeParametre("id")) {
            $idTypePraticien = $this->requete->getParametre("id");
            $this->afficherType($idTypePraticien);
        }
        else
            throw new Exception("Action impossible : aucun type de praticien défini");
    }

    // Affiche les détails sur un praticien
    private function afficher($idPraticien) {
        $praticien = $this->praticiens->getPraticien($idPraticien);
        $this->genererVue(array('praticien' => $praticien), "details");
    }
    
    // Affiche les détails sur un type de praticien
    private function afficherType($idTypePraticien) {
        $praticien = $this->praticiens->getTypePraticien($idTypePraticien);
        $this->genererVue(array('praticien' => $praticien), "details");
    }
    
    
}