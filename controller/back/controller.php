<?php
require_once(RACINE . '/model/back/request.php');

function upload_img($img_name, $input_name, $upload_path){
    $file_name = $img_name . '.png'; // generate a new file name
    $img_path = $upload_path . $file_name;
    // Check if the download went well
    if (isset($_FILES["$input_name"]) && $_FILES["$input_name"]["error"] == 0) {
        return move_uploaded_file($_FILES["$input_name"]["tmp_name"], $img_path);
    } else if (!file_exists($img_path) && file_exists($upload_path . "default.png")){
        return copy($upload_path . "default.png", $img_path);
    }
    return false;
}

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
            $response = array();
            if ($entity === 'pilote') {
                $Pilote = new Pilote();
                $unPilote = $Pilote->getPiloteById($Id);
                ob_start(); // Begins buffering the output
                include(RACINE . "/view/back/update/pilotUpdt.php");
                $output = ob_get_clean(); // Get the contents of the buffer and stop the buffer
                $response['html'] = $output; // add HTML content to the response
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
            exit();
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
        $id_pilote = $Pilote->addPilote($_POST['nomAdd'], $_POST['prenomAdd'], $_POST['paysAdd']/*, $_POST['dateNaisAdd']*/);
        upload_img($id_pilote, "photoAdd", "ressources/front/images/photo_Pilote_PNG/");
        header('Location: ../../appli&type=pilote');//Because url = TheNorthRace/appli/create/pilote
        exit();       
    }
    else if (isset($_POST['nomAdd']) && isset($_POST['couleurAdd']) && isset($_POST['dateCreationAdd']) && isset($_POST['localisationAdd']) && isset($_POST['nbTitresConstructeurAdd']) && isset($_POST['nbCoursesDisputeesAdd']) && isset($_POST['nbVictoiresAdd']) && isset($_POST['nbPoduimsAdd']) && isset($_POST['directeurAdd'])) {
        $Ecurie = new Ecurie();
        $id_ecurie = $Ecurie->addEcurie($_POST['nomAdd'], $_POST['couleurAdd'], $_POST['dateCreationAdd'], $_POST['localisationAdd'], $_POST['nbTitresConstructeurAdd'], $_POST['nbCoursesDisputeesAdd'], $_POST['nbVictoiresAdd'], $_POST['nbPoduimsAdd'], $_POST['directeurAdd']);
        upload_img($id_ecurie, "logoEcurieAdd", "ressources/front/images/logo_ecurie_PNG/");
        upload_img($id_ecurie, "photoVoitureAdd", "ressources/front/images/photo_voiture_PNG/");
        header('Location: ../../appli&type=ecurie');
        exit();
    }

//UPDATE-------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
    else if(isset($_POST['piloteId']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pays']) && isset($_POST['dateNais'])) {
        $id_pilote = $_POST['piloteId'];
        $Pilote = new Pilote();
        $Pilote->updatePilote($id_pilote, $_POST['nom'], $_POST['prenom'], $_POST['pays'], $_POST['dateNais']);
        upload_img($id_pilote, "photoAdd", "ressources/front/images/photo_Pilote_PNG/");
        header('Location: ./appli&type=pilote');
        exit();
    }

    else if (isset($_POST['EcurieId']) && isset($_POST['nom']) && isset($_POST['couleur']) && isset($_POST['dateCreation']) && isset($_POST['localisation']) && isset($_POST['nbTitresConstructeur']) && isset($_POST['nbCoursesDisputees']) && isset($_POST['nbVictoires']) && isset($_POST['nbPoduims']) && isset($_POST['directeur'])) {
        $id_ecurie = $_POST['EcurieId'];
        $Ecurie = new Ecurie();
        $Ecurie->updateEcurieColor($id_ecurie, $_POST['couleur'], $_POST['dateCreation'], $_POST['localisation'], $_POST['nbTitresConstructeur'], $_POST['nbCoursesDisputees'], $_POST['nbVictoires'], $_POST['nbPoduims'], $_POST['directeur']);
        upload_img($id_ecurie, "logoEcurieAdd", "ressources/front/images/logo_ecurie_PNG/");
        upload_img($id_ecurie, "photoVoitureAdd", "ressources/front/images/photo_voiture_PNG/");
        header('Location: ./appli&type=ecurie');
        exit();
    }
}

//DELETE-------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
if(isset($action) && $action == "delete" && isset($_GET['id']) && isset($_GET['entity'])){
    try {
        $id = $_GET['id'];
        $entity = $_GET['entity'];

        // Check if the entity is valid
        if ($entity === 'pilote') {
            $Pilote = new Pilote();
            $Pilote->deletePiloteById($id);
        } elseif ($entity === 'ecurie') {
            $Ecurie = new Ecurie();
            $Ecurie->deleteEcurieById($id);
        } else {
            throw new Exception('Entité non reconnue.');
        }
        // Redirection to app page
        header('Location: ./appli');
        exit();
    } catch (Exception $ex) {
        echo 'Erreur lors de la suppression ' . $entity . ' : ' . $ex->getMessage();
    }
}