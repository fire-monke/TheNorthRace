<?php
require_once(RACINE . '/model/back/class_pilote.php');
require_once(RACINE . '/model/back/class_ecurie.php');
$Pilote = new Pilote();
$Ecurie = new Ecurie();
$ecuries = $Ecurie->getEcuriesLastSeason();
$pilotesLastSeason = $Pilote->getPilotesLastSeason();
$lePodium = $Pilote->getPilotesPodium();

$couleurEcuriePil1 = $Ecurie->getLastEcurieByIdPilote($lePodium[0]->id)->couleur;
$couleurEcuriePil2 = $Ecurie->getLastEcurieByIdPilote($lePodium[1]->id)->couleur;
$couleurEcuriePil3 = $Ecurie->getLastEcurieByIdPilote($lePodium[2]->id)->couleur;

$prenomPil1 = $lePodium[0]->prenom;
$prenomPil2 = $lePodium[1]->prenom;
$prenomPil3 = $lePodium[2]->prenom;

$nomPil1 = $lePodium[0]->nom;
$nomPil2 = $lePodium[1]->nom;
$nomPil3 = $lePodium[2]->nom;

$idPil1 = $lePodium[0]->id;
$idPil2 = $lePodium[1]->id;
$idPil3 = $lePodium[2]->id;

$lesPilotesDB = $Pilote->getPilotesLastSeason();

$lesPilotesClassement = [];

foreach ($lesPilotesDB as $unPilote) {
    $lesPilotesClassement[] = array(
        "idPil" => $unPilote->id,
        "prenomPil" => $unPilote->prenom,
        "nomPil" => $unPilote->nom,
        "nbPointsPil" => $Pilote->getPilotePointsLastSeasonById($unPilote->id)->nbPointPil,
        "nomEcurie" => $Ecurie->getEcurieOfLastSeasonOfPiloteByIdPilote($unPilote->id)->nom,
        "couleurEcu" => $Ecurie->getLastEcurieByIdPilote($unPilote->id)->couleur,
    );
}
include_once(RACINE . '/controller/front/partials/header_controller.php');
include_once(RACINE . '/view/front/path/landing_page.php');
include_once(RACINE . '/view/front/path/partials/footer.php');