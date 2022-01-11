<?php require_once '../inc/functions.php'; ?> 
<!-- APPEL DE FONCTION -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="...">
    <!-- La description : phrase qui s'affiche et décrit le site dans un resultat de moteur de recherche utile au référencement naturel -->
    <meta name="keywords" content="...">
    <!-- "Les mots-clefs" utiles pour les moteurs de recherche -->
    <meta name="author" content="Sema">
    <!-- Auteur de la page -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/08c181196a.js" crossorigin="anonymous"></script>
    <!-- Kit Fontawesome icon  -->

    <title>ANNONCE</title>
    <!-- Titre du document qui s'affiche dans la barre de titre du navigateur -->
</head>

<body>
    <!-- =================================== EN-TETE DE PAGE =================================== -->
    <header class="container-fluid bg-light">
        <nav class="navbar navbar-expand-lg navbar-secondary">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item me-3">
                        <a class="nav-link" aria-current="page" href="http://localhost:8888/sema_appart/saint-germain_appart/accueil.php">Accueil</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link active" href="http://localhost:8888/sema_appart/saint-germain_appart/ajouter_annonce.php">Ajouter une annonce</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="http://localhost:8888/sema_appart/saint-germain_appart/consulter_les_annonces.php">Consulter toutes les annonces</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- FIN PARTIE MENU NAVIGUATION -->
    </header>
    <!-- ======================================== FONCTION PHP : CONNEXION A LA BDD ======================================= -->
    <?php
        $pdoENT = new PDO( 'mysql:host=localhost;dbname=cbs_php_inter_sema', 
        /* hôte et nom de la BDD */
        'root', 
        /* le pseudo */
        'root', 
        /* le mdp pour MAC avec MAMP */
        array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
        /* pour afficher les erreurs SQL dans le navigateur */
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
        /* pour définir le charset des échanges avec la BDD */
        ));
        // debug($pdoENT);

        /* debug(get_class_methods($pdoENT)); */
        /* ici nous aurons la liste des méthodes présentes dans l'objet $pdoENT */
    ?>
    <!-- ======================================== FIN PARTIE CONNEXION ======================================= -->
    <section class="row">
        <div class="col-md-8 bg-teal">
            <p class="lead text-center fw-bold pt-4">Consultation de l'annonce</p>
            <!-- ======================================== FONCTION PHP : AFFICHAGE COMPLETE DES ANNONCES ======================================= -->
            <?php
                $requete = $pdoENT->query( " SELECT * FROM advert " );
                // debug($requete);

                $nbr_annonces = $requete->rowCount();
                // debug($nbr_annonces);

                echo "<p>Il y a $nbr_annonces annonces dans cette page : </p>";
                echo "<table class=\"table table-striped\">";
                    echo "<tr>";
                        echo "<th>id</th>";
                        echo "<th>title</th>";
                        echo "<th>description</th>";
                        echo "<th>zip_code</th>";
                        echo "<th>city</th>";
                        echo "<th>type</th>";
                        echo "<th>price</th>";
                        echo "<th>reservation_message</th>";
                    echo "</tr>";
                    while ( $affichage = $requete->fetch(PDO::FETCH_ASSOC) ) {
                        echo "<tr><td> N° " .$affichage['id']. "</td>";
                        echo "<td class=\"text-uppercase\">" .$affichage['title']. "</td>";
                        echo "<td>" .$affichage['description']. "</td>";
                        echo "<td>" .$affichage['zip_code']. "</td>";
                        echo "<td>" .$affichage['city']. "</td>";
                        echo "<td>" .$affichage['type']. "</td>";
                        echo "<td>" .$affichage['price']. "</td>";
                        echo "<td>" .$affichage['reservation_message']. "</td></tr>";
                    }
                echo "</table>";
            ?>
        </div>
        <!-- FIN COL -->
        <div class="col-md-4">
			<!-- form avec action et method > action est vide car nous envoyons les données avec cette même page et POST va envoyer dans la superglobale $_POST -->
			<form action="" method="POST" class="border border-primary p-1">
				<div class="mb-3">
					<label for="message" class="form-label">Réservez</label>
					<textarea name="message" id="message" cols="30" rows="5" class="form-control" required></textarea>
			   </div>
			   <button type="submit" class="btn btn-primary">Je réserve</button>
			</form>
          </div>
          <!-- fin col -->
    </section>
    <!-- FIN SECTION -->
    <!-- ======================================== FIN PARTIE AFFICHAGE ======================================= -->
    
</body>
</html>

