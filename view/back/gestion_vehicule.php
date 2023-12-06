<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/ajout_prod.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/app.js"></script>
</head>

<body>

    
    <div class="cardajout">
        <h1>AJOUTER UN <span>PRODUIT</span></h1>
        <form action="./vue/ajout_produit.php" method="POST" class="load-view-form" enctype="multipart/form-data">
            <div class="leform">

                <input type="text" id="nom" name="nom" placeholder="Nom du produit" required>

                <input type="text" id="reference" name="reference" placeholder="Référence du produit" required>

                <input type="text" id="txtva" name="txtva" placeholder="Taux de TVA" required>

                <input type="text" id="prix_ht" name="prix_ht" placeholder="Prix (hors taxe)" required>

                <input type="text" id="couleur" name="couleur" placeholder="Couleur du produit (facultatif)"><br>

                <input type="text" id="longueur" name="longueur" placeholder="Longueur en cm (facultatif)"><br>

                <input type="text" id="largeur" name="largeur" placeholder="Largeur en cm (facultatif)"><br>

                <input type="text" id="hauteur" name="hauteur" placeholder="Hauteur en cm (facultatif)" ><br>

                <input type="text" id="poids_net" name="poids_net" placeholder="Poids en gramme (facultatif)"><br>

            </div>

            <div class="bas">
                <div class="description">
                    <textarea id="description" name="description" placeholder="Description du produit" required></textarea>
                </div>
                <div class="reste">

                    <select id="categorie" name="categorie" placeholder="Catégorie" required> <?php
                                                                                                require_once '../connexion.php';
                                                                                                $pdo = connectDB();
                                                                                                $produitModel = new ProduitModel($pdo);
                                                                                                $categories = $produitModel->getCategories();
                                                                                                foreach ($categories as $categorie) {
                                                                                                    echo '<option value="' . $categorie['id'] . '">' . $categorie['nom'] . '</option>';
                                                                                                }
                                                                                                ?>
                    </select><br>

                    <div class="image">
                        <label for="photo">Image du produit</label>
                        <input type="file" id="photo" name="photo" required>
                    </div>
                    <div class="case">

                        <div class="checkbox">
                            <label for="disponibilite">Le produit est disponible</label>
                            <input type="checkbox" id="disponibilite" name="disponibilite"><br>
                        </div>
                    

                        <div class="checkbox">
                            <label for="made_in_france">Le produit est "made in france" </label>
                            <input type="checkbox" id="made_in_france" name="made_in_france"><br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="boutton">
                <input type="submit" value="Ajouter le produit">
            </div>

        </form>
    </div>
</body>

</html>