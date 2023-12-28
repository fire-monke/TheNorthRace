<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../ressources/back/css/index8.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<?php
try{
    require_once("../../../getRacine.php");
    require_once "$racine/controler/back/controler.php";
    $Pilote = new Pilote();
    $lesPilotes = $Pilote->getPilotes();
    $Ecurie = new Ecurie();

    foreach($lesPilotes as $unPilote){
        $uneEcurie = $Ecurie->getLastEcurieByIdPilote($unPilote->id);
        echo '<div class="pilot">';
        if (!empty($unPilote->id)){
        echo '<h2>'. htmlentities($unPilote->id) .'</h2>';
        }
        if (!empty($uneEcurie->couleur)){
            echo '<div style="background:'.$uneEcurie->couleur. ';"></div>';
        }
        if (!empty($unPilote->prenom) && !empty($unPilote->nom)){
        echo '<p>'. htmlentities($unPilote->prenom) . '<span>' . htmlentities($unPilote->nom) . '</span>'.'</p>';
        }
        if (!empty($uneEcurie->nom)){
            echo '<h3>'. htmlentities($uneEcurie->nom) .'</h3>';
        }
        echo '<button class="updt" data-id="'. htmlentities($unPilote->id) .'"><img src="../../../ressources/back/images/index/edit.png" alt="#"></button>
        <button class="delete" data-id="'. htmlentities($unPilote->id) .'"><img src="../../../ressources/back/images/index/delete.png" alt="#"></button>';
        echo '</div>';
    }
}
catch(Exception $ex){
    echo $ex->GetMessage();
}
?>
<script>
    $(document).on("click", ".updt", function() {
        var piloteId = $(this).data("id");
        $.ajax({
            url: '<?php echo $racine?>/controler/back/controler.php?id=' + piloteId, // Le chemin vers votre script PHP
            type: 'GET',
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.error('Erreur AJAX :', error);
            }
        });
    });
</script>

</body>
</html>