<<<<<<< HEAD
$(document).ready(function() {
  // Intercepte le clic sur les liens avec la classe "load-view"
  $('.load-view').click(function(event) {
    event.preventDefault(); // Empêche le comportement par défaut du navigateur

    var url = $(this).attr('href'); // Obtient l'URL de la vue à charger
    // Charge le contenu de la vue dans la classe d'affichage en utilisant une requête AJAX
    $.ajax({
      url: url,
      type: 'GET',
      success: function(response) {
        $('.affichage').html(response); // Insère le contenu de la vue dans la classe d'affichage
      }
    });
  });

  // Intercepte la soumission des formulaires avec la classe "load-view-form"
  $(document).on('submit', '.load-view-form', function(event) {
    event.preventDefault(); // Empêche le comportement par défaut du navigateur

    var url = $(this).attr('action'); // Obtient l'URL de la vue à charger
    var formData = new FormData(this); // Obtient les données du formulaire

    // Envoie les données du formulaire en utilisant une requête AJAX
    $.ajax({
      url: url,
      type: 'POST',
      data: formData,
      processData: false, // Empêche jQuery de traiter les données
      contentType: false, // Empêche jQuery de définir le type de contenu
      success: function(response) {
        $('.affichage').html(response); // Insère le contenu de la vue dans la classe d'affichage
      }
    });
  });
});


const menuLink = document.querySelectorAll('.menu-link')
        const images = document.querySelectorAll('.image-align-left')
        const lesnav = document.querySelectorAll('.lesnav a')
        const dropdownMenus = document.querySelectorAll('.dropdown-menu')
        console.log(images)
        menuLink.forEach((menu,index) => {
            menu.addEventListener('click', function (e) {
                images.forEach(image => {

                })
                images[index].classList.toggle('rotate-image');

                dropdownMenus[index].classList.toggle('active')
                e.preventDefault()

 

            });
        })

        lesnav.forEach(entity => {
            entity.addEventListener("click", (e) => {
                lesnav.forEach(otherEntity => {
                    otherEntity.style.color = "#4E4E4E"
                })
                entity.style.color = "#FDB901"
=======
        const menuLinks = document.querySelectorAll('nav button')
      

        menuLinks.forEach((menuLink,index) => {
          menuLink.addEventListener("click", (e) => {
                menuLinks.forEach(otherEntity => {
                    otherEntity.style.color = "#373737"
                })
                menuLink.style.color = "#1162db"
                
                console.log(menuLink);
>>>>>>> 99faa55c97139b839038561a3d3a37a319ece07f

            })
        })

        


       



