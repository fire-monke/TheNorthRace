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
        <h1>Ajout d'un pilote</h1>

        <form action="./appli/create/pilote" method="POST">
            <label for="nomAdd">Nom</label>
            <input type="text" id="nom" name="nomAdd" placeholder="Nom" value="" required>

            <label for="prenomAdd">Prénom</label>
            <input type="text" id="prenom" name="prenomAdd" placeholder="Prenom" value="" required>

            <label for="paysAdd">Pays</label>
            <input type="text" id="pays" name="paysAdd" placeholder="Pays" value="" required>

            <label for="dateNaisAdd">Date de naissance</label>
            <input type="text" id="dateNais" name="dateNaisAdd" placeholder="Date de naissance (AAAA-MM-JJ)" value="" required>

            <div class="button-container">
                <input name=submit type="submit" value="Ajouter">
                <a href="./appli&type=pilote" class="submit">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>