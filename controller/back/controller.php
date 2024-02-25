<?php
require_once(RACINE . '/model/back/request.php');

//SELECT--------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
// Traitement de la requête GET

if (isset($_GET['entity'])){
    if (isset($_GET['id'])) {
        $Id = $_GET['id'];
        $entity = $_GET['entity'];

        try {
            $response = array(); // Initialisation du tableau de réponse

            if ($entity === 'pilote') {
                $Pilote = new Pilote();
                $unPilote = $Pilote->getPiloteById($Id);
                ob_start(); // Commence la mise en mémoire tampon de la sortie
                include(RACINE . "/view/back/update/pilotUpdt.php");
                $output = ob_get_clean(); // Récupère le contenu de la mémoire tampon et arrête la mémoire tampon
                $response['html'] = $output; // Ajoute le contenu HTML à la réponse
            } elseif ($entity === 'ecurie') {
                $Ecurie = new Ecurie();
                $uneEcurie = $Ecurie->getEcurieById($Id);
                ob_start();
                include(RACINE . "/view/back/update/ecurieUpdt.php");
                $output = ob_get_clean();
                $response['html'] = $output;
            } else {
                $response['error'] = 'Erreur : Entité non reconnue.';
            }

            // Envoie la réponse JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        } catch (Exception $ex) {
            $response['error'] = $ex->getMessage();
            header('Content-Type: application/json');
        }
    }
    
    // if (isset($_GET['action']) && $_GET['action'] === 'create') {
    if ($action == "create") {
        try {
            $entity = $_GET['entity'];
            if ($entity === 'pilote') {
                ob_start();
                include(RACINE . "/view/back/create/pilotCreate.php");// view of pilot creation
                $output = ob_get_clean();
                $response['html'] = $output;
            } elseif ($entity === 'ecurie') {
                ob_start();
                include(RACINE . "/view/back/create/ecurieCreate.php");
                $output = ob_get_clean();
                $response['html'] = $output;
            } else {
                $response['error'] = 'Erreur dans la tentative de redirection';
            }
            // Envoie la réponse JSON
            header('Content-Type: application/json');
            echo json_encode($response);
            exit(); // quitter le script après avoir envoyé la réponse
        } catch (Exception $ex)  {
            $response['error'] = 'Action de création non spécifiée ou entité manquante.';
            // Envoie la réponse JSON
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        }
    }
}

//INSERT-------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['nomAdd']) && isset($_POST['prenomAdd']) && isset($_POST['paysAdd']) /*&& isset($_POST['dateNaisAdd']) */) {
        $Pilote = new Pilote();
        $Pilote->addPilote($_POST['nomAdd'], $_POST['prenomAdd'], $_POST['paysAdd']/*, $_POST['dateNaisAdd']*/);
        $_GET = array();
        header('Location: ../../appli&type=pilote');//Because url = TheNorthRace/appli/create/pilote
        exit();
    }
    else if (isset($_POST['nomAdd']) && isset($_POST['couleurAdd'])) {
        $Ecurie = new Ecurie();
        $Ecurie->addEcurie($_POST['nomAdd'],$_POST['couleurAdd']);
        header('Location: ../../appli&type=ecurie');
        exit();
    }

//UPDATE-------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
// Traitement de la requête POST pour Update Pilote

    else if(isset($_POST['piloteId']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pays']) && isset($_POST['dateNais'])) {
        $piloteId = $_POST['piloteId'];
        // Mise à jour du pilote
        $Pilote = new Pilote();
        $Pilote->updatePilote($piloteId, $_POST['nom'], $_POST['prenom'], $_POST['pays'], $_POST['dateNais']);
        header('Location: ./appli&type=pilote');
        exit();
    }

    else if (isset($_POST['EcurieId']) && isset($_POST['nom']) && isset($_POST['couleur']) && isset($_POST['dateCreation']) && isset($_POST['localisation']) && isset($_POST['nbTitresConstructeur']) && isset($_POST['nbCoursesDisputees']) && isset($_POST['nbVictoires']) && isset($_POST['nbPoduims']) && isset($_POST['directeur'])) {
        $EcurieId = $_POST['EcurieId'];
        $Ecurie = new Ecurie();
        $Ecurie->updateEcurieColor($EcurieId, $_POST['couleur'], $_POST['dateCreation'], $_POST['localisation'], $_POST['nbTitresConstructeur'], $_POST['nbCoursesDisputees'], $_POST['nbVictoires'], $_POST['nbPoduims'], $_POST['directeur']);
        header('Location: ./appli&type=ecurie');
        exit();
    }
}

//DELETE-------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
// if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id']) && isset($_GET['entity'])) {
if(isset($action) && $action == "delete" && isset($_GET['id']) && isset($_GET['entity'])){
    try {
        $Id = $_GET['id'];
        $entity = $_GET['entity'];

        // Vérifier si l'entité est valide (pilote ou écurie)
        if ($entity === 'pilote') {
            $Pilote = new Pilote();
            $Pilote->deletePiloteById($Id);
        } elseif ($entity === 'ecurie') {
            $Ecurie = new Ecurie();
            $Ecurie->deleteEcurieById($Id);
        } else {
            throw new Exception('Entité non reconnue.');
        }
        # Redirection vers la page de l'appli
        header('Location: ./appli');
        exit();
    } catch (Exception $ex) {
        echo 'Erreur lors de la suppression ' . $entity . ' : ' . $ex->getMessage();
    }
}