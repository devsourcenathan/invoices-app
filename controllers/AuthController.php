<?php

require_once '../models/Database.php';
require_once '../models/User.php';

$action = $_GET['action'];
if ($action == 'login') {
    // Sur la page de connexion
    session_start();
    $email = htmlspecialchars($_POST['email']);
    $password = sha1(htmlspecialchars($_POST['password']));

    $user = User::login($email, $password);

    if ($user != null) {
        $_SESSION['user'] = $user;
        header('Location: ../views/index.php');
    } else {
        header('Location: ../index.php');
    }
}

if ($action == 'register') {
    session_start();
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = sha1(htmlspecialchars($_POST['password']));

    $user = User::create($name, $email, 'user', $password);

    if ($user != null) {
        $_SESSION['user'] = $user;
        header('Location: ../views/index.php');
    } else {
        header('Location: ../register.php');
    }
}

if ($action == 'logout') {
    session_start();
    session_destroy();
    header('Location: ../index.php');
}
