<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/CompteRendu.php';
require_once 'Modele/Praticien.php';

class ControleurComptesRendus extends ControleurSecurise {

    private $compteRendu;
    private $praticien;

    public function __construct() {
        $this->compteRendu = new CompteRendu();
        $this->praticien = new Praticien();
    }

    // Affiche la liste des praticiens
    public function index() {
            $praticiens = $this->praticien->getPraticiens();
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
            $comptesRendus = $this->compteRendu->ajouter($idPraticien, $idVisiteur, $date, $bilan, $motif);
            $this->genererVue(array('comptesRendus' => $comptesRendus));
        }
        else
            throw new Exception("Action impossible : veuillez passer par le formulaire d'ajout");
    }
    
    public function modification() {
        if ($this->requete->existeParametre("id")) {
            $idRapport = $this->requete->getParametre("id");
        $compteRendu = $this->compteRendu->detail($idRapport);
        $this->genererVue(array('compteRendu' => $compteRendu));
        }
        else
            throw new Exception("Action impossible");
    }
    
    public function modifier() {
        if ($this->requete->existeParametre("idCompteRendu")) {
            $idRapport = $this->requete->getParametre("idCompteRendu");
        $motif = $this->requete->getParametre("motif");
        $bilan = $this->requete->getParametre("bilan");
        $compteRenduModifier = $this->compteRendu->modifier($bilan, $motif, $idRapport);
        $this->genererVue(array('compteRenduModifier' => $compteRenduModifier));
        }
        else
            throw new Exception("Action impossible : La modification a échouée.");
    }
    
    public function consulter() {
        $comptesRendus = $this->compteRendu->consulter();
        $this->genererVue(array('comptesRendus' => $comptesRendus));
    }
    
    public function supprimer() {
        if ($this->requete->existeParametre("id")) {
            $idRapport = $this->requete->getParametre("id");
            $this->compteRendu->supprimer($idRapport);
            $this->rediriger('comptesRendus/consulter');
        }
        else
                throw new Exception("Action impossible : La suppression a échouée.");
        }
    
 
}