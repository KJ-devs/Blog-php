<?php session_start(); 
include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Graoully-Blog | Compte</title>
    <?php 
        $id = $_SESSION['idredacteur'];
        $titles = getTitle($id);
        $compte = getCompte($id);
        
    ?>
    
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

    <div class="main-compte">
        <div class="compte">
            <h1>Compte</h1>

            <div class="information">
                <h2> Vos informations : </h2>
                <p>Pseudo : <?=$compte->pseudo ?></p>
                <p>Nom : <?=$compte->nom ?></p>
                <p>Prénom : <?=$compte->prenom ?></p>
                <p>E-mail : <?=$compte->adressemail ?></p>
            </div>

            <div class="vossujet">
                <h2>Sujets rédigés :</h2>
                <p>Vous avez créez c'est sujets :</p>

                <ul>  
                    <?php foreach ($titles as $title): ?>
                    <li> <a href="article.php?id="<?=$title->idsujet ?>><?=$title->titresujet ?></a></li>
                    <?php endforeach; ?>
                </ul>

            </div>
            <a href="logout.php" class="buttonlog">logout</a>
        </div>
        
    </div>
                    
    <footer class = "main-foot">
        <p class = "part">En partenariat avec <a href="https://www.univ-lorraine.fr/" target="_blank">Univ-Lorraine</a> !</p>
        <p class="rights">©2021 Graoully-Blog. All Rights Reserved.</p>
    </footer>

</body>
</html>