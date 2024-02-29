<?php
require_once(RACINE . '/model/back/class_pilote.php');
require_once(RACINE . '/model/back/class_ecurie.php');
require_once(RACINE . '/model/back/class_coursesAnnee.php');

$ecurieController = new Ecurie();
$piloteController = new Pilote();
$coursesAnnee = new CoursesAnnee();
$year = 2023;

// Get all drivers
$pilotes = $piloteController->getPilotesLastSeason();

// Récupérer les détails de course pour chaque pilote
foreach ($pilotes as $pilote) {
    $courseDetails[$pilote->id] = $coursesAnnee->getCoursesDetailsByPilotAndYear($pilote->id, $year);
}

// Load views
include_once(RACINE . '/controller/front/partials/header_controller.php');
include_once(RACINE . '/view/front/path/pilotes_page.php');
include_once(RACINE . '/view/front/path/partials/footer.php');