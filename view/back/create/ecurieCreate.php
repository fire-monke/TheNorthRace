<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ressources/back/css/create.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>

    
    <div class="insert">
        <h1>Ajout d'une écurie</h1>

        <form action="./appli/create/ecurie" method="POST">
            <input type="text" id="nom" name="nomAdd" placeholder="Nom" value="<?php echo !empty($uneEcurie->nom) ? htmlentities($uneEcurie->nom) : ''; ?>" required>

            <input type="text" id="couleur" name="couleurAdd" placeholder="Couleur" value="<?php echo !empty($uneEcurie->couleur) ? htmlentities($uneEcurie->couleur) : ''; ?>" required>

            <input type="submit" value="Ajouter">

        </form>
        <input type="submit" value="Annuler" onclick="window.location.href='./appli&type=ecurie'">
    </div>
</body>

</html>