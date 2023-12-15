<?php
session_start();
require_once '../../model/connexion_PDO.php';

if (isset($_POST['submit'])) {
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];

    $pdo = connectDB();

    $stmt = $pdo->prepare("SELECT * FROM gerant WHERE identifiant = :identifiant LIMIT 1");
    $stmt->execute(['identifiant' => $identifiant]);
    $admin = $stmt->fetch();

    if ($admin && $password === $admin['password']) {
        $_SESSION['admin'] = $admin;
        header('Location: ../../view/back/path/app.php');
        exit();
    } else {
        $error = 'Identifiants incorrects. Veuillez réessayer.';
    }
}

include '../view/login.php';
?>

