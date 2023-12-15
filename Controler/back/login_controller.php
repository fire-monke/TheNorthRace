<?php
session_start();
<<<<<<< HEAD
require_once '../connexion_PDO.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $pdo = connectDB();

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = :username LIMIT 1");
    $stmt->execute(['username' => $username]);
    $admin = $stmt->fetch();

    if ($admin && $password === $admin['password']) {
        $_SESSION['admin'] = $admin;
        header('Location: ../view/index.php');
=======

if (isset($_POST['submit'])) {
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];


    require_once("../../model/back/request.php");
    $getAdmin = new GetModeles();
    $admin = $getAdmin->GetAdmin($identifiant);

    if ($admin && $password === $admin['password']) {
        $_SESSION['admin'] = $admin;
        header('Location: ../../view/back/path/app.php');
>>>>>>> 99faa55c97139b839038561a3d3a37a319ece07f
        exit();
    } else {
        $error = 'Identifiants incorrects. Veuillez réessayer.';
    }
}

<<<<<<< HEAD
include '../view/login.php';
=======
include '../../view/back/login.php';
>>>>>>> 99faa55c97139b839038561a3d3a37a319ece07f
?>

