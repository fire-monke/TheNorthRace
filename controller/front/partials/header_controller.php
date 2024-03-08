<?php

require_once(RACINE . '/model/back/class_pilote.php');
require_once(RACINE . '/model/back/class_ecurie.php');
$Pilote = new Pilote();
$Ecurie = new Ecurie();
$ecuriesLastSeason = $Ecurie->getEcuriesLastSeason();
$pilotesLastSeason = $Pilote->getPilotesLastSeason();

include_once(RACINE . '/view/front/path/partials/header.php');