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
        <h1>Ajout classement d'un pilote</h1>

        <form action="./appli/create/courses" method="POST" enctype="multipart/form-data">
            <label for="pilotIdAdd">Pilote Id</label>
            <input type="text" id="pilotIdAdd" name="pilotIdAdd" placeholder="Id du pilote" value="" required>

            <label for="yearRaceAdd">Année</label>
            <input type="text" id="yearRaceAdd" name="yearRaceAdd" placeholder="Année de la course" value="" required>

            <label for="teamIdAdd">Ecurie Id</label>
            <input type="text" id="teamIdAdd" name="teamIdAdd" placeholder="Id de l'écurie" value="" required>

            <label for="pointsAdd">Points</label>
            <input type="text" id="pointsAdd" name="pointsAdd" placeholder="Points inscrit" value="" required>

            <label for="pilotPlaceAdd">Place du pilote</label>
            <input type="text" id="pilotPlaceAdd" name="pilotPlaceAdd" placeholder="Place du pilote" value="" required>
            
            <label for="pilotNumberAdd">Numéro du pilote</label>
            <input type="text" id="pilotNumberAdd" name="pilotNumberAdd" placeholder="Numéro de course du pilote" value="" required>

            <div class="button-container">
                <input name=submit type="submit" value="Ajouter">
                <a href="./appli&type=courses" class="submit">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>