<?php

require_once '../../partials/header.php';
require_once '../../models/Database.php';
require_once '../../models/Counter.php';
require_once '../../models/User.php';

$counters = Counter::readAll();

?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Liste des compteurs</h4>
                        </div>
                        <a href="./create.php" class="btn btn-primary col-3 m-2">Ajouter un compteur</a>

                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Numero de compteur</th>
                                            <th>Nom du Proprietaire</th>
                                            <th>Reseau</th>
                                            <th>Ancien index</th>
                                            <th>Nouveau index</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($counters)) {
                                            foreach ($counters as $counter) {
                                                $user = User::read($counter->user_id);
                                        ?>
                                                <tr>
                                                    <td><?= $counter->counter_number ?></td>
                                                    <td><?= $user->name ?></td>
                                                    <td><?= $counter->network ?></td>
                                                    <td><?= $counter->old_index ?></td>
                                                    <td><?= $counter->new_index ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Options</a>
                                                            <div class="dropdown-menu">
                                                                <a href="../counter/add_index.php?id=<?= $counter->id ?>" class="dropdown-item">Relever l'index</a>

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