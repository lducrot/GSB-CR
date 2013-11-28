<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/Praticien.php';
require_once 'Modele/TypePraticien.php';

// Contrôleur des actions liées aux praticiens
class ControleurPraticiens extends ControleurSecurise {
    
    private $praticiens;
    private $typePraticiens;

    public function __construct() {
        $this->praticiens = new Praticien();
        $this->typePraticiens = new TypePraticien();
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
        $praticiensType = $this->typePraticiens->getTypePraticien();
        $this->genererVue(array('praticiens' => $praticiens, 'praticiensType' => $praticiensType));
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
    // Affiche les détails sur un praticien
    private function afficher($idPraticien) {
        $praticien = $this->praticiens->getPraticien($idPraticien);
        $this->genererVue(array('praticien' => $praticien), "details");
    }
   
  
    // Affiche le résultat de la recherche d'un type de praticien
    public function resultatType() {
        if ($this->requete->existeParametre("id")) {
            $idTypePraticien = $this->requete->getParametre("id");
            $nomPraticiens = $this->requete->getParametre("nom");
            $villePraticiens = $this->requete->getParametre("ville");
            $praticiens = $this->praticiens->getRechercherPraticiens($idTypePraticien, $nomPraticiens, $villePraticiens);
            $this->genererVue(array('praticiens' => $praticiens, 'nomPraticiens' => $nomPraticiens, 'villePraticiens' => $villePraticiens), "index");
        }
        else
            throw new Exception("Action impossible : aucun type de praticien défini");
    }
   
}