<?php

require_once "$racine/model/back/class_pilote.php";
require_once "$racine/model/back/class_ecurie.php";

$Pilote = new Pilote();
$Ecurie = new Ecurie();

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

include_once("$racine/view/front/path/accueil.php");