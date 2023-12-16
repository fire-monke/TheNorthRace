<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../ressources/back/css/PiloteUpdt.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="pilot">
        <h2>1</h2>
        <p>Max <span>VERSTAPPEN</span></p>
        <h3>Red Bull Racing</h3> 
        <p class="points">524</p>
        <img name="row "src="./ressources/front/images/greenRow.png" alt="">
    </div>
<?php
$Pilote = new Pilote();
$lesPilotes = $Pilote->getPilotes();

try{

    echo '<div class="list-pilote-container">';

    $Pilote = new Pilote();
    $lesPilotes = $Pilote->getPilotes();

    $Ecurie = new Ecurie();

    foreach($lesPilotes as $unPilote){

        $uneEcurie = $Ecurie->getLastEcurieByIdPilote($unPilote->id);
        // $couleurEcu = $uneEcurie->couleur;

        echo '<div class="line-pilote-container">';
        if (!empty($unPilote->id)){
        echo '<div class="id-pilote">'. htmlentities($unPilote->id) .'</div>';
        }if (!empty($uneEcurie->couleur)){
            echo '<div class="couleur-ecurie-pilote" style="background-color:'. $uneEcurie->couleur .'"></div>';
        }if (!empty($unPilote->prenom)){
        echo '<div class="pren-pilote">'. htmlentities($unPilote->prenom) .'</div>';
        }if (!empty($unPilote->nom)){
            echo '<div class="nom-pilote">'. htmlentities($unPilote->nom) .'</div>';
        }if (!empty($uneEcurie->nom)){
            echo '<div class="ecurie-pilote">'. htmlentities($uneEcurie->nom) .'</div>';
        }if (!empty($unPilote->annee)){
            echo '<div class="nom-pilote">'. htmlentities($uneEcurie->annee) .'</div>';
        }
        echo '</div>';
        // var_dump($unPilote);
        // var_dump($uneEcurie);
        // var_dump($couleurEcu);
    }
    echo "</div>";

}
catch(Exception $ex){
    echo $ex->GetMessage();
}
?>
</body>

</html>