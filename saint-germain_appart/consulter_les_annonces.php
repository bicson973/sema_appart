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

    <title>CONSULTER LES ANNONCES</title>
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
    <section class="row p-2">
        <div class="col-md-12 bg-teal">
            <h1 class="text-center text-danger p-4">ANNONCES IMMOBILIERE</h1>
            <p class="lead text-center fw-bold">Consultation de toutes les annonces</p>
            <!-- ======================================== FONCTION PHP : AFFICHAGE COMPLETE DES ANNONCES ======================================= -->
            <?php
                $requete = $pdoENT->query( " SELECT * FROM advert " );
                // debug($requete);

                $nbr_annonces = $requete->rowCount();
                // debug($nbr_annonces);

                echo "<p>Il y a $nbr_annonces annonces dans cette page : </p>";
            ?>
            <!-- PARTIE TABLEAU -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>description</th>
                        <th>zip_code</th>
                        <th>city</th>
                        <th>type</th>
                        <th>price</th>
                        <th>reservation_message</th>
                        <th>consulter une annonce</th>
                    </tr>
                </thead>
                <tbody>
				    <!-- ======================================== FONCTION PHP : LIEN ANNONCE VERS UNE AUTRE PAGE ======================================= -->
                    <?php while ( $affichage = $requete->fetch( PDO::FETCH_ASSOC )) { ?>
                        <tr>
                            <td><?php echo $affichage['id']; ?></td>                   
                            <td><?php echo $affichage['title']; ?></td>
                            <td><?php echo $affichage['description']; ?></td>
                            <td><?php echo $affichage['zip_code']; ?></td>
                            <td><?php echo $affichage['city']; ?></td>
                            <td><?php echo $affichage['type']; ?></td>
                            <td><?php echo $affichage['price']; ?></td>
                            <td><?php echo $affichage['reservation_message']; ?></td>
                            <td><a href="annonce.php?id=<?php echo $affichage['id']; ?>" target="_blank">Annonce</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- FIN PARTIE TABLEAU -->
        </div>
        <!-- FIN COL -->
    </section>
    <!-- FIN SECTION -->
</body>
</html>

