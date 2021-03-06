<?php $this->titre = "Praticiens"; ?>

<?php
$menuPraticiens = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center"><?= $this->nettoyer($praticien['nom_praticien']. " " . $praticien['prenom_praticien']) ?></h2>
    <div class="well">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-sm-3 control-label">Nom</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['nom_praticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Prenom</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['prenom_praticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Adresse</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['adresse_praticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">CodePostale</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['cp_praticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Ville</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['ville_praticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Coeficient de notoriété</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['coef_notoriete']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Type de praticien</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['lib_type_praticien']) ?></p>
                </div>
            </div>
        </form>
    </div>    
</div>

