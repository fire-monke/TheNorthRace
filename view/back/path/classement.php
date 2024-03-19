<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ressources/back/css/index8.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    function refreshPage() {
        const selectElement = document.getElementById("year-select");
        let selectedYear = selectElement.value;
        let searchParams = new URLSearchParams(window.location.search);
        searchParams.delete('type');
        searchParams.set('year', selectedYear);

        let newUrl = 'appli&type=classement&' + searchParams.toString();
        window.location.href = newUrl;
    }
</script>
</head>
<body>
    <ul class="topbar">
        <li>Place</li>
        <li>Ecurie</li>
        <li>Points</li>
        <li>
        <select name="year" id="year-select" onchange="refreshPage()">
    <?php
    $years = array("2023", "2022", "2021", "2020", "2019", "2018");
    $selectedYear = isset($_GET['year']) ? $_GET['year'] : null;
    foreach ($years as $year) {
        $selected = ($selectedYear === $year) ? "selected" : "";
        echo "<option value=\"$year\" $selected>$year</option>";
    }

    if(!isset($_GET['year']) || (isset($_GET['year']) && !in_array($_GET['year'], $years))) {
        $selectedYear=2023;
    }
    ?>
</select>
        </li>
        <button class="create" data-entity="classement">Ajouter<img src="./ressources/back/images/index/add.svg" alt="#"></button>
    </ul>
    <div id="pilotes-container">
    <?php
        try {
            $Classement = new Classement();
            $Ecurie = new Ecurie();
            $Classements = $Classement->getClassementByYear($selectedYear);
            $position = 0;
            foreach($Classements as $unClassement) {
                $position = $position+1;
                $uneEcurie = $Ecurie-> getEcurieById($unClassement->idEcu);
                echo '<div class="pilot">';
                echo '<h2>'. $position .'</h2>';
                if (!empty($uneEcurie->couleur)){
                    echo '<div style="background:'.$uneEcurie->couleur. ';"></div>';
                }
                if (!empty($uneEcurie->nom)){
                    echo '<p>'. htmlentities($uneEcurie->nom).'</p>';
                }
                if (!empty($unClassement->nbPointEcu)) {
                    echo '<p>'. htmlentities($unClassement->nbPointEcu).'</p>';
                }
                 echo '<button class="updt" data-id="'. htmlentities($unClassement->idEcu) .'" data-year="'. htmlentities($selectedYear) .'" data-entity="classement"><img src="./ressources/back/images/index/edit.png" alt="#"></button>
                <button class="delete" data-id="'. htmlentities($unClassement->idEcu) .'" data-year="'. htmlentities($selectedYear) .'" data-entity="classement"><img src="./ressources/back/images/index/delete.png" alt="#"></button>';
                echo '</div>';} 
            }
            catch (Exception $e) {
                echo "Une erreur est survenue : " . $e->getMessage();
            }
        ?>
    </div>
    
</body>
</html>