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
<?php 
    while ($row = $result->fetch()) {
        $id = $row['idPil'];
        $name = $row['nom'] + " " + $row['prenom'];
        echo '<option value="' . htmlentities($id) . '">' . htmlentities($name) . '</option>';
    }
?>

    <div class="pilot">
        <h2>1</h2>
        <p>Max <span>VERSTAPPEN</span></p>
        <h3>Red Bull Racing</h3> 
        <p class="points">524</p>
        <img name="row "src="./ressources/front/images/greenRow.png" alt="">
    </div>
</body>

</html>