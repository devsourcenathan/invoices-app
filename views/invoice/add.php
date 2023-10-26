<?php
require_once '../../models/Database.php';
require_once '../../models/Caution.php';

$caution = null;
if (isset($_GET['id'])) {
    $caution = Caution::read($_GET['id']);
} else {
    header("Location: ../home/index.php");
}


require_once '../../partials/header.php';
?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ajouter la caution</h4>
                        </div>
                        <form action="../../controllers/CautionController.php?action=add" method="post">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>NPUI</label>
                                    <input type="text" name="npui" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Reference</label>
                                        <input type="text" name="reff_app_offre" class="form-control">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Intitule</label>
                                        <input type="text" name="intitule" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Nom de la banque</label>
                                        <input type="text" name="nom_banque" class="form-control">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Agence</label>
                                        <input type="text" name="agence" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Date de signature</label>
                                    <input type="date" name="date_signature" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Nom signataire</label>
                                    <input type="text" name="nom_signataire" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Montant de la caution</label>
                                    <input type="number" name="montant_ca" class="form-control">
                                </div>

                            </div>

                            <input type="hidden" name="id_caution" value="<?= $_GET['id'] ?>">
                            <input type="hidden" name="id" value="<?= $caution->id ?>">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer la caution</button>
                                <a href="../home/" class="btn btn-primary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once '../../partials/footer.php' ?>