<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../ressources/back/css/EcurieUpdt.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>

    
    <div class="update">
        <h1>MODIFICATION <span>
        <?php
        try {
            require_once "$racine/controler/back/controler.php";
            if (isset($_GET['id'])) {
                $EcurieId = $_GET['id'];
            } else {
                echo "Erreur : ID de l'écurie non spécifié.";
            }
            if (!empty($uneEcurie->nom) && !empty($uneEcurie->couleur)) {
                ?>
                <style>
                    .h1 span {
                        color: #<?php echo htmlentities($uneEcurie->couleur); ?>;
                    }
                </style>
                <?php
                echo htmlentities($uneEcurie->nom);
            }

        } catch (Exception $ex) {
            echo $ex->GetMessage();
        }
        ?>
        </span></h1>

        <form action="../../../controler/back/controler.php" method="POST">
            <input type="hidden" name="EcurieId" value="<?php echo $EcurieId; ?>">
            <input type="text" id="nom" name="nom" placeholder="Nom" value="<?php echo !empty($uneEcurie->nom) ? htmlentities($uneEcurie->nom) : ''; ?>" required>

            <input type="text" id="couleur" name="couleur" placeholder="Couleur" value="<?php echo !empty($uneEcurie->couleur) ? htmlentities($uneEcurie->couleur) : ''; ?>" required>

            <input name=submit type="submit" value="Modifier">
        </form>
    </div>
</body>

</html>
