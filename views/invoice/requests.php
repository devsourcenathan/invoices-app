<?php

require_once '../../partials/header.php';
require_once '../../models/Database.php';

$cautions = Database::recover(Database::query("SELECT * FROM users_cautions where status = 'En attente'"), false);

?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Liste des demandes</h4>


                        </div>


                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Type caution</th>
                                            <th>Numéros de réference</th>
                                            <th>Raison social Entreprise</th>
                                            <th>RCCM</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($cautions)) {
                                            foreach ($cautions as $caution) {
                                                $init = Database::recover(Database::query("SELECT * FROM cautions where id = $caution->id_caution"))

                                        ?>
                                                <tr>
                                                    <td><?= $init->type_caution ?></td>
                                                    <td><?= $init->num_ref ?></td>
                                                    <td>
                                                        <?= $init->rai_so_entre ?>
                                                    </td>
                                                    <td>
                                                        <?= $init->rccm ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($caution->status == "En attente") { ?>
                                                            <div class="badge badge-warning badge-shadow"><?= $caution->status ?></div>
                                                        <?php } ?>

                                                        <?php if ($caution->status == "validé") { ?>
                                                            <div class="badge badge-success badge-shadow"><?= $caution->status ?></div>
                                                        <?php } ?>

                                                        <?php if ($caution->status == "rejeté") { ?>
                                                            <div class="badge badge-danger badge-shadow"><?= $caution->status ?></div>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="">
                                                        <div class="dropdown">
                                                            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Options</a>
                                                            <div class="dropdown-menu">

                                                                <a href="../../controllers/CautionController.php?action=validated&id=<?= $caution->id ?>" class="dropdown-item">Valider</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="../../controllers/CautionController.php?action=rejected&id=<?= $caution->id ?>" class="dropdown-item">Rejeter</a>
                                                                <div class="dropdown-divider"></div>

                                                                <a href="./details.php?id=<?= $caution->id ?>" class="dropdown-item">Details</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="./update.php?id=<?= $caution->id ?>" class="dropdown-item">Modifier</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
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