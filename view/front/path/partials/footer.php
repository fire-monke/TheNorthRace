<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./ressources/front/css/partials/footer.css">
<link rel="stylesheet" href="./ressources/front/css/global.css">
<footer>
<div class="carousel-container">
    <button id="prev-slide" class="carousel-button" onclick="prevSlide()">❮</button>
    <div class="images-container">
        <div class="images">
            <?php $i = 0; ?>
            <?php foreach ($ecuriesLastSeason as $ecurie): ?>
                <?php if ($i < 5): ?>
                    <a href="/TheNorthRace/ecurie/<?= $ecurie->id; ?>">
                        <img src="/TheNorthRace/ressources/front/images/logo_ecurie_PNG/<?= $ecurie->nom; ?>.png" alt="<?= $ecurie->nom; ?>">
                    </a>
                <?php else: ?>
                    <a href="/TheNorthRace/ecurie/<?= $ecurie->id; ?>">
                            <img class="hidden" src="/TheNorthRace/ressources/front/images/logo_ecurie_PNG/<?= $ecurie->nom; ?>.png" alt="<?= $ecurie->nom; ?>">
                        </a>
                <?php endif; ?>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <button id="next-slide" class="carousel-button" onclick="nextSlide()">❯</button>
</div>

<script>
    let currentSlide = 0;
    const totalSlides = <?= count($ecuriesLastSeason); ?>; 
    const imagesContainer = document.querySelector('.images');

    function nextSlide() {
        if (currentSlide + 5 < totalSlides) {
            currentSlide++;
            updateSlide();
        }
    }

    function prevSlide() {
        if (currentSlide > 0) {
            currentSlide--;
            updateSlide();
        }
    }

    function updateSlide() {
        const images = document.querySelectorAll('.images img');
        images.forEach((img, index) => {
            if (index >= currentSlide && index < currentSlide + 5) {
                img.classList.remove('hidden');
            } else {
                img.classList.add('hidden');
            }
        });
    }

    updateSlide(currentSlide);
</script>
        <section class="banner">
            <div class="content-box">
                <h1>À PROPOS</h1>
                <ul>
                    <li><a href="">Qui sommes nous ?</a></li>
                    <li><a href="">Concept</a></li>
                    <li><a href="">FAQ</a></li>
                </ul>
            </div>
            <div class="content-box">
                <h1>EN SAVOIR PLUS</h1>
                <ul>
                    <li><a href="">Mentions légales</a></li>
                    <li><a href="">Protection des données</a></li>
                    <li><a href="">Cookies</a></li>
                </ul>
            </div>
            <div class="content-box">
                <h1>CLASSEMENT</h1>
                <ul>
                    <li><a href="">Saison actuelle</a></li>
                    <li><a href="">Championnat pilote</a></li>
                    <li><a href="">Championnat constructeur</a></li>
                    <li><a href="">Archive</a></li>
                </ul>
            </div>
        </section>
        <div class="media">
            <a href=""><img src="/TheNorthRace/ressources/front/images/greyInstagram.png" alt="#"></a>
            <a href=""><img src="/TheNorthRace/ressources/front/images/greyGitHub.png" alt="#"></a>
            <a href=""><img src="/TheNorthRace/ressources/front/images/greyTwitter.png" alt="#"></a>
            <a href=""><img src="/TheNorthRace/ressources/front/images/greyLinkedin.png" alt="#"></a>
        </div>
        <p class="TheNorthRace">© 2024  -  TheNorthRace</p>
    </footer>
</html>