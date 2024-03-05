<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ressources/back/css/form_page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="form_page">
        <h1>MODIFICATION <span>
        <?php
        try {
            if (!empty($uneCourse->prenom) && !empty($uneCourse->nom)){
                echo htmlentities($uneCourse->prenom) ." ". htmlentities($uneCourse->nom);
            }

        } catch(Exception $ex){
            echo $ex->GetMessage();
        }?>
        </span></h1>

        <form action="./appli" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="PilotId" value="<?php echo htmlentities($uneCourse[0]->idPil) ?>">
        <input type="hidden" name="teamId" value="<?php echo $uneCourse->idEcu ?>">
        <input type="hidden" name="year" value="<?php echo $uneCourse->annee ?>">

            <label for="placePil">Place du pilote</label>
            <input type="text" id="placePil" name="placePil" placeholder="Place du pilote" value="<?php if (!empty($uneCourse->placePil)){ echo htmlentities($uneCourse->placePil);}?>" required>
            <?php var_dump($uneCourse); ?>
            <label for="newPoints">Points inscrit</label>
            <input type="text" id="newPoints" name="newPoints" placeholder="Points inscrit" value="<?php if (!empty($uneCourse->nbPointPil)){echo htmlentities($uneCourse->nbPointPil);}?>" required>

            <label for="newPilotNumber">Numéro du pilote</label>
            <input type="text" id="newPilotNumber" name="newPilotNumber" placeholder="Numéro du pilote" value="<?php if (!empty($uneCourse->dateNais)){echo htmlentities($uneCourse->numPil);}?>" required>

            <div class="button-container">
                <input name=submit type="submit" value="Modifier">
                <a href="./appli&type=courses" class="submit">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>