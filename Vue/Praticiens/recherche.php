<?php $this->titre = "Praticiens"; ?>

<?php
$menuPraticiens = true;
require 'Vue/_Commun/navigation.php';
?>

<!--Recherche simple-->
<div class="container">
    <h2 class="text-center">Recherche de praticiens</h2>
    <div class="well">

        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#simple" data-toggle="tab">Recherche</a></li>
                    <li><a href="#avancee" data-toggle="tab">Recherche Avancée</a></li>
                </ul>
            </div>
        </div> <br/>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="simple">
                <form class="form-horizontal" role="form" action="praticiens/resultat" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">Nom</label>
                        <div class="col-sm-5 col-md-4">
                            <select class="form-control" name="id">
                                <?php foreach ($praticiens as $praticien): ?>
                                    <option value="<?= $this->nettoyer($praticien['id_praticien']) ?>"><?= $this->nettoyer($praticien['nom_praticien']) ?></option>
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


            <!--Recherche Avancee-->
            <div class="tab-pane fade" id="avancee">
                <form class="form-horizontal" role="form" action="praticiens/resultatType" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">Nom</label>
                        <div class="col-sm-5 col-md-4">
                            <input name="nom" type="text" class="form-control" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">Ville</label>
                        <div class="col-sm-5 col-md-4">
                            <input name="ville" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">Type</label>
                        <div class="col-sm-5 col-md-4">
                            <select class="form-control" name="id">
                                <?php foreach ($praticiensType as $praticien) : ?>
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
    </div>
</div>
