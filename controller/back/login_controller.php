<?php
// if(!isset($racine) || empty($racine) || $racine == dirname(__FILE__) ){
//     $racine = file_get_contents("../../getRacine.php");
// }

if($_SERVER["SCRIPT_FILENAME"] == __FILE__ || !isset($racine) || empty($racine) || $racine == dirname(__FILE__)){
    $racine = "../../";
}

if (isset($_POST['submit'])) {
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];

    require_once("../../getRacine.php");
    require_once("$racine/model/back/request.php");
    $getAdmin = new GetModeles();
    $admin = $getAdmin->GetAdmin($identifiant);

    if ($admin && $password === $admin['password']) {
        $_SESSION['admin'] = $admin;
        header('Location: ../../view/back/path/app.php');
        exit();
    } else {
        $error = 'Identifiants incorrects. Veuillez réessayer.';
    }
}

// include_once '../../view/back/login.php';
?>

