<?php

// Sur chaque page protégée
session_start();

// Vérifier si une session est active
$user = null;
if (!isset($_SESSION['user'])) {
    // Rediriger vers la page de connexion
    header('Location: ../../index.php');
} else {
    $user = $_SESSION['user'];
}

?>

<!DOCTYPE html>
<html lang="en">


<!-- empty-state.html  21 Nov 2019 03:54:38 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Facture App</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="../../assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="../../assets/css/custom.css">

    <link rel="stylesheet" href="../../assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="../../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

</head>

<body>
    <!-- <div class="loader"></div> -->
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="../../assets/img/avatar.jpg"> <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title"><?= $user->name ?></div>

                            <div class="dropdown-divider"></div>
                            <a href="../../controllers/AuthController.php?action=logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="../index.php"> <img alt="image" src="../../assets/img/logo.png" class="header-logo" /> <span class="logo-name">
                                Factures
                            </span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header"></li>
                        <li class="dropdown">
                            <a href="../index.php" class="nav-link"><i data-feather="monitor"></i><span>Accueil</span></a>
                        </li>
                        <?php if ($user->role == 'user') { ?>
                            <li class="dropdown">
                                <a href="../invoice/unpay.php" class="nav-link"><i data-feather="book"></i><span>Factures impayées</span></a>
                            </li>
                            <li class="dropdown">
                                <a href="../invoice/pays.php" class="nav-link"><i data-feather="book"></i><span>Factures payées</span></a>
                            </li>
                        <?php } ?>
                        <?php if ($user->role == 'admin') { ?>
                            <!-- <li class="dropdown">
                                <a href="../caution/requests.php" class="nav-link"><i data-feather="book"></i><span>Factures</span></a>
                            </li> -->

                            <li class="dropdown">
                                <a href="../counter/index.php" class="nav-link"><i data-feather="book"></i><span>Compteurs</span></a>
                            </li>

                            <li class="dropdown">
                                <a href="../users/index.php" class="nav-link"><i data-feather="users"></i><span>Utilisateurs</span></a>
                            </li>
                            <li class="dropdown">
                                <a href="../admin/index.php" class="nav-link"><i data-feather="user"></i><span>Admin</span></a>
                            </li>
                        <?php } ?>
                    </ul>
                </aside>
            </div>