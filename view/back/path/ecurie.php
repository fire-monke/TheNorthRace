<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ressources/back/css/index8.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<script>
      var ECURIE = true;
      PILOT = false;
</script>
<body>
    <ul class="topbar">
        <li>ID</li>
        <li>Nom</li>
        <button class="create" data-entity="ecurie">Ajouter<img src="./ressources/back/images/index/add.svg" alt="#"></button>
    </ul>
<?php
try{
    require_once(RACINE . '/controller/back/controller.php');
    $Ecurie = new Ecurie();
    $lesEcuries = $Ecurie->getEcuries();
    foreach($lesEcuries as $uneEcurie){
        echo '<div class="pilot">';
        if (!empty($uneEcurie->id)){
        echo '<h2>'. htmlentities($uneEcurie->id) .'</h2>';
        }
        if (!empty($uneEcurie->couleur)){
            echo '<div style="background:'.$uneEcurie->couleur. ';"></div>';
        }
        if (!empty($uneEcurie->nom)){
            echo '<h3>'. htmlentities($uneEcurie->nom) .'</h3>';
        }
        echo '<button class="updt" data-id="'. htmlentities($uneEcurie->id) .'" data-entity="ecurie"><img src="./ressources/back/images/index/edit.png" alt="#"></button>
        <button class="delete" data-id="'. htmlentities($uneEcurie->id) .'" data-entity="ecurie"><img src="./ressources/back/images/index/delete.png" alt="#"></button>';
        echo '</div>';
    }
}
catch(Exception $ex){
    echo $ex->GetMessage();
}
?>

</body>
</html>