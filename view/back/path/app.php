<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="./ressources/back/css/index8.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="navbar">
    <h1>THE NORTH<span>RACE</span></h1>
    <nav>
        <button id="pilote" href="">Pilotes</button>
        <button id="ecurie" href="">Ecuries</button>
        <button id="courses" href="">Courses</button>
        <button id="classement" href="">Classement</button>
    </nav>
    <div class="logout">
        <a class="txt" href="./deconnexion">Se déconnecter</a>
    </div>
    </div>
    <div class="affichage">
        <div class="print-box" id="include-container">
            <?php
                include_once(RACINE . '/view/back/path/' . $pageAInclure);
            ?>
        </div>
    </div>
</body>
</html>
<script>
$(document).ready(function() {
	// Au chargement de la page
	const urlParams = new URLSearchParams(window.location.search);
	const typeEntite = urlParams.get('type');

	// Vérifiez si le type d'entité existe et ajoutez la classe "active" au bouton correspondant
	if (typeEntite) {
		$("#" + typeEntite).addClass("active");
	}
	// Gérez les clics sur les boutons
	$("#pilote").on("click", function() {
		chargerInclude("pilote");
	});

	$("#ecurie").on("click", function() {
		chargerInclude("ecurie");
	});

    $("#courses").on("click", function() {
        chargerInclude("rank");
    });

	$("#classement").on("click", function() {
		chargerInclude("classement");
	});
});

$(document).on("click", ".updt", function() {
    const Id = $(this).data("id");
    const entity = $(this).data("entity");
        $.ajax({
        url: './appli/update/&id=' + Id + '&entity=' + entity,
        type: 'GET',
        success: function(response) {
            console.log(response);

            // Ajoutez une vérification pour traiter la réponse JSON
            if (response.html) {
                // La mise à jour a réussi, vous pouvez effectuer des actions nécessaires ici
                // Par exemple, mettre à jour le contenu HTML sur la page
                $("#include-container").html(response.html);
                console.log('Mise à jour réussie.');
            } else if (response.error) {
                // La mise à jour a échoué, afficher un message d'erreur si nécessaire
                console.error('Erreur lors de la mise à jour: ', response.error);
            } else {
                console.error('Réponse JSON inattendue:', response);
            }
        },
        error: function(xhr, status, error) {
            console.error('Erreur AJAX :', xhr.responseText); // Affiche la réponse du serveur
            console.error('Status :', status); // Affiche le statut de la requête
            console.error('Erreur :', error); // Affiche l'erreur
        }
    });
});

$(document).on("click", ".delete", function() {
    const Id = $(this).data("id");
    const entity = $(this).data("entity");
    $.ajax({
        url: './appli/delete/&id='+ Id + '&entity=' + entity,
        type: 'GET',
        success: function(response) {
            // Recharger la page après le succès de la requête AJAX
            window.location.reload();
        },
        error: function(error) {
            console.error('Erreur AJAX :', error);
        }
    });
});

$(document).on("click", ".create", function() {
    const entity = $(this).data("entity");
    $.ajax({
        url: './appli/create/pilote/&entity=' + entity,
        type: 'GET',
        success: function(response) {
            console.log(response);
            if (response.html) {
                $("body").html(response.html);
                console.log('redirection réussie.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Erreur AJAX :', xhr.responseText); // Affiche la réponse du serveur
            console.error('Status :', status); // Affiche le statut de la requête
            console.error('Erreur :', error); // Affiche l'erreur
        }

    });
});

function chargerInclude(typeEntite) {
	$("nav button").removeClass("active");
	$("#" + typeEntite).addClass("active");
	console.log($("nav button"));
	console.log($("#" + typeEntite));
	$.ajax({
		url: './appli',
		type: "POST",
        data: { type: typeEntite },
		success: function(data) {
			$("#include-container").html(data);
		},
		error: function() {
			alert("Erreur lors du chargement de l'inclusion.");
			console.error('Erreur AJAX :', error);
		}
	});
}
</script>