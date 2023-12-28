<?php
if (!isset($GLOBALS['RACINE'])) {
    $racine = dirname(__FILE__);
    require_once($racine . '/../../getRacine.php');
}

session_start();

if (isset($_POST['submit'])) {
    require_once(RACINE . '/model/back/request.php');

    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];
    
    $getAdmin = new GetModeles();
    $admin = $getAdmin->GetAdmin($identifiant);

    if ($admin && $password === $admin['password']) {
        $_SESSION['admin'] = $admin;
        echo RACINE;
        // header('Location: '.RACINE.'/view/back/path/app.php');
        header('Location: ./view/back/path/app.php');
        exit();
    } else {
        $error = 'Identifiants incorrects. Veuillez réessayer.';
    }
}

include_once(RACINE . '/view/back/login.php');