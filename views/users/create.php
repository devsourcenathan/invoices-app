<?php require_once '../../partials/header.php' ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Formulaire de creation d'un Utilisateur</h4>
                        </div>
                        <form action="../../controllers/UserController.php?action=create&role=user" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEmail4">Noms</label>
                                    <input type="text" name="name" required class="form-control" id="inputEmail4" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Email</label>
                                    <input type="text" name="email" required class="form-control" id="inputAddress" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Mot de passe</label>
                                    <input type="text" name="password" required class="form-control" id="inputAddress" placeholder="">
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