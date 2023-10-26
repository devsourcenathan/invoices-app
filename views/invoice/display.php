<?php
require_once '../../models/Database.php';
require_once '../../models/Invoice.php';
require_once '../../models/Counter.php';

$invoice = null;
if (isset($_GET['id'])) {
    $invoice = Invoice::read($_GET['id']);
    $counter = Counter::read($invoice->counter_id);
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
                            <h4>Information sur la facture</h4>
                        </div>
                        <?php if ($user->role == 'admin') { ?>
                            <div class="card-header">
                                <div class="card-header-action">
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Options</a>
                                        <div class="dropdown-menu">
                                            <a href="../../controllers/CautionController.php?action=validated&id=<?= $caution->id ?>" class="dropdown-item">Valider</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="../../controllers/CautionController.php?action=rejected&id=<?= $caution->id ?>" class="dropdown-item">Rejeter</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Nom de l'abonné</label>
                                    <input type="text" disabled value="<?= $user->name ?>" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label>Numéro du compteur</label>
                                    <input type="text" disabled value="<?= $counter->counter_number ?>" class="form-control">
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label>Montant a payer</label>
                                <input type="text" disabled value="<?= $invoice->amount ?>" class="form-control">
                            </div> -->
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Ancien index</label>
                                    <input type="text" disabled value="<?= $counter->old_index ?>" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label>Nouveau index</label>
                                    <input type="text" disabled value="<?= $counter->new_index ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Consommation</label>
                                    <input type="text" disabled value="<?= $invoice->consommation ?>" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label>Montant a payer</label>
                                    <input type="text" disabled value="<?= $invoice->amount ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Date de disponibilité</label>
                                <input type="text" disabled value="<?= $invoice->date ?>" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a href="../invoice/pay.php?id=<?= $invoice->id ?>" class="btn btn-success col-5">Payer la facture</a>
                                    <a href="../invoice/pay.php?id=<?= $invoice->id ?>" class="btn btn-warning col-5">Imprimer la facture</a>
                                </div>
                                <div class="col-6">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once '../../partials/footer.php' ?>