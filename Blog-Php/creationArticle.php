<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Creation Article</title>
    <?php
     $id = 0;
     $check = true;
     if (isset($_POST['creer'])) {
        if (empty($_POST['titre'])) {
            $check = false;
        } else 
        if (empty($_POST['article'])) {
            $check = false;
        }
        if($check) {
            require_once('connect.php');
            $req = 'INSERT INTO sujet (idsujet,idredacteur,titresujet,textesujet,datesujet) VALUES(?,?,?,?,NOW())';
            $insert = $objPdo->prepare($req);
            $insert->execute(array($id,(int)$_SESSION['idredacteur'],$_POST['titre'],$_POST['article']));
            header("Location: allArticle.php");
        }
    }
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
    <div class="creerblog-main">

<div class="creerblog">
    <h1>Créer votre blog !</h1>

    <form action="creationArticle.php" method="post">

        <div class="champs_creerArticle">
            <div><input class="titreblog" type="text" name="titre" id="titre" placeholder ="Titre" size = "25"></div>
            <div><textarea name="article" id="article" cols="100" rows="20" s placeholder = "Votre texte"></textarea></div>
            <div><input class="buttoncree" type="submit" name="creer" value="Créer"></div>

        </div>

    </form>
</div>
</div>

</body>
</html>