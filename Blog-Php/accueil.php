<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Graoully-Blog | Accueil</title>
    </head>

    <body>

        <nav class="main-head">  
            <h1><a href="#"><span>G</span>raoully-<span>B</span>log</a></h1>

            <ul>
                <li><a href="accueil.php">Accueil</a></li>

                <li><a href="article.php"> Blog    </a></li>

                <?php if(isset($_SESSION['pseudo'])) { ?>
                <li><a href="compte.php">  Compte </a></li>
                <?php } else { ?>
                <li><a href="connexion.php">  Se connecter </a></li>
                <?php } ?>

                <li><a href="contact.php">  Contact </a></li>

            </ul>

        </nav>

        <div class="bg-accueil bg-accueil-img">
            <h1>Graoully-Blog</h1>
            <p>Parler de ce qui vous passionne, à votre manière.</p>
        </div>

        <div class = "section-blog">
            <div class="upperline"></div>
            <h1>Créez votre propre blog aujourd'hui !</h1>
            <p>Venez parler des sujets qui vous intéresse, et montrez au gens des trucs ouais</p>
            <a href="creationArticle.php">Créer mon blog</a>
        </div>

        <div class="findus findus-bg">
            <h1>Où nous trouver?</h1>
            <p class ="firstpara">IUT de Metz, Ile du Saulcy, BP 10628</p>
            <p class ="lastpara">57045 Metz cedex 01</p>
            <a href="contact.php">Plus d'informations</a>
        </div>

        <footer class = "main-foot">
            <p class = "part">En partenariat avec <a href="https://www.univ-lorraine.fr/" target="_blank">Univ-Lorraine</a> !</p>
            <p class="rights">©2021 Graoully-Blog. All Rights Reserved.</p>
            
        </footer>
        

    </body>
</html>