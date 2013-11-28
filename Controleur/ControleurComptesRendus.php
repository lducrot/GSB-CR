<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/CompteRendu.php';
require_once 'Modele/Praticien.php';

class ControleurComptesRendus extends ControleurSecurise {

    private $comptesRendus;
    private $praticiens;

    public function __construct() {
        $this->comptesRendus = new CompteRendu();
        $this->praticiens = new Praticien();
    }

    // Affiche la liste des praticiens
    public function index() {
            $praticiens = $this->praticiens->getPraticiens();
            $this->genererVue(array('praticiens' => $praticiens));
    }
    
    public function ajouter() {
        if ($this->requete->existeParametre("idPraticien")) {
            $idPraticien = $this->requete->getParametre("idPraticien");
            if ($this->requete->getSession()->existeAttribut("idVisiteur")) {
                $idVisiteur = $this->requete->getSession()->getAttribut("idVisiteur"); }
            $date = $this->requete->getParametre("date");
            $bilan = $this->requete->getParametre("bilan");
            $motif = $this->requete->getParametre("motif");
            $comptesRendus = $this->comptesRendus->ajouter($idPraticien, $idVisiteur, $date, $bilan, $motif);
            $this->genererVue(array('comptesRendus' => $comptesRendus));
            }
        else
            throw new Exception("Action impossible : aucun type de praticien défini");
    }
    
}