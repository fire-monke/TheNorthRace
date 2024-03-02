<?php
require_once(RACINE . '/model/back/class_ecurie.php');
require_once(RACINE . '/model/back/class_pilote.php');

$ecurieModel = new Ecurie();
$piloteModel = new Pilote();

// Get all the stables
$ecuries = $ecurieModel->getEcuriesLastSeason();

// Load views
include_once(RACINE . '/controller/front/partials/header_controller.php');
include_once(RACINE . '/view/front/path/ecuries_page.php');
include_once(RACINE . '/view/front/path/partials/footer.php');