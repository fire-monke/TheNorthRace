<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./ressources/front/css/style2.css">
    <link rel="stylesheet" href="./ressources/front/css/global.css">
    <title>TheNorthRace</title>
</head>
<body>
<main>
    <section class="firstSection">
            <div class="wrapper">
                <div class="wrapper2">
            <h3>NEWSLETTER</h3>
        </div>
            <h1>The North <span>Race</span></h1>
            <p>When the drivers hit the all-new Las Vegas street circuit in first practice ahead of next weekend’s Grand Prix, 
            it will be the first time any of them will have sampled the track for real. 
            We asked former Renault F1 racer Jolyon Palmer to explain all…</p>
            <div class="socialMedia">
                <a href=""><img src="./ressources/front/images/whiteInstagram.png" alt="#"></a>
                <a href=""><img src="./ressources/front/images/whiteGitHub.png" alt="#"></a>
                <a href=""><img src="./ressources/front/images/whiteTwitter.png" alt="#"></a>
                <a href=""><img src="./ressources/front/images/whiteLinkedin.png" alt="#"></a>
            </div>
        </div>
    </section>
    <section class="secondSection">
    <nav id="championshipNav">
            <a href="">Pilotes</a>
            <a href="">Constructeurs</a>
            <a href="">Dernière Course</a>
    </nav>

    <div class="podium">
        <div class="bk"></div>
        <div class="second">
            <?php echo '<img src="./ressources/front/images/photo_Pilote_PNG/'. htmlentities($idPil2) . '.png" alt="">' ?>
                <div class="white">
                    <div class="black">
                        <?php echo '<div class="color" style="background-color:'. htmlentities($couleurEcuriePil2) .'"></div>';?>
                        <h2><?php echo htmlentities($prenomPil2) ?></h2>
                        <h1><?php echo htmlentities($nomPil2) ?></h1>
                </div>
            </div>
        </div>
        <div class="first">
        <?php echo '<img src="./ressources/front/images/photo_Pilote_PNG/'. htmlentities($idPil1) . '.png" alt="">' ?>
            <div class="white">
                <div class="black">
                        <?php echo '<div class="color" style="background-color:'. htmlentities($couleurEcuriePil1) .'"></div>';?>
                    <h2><?php echo htmlentities($prenomPil1) ?></h2>
                    <h1><?php echo htmlentities($nomPil1) ?></h1>
                </div>
            </div>
        </div>
        <div class="third">
        <?php echo '<img src="./ressources/front/images/photo_Pilote_PNG/'. htmlentities($idPil3) . '.png" alt="">' ?>
            <div class="white">
                <div class="black">
                        <?php echo '<div class="color" style="background-color:'. htmlentities($couleurEcuriePil3) .'"></div>'; ?>
                    <h2><?php echo htmlentities($prenomPil3) ?></h2>
                    <h1><?php echo htmlentities($nomPil3) ?></h1>
                </div>
            </div>
        </div>
    </div><!-- Closing the podium div -->

    <div class="standing" id="standing-initial">
    <?php
    $cpt=0;
    foreach(array_slice($lesPilotes, 0, 6) as $unPilote)
    {
        $cpt+=1;
        echo '<div class="pilot">';
        echo '<h2>'.$cpt.'</h2>'; 
        echo '<div class="teamcolor" style="background-color:'. htmlentities($unPilote['couleurEcu']) .'"></div>';
        echo '<p>'.htmlentities($unPilote['prenomPil']).' <span>'.htmlentities($unPilote['nomPil']).'</span></p>';
        echo '<h3>'.htmlentities($unPilote['nomEcurie']).'</h3>';
        echo '<p class="points">'.htmlentities($unPilote['nbPointsPil']).'</p>';
        echo '<img name="row" src="./ressources/front/images/greenRow.png" alt="">';
        echo '</div>';
    }?>
    <button id="voir-initial">VOIR TOUS <img name="row" src="./ressources/front/images/whiteRow.png" alt=""></button>
</div>

