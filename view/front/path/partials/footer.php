<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./ressources/front/css/partials/footer.css">
    <link rel="stylesheet" href="./ressources/front/css/global.css">
    <footer>
    <section class="images">
    <button class="prev" onclick="prevSlide()">❮</button>
    <div class="carousel">
        <?php foreach ($ecuriesLastSeason as $index => $ecurie): ?>
            <div class="slide">
                <img src="/TheNorthRace/ressources/front/images/logo_ecurie_PNG/<?= $ecurie->nom; ?>.png" alt="<?= $ecurie->nom; ?>" width="auto" height="100 %">
            </div>
        <?php endforeach; ?>
    </div>
    <button class="next" onclick="nextSlide()">❯</button>
</section>
<script>
    let slideIndex = 0;

    function showSlides() {
        const slides = document.querySelectorAll('.slide');
        slides.forEach((slide, index) => {
            if (index === slideIndex) {
                slide.style.display = 'block'; // Afficher la diapositive actuelle
            } else {
                slide.style.display = 'none'; // Masquer les autres diapositives
            }
        });
    }

    function nextSlide() {
        if (slideIndex < <?php echo count($ecuriesLastSeason) - 1; ?>) {
            slideIndex++; // Passer à la diapositive suivante si ce n'est pas la dernière
        }
        showSlides();
    }

    function prevSlide() {
        if (slideIndex > 0) {
            slideIndex--; // Revenir à la diapositive précédente si ce n'est pas la première
        }
        showSlides();
    }

    document.addEventListener('DOMContentLoaded', function() {
        showSlides(); // Appeler showSlides() après que le document ait été chargé
        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');

        prevButton.addEventListener('click', function() {
            prevSlide(); // Appeler prevSlide() lorsque le bouton précédent est cliqué
        });

        nextButton.addEventListener('click', function() {
            nextSlide(); // Appeler nextSlide() lorsque le bouton suivant est cliqué
        });
    });
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
        <p class="TheNorthRace">© 2023  -  TheNorthRace</p>
    </footer>
</html>