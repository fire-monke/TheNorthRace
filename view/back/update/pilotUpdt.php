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
try{
    require_once(RACINE . '/controller/back/controller.php');
    if (isset($_GET['id'])) {
        $piloteId = $_GET['id'];
    } else {
        echo "Erreur : ID du pilote non spécifié.";
    }
    if (!empty($unPilote->prenom) && !empty($unPilote->nom)){
    echo htmlentities($unPilote->prenom) ." ". htmlentities($unPilote->nom);
    }

}
catch(Exception $ex){
echo $ex->GetMessage();
}?></span></h1>

        <form action="./appli" method="POST">
        <input type="hidden" name="piloteId" value="<?php echo $piloteId; ?>">
                <input type="text" id="nom" name="nom" placeholder="Nom" value="<?php  if (!empty($unPilote->nom)){ echo htmlentities($unPilote->nom);}?>" required>

                <input type="text" id="prenom" name="prenom" placeholder="Prenom" value="<?php if (!empty($unPilote->prenom)){ echo htmlentities($unPilote->prenom);}?>" required>

                <input type="text" id="pays" name="pays" placeholder="Pays" value="<?php if (!empty($unPilote->paysPil)){
                    echo htmlentities($unPilote->paysPil);
                }?>" required>

                <input type="text" id="dateNais" name="dateNais" placeholder="Date de naissance" value="<?php if (!empty($unPilote->dateNais)){
                    echo htmlentities($unPilote->dateNais);
                }?>" required>

                <input name=submit type="submit" value="Modifier">
                <a href="./appli&type=pilote" class="submit">Annuler</a>
        </form>
    </div>
</body>
</html>