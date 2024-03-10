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
            if(is_array($leClassement) && !empty($leClassement)) {
                $leClassement = $leClassement[0]; 
            }
            if (!empty($leClassement->prenomPilote) && !empty($leClassement->nomPilote)){
                echo htmlentities($leClassement->prenomPilote) ." ". htmlentities($leClassement->nomPilote);
            }
        } catch(Exception $ex){
            echo $ex->GetMessage();
        }?>
        </span></h1>

        <form action="./appli" method="POST">
        <input type="hidden" name="PilotId" value="<?php echo htmlentities($leClassement->idPil) ?>">
        <input type="hidden" name="teamId" value="<?php echo $leClassement->idEcu ?>">
        <input type="hidden" name="year" value="<?php echo $leClassement->annee ?>">

            <label for="placePil">Place du pilote</label>
            <input type="text" id="placePil" name="placePil" placeholder="Place du pilote" value="<?php if (!empty($leClassement->placePil)){ echo htmlentities($leClassement->placePil);}?>" required>
            <label for="newPoints">Points inscrit</label>
            <input type="text" id="newPoints" name="newPoints" placeholder="Points inscrit" value="<?php if (!empty($leClassement->nbPointPil)){echo htmlentities($leClassement->nbPointPil);}?>" required>
     
            <label for="newPilotNumber">Numéro du pilote</label>
            <input type="text" id="newPilotNumber" name="newPilotNumber" placeholder="Numéro du pilote" value="<?php if (!empty($leClassement->numPil)){echo htmlentities($leClassement->numPil);}?>" required>

            <div class="button-container">
                <input name=submit type="submit" value="Modifier">
                <a href="./appli&type=rank" class="submit">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>