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
            }elseif ($entity === 'courses' && isset($_GET['team-id']) &&  isset($_GET['year'])) {
                $CoursesAnnee = new CoursesAnnee();
                $team = $_GET['team-id'];
                $year = $_GET['year'];
                $uneCourse = $CoursesAnnee->getCoursesDetailsByPilotTeamAndYear($Id, $team, $year);
                ob_start();
                include(RACINE . "/view/back/update/rankingUpdt.php");
                $output = ob_get_clean();
                $response['html'] = $output;
            }elseif ($entity === 'classement'  &&  isset($_GET['year'])) {
                $Classement = new Classement();
                $year = $_GET['year'];
                $leClassement = $Classement->getClassementByYearAndTeam($year, $Id);
                ob_start();
                include(RACINE . "/view/back/update/classementUpdt.php");
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
    
//REDIRECTION PAGE CREATION-------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
    if ($action == "create") {
        try {
            $entity = $_GET['entity'];
            if ($entity === 'pilote') {
                ob_start();
                include(RACINE . "/view/back/create/pilotCreate.php");
                $output = ob_get_clean();
                $response['html'] = $output;
            } elseif ($entity === 'ecurie') {
                ob_start();
                include(RACINE . "/view/back/create/ecurieCreate.php");
                $output = ob_get_clean();
                $response['html'] = $output;
            } elseif ($entity === 'rank') {
                ob_start();
                include(RACINE . "/view/back/create/rankingCreate.php");
                $output = ob_get_clean();
                $response['html'] = $output;
            } elseif ($entity === 'classement') {
                ob_start();
                include(RACINE . "/view/back/create/classementCreate.php");
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
        $id_pilote = $Pilote->addPilote($_POST['nomAdd'], $_POST['prenomAdd'], $_POST['paysAdd']/*, $_POST['dateNaisAdd']*/);

        if (isset($_FILES["photoAdd"]) && $_FILES["photoAdd"]["error"] == 0) {

            $nom_fichier_origine = $_FILES["photoAdd"]["name"];
            $nouveau_nom_fichier = $id_pilote . '.png';

            $dossier_upload = "ressources/front/images/photo_Pilote_PNG/";
            $chemin_fichier = $dossier_upload . $nouveau_nom_fichier;
            move_uploaded_file($_FILES["photoAdd"]["tmp_name"], $chemin_fichier);
        }
        header('Location: ../../appli&type=pilote');// url = TheNorthRace/appli/create/pilote
        exit();
    }
    else if (isset($_POST['nomAdd']) && isset($_POST['couleurAdd']) && isset($_POST['dateCreationAdd']) && isset($_POST['localisationAdd']) && isset($_POST['nbTitresConstructeurAdd']) && isset($_POST['nbCoursesDisputeesAdd']) && isset($_POST['nbVictoiresAdd']) && isset($_POST['nbPoduimsAdd']) && isset($_POST['directeurAdd'])) {
        $Ecurie = new Ecurie();
        $Ecurie->addEcurie($_POST['nomAdd'], $_POST['couleurAdd'], $_POST['dateCreationAdd'], $_POST['localisationAdd'], $_POST['nbTitresConstructeurAdd'], $_POST['nbCoursesDisputeesAdd'], $_POST['nbVictoiresAdd'], $_POST['nbPoduimsAdd'], $_POST['directeurAdd']);
        header('Location: ../../appli&type=ecurie');
        exit();
    }
    else if (isset($_POST['pilotIdAdd']) && isset($_POST['yearRaceAdd']) && isset($_POST['teamIdAdd']) && isset($_POST['pointsAdd']) && isset($_POST['pilotPlaceAdd']) && isset($_POST['pilotNumberAdd'])) {
        $CoursesAnnee = new CoursesAnnee();
        $CoursesAnnee->AddRaceYear($_POST['pilotIdAdd'], $_POST['yearRaceAdd'], $_POST['teamIdAdd'], $_POST['pointsAdd'], $_POST['pilotPlaceAdd'], $_POST['pilotNumberAdd']);
        header('Location: ../../appli&type=courses');
        exit();
    }
    else if (isset($_POST['teamIdAdd']) && isset($_POST['yearAdd']) && isset($_POST['pointsAdd']) && isset($_POST['teamPlaceAdd'])) {
        $Classement = new Classement();
        $Classement->addClassement($_POST['teamIdAdd'], $_POST['yearAdd'], $_POST['pointsAdd'], $_POST['teamPlaceAdd']);
        header('Location: ../../appli&type=classement');
        exit();
    }

//UPDATE-------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
// Traitement de la requête POST pour Update Pilote

    else if(isset($_POST['piloteId']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pays']) && isset($_POST['dateNais'])) {
        $id_pilote = $_POST['piloteId'];
        $Pilote = new Pilote();
        $Pilote->updatePilote($id_pilote, $_POST['nom'], $_POST['prenom'], $_POST['pays'], $_POST['dateNais']);
        if (isset($_FILES["photoAdd"]) && $_FILES["photoAdd"]["error"] == 0) {

            $nom_fichier_origine = $_FILES["photoAdd"]["name"];
            $nouveau_nom_fichier = $id_pilote . '.png';

            $dossier_upload = "ressources/front/images/photo_Pilote_PNG/";
            $chemin_fichier = $dossier_upload . $nouveau_nom_fichier;
            move_uploaded_file($_FILES["photoAdd"]["tmp_name"], $chemin_fichier);
        }
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

    else if (isset($_POST['PilotId']) && isset($_POST['teamId']) && isset($_POST['year']) && isset($_POST['newPoints']) && isset($_POST['placePil']) && isset($_POST['newPilotNumber'])) {
        $pilotId = intval($_POST['PilotId']);
        $teamId = intval($_POST['teamId']);
        $year = intval($_POST['year']);
        $newPoints = intval($_POST['newPoints']);
        $placePil = intval($_POST['placePil']);
        $newPilotNumber = intval($_POST['newPilotNumber']);

        $CoursesAnnee = new CoursesAnnee();
        $CoursesAnnee->updateRaceForYear($pilotId, $teamId, $year, $newPoints, $placePil, $newPilotNumber);
        header('Location: ./appli&type=rank');
        exit();
    }

    else if (isset($_POST['points']) && isset($_POST['teamPlace']) && isset($_POST['teamId']) && isset($_POST['year'])) {
        $id_team = $_POST['teamId'];
        $year = $_POST['year'];
        $Classement = new Classement();
        $Classement->updateClassement($_POST['points'], $_POST['teamPlace'], $id_team, $year);
        header('Location: ./appli&type=classement');
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
        $Id = $_GET['id'];
        $entity = $_GET['entity'];

        if ($entity === 'pilote') {
            $Pilote = new Pilote();
            $Pilote->deletePiloteById($Id);
        } elseif ($entity === 'ecurie') {
            $Ecurie = new Ecurie();
            $Ecurie->deleteEcurieById($Id);
        }
        elseif ($entity === 'course' && isset($_GET['teamId']) && isset($_GET['year'])) {
            $teamId = $_GET['teamId'];
            $year = $_GET['year'];
            $Course = new CoursesAnnee();
            $Course->DeleteRaceYear($Id, $teamId, $year);
        }elseif ($entity === 'rank' && isset($_GET['year'])) {
            $teamId = $_GET['teamId'];
            $year = $_GET['year'];
            $Classement = new Classement();
            $Classement->deleteClassement($Id, $year);
        } else {
            throw new Exception('Entité non reconnue.');
        }

        header('Location: ./appli');
        exit();
    } catch (Exception $ex) {
        echo 'Erreur lors de la suppression ' . $entity . ' : ' . $ex->getMessage();
    }
}