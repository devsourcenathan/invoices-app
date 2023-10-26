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
                            <h4>Payer la facture <b><?= $counter->counter_number ?></b> </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Mode de payment</label>
                                <select class="form-control" name="pay_method" id="pay_method">
                                    <option disabled selected>Choisir un mode de paiement</option>
                                    <option value="deposit">Depot d'argent</option>
                                    <option value="om">Orange Money</option>
                                    <option value="momo">Mobile Money</option>
                                </select>
                                <span id="unavaible_box" class="hidden">Choix non disponible pour le moment..</span>
                                <div id="deposit_box" class="hidden">
                                    Effectuez un depot sur l'un des numeros suivant et saisissez l'ID de la transaction
                                    <br> <b>Numero 1:</b>
                                    <br> <b>Numero 2:</b>
                                    <form action="../../controllers/$_COOKIE">
                                        <input type="text" required name="ref_deposit" placeholder="Entrer l'ID de la transaction" class="form-control">
                                        <br>
                                        <button type="submit" class="btn btn-success">Confirmer le paiement</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .hidden {
        display: none;
    }
</style>

<script>
    const method = document.getElementById("pay_method")
    const depositBox = document.getElementById("deposit_box")
    const unavaibleBox = document.getElementById("unavaible_box")

    method.addEventListener("change", (e) => {

        const choice = e.target.value
        if (choice === "deposit") {
            if (depositBox.classList.contains("hidden")) {
                depositBox.classList.remove("hidden")
            }
            if (!(unavaibleBox.classList.contains("hidden"))) {
                unavaibleBox.classList.add("hidden")
            }
        } else {
            if (!(depositBox.classList.contains("hidden"))) {
                depositBox.classList.add("hidden")
            }
            if (unavaibleBox.classList.contains("hidden")) {
                unavaibleBox.classList.remove("hidden")
            }
        }
    })
</script>

<?php require_once '../../partials/footer.php' ?>