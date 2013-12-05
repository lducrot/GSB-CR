<?php

require_once 'Framework/Modele.php';

class CompteRendu extends Modele {
    
    private $sqlComptesRendus = "select * from rapport_visite rv join PRATICIEN p on rv.id_praticien = p.id_praticien";
    private $sqlAjoutCompteRendu = "insert into rapport_visite (id_praticien, id_visiteur, date_rapport, bilan, motif) values (?, ?, ?, ?, ?);";
    private $sqlModifieCompteRendu = "update rapport_visite SET bilan='?', motif='?' where id_rapport=?";
    private $sqlSupprimeCompteRendu = "delete from rapport_visite where id_rapport=?";
   
    
    //Recherche les rapports de visite par rapport a un praticien
    public function detail($idPraticien) {
        $sql = $this->sqlComptesRendus. ' where rv.id_rapport=?';
        $compteRendu = $this->executerRequete($sql, array($idPraticien));
        if ($compteRendu->rowCount() == 1)
            return $compteRendu->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun praticien ne correspond à l'identifiant '$idPraticien'");

    }
    
    //Recherche les rapports de visite
    public function consulter() {
        $sql = $this->sqlComptesRendus;
        $comptesRendus = $this->executerRequete($sql);
        return $comptesRendus;
    }
    
    // Ajoute un rapport de visite
    public function ajouter($idPraticien, $idVisiteur, $date, $bilan, $motif) {
       $sql = $this->sqlAjoutCompteRendu;
       $ajoutCompteRendu = $this->executerRequete($sql, array($idPraticien, $idVisiteur, $date, $bilan, $motif));
       return $ajoutCompteRendu;
    }
    
    //Modifie un rapport de visite
    public function modifier($bilan, $motif, $idRapport) {
        $sql = $this->sqlModifieCompteRendu;
        $modifieCompteRendu = $this->executerRequete($sql, array($bilan, $motif, $idRapport));
        return $modifieCompteRendu;
    }
    
    //Supprime un rapport de visite
    public function  supprimer($idRapport) {
        $sql = $this->sqlSupprimeCompteRendu;
        $supprimeCompteRendu = $this->executerRequete($sql, array($idRapport));
        return $supprimeCompteRendu;
    }
}
