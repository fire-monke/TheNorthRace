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
     
        
        let newUrl = 'appli&type=rank&' + searchParams.toString();
        window.location.href = newUrl;
    }

    
</script>
</head>
<body>
    <ul class="topbar">
        <li>N°</li>
        <li>Place</li>
        <li>Ecurie</li>
        <li>Points</li>
        <li>
            <label for="year-select">Choisir année :</label>
            <select name="year" id="year-select" onchange="refreshPage()">
        <?php
        $years = array("2018", "2019", "2020", "2021");
        $selectedYear = isset($_GET['year']) ? $_GET['year'] : null;
        foreach ($years as $year) {
            $selected = ($selectedYear === $year) ? "selected" : "";
            echo "<option value=\"$year\" $selected>$year</option>";
        }
        if(!isset($_GET['year'])) {
            $selectedYear=2018;
        }
    ?>
</select>
        </li>
        <li><button class="create" data-entity="rank">Ajouter<img src="./ressources/back/images/index/add.svg" alt="#"></button></li>
    </ul>
    <div id="pilotes-container">
        <?php

        try{
        $CourseAnnee = new CoursesAnnee();
        $Ecurie = new Ecurie();
        $Pilote = new Pilote();
        $CoursesAnnee = $CourseAnnee->getAllCoursesByYear($selectedYear);
        foreach($CoursesAnnee as $course){
            $uneEcurie = $Ecurie-> getEcurieById($course->idEcu);
            $unPilote = $Pilote-> getPiloteById($course->idPil);
            echo '<div class="pilot">';
            if (!empty($course->placePil)){
            echo '<h2>'. htmlentities($course->placePil) .'</h2>';
            }
            if (!empty($uneEcurie->couleur)){
                echo '<div style="background:'.$uneEcurie->couleur. ';"></div>';
            }
            if (!empty($course->nbPointPil)){
                echo '<p>'. htmlentities($course->nbPointPil).'</p>';;
            }
            if (!empty($course->numPil)){
            echo '<p>'. htmlentities($course->numPil).'</p>';
            }
            if (!empty($uneEcurie->nom)){
                echo '<p>'. htmlentities($uneEcurie->nom).'</p>';
            }
            if (!empty($unPilote->nom)){
                echo '<p>'. htmlentities($unPilote->nom).'</p>';
            }
            
            echo '<button class="updt" data-id="'. htmlentities($course->idPil) .'"  data-team-id="'. htmlentities($course->idEcu) .'"  data-year="'. htmlentities($selectedYear) .'" data-entity="rank"><img src="./ressources/back/images/index/edit.png" alt="#"></button>
            <button class="delete" data-id="'. htmlentities($course->idPil) .'"  data-team-id="'. htmlentities($course->idEcu) .'"  data-year="'. htmlentities($selectedYear) .'" data-entity="rank"><img src="./ressources/back/images/index/delete.png" alt="#"></button>';
            echo '</div>';}
        }
            catch (Exception $e) {
                echo "Une erreur est survenue : " . $e->getMessage();
            }
        ?>
    </div>

</body>
</html>
