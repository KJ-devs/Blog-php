<?php session_start();
include('functions.php');
    $idreponse=0;
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('location: allArticle.php');
    } else {
        extract($_GET);
        $id  = strip_tags($id);
        $article = getSingleArticle($id);
        $reponse = getAllReponse($id);
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $article->titresujet?></title>
    <?php
    if(isset($_POST['ajouter'])) {
        require_once('connect.php');
        $req = $objPdo->prepare('INSERT INTO reponse (idreponse,idsujet,idredacteur,daterep,textereponse) VALUES (?,?,?,NOW(),?)' );
        $insert = $objPdo->prepare($req);
        $insert->execute(array($idreponse,$id,$_SESSION['idredacteur'],$_POST['commentaire']));
        header("Location: article.php");
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

   

    
    <form action="article.php" method="POST" name ='article' >
         <div class="main-blog">

            <div class="blogarticle">
                <h1><?= $article->titresujet?></h1>
                <div class="textblog">
                    <p><?=$article->textesujet ?></p>
                    <p><?=$article->datesujet ?></p>
                </div>
            </div>

            <div class="blogcommentaire">
                    <h2>Ajouter un commentaire :</h2>
                    <textarea name="commentaire" id="commentaire" cols="80" rows="5"></textarea>
                <div><input type="submit" name="ajouter" value="Ajouter"></div>
            </div>

            <div class="bloglistecommentaire">
            <?php foreach($reponse as $reponses):?>
                <h3><?= $reponses->pseudo?></h3>
                <p><?=$reponses->textereponse ?></p>
                <p> <?=$reponses->daterep ?></p>
            <?php endforeach;?>
                
            </div>
    </div>
    </form>   
    <footer class = "main-foot">
        <p class = "part">En partenariat avec <a href="https://www.univ-lorraine.fr/" target="_blank">Univ-Lorraine</a> !</p>
        <p class="rights">©2021 Graoully-Blog. All Rights Reserved.</p>
    </footer>
</body>
</html>


    