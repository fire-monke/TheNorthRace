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
</head>

<body>

    
    <div class="update">
        <h1>MODIFICATION <span>COURSE</span></h1>
        <form action="../../../controler/back/login_controller.php" method="POST">
            <select name="pilote" id="pilote">
                <?php 
                while ($row = $result->fetch()) {
                    $id = $row['idPil'];
                    $name = $row['nom'] + " " + $row['prenom'];
                    echo '<option value="' . htmlentities($id) . '">' . htmlentities($name) . '</option>';
                }
                ?>
            </select>
            <input type="text" id="nom" name="nom" placeholder="Nom" required>
            <input type="text" id="prenom" name="prenom" placeholder="Prenom" required>
            <input type="text" id="pays" name="pays" placeholder="Pays" required>
            <input type="text" id="dateNais" name="dateNais" placeholder="Date Naissance" required>
            <input type="submit" value="Modifier">
        </form>
    </div>
</body>

</html>