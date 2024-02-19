<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ressources/front/css/ecuries.css">
</head>
<body>
    <main>
        <h1>Ecuries F1 2023</h1>
        <div class="tous">
        <?php foreach ($ecuries as $ecurie): ?>
            <div class="pilote">
                <div class="info">
                    <div class="interinfo">
                        <div class="couleur" style="background-color: <?= $ecurie->couleur; ?>"></div>
                        <h2><?= $ecurie->nom; ?></h2>
                    </div>
                    <img src="./ressources/front/images/logo_ecurie_PNG/<?= $ecurie->nom; ?>.png" width="<?= (($ecurie->nom === 'Ferrari') ? '100px' : '80px'); ?>" height="60px" style="margin-right:30px;">
                </div>
                <div class="nom-prenom">
                    <?php
                    // Récupérez les pilotes de cette écurie
                    $pilotes = $piloteModel->getPilotesByIdEcu($ecurie->id);
                    foreach ($pilotes as $pilote): ?>
                        <div class="pil">
                            <div class="interpil">
                                <p style="font-size: 20px;"><?= $pilote->prenom; ?></p>
                                <h2><?= $pilote->nom; ?></h2>
                            </div>
                            <img src="./ressources/front/images/photo_Pilote_PNG/<?= $pilote->nom; ?>.png" alt="img du pilote" width="60px" height="55px" style="margin-top:5px; margin-right:10px;">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="ecurie">
                <div class="voiture"><img src="./ressources/front/images/photo_voiture_PNG/voiture_<?= str_replace(' ', '_', $ecurie->nom); ?>.png" alt="Photo de la voiture" width="500px" height="160px" style="margin-top: <?= ($ecurie->nom === 'Alphatauri') ? '50px;' : '10px;'; ?>"></div>
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
                pilote.style.borderRight = `3px solid ${couleurEcu}`;
                pilote.style.borderTop = `3px solid ${couleurEcu}`;
            });

            pilote.addEventListener('mouseout', () => {
                pilote.style.borderRight = '2px solid black'; 
                pilote.style.borderTop = '2px solid black';
            });
        });
    </script>
</body>
</html>
