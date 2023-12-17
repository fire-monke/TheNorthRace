<?php
session_start();

if (isset($_POST['submit'])) {
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];

    require_once("../../getRacine.php");
    require_once("$racine/model/back/request.php");
    $getAdmin = new GetModeles();
    $admin = $getAdmin->GetAdmin($identifiant);

    if ($admin && $password === $admin['password']) {
        $_SESSION['admin'] = $admin;
        // header('Location: ./view/back/path/app.php');
        
        include_once('./view/back/path/app.php');
        exit();
    } else {
        $error = 'Identifiants incorrects. Veuillez réessayer.';
    }
}
require_once("$racine/view/back/login.php");

?>

