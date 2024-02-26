<?php
include_once(RACINE . '/model/back/class_ecurie.php');
include_once(RACINE . '/model/back/class_pilote.php');
include_once(RACINE . '/model/back/class_coursesAnnee.php');

// Créer une instance de la classe Ecurie
$ecurieObj = new Ecurie();
$CourseObj = new CoursesAnnee();
$piloteObj = new Pilote();

// Supposons que $idEcurie est déjà défini

// Récupérer les écuries de la dernière saison
$ecuriesLastSeason = $ecurieObj->getEcuriesLastSeason();

// Vérifier si l'écurie avec $idEcurie fait partie de la dernière saison
$ecurie = null;
foreach ($ecuriesLastSeason as $ecurieLastSeason) {
    if ($ecurieLastSeason->id == $idEcurie) {
        $ecurie = $ecurieLastSeason;
        break;
    }
}

// Si l'écurie n'appartient pas à la dernière saison, lancer une exception
if ($ecurie === null) {
    throw new Exception("L'écurie avec l'ID $idEcurie n'appartient pas à la dernière saison.");
}

$nomEcurie = $ecurie->nom;
$couleurEcurie = $ecurie->couleur;
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

// Générer le chemin d'accès et le style pour l'image de l'écurie
$ecurieNom = $ecurie->nom;
$imageSrc = "../ressources/front/images/logo_ecurie_PNG/{$ecurieNom}.png";
$style = '';

// Vérifier si le nom de l'écurie est "Alpine"
if ($ecurieNom === "Alpine" || $ecurieNom === "Aston Martin Aramco" || $ecurieNom === "Alphatauri" || $ecurieNom === "Red Bull Racing" ) {
    // Appliquer un style particulier
    $style = 'object-fit: contain; max-height: 300px; margin-top: 20px;';
}

// Inclure la vue
include_once(RACINE . '/view/front/path/partials/header.php');
include_once(RACINE . '/view/front/path/ecurie_page.php');
include_once(RACINE . '/view/front/path/partials/footer.php');
?>
