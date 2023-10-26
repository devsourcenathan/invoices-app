<?php


require_once '../../partials/header.php';
require_once '../../models/Database.php';
require_once '../../models/Invoice.php';
require_once '../../models/Counter.php';

$invoices = [];
if ($user->role == 'admin') {
    $invoices = Invoice::readAll();
} else {
    $invoices = Invoice::getAllByUserId($user->id);
}


?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if ($user->role == "admin") { ?>
                                <h4>Liste des factures</h4>
                            <?php } else { ?>
                                <h4>Liste de mes factures</h4>
                            <?php } ?>

                        </div>
                        <!--  -->
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Numéros de compteur</th>
                                            <th>Montant</th>
                                            <th>Nouveau index</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($invoices as $invoice) {
                                            $counter = Counter::read($invoice->counter_id);
                                        ?>

                                            <tr>
                                                <td><?= $counter->counter_number ?? "Not defined" ?></td>
                                                <td><?= $invoice->amount ?></td>
                                                <td><?= $counter->new_index ?></td>
                                                <td><?= $invoice->date ?></td>
                                                <td><?= $invoice->status ?></td>


                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Options</a>
                                                        <div class="dropdown-menu">
                                                            <a href="../invoice/display.php?id=<?= $invoice->id ?>" class="dropdown-item">Afficher</a>
                                                            <a href="../invoice/pay.php?id=<?= $invoice->id ?>" class="dropdown-item">Payer</a>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once '../../partials/footer.php' ?>