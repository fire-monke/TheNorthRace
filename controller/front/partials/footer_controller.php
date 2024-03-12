<?php

require_once(RACINE . '/model/back/class_ecurie.php');
$Ecurie = new Ecurie();
$ecuriesLastSeason = $Ecurie->getEcuriesLastSeason();

include_once(RACINE . '/view/front/path/partials/header.php');