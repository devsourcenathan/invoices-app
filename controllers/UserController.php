<?php
require_once '../models/Database.php';
require_once '../models/User.php';

$action = $_GET['action'];


if ($action == 'create') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    User::create($name, $email, $_GET['role'], $password);

    if ($_GET['role'] == 'admin') {
        header("Location: ../views/admin/index.php");
    }
    header("Location: ../views/users/index.php");
}

if ($action == 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    User::update($id, $name, $email, $password);
    if ($_POST['role'] == 'admin') {
        header("Location: ../views/admin/index.php");
    }
    header("Location: ../views/users/index.php");
}

if ($action == 'delete') {
    $id = $_GET['id'];
    User::delete($id);
    header('Location: ../views/index.php');
}

if ($action == 'read') {
    $id = $_POST['id'];
    $user = User::read($id);
}

if ($action == 'readAll') {
    $users = User::readAll();
}
