<?php
include_once(RACINE.'/model/back/class_ecurie.php');
include_once(RACINE.'/model/back/class_pilote.php');
include_once(RACINE.'/model/back/class_coursesAnnee.php');

$CourseObj = new CoursesAnnee();
$piloteObj = new Pilote();
$ecurieObj = new Ecurie(); // Créez un objet pour la classe Ecurie
$year = 2023;

// Récupérer les pilotes de la dernière saison
$pilotesLastSeason = $piloteObj->getPilotesLastSeason();
$coursesAnnee = $CourseObj->getCoursesDetailsByPilotAndYear($idPilote, $year);
$ecurie=$ecurieObj->getEcurieOfLastSeasonOfPiloteByIdPilote($idPilote);
$nommEcurie = isset($ecurie->nom) ? $ecurie->nom : ''; //Print empty if not set

// Vérifier si le pilote avec $idPilote fait partie de la dernière saison
$pilote = null;
foreach ($pilotesLastSeason as $piloteLastSeason) {
    if ($piloteLastSeason->id == $idPilote) {
        $pilote = $piloteLastSeason;
        break;
    }
}

// Si le pilote n'appartient pas à la dernière saison, lancer une exception
if ($pilote === null) {
    throw new Exception("Le pilote avec l'ID $idPilote n'appartient pas à la dernière saison.");
}

$iddPilote = $pilote->id;
$nommPilote = $pilote->nom;
$prenommPilote = $pilote->prenom;
$paysPilote = $pilote->paysPil;
// Date de naissance du pilote
$dateNaissancePilote = $pilote->dateNais;
$couleurrEcurie = $ecurie->couleur;
// Calcul de l'âge
$dateNaissance = new DateTime($dateNaissancePilote);
$aujourdHui = new DateTime();
$age = $aujourdHui->diff($dateNaissance)->y;


include_once(RACINE . '/controller/front/partials/header_controller.php');
include_once(RACINE . '/view/front/path/pilote_page.php');
include_once(RACINE . '/view/front/path/partials/footer.php');
