<?php
require_once '../models/Database.php';
require_once '../models/Invoice.php';
require_once '../models/Indexs.php';
require_once '../models/Counter.php';

$action = $_GET['action'];


if ($action == 'create_counter') {
    $counter_number = $_POST['counter_number'];
    $new_index = $_POST['new_index'];
    $user_id = $_POST['user_id'];
    $network = $_POST['network'];

    Counter::create($counter_number, $new_index, $new_index, $user_id, $network);

    // Caution::createInitialCaution($type, $num_ref, $rai_so_entre, $rccm, $nom_signataire);

    header("Location: ../views/counter/index.php");
}

if ($action == 'add_index') {
    $new_index = $_POST['new_index'];

    $id_counter = $_POST['id_counter'];


    Indexs::create($new_index, $id_counter);

    $counter = Counter::read($id_counter);
    Counter::updateIndex($id_counter, $counter->new_index, $new_index);

    $conso =  $new_index - $counter->new_index;
    $amount = 0;
    if ($new_index < 100) {
        $amount = $conso * 50;
    } else {
        $amount = $conso * 100;
    }
    Invoice::create($amount, $conso, "En attente", $counter->id, $counter->user_id);

    header("Location: ../views/counter/index.php");
}

if ($action == 'update') {
    $id = $_POST['id'];
    $npui = $_POST['npui'];
    $ref_app_offre = $_POST['reff_app_offre'];
    $intitule = $_POST['intitule'];
    $date_signature = $_POST['date_signature'];
    $nom_banque = $_POST['nom_banque'];
    $agence = $_POST['agence'];
    $montant_ca = $_POST['montant_ca'];
    $nom_signataire = $_POST['nom_signataire'];


    // Caution::createCompleteCaution($id, $npui, $ref_app_offre, $intitule, $date_signature, $nom_banque, $agence, $montant_ca, $nom_signataire);
    header("Location: ../views/index.php");
}

if ($action == 'validated') {
    if (isset($_GET['id'])) {
        // Caution::changeStatus($_GET['id'], 'validé');
    }

    header("Location: ../views/index.php");
}

if ($action == 'rejected') {
    if (isset($_GET['id'])) {
        // Caution::changeStatus($_GET['id'], 'rejeté');
    }

    header("Location: ../views/index.php");
}

if ($action == 'delete') {
    $id = $_GET['id'];

    // Caution::delete($id);
    header('Location: ../views/index.php');
}
