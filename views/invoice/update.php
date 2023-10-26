<?php
require_once '../../models/Database.php';
require_once '../../models/Caution.php';

$caution = null;
if (isset($_GET['id'])) {
    $caution = Caution::readCaution($_GET['id']);
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
                            <h4>Modifier la caution</h4>
                        </div>
                        <form action="../../controllers/CautionController.php?action=update" method="post">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>NPUI</label>
                                    <input type="text" name="npui" value="<?= $caution->npui ?>" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Reference</label>
                                        <input type="text" name="reff_app_offre" value="<?= $caution->ref_app_offre ?>" class="form-control">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Intitule</label>
                                        <input type="text" name="intitule" value="<?= $caution->intitule ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Nom de la banque</label>
                                        <input type="text" name="nom_banque" value="<?= $caution->nom_banque ?>" class="form-control">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Agence</label>
                                        <input type="text" name="agence" value="<?= $caution->agence ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Date de signature</label>
                                    <input type="date" name="date_signature" value="<?= $caution->date_signature ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Nom signataire</label>
                                    <input type="text" name="nom_signataire" value="<?= $caution->nom_signataire ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Montant de la caution</label>
                                    <input type="number" name="montant_ca" value="<?= $caution->montant_ca ?>" class="form-control">
                                </div>

                            </div>

                            <input type="hidden" name="id" value="<?= $caution->id ?>">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                <a href="./validated.php" class="btn btn-primary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once '../../partials/footer.php' ?>