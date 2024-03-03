<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../ressources/front/css/pilote.css">
    <link rel="stylesheet" href="../ressources/front/css/partials/footer.css">
    <link rel="stylesheet" href="../ressources/front/css/partials/header.css">
    <link rel="stylesheet" href="../ressources/front/css/global.css">
    <title>Page Pilote</title>
</head>
<body>
<h1 class="h1">Détails du Pilote</h1>
<div class="allside">
    <div class="leftside">
        <div class="pic">
            <img src="<?php echo "../ressources/front/images/photo_pilote_PNG/{$iddPilote}.png"; ?>" alt="image pilote">
        </div>
        <div class="numcount">
                <?php if(isset($coursesAnnee) && !empty($coursesAnnee)): ?>
                    <?php foreach ($coursesAnnee as $course): ?>
                        <h2><?php echo $course->numPil; ?></h2>
                        <img class="drapeau" src="../ressources/front/images/pays_Pilote_PNG/<?= $paysPilote ?>.png" alt="Drapeau du pays du pilote" width="55px" height="35px">
                    <?php endforeach; ?>
                <?php endif; ?>
        </div>
        <div class="name">
            <h2><?php echo $prenommPilote; ?></h2>
            <h2><?php echo $nommPilote; ?></h2>
        </div>
    </div>
    <div class="rightside">
    <div class="ecurie-background" style="background-color: <?php echo $couleurrEcurie; ?>;"></div>
        <div class="rightleft">
            <h3>Nom de l'Écurie</h3>
            <h3>Position</h3>
            <h3>Points</h3>
            <h3>Date de Naissance</h3>
            <h3>Âge</h3>
            <h3>Pays de Naissance</h3>
          
         </div>
      <div class="rightright">
            <p><?php echo $nommEcurie; ?></p>
            <p><?php echo isset($coursesAnnee->placePil) ? "{$coursesAnnee[0]['placePil']}" : 'Place non disponible'; ?></p>
            <p><?php echo isset($coursesAnnee->nbPointPil) ? "{$coursesAnnee[0]['nbPointPil']}" : 'Points non disponibles'; ?></p>
            <p><?php echo $dateNaissancePilote ; ?></p>
            <p><?php echo $age ; ?></p>
            <p><?php echo $paysPilote; ?></p>

        </div>
</div>
</div>
</body>
</html>
