<?php

require_once '../../partials/header.php';
require_once '../../models/Database.php';

$users = Database::recover(Database::query("SELECT * FROM users where role = 'user'"), false);

?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Liste des Utilisateurs</h4>


                        </div>
                        <a href="./create.php" class="btn btn-primary col-3 m-2">Ajouter un Utilisateur</a>

                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($users)) {
                                            foreach ($users as $user) { ?>
                                                <tr>
                                                    <td><?= $user->name ?></td>
                                                    <td><?= $user->email ?></td>
                                                    <td>
                                                        <a href="./update.php?id=<?= $user->id ?>" class="btn btn-warning">Modifier</a>
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