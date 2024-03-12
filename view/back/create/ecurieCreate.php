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
        <h1>Ajout d'une écurie</h1>

        <form action="./appli/create/ecurie" method="POST">
            <label for="nomAdd">Nom</label>
            <input type="text" id="nom" name="nomAdd" placeholder="Nom" required>
                        
            <label for="couleur">Couleur HTML</label>
            <input type="text" id="couleur" name="couleurAdd" placeholder="Couleur" value="#" required>
            
            <label for="dateCreation">Année de création</label>
            <input type="number" id="dateCreation" name="dateCreationAdd" placeholder="Année de création" min="0" max="3000" value="2024">
            
            <label for="localisation">Localisation</label>
            <input type="text" id="localisation" name="localisationAdd" placeholder="Localisation" minlength="0" maxlength="50" value="Inconnue">
            
            <label for="nbTitresConstructeur">Nombre de titres constructeur</label>
            <input type="number" id="nbTitresConstructeur" name="nbTitresConstructeurAdd" placeholder="Nombre de titres constructeur" min="0" max="500" >
            
            <label for="nbCoursesDisputees">Nombre de courses disputees</label>
            <input type="number" id="nbCoursesDisputees" name="nbCoursesDisputeesAdd" placeholder="Nombre de courses disputees" min="0" max="10000">
            
            <label for="nbVictoires">Nombre de victoires</label>
            <input type="number" id="nbVictoires" name="nbVictoiresAdd" placeholder="Nombre de victoires" min="0" max="10000">
            
            <label for="nbPoduims">Nombre de poduims</label>
            <input type="number" id="nbPoduims" name="nbPoduimsAdd" placeholder="Nombre de poduims" min="0" max="10000">
            
            <label for="directeur">Directeur</label>
            <input type="text" id="directeur" name="directeurAdd" placeholder="Directeur" minlength="0" maxlength="80" value="Inconnu">

            <div class="button-container">
                <input name=submit type="submit" value="Ajouter">
                <a href="./appli&type=ecurie" class="submit">Annuler</a>
            </div>
        </form>
    </div>
</body>

</html>