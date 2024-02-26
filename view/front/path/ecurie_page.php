<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ressources/front/css/ecurie.css">
    <link rel="stylesheet" href="../ressources/front/css/partials/footer.css">
    <link rel="stylesheet" href="../ressources/front/css/partials/header.css">
    <link rel="stylesheet" href="../ressources/front/css/global.css">
    <title>Écuries</title>
</head>
<body>
   <main>
       <div class="BoqueGauche">
           <img src="<?php echo $imageSrc; ?>" alt="Écurie" class="ecurie-image" style="width: 70%;<?php echo $style; ?>">
          
           
        <div class="trait">
           <div class="ecurie-background" style="background-color: <?php echo $couleurEcurie; ?>;"></div>
                <div class="wrap">
                <div class="interBloqueGaucheG">
                    <h3>Nom de l’écurie</h3>
                    <h3>Date de création</h3>
                    <h3>Localisation</h3>
                    <h3>Titres Constructeurs</h3>
                    <h3>Courses Disputées</h3>
                    <h3>Victoires</h3>
                    <h3>Podiums</h3>
                    <h3>Directeur</h3>
                </div>
                <div class="interBloqueGaucheD">
                    <p><?php echo $nomEcurie; ?></p>
                    <p><?php echo $dateCreationEcurie; ?></p>
                    <p><?php echo $localisationEcurie; ?></p>
                    <p><?php echo $titresConstructeursEcurie; ?></p>
                    <p><?php echo $coursesDisputeesEcurie; ?></p>
                    <p><?php echo $victoiresEcurie; ?></p>
                    <p><?php echo $podiumsEcurie; ?></p>
                    <p><?php echo $directeurEcurie; ?></p>
                </div>
                </div>
        </div>
       </div>
       <div class="BoqueDroite">
          <?php foreach ($pilotes as $pilote) : ?>
            <div class="pilote">
            <div class="imgPil">
                <img src="<?php echo "../ressources/front/images/photo_pilote_PNG/{$pilote->nom}.png"; ?>" alt="Nom de l'image">
            </div>
                <div class="interBloqueDroiteG">
                    <?php
                        $idPil = $pilote->id; 
                        $idPils[] = $idPil;
                        $courseDetails = $CourseObj->getCoursesDetailsByPilotAndYear($idPil, $year);
                    ?>
                    <h2><?php echo $courseDetails[0]['numPil']; ?></h2>
                    <h3><?php echo $pilote->prenom . ' ' . $pilote->nom; ?></h3>
                    <p><?php echo $ecurie->nom; ?></p>
                </div>
            </div>
          <?php endforeach; ?>
       </div>
   </main>
   <div class="photobas"></div>   

</body>
</html>
