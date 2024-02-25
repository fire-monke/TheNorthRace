<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./ressources/front/css/style2.css">
    <title>TheNorthRace</title>
</head>
<body>
<header>
    <div class="wrapper">
        <img src="./ressources/front/images/LogoTransparent1.png" alt="Logo">
    </div>
  <nav id="headerNav">
        <a href="">Classement</a>
        <a href="./pilotes" id="pilotes">Pilotes</a>
        <a href="./ecuries" id="ecuries">Ecuries</a>
        <a href="">Archives</a>
    </nav>
    <div class="connection">
        <a href="./connexion">Connexion</a>
        <a href="./inscription">Inscription</a>
    </div>
</header>
    
<main>
    <section class="firstSection">
    
    <div class="navSecondary">
        <div class="nav-width nav-content">
            <div class="nav-header">
                <h1>Tous les pilotes &nbsp;<span>></span></h1> 
            </div>
            <div class="nav-list">
                <ul>
                    <?php
                    foreach ($pilotesLastSeason as $pilote) {
                        $nomPilote = $pilote->nom;
                        $prenomPilote = $pilote->prenom;

                        $ecuriePilote = $Ecurie->getLastEcurieByIdPilote($pilote->id);

                        if ($ecuriePilote) {
                            $couleurEcurie = $ecuriePilote->couleur;
                        }

                        // print the pilot name and the color of the stable
                        echo '<li>';
                        echo '<p data-color-ecurie="' . $couleurEcurie . '"><span class="color-bar-pilot" style="background-color: ' . $couleurEcurie . '"></span>' . $prenomPilote . ' ' . $nomPilote . ''.'<strong class="spe" style="color:'. $couleurEcurie .'">></strong></p>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="hovEcu">
        <div class="nav-header">
            <h1>Toutes les écuries &nbsp;<span>></span></h1> 
        </div>
        <div class="nav-list toutes">
            <?php foreach ($ecuries as $ecurie):
                $nomEcurie = $ecurie->nom;
                $couleurEcurie = $ecurie->couleur;
                $nomEcurieSansEspaces = str_replace(' ', '_', $nomEcurie);
            ?>
                <a class="a-f1" href="./ecurie/<?php echo $ecurie->id; ?>">
                    <div  class="ecurie" data-color-ecurie="<?php echo $couleurEcurie; ?>" id="<?php echo $ecurie->id; ?>">
                        <div class="ecurie-background" style="background-color: <?php echo $couleurEcurie; ?>;"></div>
                        <h4><?php echo $nomEcurie; ?></h4>
                        <img class="img-f1" src="./ressources/front/images/photo_voiture_PNG/voiture_<?php echo $nomEcurieSansEspaces; ?>.png" alt="Image écurie <?php echo $ecurie->id; ?>">
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
    // Select the '#ecurie' element in the 'headerNav'
    const ecurie = document.querySelector('#headerNav #ecuries');
    const hovEcu = document.querySelector('.hovEcu');
    const elements = document.querySelectorAll('[data-color-ecurie]');

    // Function to check if the mouse is over or outside 'hovEcu'
    const isMouseOverHovEcu = (e) => {
        return hovEcu.contains(e.relatedTarget) || e.target == ecurie;
    };

    // When hovering over the '#ecurie' element, display the 'hovEcu' div
    ecurie.addEventListener('mouseover', () => {
        hovEcu.style.display = 'block';
    });

    // When leaving the '#ecurie' element or 'hovEcu', hide the 'hovEcu' div
    document.addEventListener('mouseout', (e) => {
        if (!isMouseOverHovEcu(e)) {
            hovEcu.style.display = 'none';
        }
    });

    // When hovering over 'hovEcu', keep it displayed
    hovEcu.addEventListener('mouseover', () => {
        hovEcu.style.display = 'block';
    });

    // When leaving 'hovEcu', hide it
    hovEcu.addEventListener('mouseout', () => {
        hovEcu.style.display = 'none';
    });

    // Iterate over each element and add event listeners for 'mouseover' and 'mouseout'
    elements.forEach((element) => {
        // Save the initial border style to reset it on mouseout
        const originalBorderStyle = element.style.border;

        element.addEventListener('mouseover', () => {
            // Change the color of the right and bottom borders of the element using the 'data-color-ecurie' attribute
            element.style.borderRight = '1px solid ' + element.getAttribute('data-color-ecurie');
            element.style.borderBottom = '1px solid ' + element.getAttribute('data-color-ecurie');
        });

        // Add an event listener for 'mouseout' to reset the borders
        element.addEventListener('mouseout', () => {
            // Reset the border to its initial value
            element.style.border = originalBorderStyle;
        });
    });
</script>

<script>
    // Select the '#pilotes' element in the 'headerNav'
    const pilotes = document.querySelector('#headerNav #pilotes');
    const navSecondary = document.querySelector('.navSecondary');

    // Function to check if the mouse is over or outside 'navSecondary'
    const isMouseOverNavSecondary = (e) => {
        return navSecondary.contains(e.relatedTarget) || e.target == navSecondary || e.target == pilotes;
    };

    // When hovering over the '#pilotes' element, display the 'navSecondary' div
    pilotes.addEventListener('mouseover', () => {
        navSecondary.style.display = 'block';
    });

    // When leaving the '#pilotes' element or 'navSecondary', hide the 'navSecondary' div
    document.addEventListener('mouseout', (e) => {
        if (!isMouseOverNavSecondary(e)) {
            navSecondary.style.display = 'none';
        }
    });

    // When hovering over 'navSecondary', keep it displayed
    navSecondary.addEventListener('mouseover', () => {
        navSecondary.style.display = 'block';
    });

    // When leaving 'navSecondary', hide it
    navSecondary.addEventListener('mouseout', () => {
        navSecondary.style.display = 'none';
    });
</script>




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
            <?php echo '<img src="./ressources/front/images/photo_Pilote_PNG/'. htmlentities($nomPil2) . '.png" alt="">' ?>
                <div class="white">
                    <div class="black">
                        <?php echo '<div class="color" style="background-color:'. htmlentities($couleurEcuriePil2) .'"></div>';?>
                        <h2><?php echo htmlentities($prenomPil2) ?></h2>
                        <h1><?php echo htmlentities($nomPil2) ?></h1>
                </div>
            </div>
        </div>
        <div class="first">
        <?php echo '<img src="./ressources/front/images/photo_Pilote_PNG/'. htmlentities($nomPil1) . '.png" alt="">' ?>
            <div class="white">
                <div class="black">
                        <?php echo '<div class="color" style="background-color:'. htmlentities($couleurEcuriePil1) .'"></div>';?>
                    <h2><?php echo htmlentities($prenomPil1) ?></h2>
                    <h1><?php echo htmlentities($nomPil1) ?></h1>
                </div>
            </div>
        </div>
        <div class="third">
        <?php echo '<img src="./ressources/front/images/photo_Pilote_PNG/'. htmlentities($nomPil3) . '.png" alt="">' ?>
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
    <footer>
    <section class="contact">
        <p>This is a template Figma file, turned into code using Anima. Learn more at AnimaApp.com This is a template Figma file, turned into code using Anima. Learn more at AnimaApp.com</p>
        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="name">
            <input type="text" name="email" id="email" placeholder="email">
            <textarea name="content" id="content" cols="30" rows="10" placeholder="content"></textarea>
            <input type="button" value="Submit">
        </form>
    </section>
    <section class="images">
        <img src="./ressources/front/images/teamRedBull.png" alt="">
        <img src="./ressources/front/images/teamMercedes.png" alt="">
        <img src="./ressources/front/images/teamFerrari.png" alt="">
        <img src="./ressources/front/images/teamMcLaren.png" alt="">
        <img src="./ressources/front/images/teamAston.png" alt="">
    </section>
    <section class="banner">
        <div class="content-box">
            <h1>À PROPOS</h1>
            <ul><li><a href="">Qui sommes nous ?</a></li>
            <li><a href="">Concept</a></li>
            <li><a href="">FAQ</a></li></ul>
        </div>
        <div class="content-box">
            <h1>À EN SAVOIR PLUS</h1>
            <ul><li><a href="">Mentions légales</a></li>
            <li><a href="">Protection des données</a></li>
            <li><a href="">Cookies</a></li></ul>
        </div>
        <div class="content-box">
            <h1>CLASSEMENT</h1>
            <ul><li><a href="">Saison actuelle</a></li>
            <li><a href="">Championnat pilote</a></li>
            <li><a href="">Championnat constructeur</a></li>
            <li><a href="">Archive</a></li></ul>
        </div>
    </section>
    <div class="media">
        <a href=""><img src="./ressources/front/images/greyInstagram.png" alt="#"></a>
        <a href=""><img src="./ressources/front/images/greyGitHub.png" alt="#"></a>
        <a href=""><img src="./ressources/front/images/greyTwitter.png" alt="#"></a>
        <a href=""><img src="./ressources/front/images/greyLinkedin.png" alt="#"></a>
    </div>
    <a class="TheNorthRace" href="">© 2023  -  TheNorthRace</a>
    </footer>
</main>
</body>
</html>
