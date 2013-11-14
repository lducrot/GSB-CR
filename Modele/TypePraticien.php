<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens
class TypePraticien extends Modele {
    
    private $sqlTypePraticien = "SELECT * FROM type_praticien";
        
    // Renvoi un type de praticien
    public function getTypePraticien() {
        $sql = $this->sqlTypePraticien;
        $typePraticiens = $this->executerRequete($sql);
        return $typePraticiens;   
    }
    
    
}