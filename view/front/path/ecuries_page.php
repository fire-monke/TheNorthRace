<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ressources/front/css/ecuries.css">
    <link rel="stylesheet" href="./ressources/front/css/global.css">
</head>
<header>
<?php  include_once(RACINE . '/view/front/path/partials/header.php');?>  
</header>
<body>
    <main>
        <h1 class="title">Ecuries F1 2023</h1>
        <div class="tous">
        <?php foreach ($ecuries as $ecurie): ?>
            <div class="pilote">
                <div class="info">
                    <div class="interinfo">
                        <div class="couleur" style="background-color: <?= $ecurie->couleur; ?>"></div>
                        <h2><?= $ecurie->nom; ?></h2>
                    </div>
                    <img class="imgEcu" src="./ressources/front/images/logo_ecurie_PNG/<?= $ecurie->nom; ?>.png">
                </div>
                <div class="nom-prenom">
                    <?php
                    // Récupérez les pilotes de cette écurie
                    $pilotes = $piloteModel->getPilotesByIdEcu($ecurie->id);
                    foreach ($pilotes as $pilote): ?>
                        <div class="pil">
                            <div class="interpil">
                                <p class="prenomp"><?= $pilote->prenom; ?></p>
                                <h2><?= $pilote->nom; ?></h2>
                            </div>
                            <img class="imgPil"src="./ressources/front/images/photo_Pilote_PNG/<?= $pilote->nom; ?>.png" alt="img du pilote">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="ecurie">
                <div class="voiture"><img src="./ressources/front/images/photo_voiture_PNG/voiture_<?= str_replace(' ', '_', $ecurie->nom); ?>.png" alt="Photo de la voiture" style="margin-top: <?= ($ecurie->nom === 'Alphatauri') ? '25px;' : '10px;'; ?>"></div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </main>
    <script>
        //pour le border hover
        const pilotes = document.querySelectorAll('.pilote');

        pilotes.forEach(pilote => {
            pilote.addEventListener('mouseover', () => {
                const couleurEcu = pilote.querySelector('.couleur').style.backgroundColor;
                pilote.style.borderRight = `2px solid ${couleurEcu}`;
                pilote.style.borderTop = `2px solid ${couleurEcu}`;
            });

            pilote.addEventListener('mouseout', () => {
                pilote.style.borderRight = '2px solid black'; 
                pilote.style.borderTop = '2px solid black';
            });
        });
    </script>
</body>
<?php  include_once(RACINE . '/view/front/path/partials/footer.php');?>  
</html>
