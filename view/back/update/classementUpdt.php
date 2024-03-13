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
            if (isset($_GET['id'])) {
                $teamId = $_GET['id'];
            } if (isset($_GET['year'])) {
                $year = $_GET['year'];
            } else {
                throw "Erreur : Erreur, non spécifié.";
            }
            if (!empty($unPilote->prenom) && !empty($unPilote->nom)){
                echo htmlentities($unPilote->prenom) ." ". htmlentities($unPilote->nom);
            }

        } catch(Exception $ex){
            echo $ex->GetMessage();
        }?>
        </span></h1>

        <form action="./appli" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="teamId" value="<?php echo $teamId; ?>">
        <label for="year">Année</label>
            <input type="text" id="year" name="year" placeholder="Année" value="<?php  if (!empty($unPilote->nom)){ echo htmlentities($uneCourse->year);}?>" required>

            <label for="teamPlace">Place de l'écurie</label>
            <input type="text" id="teamPlace" name="teamPlace" placeholder="Place de l'écurie" value="<?php if (!empty($unPilote->prenom)){ echo htmlentities($uneCourse->placePil);}?>" required>

            <label for="points">Points inscrit</label>
            <input type="text" id="points" name="points" placeholder="Points inscrit" value="<?php if (!empty($unPilote->paysPil)){echo htmlentities($uneCourse->nbPointPil);}?>" required>

            <div class="button-container">
                <input name=submit type="submit" value="Modifier">
                <a href="./appli&type=classement" class="submit">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>