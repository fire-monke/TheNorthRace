<?php
require_once('../../model/back/class_ecurie.php');
require_once('../../model/back/class_pilote.php');

// Instancier les objets Pilote et Ecurie
$pilote = new Pilote();
$ecurie = new Ecurie();

// Récupérer la liste des pilotes de la dernière saison
$pilotesLastSeason = $pilote->getPilotesLastSeason();
// Inclure la vue
include('../../view/alldrivers.php');
?>
