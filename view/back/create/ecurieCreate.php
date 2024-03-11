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

        <form action="./appli/create/ecurie" method="POST" enctype="multipart/form-data">
            <label for="nomAdd">Nom</label>
            <input type="text" name="nomAdd" placeholder="Nom" required>
                        
            <label for="couleur">Couleur HTML</label>
            <input type="text" name="couleurAdd" placeholder="Couleur" value="#" required>
            
            <label for="dateCreation">Année de création</label>
            <input type="number" name="dateCreationAdd" placeholder="Année de création" min="0" max="3000" value="2024">
            
            <label for="localisation">Localisation</label>
            <input type="text" name="localisationAdd" placeholder="Localisation" minlength="0" maxlength="50" value="Inconnue">
            
            <label for="nbTitresConstructeur">Nombre de titres constructeur</label>
            <input type="number" name="nbTitresConstructeurAdd" placeholder="Nombre de titres constructeur" min="0" max="500" >
            
            <label for="nbCoursesDisputees">Nombre de courses disputees</label>
            <input type="number" name="nbCoursesDisputeesAdd" placeholder="Nombre de courses disputees" min="0" max="10000">
            
            <label for="nbVictoires">Nombre de victoires</label>
            <input type="number" name="nbVictoiresAdd" placeholder="Nombre de victoires" min="0" max="10000">
            
            <label for="nbPoduims">Nombre de poduims</label>
            <input type="number" name="nbPoduimsAdd" placeholder="Nombre de poduims" min="0" max="10000">
            
            <label for="directeur">Directeur</label>
            <input type="text" name="directeurAdd" placeholder="Directeur" minlength="0" maxlength="80" value="Inconnu">

            <label for="logoEcurieAdd">Logo de l'écurie</label>
            <input type="file" name="logoEcurieAdd" accept=".jpg, .jpeg, .png">

            <label for="photoVoitureAdd">Photo de la voiture de l'écurie</label>
            <input type="file" name="photoVoitureAdd" accept=".jpg, .jpeg, .png">

            <div class="button-container">
                <input type="submit" value="Ajouter">
                <a href="./appli&type=ecurie" class="submit">Annuler</a>
            </div>
        </form>
    </div>
</body>

</html>