<!-- FAIRE LE CONTOLLER DE L'APP

==> SÉPARER LE CTRLLER DE LA VUE -->

<?php
if (!isset($GLOBALS['RACINE'])) {
    $racine = dirname(__FILE__);
    require_once($racine . '/../../getRacine.php');
}

session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ./connexion');
    exit();
}else{
    require_once(RACINE . "/view/back/path/app.php");
}
?>