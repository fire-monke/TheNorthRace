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
</head>
<body>
    <ul class="topbar">
        <li>N°</li>
        <li>Place</li>
        <li>Ecurie</li>
        <li>Points</li>
        <li>
            <label for="year-select">Choisir année :</label>
            <select name="year" id="year-select">
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>
        </li>
        <li><button class="create" data-entity="pilote">Ajouter<img src="./ressources/back/images/index/add.svg" alt="#"></button></li>
    </ul>
    <div id="pilotes-container">
    <?php  
    
        try {
         
         
            if(isset($_POST['year'])) {
                $selectedYear = $_POST['year'];
              
             
            } else {$selectedYear=2020;
            
            }
            require_once(RACINE . './controller/back/controller.php');
            $Classement = new Classement();
            $Ecurie = new Ecurie();
            $Classements = $Classement->getClassementByYear($selectedYear);
            foreach($Classements as $unClassement) {
                echo '<div class="pilot">';
                if (!empty($unClassement->placePil)) {
                    echo '<h2>'. htmlentities($unClassement->placePil) .'</h2>';
                }
                // if (!empty($uneEcurie->couleur)) {
                //     echo '<div style="background:'.$uneEcurie->couleur. ';"></div>';
                // }
                if (!empty($unClassement->nbPointPil)) {
                    echo '<p>'. htmlentities($unClassement->nbPointPil).'</p>';
                }
                if (!empty($unClassement->nomEcurie)) {
                    echo '<p>'. htmlentities($unClassement->nomEcurie).'</p>';
                }
                // echo '<button class="updt" data-id="'. htmlentities($unClassement->idEcu) .'" data-year="'. htmlentities($selectedYear) .'" data-entity="classement"><img src="./ressources/back/images/index/edit.png" alt="#"></button>
                // <button class="delete" data-id="'. htmlentities($unClassement->idEcu) .'" data-year="'. htmlentities($selectedYear) .'" data-entity="classement"><img src="./ressources/back/images/index/delete.png" alt="#"></button>';
                echo '</div>';
            } }
            catch (Exception $e) {
                echo "Une erreur est survenue : " . $e->getMessage();
            }
    ?>
</div>

<script>
    $(document).ready(function() {
        $('#year-select').change(function() {
            var selectedYear = $(this).val();
            $.ajax({
                type: 'POST',
                url: './appli',
                data: {  type: typeEntite, year: selectedYear },
                success: function(response) {
                    $('#pilotes-container').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Erreur lors de la requête AJAX : ' + status + ' ' + error);
                }
            });
        });
        $('#year-select').change();
    });
</script>
</body>
</html>