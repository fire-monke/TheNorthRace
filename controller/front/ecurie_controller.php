<?php
include_once(RACINE . '/model/back/class_ecurie.php');
include_once(RACINE . '/model/back/class_pilote.php');
include_once(RACINE . '/model/back/class_coursesAnnee.php');

// Créer une instance de la classe Ecurie
$ecurieObj = new Ecurie();
$CourseObj = new CoursesAnnee();
$piloteObj = new Pilote();
// Vérifier si l'ID de l'écurie est passé dans l'URL
if(isset($_GET['idEcurie'])) {
    // Récupérer l'ID de l'écurie depuis l'URL
    $idEcurie = $_GET['idEcurie'];
} else {
    // Si l'ID de l'écurie n'est pas passé dans l'URL, récupérer le dernier élément de l'URL
    $url = $_SERVER['REQUEST_URI'];
    $segments = explode('/', rtrim($url, '/'));
    $idEcurie = end($segments);

    // Vous pouvez ajouter des vérifications supplémentaires ici si nécessaire
}

// Afficher l'ID récupéré
echo "ID de l'écurie : " . $idEcurie;

$ecurie = $ecurieObj->getEcurieById($idEcurie);
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
$year = 2023;

// Générer le chemin d'accès et le style pour l'image de l'écurie
$ecurieNom = $ecurie->nom;
$imageSrc = "./ressources/front/images/logo_ecurie_PNG/{$ecurieNom}.png";
$style = '';

// Vérifier si le nom de l'écurie est "Alpine"
if ($ecurieNom === "Alpine" || $ecurieNom === "Aston Martin Aramco" ) {
    // Appliquer un style particulier
    $style = 'object-fit: contain; max-height: 200px; margin-top: 20px;';
}


// Inclure la vue
include_once(RACINE . '/view/front/path/ecurie_page.php');
?>
