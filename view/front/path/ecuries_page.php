<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TheNorthRace/ressources/front/css/ecuries.css">
    <link rel="stylesheet" href="/TheNorthRace/ressources/front/css/global.css">
</head>
<body>
    <main>
        <h1 class="title">Ecuries F1 2023</h1>
        <div class="tous">
        <?php foreach ($ecuries as $ecurie): ?>
            <a class="pilote" href="/TheNorthRace/ecurie/<?= $ecurie->id; ?>">
                <div class="info">
                    <div class="interinfo">
                        <div class="couleur" style="background-color: <?= $ecurie->couleur; ?>"></div>
                        <h2><?= $ecurie->nom; ?></h2>
                    </div>
                    <img class="imgEcu" src="/TheNorthRace/ressources/front/images/logo_ecurie_PNG/<?= $ecurie->id; ?>.png">
                </div>
                <div class="nom-prenom">
                    <?php
                    // get drivers from the stable
                    $pilotes = $piloteModel->getPilotesByIdEcu($ecurie->id);
                    foreach ($pilotes as $pilote): ?>
                        <div class="pil">
                            <div class="interpil">
                                <p class="prenomp"><?= $pilote->prenom; ?></p>
                                <h2><?= $pilote->nom; ?></h2>
                            </div>
                            <img class="imgPil"src="/TheNorthRace/ressources/front/images/photo_Pilote_PNG/<?= $pilote->id; ?>.png" alt="img du pilote">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="ecurie">
                    <div class="voiture"><img src="/TheNorthRace/ressources/front/images/photo_voiture_PNG/<?php echo $ecurie->id; ?>.png" alt="Image voiture <?php echo $nomEcurie ?>" style="margin-top: <?php ($ecurie->nom === 'Alphatauri') ? '25px;' : '10px;'; ?>"></div>
                </div>
            </a>
        <?php endforeach; ?>
        </div>
    </main>
    <script>
        // border hover
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
</html>