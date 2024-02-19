<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ressources/front/css/pilotes.css">
</head>
<body>
   <main>
    <h1 style="font-size: 60px;">Pilotes F1 2023</h1>
    <div class="top">
        <?php foreach ($pilotes as $pilote): ?>
            <?php 
            // Récupérer l'écurie du pilote
            $ecuriePil = $ecurieController->getEcurieOfLastSeasonOfPiloteByIdPilote($pilote->id);
            ?>
            <div class="pilote">
                <?php foreach ($courseDetails[$pilote->id] as $detail): ?>
                    <div class="infoTop">
                        <p><?= $detail['placePil'] ?></p>
                        <p><?= $detail['nbPointPil'] ?> PTS</p>
                    </div>
                <?php endforeach; ?>
                <div class="infomid">
                    <div class="couleur">
                        <div class="couleur-ecu" style="background-color: <?= $ecuriePil->couleur ?>"></div>
                        <div class="nom-prenom">
                            <p><?= $pilote->prenom ?></p>
                            <h2><?= $pilote->nom ?></h2>
                        </div>
                    </div>
                    <img class="drapeau" src="./ressources/front/images/pays_Pilote_PNG/<?= $pilote->paysPil ?>.png" alt="Drapeau du pays du pilote" width="50px" height="30px">
                </div>
                <div class="ecurie">
                    <div class="info-ecurie">
                        <div class="nomEcu">
                            <p style="font-size: 20px;"><?= $ecuriePil->nom ?></p>
                        </div>
                        <?php foreach ($courseDetails[$pilote->id] as $detail): ?>
                            <div class="infoCourse">
                                <div class="num-pilote" style="font-size: 50px;"><?= $detail['numPil'] ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="photo-pilote">
                        <img src="./ressources/front/images/photo_Pilote_PNG/<?= $pilote->nom ?>" alt="Photo du pilote">
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </main>

<script>
    // Ajoutez votre script JavaScript ici
    const pilotes = document.querySelectorAll('.pilote');

    pilotes.forEach(pilote => {
        pilote.addEventListener('mouseover', () => {
            const couleurEcu = pilote.querySelector('.couleur-ecu').style.backgroundColor;
            pilote.style.borderRight = `2px solid ${couleurEcu}`;
            pilote.style.borderTop = `2px solid ${couleurEcu}`;
            
            // Appliquer la couleur de l'écurie au numéro de pilote
            const numPilote = pilote.querySelector('.num-pilote');
            if (numPilote) {
                numPilote.style.color = couleurEcu;
            }
        });

        pilote.addEventListener('mouseout', () => {
            pilote.style.borderRight = '2px solid black'; 
            pilote.style.borderTop = '2px solid black';
            
            // Réinitialiser la couleur du numéro de pilote
            const numPilote = pilote.querySelector('.num-pilote');
            if (numPilote) {
                numPilote.style.color = 'black';
            }
        });
    });
</script>

</body>
</html>
