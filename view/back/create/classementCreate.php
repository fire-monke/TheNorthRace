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
        <h1>Ajout classement d'une écurie</h1>

        <form action="./appli/create/classement" method="POST">

            <label for="teamIdAdd">Ecurie Id</label>
            <select name="teamIdAdd" class="selected">
            <?php
            foreach($lesEcuries as $uneEcurie){
                echo '<option value="'. $uneEcurie->id .'">'. htmlentities($uneEcurie->nom) .'</option>';
            }
            ?>
            </select>

            <label for="yearAdd">Année</label>
            <input type="number" name="yearAdd" placeholder="Année des courses" value="" min="2018" max="2023" required>

            <label for="pointsAdd">Points</label>
            <input type="number" name="pointsAdd" placeholder="Points inscrit" value=""  min="0" max="1500" required>

            <!-- <label for="teamPlaceAdd">Place</label> -->
            <input type="number" name="teamPlaceAdd" placeholder="Place de l'écurie" value=""  min="1" max="20" hidden>
            
            <div class="button-container">
                <input  name=submit type="submit" value="Ajouter">
                <a href="./appli&type=classement" class="submit">Annuler</a>
            </div>
        </form>
    </div>
</body>

</html>