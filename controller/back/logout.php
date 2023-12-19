<?php
// if(!isset($racine) || empty($racine) || $racine == dirname(__FILE__) ){
//     $racine = "../../";
// }

session_start();

// Détruire toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion
// header("Location: ../../view/back/login.php");
// include_once("$racine/view/back/login.php");
exit;
?>
