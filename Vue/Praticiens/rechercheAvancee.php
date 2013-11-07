<?php $this->titre = "Praticiens"; ?>

<?php
$menuPraticiens = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center">Recherche d'un praticien</h2>
    <div class="well">
        <form class="form-horizontal" role="form" action="praticiens/resultat" method="post">
            <div class="form-group">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="praticiens/recherche">Recherche</a></li>
                    <li class="active"><a href="praticiens/rechercheAvancee">Recherche Avancée</a></li>
                </ul>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Type du praticien</label>
                <div class="col-sm-5 col-md-4">
                    <select class="form-control" name="id">
                        <?php foreach ($praticiens as $praticien) : ?>
                            <option value="<?= $this->nettoyer($praticien['id_type_praticien']) ?>"><?= $this->nettoyer($praticien['lib_type_praticien']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-5">
                    <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
                </div>
            </div>
        </form>
    </div>
</div>

