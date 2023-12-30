<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="../../../ressources/back/css/index8.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="../../../js/back/app.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>
    

    <div class="navbar">
    <h1>THE NORTH<span>RACE</span></h1>
    <nav>
        <button id="pilotes" href="">Pilotes</button>
        <button id="ecuries" href="">Ecuries</button>
        <button id="courses" href="">Courses</button>
        <button id="classement" href="">Classement</button>
    </nav>
    <script>
  var PILOT = true;
  $("#pilotes").on("click", function() {
    chargerInclude("./pilote.php");
  });

  $("#ecuries").on("click", function() {
    chargerInclude("../update/ecurieUpdt.php");
  });
  $("#courses").on("click", function() {
    chargerInclude("../update/courseUpdt.php");
  });

  $("#classement").on("click", function() {
    chargerInclude("../update/classementUpdt.php");
  });

  $(document).on("click", ".updt", function() {
    var piloteId = $(this).data("id");
    if (PILOT) {
    chargerInclude("../../../controler/back/controler.php?id=" + piloteId);
  }
  });



  // Fonction pour charger l'include avec AJAX
  function chargerInclude(url) {
    $.ajax({
      url: url,
      type: "GET",
      success: function(data) {
        $("#include-container").html(data);
      },
      error: function() {
        alert("Erreur lors du chargement de l'inclusion.");
      }
    });
  }
</script>
    <div class="logout">
        <a class="txt" href="../../../controler/back/logout.php">Se déconnecter</a>
    </div>
    </div>
    <div class="affichage">
        <div class="print-box" id="include-container">
            <?php 
                include_once(RACINE .'/view/back/path/pilote.php');
            ?>
        </div>
    </div>
    
</body>
</html>
