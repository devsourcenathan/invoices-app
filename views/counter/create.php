<?php
require_once '../../models/Database.php';
require_once '../../models/User.php';
$users = Database::recover(Database::query("SELECT * FROM users where role = 'user'"), false);


require_once '../../partials/header.php';
?><!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Formulaire de creation d'un compteur</h4>
                        </div>
                        <form action="../../controllers/InvoiceController.php?action=create_counter" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEmail4">Numero</label>
                                    <input type="text" name="counter_number" required class="form-control" id="inputEmail4" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail4">Reseau</label>
                                    <input type="text" name="network" required class="form-control" id="inputEmail4" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Index initial</label>
                                    <input type="number" name="new_index" required class="form-control" id="inputAddress" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Proprietaire</label>
                                    <select name="user_id" class="form-control" required id="">
                                        <?php foreach ($users as $user) { ?>
                                            <option value="<?= $user->id ?>"><?= $user->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once '../../partials/footer.php' ?>