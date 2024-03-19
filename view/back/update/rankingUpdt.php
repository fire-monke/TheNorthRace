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
            if(is_array($uneCourse) && !empty($uneCourse)) {
                $uneCourse = $uneCourse[0]; 
            }
            if (!empty($uneCourse->prenomPilote) && !empty($uneCourse->nomPilote)){
                echo htmlentities($uneCourse->prenomPilote) ." ". htmlentities($uneCourse->nomPilote);
            }

        } catch(Exception $ex){
            echo $ex->GetMessage();
        }?>
        </span></h1>

        <form action="./appli" method="POST">
        <input type="hidden" name="PilotId" value="<?php echo $uneCourse->idPil ?>">
        <input type="hidden" name="teamId" value="<?php echo $uneCourse->idEcu ?>">
        <input type="hidden" name="year" value="<?php echo $uneCourse->annee ?>">

            <input type="text" id="placePil" name="placePil" placeholder="Place du pilote" value="<?php if (!empty($uneCourse->placePil)){ echo htmlentities($uneCourse->placePil);}?>" required>
            <label for="newPoints">Points inscrit</label>
            <input type="text" id="newPoints" name="newPoints" placeholder="Points inscrit" value="<?php if (!empty($uneCourse->nbPointPil)){echo htmlentities($uneCourse->nbPointPil);}?>" required>

            <label for="newPilotNumber">Numéro du pilote</label>
            <input type="text" id="newPilotNumber" name="newPilotNumber" placeholder="Numéro du pilote" value="<?php if (!empty($uneCourse->numPil)){echo htmlentities($uneCourse->numPil);}?>" required>

            <div class="button-container">
                <input name=submit type="submit" value="Modifier">
                <a href="./appli&type=rank" class="submit">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>