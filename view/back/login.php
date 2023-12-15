<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Admin RustyCar</title>
    <link rel="stylesheet" href="../css/stylelogin.css">
    <link rel="icon" href="../ressource/images/favicon.ico">
=======
    <title>Admin TheNorthRace</title>
    <link rel="stylesheet" href="../../ressources/back/css/stylelogin2.css">
    <link rel="icon" href="../../ressources/logo_ecurie_PNG//Mercedes.png">
>>>>>>> 99faa55c97139b839038561a3d3a37a319ece07f
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="connexion">
        <h1>Bienvenue</h1>
        <p>Veuillez saisir vos coordonnées administrateur</p>
<<<<<<< HEAD
 
        <div class="formulaire">
            <form method="post" action="../controller/login_controller.php">
                
                <?php if (!empty($error)): ?>
                <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>

                <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required><br>
                <input type="password" id="password" name="password" placeholder="Mot de passe" required><br>

=======
        <?php if (!empty($error)): ?>
                <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>
        <div class="formulaire">
            <form method="post" action="../../controler/back/login_controller.php">
                <input type="text" id="identifiant" name="identifiant" placeholder="Nom d'utilisateur" required><br>
                <input type="password" id="password" name="password" placeholder="Mot de passe" required><br>
>>>>>>> 99faa55c97139b839038561a3d3a37a319ece07f
                <input type="submit" id="submit" name="submit" value="Se connecter">
            </form>
        </div>
    </div>
</body>
</html>
