<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ./connexion');
    exit();
}

$pagesEntites = array(
  'pilote' => 'pilote.php',
  'ecurie' => 'ecurie.php',
  'classement' => 'classement.php',
  'courses' => 'rank.php'
);

// Checks if a 'type' parameter is present in the URL, includes the corresponding PHP file from the specified directory,
// and catches any exceptions if the file does not exist, displaying an error message.
if (isset($_POST['type'])) {
    $type = $_POST['type'];
    $pathToFile = RACINE . '/view/back/path/' . $type . '.php';
    try {
        if (file_exists($pathToFile)) {
            include_once($pathToFile);
        } else {
            throw new Exception("Le fichier spécifié n'existe pas.");
        }
    } catch (Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }exit();
}


$typeEntiteAjoutee = isset($_GET['type']) ? htmlentities($_GET['type']) : '';
$pageAInclure = isset($pagesEntites[$typeEntiteAjoutee]) ? $pagesEntites[$typeEntiteAjoutee] : 'pilote.php'; // affiche la page pilote.php par défaut

require_once(RACINE . "/controller/back/controller.php");
require_once(RACINE . "/view/back/path/app.php");