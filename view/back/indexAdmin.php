<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../view/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="../ressources/css/index.css">
    <link rel="icon" href="./ressource/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="../js/app.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div class="navbar">
    <h1>AD<span>MIN</span></h1>
    <div class="nav-content">
        <a href="./vue/gestion_vehicule.php" class="nav-link load-view">véhicule</a>
        <a href="./vue/gestion_cg.php" class="nav-link load-view">carte grise</a>
        <a href="./vue/gestion_modele.php" class="nav-link load-view">modele</a>
        <a href="./vue/gestion_proprietaire.php" class="nav-link load-view">proprietaire</a>
    </div>
    <div class="logout">
        <div class="lock"></div>
        <a class="txt" href="./controller/logout.php">Se déconnecter</a>
    </div>
    </div>
    <div class="main">
    </div>
    </div>




</body>
</html>
