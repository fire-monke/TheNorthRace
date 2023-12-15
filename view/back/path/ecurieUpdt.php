<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../ressources/back/css/PiloteUpdt.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/app.js"></script>
</head>

<body>

    
    <div class="update">
        <h1>MODIFICATION <span>Ecurie</span></h1>
        <form action="../../../controler/back/login_controller.php" method="POST" class="load-view-form" enctype="multipart/form-data">
                <input type="text" id="nom" name="nom" placeholder="Nom" required>

                <input type="text" id="couleur" name="couleur" placeholder="Couleur" required>

                <input type="submit" value="Modifier">
        </form>
    </div>
</body>

</html>