<div class="standing" id="tous" style="display: none;">
    <?php
    $cpt=0;
    foreach($lesPilotes as $unPilote)
    {
        $cpt+=1;
        echo '<div class="pilot">';
        echo '<h2>'.$cpt.'</h2>'; 
        echo '<div class="teamcolor" style="background-color:'. htmlentities($unPilote['couleurEcu']) .'"></div>';
        echo '<p>'.htmlentities($unPilote['prenomPil']).' <span>'.htmlentities($unPilote['nomPil']).'</span></p>';
        echo '<h3>'.htmlentities($unPilote['nomEcurie']).'</h3>';
        echo '<p class="points">'.htmlentities($unPilote['nbPointsPil']).'</p>';
        echo '<img name="row" src="./ressources/front/images/greenRow.png" alt="">';
        echo '</div>';
    }?>
       <button id="voir-tous">VOIR MOINS <img name="row" src="./ressources/front/images/whiteRow.png" alt=""></button>
</div>

<script>
    //for the buttons
document.addEventListener("DOMContentLoaded", function() {
    var voirInitialBtn = document.getElementById("voir-initial");
    var voirTousBtn = document.getElementById("voir-tous");
    var standingInitial = document.getElementById("standing-initial");
    var tousStanding = document.getElementById("tous");

    var imgElementInitial = voirInitialBtn.querySelector("img");
    var imgElementTous = voirTousBtn.querySelector("img");
    var originalImagePath = imgElementInitial.src;
    var alternativeImagePath = "./ressources/front/images/greenRow.png";

    voirInitialBtn.addEventListener("click", function() {
        standingInitial.style.display = "none";
        tousStanding.style.display = "flex";
        imgElementInitial.src = alternativeImagePath;
    });

    voirTousBtn.addEventListener("click", function() {
        tousStanding.style.display = "none";
        standingInitial.style.display = "flex";
          standingInitial.scrollIntoView(); 
        imgElementTous.src = originalImagePath; 
    });

    voirInitialBtn.addEventListener("mouseover", function() {
        imgElementInitial.src = alternativeImagePath;
    });

    voirInitialBtn.addEventListener("mouseout", function() {
        imgElementInitial.src = originalImagePath;
    });

    voirTousBtn.addEventListener("mouseover", function() {
        imgElementTous.src = alternativeImagePath;
    });

    voirTousBtn.addEventListener("mouseout", function() {
        imgElementTous.src = originalImagePath;
    });
});
</script>
    
</section>
<section class="grandPrix">
    <div class="gpChild">
        <img src="./ressources/front/images/flagMexico.png" alt="">
        <h2>Mexico</h2>
        <h1>29</h1>
        <h3>oct</h3>
    </div><div class="gpChild">
    <img src="./ressources/front/images/flagMexico.png" alt="">
        <h2>Mexico</h2>
        <h1>29</h1>
        <h3>oct</h3>
    </div><div class="gpChild active">
    <img src="./ressources/front/images/flagMexico.png" alt="">
        <h2>Mexico</h2>
        <h1>FORMULA 1 GRAN PREMIO DE LA CIUDAD DE MÉXICO 2023</h1>
        <div class="daysContainer">
            <div class="day" id="friday">
                <h3>FRIDAY</h3>
                <div class="content">
                    <p>20:30 - 21:30</p>
                </div>
            </div>
            <div class="day" id="saturday">
                <h3>SATURDAY</h3>
                <div class="content">
                <p>00:00 - 1:00</p>
                <p>19:30 - 20:30</p>
                <p>23:00 - 20:00</p>
                </div>
            </div>
            <div class="day" id="sunday">
                <h3>SUNDAY</h3>
                <div class="content">
                <p>21:00 - __</p>
                </div>
            </div>
        </div>
    </div>
    <div class="gpChild">
    <img src="./ressources/front/images/flagMexico.png" alt="">
        <h2>Mexico</h2>
        <h1>29</h1>
        <h3>oct</h3>
    </div><div class="gpChild">
        <img src="./ressources/front/images/flagMexico.png" alt="">
        <h2>Mexico</h2>
        <h1>29</h1>
        <h3>oct</h3>
    </div>
    </section>   

</main>
</body>
</html>
