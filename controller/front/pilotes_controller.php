<?php
// Inclure le fichier contenant la définition de la classe Ecurie
require_once(RACINE . '/model/back/class_pilote.php');
require_once(RACINE . '/model/back/class_ecurie.php');
require_once(RACINE . '/model/back/class_coursesAnnee.php');

// Créer une instance de la classe Ecurie
$ecurieController = new Ecurie();
$piloteController = new Pilote();
$coursesAnnee = new CoursesAnnee();
$year = 2023;

// Récupérer les pilotes
$pilotes = $piloteController->getPilotesLastSeason();

// Récupérer les détails de course pour chaque pilote
foreach ($pilotes as $pilote) {
    $courseDetails[$pilote->id] = $coursesAnnee->getCoursesDetailsByPilotAndYear($pilote->id, $year);
}

// Inclure la vue
include_once(RACINE . '/view/front/path/pilotes_page.php');

