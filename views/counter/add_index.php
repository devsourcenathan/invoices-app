<?php
require_once '../../models/Database.php';
require_once '../../models/User.php';
require_once '../../models/Counter.php';

$counter = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $counter = Counter::read($id);
} else {
    header("Location: ../home/index.php");
}
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
                        <form action="../../controllers/InvoiceController.php?action=add_index" method="post">
                            <div class="card-body">
                                <input type="hidden" name="id_counter" value="<?= $id ?>">
                                <div class="form-group">
                                    <label for="inputAddress">Saisir le nouvel index</label>
                                    <input type="number" name="new_index" required class="form-control" id="inputAddress" placeholder="">
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