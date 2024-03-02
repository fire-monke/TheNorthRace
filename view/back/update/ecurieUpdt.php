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
                $EcurieId = $_GET['id'];
            } else {
                throw "Erreur : ID de l'écurie non spécifié.";
            }
            if (!empty($uneEcurie->nom)) {
                echo htmlentities($uneEcurie->nom);
            }

        } catch (Exception $ex) {
            echo $ex->GetMessage();
        }?>
        </span></h1>

        <form action="./appli" method="POST">
            <input type="hidden" name="EcurieId" value="<?php echo $EcurieId; ?>">
            
            <input type="hidden" id="nom" name="nom" placeholder="Nom" value="<?php echo !empty($uneEcurie->nom) ? htmlentities($uneEcurie->nom) : ''; ?>" required>
            
            <label for="couleur">Couleur HTML</label>
            <input type="text" id="couleur" name="couleur" placeholder="Couleur" value="<?php echo !empty($uneEcurie->couleur) ? htmlentities($uneEcurie->couleur) : ''; ?>" required>
            
            <label for="dateCreation">Année de création</label>
            <input type="number" id="dateCreation" name="dateCreation" placeholder="Année de création" min="0" max="3000" value="<?php echo !empty($uneEcurie->dateCreation) ? htmlentities($uneEcurie->dateCreation) : ''; ?>" required>
            
            <label for="localisation">localisation</label>
            <input type="text" id="localisation" name="localisation" placeholder="Localisation" minlength="0" maxlength="50" value="<?php echo !empty($uneEcurie->localisation) ? htmlentities($uneEcurie->localisation) : ''; ?>" required>
            
            <label for="nbTitresConstructeur">Nombre de titres constructeur</label>
            <input type="number" id="nbTitresConstructeur" name="nbTitresConstructeur" placeholder="Nombre de titres constructeur" min="0" max="500" value="<?php echo !empty($uneEcurie->nbTitresConstructeur) ? htmlentities($uneEcurie->nbTitresConstructeur) : '0'; ?>" required>
            
            <label for="nbCoursesDisputees">Nombre de courses disputees</label>
            <input type="number" id="nbCoursesDisputees" name="nbCoursesDisputees" placeholder="Nombre de courses disputees" min="0" max="10000" value="<?php echo !empty($uneEcurie->nbCoursesDisputees) ? htmlentities($uneEcurie->nbCoursesDisputees) : '0'; ?>" required>
            
            <label for="nbVictoires">Nombre de victoires</label>
            <input type="number" id="nbVictoires" name="nbVictoires" placeholder="Nombre de victoires" min="0" max="10000" value="<?php echo !empty($uneEcurie->nbVictoires) ? htmlentities($uneEcurie->nbVictoires) : '0'; ?>" required>
            
            <label for="nbPoduims">Nombre de poduims</label>
            <input type="number" id="nbPoduims" name="nbPoduims" placeholder="Nombre de poduims" min="0" max="10000" value="<?php echo !empty($uneEcurie->nbPoduims) ? htmlentities($uneEcurie->nbPoduims) : '0'; ?>" required>
            
            <label for="directeur">Directeur</label>
            <input type="text" id="directeur" name="directeur" placeholder="Directeur" minlength="0" maxlength="80" value="<?php echo !empty($uneEcurie->directeur) ? htmlentities($uneEcurie->directeur) : ''; ?>" required>

            <div class="button-container">
                <input name=submit type="submit" value="Modifier">
                <a href="./appli&type=ecurie" class="submit">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>