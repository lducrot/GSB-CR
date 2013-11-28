<?php

require_once 'Framework/Modele.php';

class CompteRendu extends Modele {
    
    private $sqlCompteRendu = "insert into rapport_visite (id_praticien, id_visiteur, date_rapport, bilan, motif) values (?, ?, ?, ?, ?);";
    
    // Ajoute un rapport de visite
    public function ajouter($idPraticien, $idVisiteur, $date, $bilan, $motif) {
       $sql = $this->sqlCompteRendu;
       $ajoutCompteRendu = $this->executerRequete($sql, array($idPraticien, $idVisiteur, $date, $bilan, $motif));
       return $ajoutCompteRendu;
    }
}
