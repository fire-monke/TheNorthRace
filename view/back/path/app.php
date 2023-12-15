<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
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
    <link rel="stylesheet" href="../../../ressources/back/css/index5.css">
    <link rel="icon" href="./ressource/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="../../../js/back/app.js" defer></script>
</head>
<body>

    <div class="navbar">
    <h1>THE NORTH<span>RACE</span></h1>
    <nav>
        <a href="">Pilotes</a>
        <a href="">Ecuries</a>
        <a href="">Courses</a>
        <a href="">Classement</a>
    </nav>
    <div class="logout">
        <a class="txt" href="../../../controler/back/logout.php">Se déconnecter</a>
    </div>
    </div>
    <div class="affichage">
        <div class="print-box">
            <?php include_once("./pilotUpdt.php")?>
        </div>
    </div>
</body>
</html>
