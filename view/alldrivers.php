<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Drivers</title>
    <link rel="stylesheet" href="../../ressources/alldrivers.css">
</head>

<body>
    <div class="nav-secondary" style="display: block;">
        <div class="ns-wrapper">
            <div class="nav-width">
                <div class="nav-contents">
                    <div class="nav-header">
                        <h1>All Drivers &nbsp;<span style="color: red">></span></h1> 
                    </div>
                    <div class="nav-list">
                        <ul>
                            <?php
                            // Afficher les pilotes avec leurs couleurs associées
                            foreach ($pilotesLastSeason as $pilote) {
                                $nomPilote = $pilote->nom;
                                $prenomPilote = $pilote->prenom;
                                

                                
                                $ecuriePilote = $ecurie->getLastEcurieByIdPilote($pilote->id);

                                if ($ecuriePilote) {
                                    $couleurEcurie = $ecuriePilote->couleur;
                                }
                            
                                // Afficher le nom du pilote et la couleur de l'écurie
                                echo '<li>';
                                echo '<p data-color-ecurie="' . $couleurEcurie . '"><span style="background-color: ' . $couleurEcurie . '; padding: 2px; margin-right: 25px; "></span>' . $prenomPilote . ' ' . $nomPilote . ''.'<strong class="spe">></strong></p>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    <script>
        // Sélectionnez tous les éléments avec l'attribut 'data-color-ecurie'
        const elements = document.querySelectorAll('[data-color-ecurie]');

        // Parcourez chaque élément et ajoutez un gestionnaire d'événements pour 'mouseover'
        elements.forEach((element) => {
            element.addEventListener('mouseover', () => {
                // Changez la couleur de la bordure de l'élément en utilisant l'attribut 'data-color-ecurie'
                element.style.borderColor = element.getAttribute('data-color-ecurie');
            });
            
            // Ajoutez également un gestionnaire d'événements pour 'mouseout' pour réinitialiser la couleur de la bordure
            element.addEventListener('mouseout', () => {
                element.style.borderColor = ''; // Réinitialiser la couleur de la bordure
            });
        });
    </script>
</body>
</html>
