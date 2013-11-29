<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens
class Praticien extends Modele {
    
    private $sqlPraticien = "SELECT * FROM praticien p JOIN type_praticien tp ON p.id_type_praticien = tp.id_type_praticien";
    
    // Renvoie la liste des praticiens
    public function getPraticiens() {
        $sql = $this->sqlPraticien . ' order by nom_praticien';
        $praticiens = $this->executerRequete($sql);
        return $praticiens;
    }

    // Renvoie un praticien à partir de son identifiant
    public function getPraticien($idPraticien) {
        $sql = $this->sqlPraticien . ' where p.id_praticien=? order by nom_praticien';
        $praticiens = $this->executerRequete($sql, array($idPraticien));
        if ($praticiens->rowCount() == 1)
            return $praticiens->fetch();
        else
            throw new Exception("Aucun praticien ne correspond à l'identifiant '$idPraticien'");
    }
    
    public function getRechercherPraticiens($idTypePraticien, $nomPraticiens, $villePraticiens) {
        $sql = $this->sqlPraticien . " where tp.id_type_praticien=? AND p.nom_praticien LIKE '%?%' AND p.ville_praticien LIKE '%?%'";
        $typePraticiens = $this->executerRequete($sql, array($idTypePraticien, $nomPraticiens, $villePraticiens));
        return $typePraticiens;
        
    }  
}