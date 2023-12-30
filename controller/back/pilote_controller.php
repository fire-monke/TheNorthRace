<?php 

require_once(RACINE . '/model/back/request.php');
if (isset($_GET['id'])) {
    $piloteId = $_GET['id'];

    try {
        $Pilote = new Pilote();
        $unPilote = $Pilote->getPiloteById($piloteId);

        // Faites ce que vous devez faire avec $unPilote
        // Par exemple, effectuez une mise à jour en base de données, etc.
        if (!defined('PILOT')) {
            include("../../view/back/update/pilotUpdt.php");
            var_dump($racine);
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pays']) && isset($_POST['dateNais'])) {
    // Mise à jour du pilote
    $Pilote->updatePilote($piloteId, $_POST['nom'], $_POST['prenom'], $_POST['pays'], $_POST['dateNais']);
    } else {
        echo "Erreur : Toutes les informations nécessaires ne sont pas fournies.";
    }


?>