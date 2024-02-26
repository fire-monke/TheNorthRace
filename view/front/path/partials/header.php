<?php
// Inclure le fichier du contrôleur de l'en-tête
include_once(RACINE . '/controller/front//header_controller.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./ressources/front/css/partials/header.css">
    <title>TheNorthRace</title>
</head>
<header>
    <div class="wrapper">
        <img src="./ressources/front/images/LogoTransparent1.png" alt="Logo">
    </div>
    <nav id="headerNav">
        <a href="">Classement</a>
        <a href="/TheNorthRace/pilotes" id="apilotes">Pilotes</a>
        <a href="/TheNorthRace/ecuries" id="aecuries">Ecuries</a>
        <a href="">Archives</a>
    </nav>
    <div class="connection">
        <a href="./connexion">Connexion</a>
        <a href="./inscription">Inscription</a>
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
                <a class="a-f1" href="/TheNorthRace/ecurie/<?php echo $ecurie->id; ?>">
                    <div  class="f1" data-color-ecurie="<?php echo $couleurEcurie; ?>" id="<?php echo $ecurie->id; ?>">
                        <div class="ecuries-background" style="background-color: <?php echo $couleurEcurie; ?>;"></div>
                        <h4><?php echo $nomEcurie; ?></h4>
                        <img class="img-f1" src="./ressources/front/images/photo_voiture_PNG/voiture_<?php echo $nomEcurieSansEspaces; ?>.png" alt="Image écurie <?php echo $ecurie->id; ?>">
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="navSecondary">
        <div class="nav-width nav-content">
            <div class="nav-header">
                <h1>Tous les pilotes &nbsp;<span>></span></h1> 
            </div>
            <div class="nav-list">
                <ul>
                    <?php foreach ($pilotesLastSeason as $pilote): ?>
                        <li>
                            <?php
                            $nomPilote = $pilote->nom;
                            $prenomPilote = $pilote->prenom;

                            $ecuriePilote = $Ecurie->getLastEcurieByIdPilote($pilote->id);
                            if ($ecuriePilote) {
                                $couleurEcurie = $ecuriePilote->couleur;
                            }
                            ?>
                            <p data-color-ecurie="<?php echo $couleurEcurie; ?>">
                                <span class="color-bar-pilot" style="background-color: <?php echo $couleurEcurie; ?>"></span>
                                <?php echo $prenomPilote . ' ' . $nomPilote; ?>
                                <strong class="spe" style="color: <?php echo $couleurEcurie; ?>">></strong>
                            </p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.querySelector('header');
            const headerNav = document.querySelector('#headerNav');
            const navHeight = headerNav.offsetHeight;
            document.querySelector('.hovEcu').style.top = `${navHeight}px`;
            document.querySelector('.navSecondary').style.top = `${navHeight}px`;
        });

        function handleHover(element, targetElement) {
            element.addEventListener('mouseover', () => {
                targetElement.style.display = 'block';
            });

            document.addEventListener('mouseout', (e) => {
                if (!targetElement.contains(e.relatedTarget) && e.target !== element) {
                    targetElement.style.display = 'none';
                }
            });

            targetElement.addEventListener('mouseover', () => {
                targetElement.style.display = 'block';
            });

            targetElement.addEventListener('mouseout', () => {
                targetElement.style.display = 'none';
            });
        }

        const ecurie = document.querySelector('#headerNav #aecuries');
        const hovEcu = document.querySelector('.hovEcu');
        handleHover(ecurie, hovEcu);

        const hovPil = document.querySelector('#headerNav #apilotes');
        const navSecondary = document.querySelector('.navSecondary');
        handleHover(hovPil, navSecondary);

        // Iterate over each element and add event listeners for 'mouseover' and 'mouseout'
        const elements = document.querySelectorAll('[data-color-ecurie]');
        elements.forEach((element) => {
            const originalBorderStyle = element.style.border;

            element.addEventListener('mouseover', () => {
                element.style.borderRight = '1px solid ' + element.getAttribute('data-color-ecurie');
                element.style.borderBottom = '1px solid ' + element.getAttribute('data-color-ecurie');
            });

            element.addEventListener('mouseout', () => {
                element.style.border = originalBorderStyle;
            });
        });
    </script>
</header>
