<?php require_once '../../partials/header.php' ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Formulaire de creation d'une caution</h4>
                        </div>
                        <form action="../../controllers/CautionController.php?action=create" method="post">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Type de caution</label>
                                        <select id="inputState" name="type_caution" class="form-control">
                                            <option selected>Choisir...</option>
                                            <option value="Type 1">Type 1</option>
                                            <option value="Type 2">Type 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputZip">Numero de reference</label>
                                        <input type="text" name="num_ref" class="form-control" id="inputZip">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4">Raison social de l'entreprise</label>
                                    <input type="text" name="rai_so_entre" class="form-control" id="inputEmail4" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">RCCM</label>
                                    <input type="text" name="rccm" class="form-control" id="inputAddress" placeholder="">
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