<?php
// Importez les classes des modèles
require_once(RACINE . '/model/back/class_ecurie.php');
require_once(RACINE . '/model/back/class_pilote.php');

// Instanciez les objets des modèles
$ecurieModel = new Ecurie();
$piloteModel = new Pilote();

// Récupérez les écuries
$ecuries = $ecurieModel->getEcuriesLastSeason();

// Chargez la vue
include_once(RACINE . '/view/front/path/ecuries_page.php');
?>



