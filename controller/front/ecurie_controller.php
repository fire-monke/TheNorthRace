<?php
include_once(RACINE . '/model/back/class_ecurie.php');
include_once(RACINE . '/model/back/class_pilote.php');
include_once(RACINE . '/model/back/class_coursesAnnee.php');

$ecurieObj = new Ecurie();
$CourseObj = new CoursesAnnee();
$piloteObj = new Pilote();

// get all stable from the last season
$ecuriesLastSeason = $ecurieObj->getEcuriesLastSeason();

// check if the stable is from the last season
$ecurie = null;
foreach ($ecuriesLastSeason as $ecurieLastSeason) {
    if ($ecurieLastSeason->id == $idEcurie) {
        $ecurie = $ecurieLastSeason;
        break;
    }
}

if ($ecurie === null) {
    throw new Exception("L'écurie avec l'ID $idEcurie n'appartient pas à la dernière saison.");
}

$noomEcurie = $ecurie->nom;
$couleuurEcurie = $ecurie->couleur;
$dateCreationEcurie = $ecurie->dateCreation;
$localisationEcurie = $ecurie->localisation;
$titresConstructeursEcurie = $ecurie->nbTitresConstructeur;
$coursesDisputeesEcurie = $ecurie->nbCoursesDisputees;
$victoiresEcurie = $ecurie->nbVictoires;
$podiumsEcurie = $ecurie->nbPoduims;
$directeurEcurie = $ecurie->directeur;
$pilotes = $piloteObj->getPilotesByIdEcu($idEcurie);
$idPils = array(); 
$year = 2023; // La dernière saison

$ecurieNom = $ecurie->nom;
$imageSrc = "../ressources/front/images/logo_ecurie_PNG/{$ecurie->id}.png";
$style = '';

if ($ecurieNom === "Alpine" || $ecurieNom === "Aston Martin Aramco" || $ecurieNom === "Alphatauri" || $ecurieNom === "Red Bull Racing" ) {
    $style = 'object-fit: contain; max-height: 300px; margin-top: 20px;';
}

include_once(RACINE . '/controller/front/partials/header_controller.php');
include_once(RACINE . '/view/front/path/ecurie_page.php');
include_once(RACINE . '/view/front/path/partials/footer.php');
?>