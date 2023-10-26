<?php
require_once '../../models/Database.php';
require_once '../../models/User.php';

$user_old = null;
if (isset($_GET['id'])) {
    $user_old = User::read($_GET['id']);
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
                            <h4>Formulaire de modification d'un Utilisateur</h4>
                        </div>
                        <form action="../../controllers/UserController.php?action=update&role=user" method="post">
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?= $user_old->id ?>">
                                <input type="hidden" name="role" value="<?= $user_old->role ?>">
                                <div class="form-group">
                                    <label for="inputEmail4">Noms</label>
                                    <input type="text" name="name" value="<?= $user_old->name ?>" class="form-control" id="inputEmail4" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Email</label>
                                    <input type="text" name="email" value="<?= $user_old->email ?>" class="form-control" id="inputAddress" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Mot de passe</label>
                                    <input type="password" name="password" class="form-control" id="inputAddress" placeholder="">
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