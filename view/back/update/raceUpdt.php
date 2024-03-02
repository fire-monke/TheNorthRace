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
            if (isset($_GET['teamId'])) {
                $teamId = $_GET['teamId'];
            } else {
                throw "Erreur : ID de la team non spécifié.";
            }
            if (!empty($uneCourse->prenom) && !empty($uneCourse->nom)){
                echo htmlentities($uneCourse->prenom) ." ". htmlentities($uneCourse->nom);
            }

        } catch(Exception $ex){
            echo $ex->GetMessage();
        }?>
        </span></h1>

        <form action="./appli" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="piloteId" value="<?php echo $piloteId; ?>">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Nom" value="<?php  if (!empty($unPilote->nom)){ echo htmlentities($unPilote->nom);}?>" required>

            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Prenom" value="<?php if (!empty($unPilote->prenom)){ echo htmlentities($unPilote->prenom);}?>" required>

            <label for="pays">Pays</label>
            <input type="text" id="pays" name="pays" placeholder="Pays" value="<?php if (!empty($unPilote->paysPil)){echo htmlentities($unPilote->paysPil);}?>" required>

            <label for="dateNais">Date de naissance</label>
            <input type="text" id="dateNais" name="dateNais" placeholder="Date de naissance" value="<?php if (!empty($unPilote->dateNais)){echo htmlentities($unPilote->dateNais);}?>" required>
            
            <label for="photoAdd">Photo du pilote</label>
            <input type="file" id="photo" name="photoAdd" accept=".jpg, .jpeg, .png">

            <div class="button-container">
                <input name=submit type="submit" value="Modifier">
                <a href="./appli&type=courses" class="submit">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>