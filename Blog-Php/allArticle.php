
<?php 
session_start();
require_once('functions.php');
$articles = getArticles();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Mon Blog</title>
</head>
<body>
<nav class="main-head">  
        <h1><a href="#"><span>G</span>raoully-<span>B</span>log</a></h1>

        <ul>
            <li><a href="accueil.php">Accueil</a></li>

            <li><a href="allArticle.php"> Blog    </a></li>

            <?php if(isset($_SESSION['pseudo'])) { ?>
                <li><a href="compte.php">  Compte </a></li>
                <?php } else { ?>
                <li><a href="connexion.php">  Se connecter </a></li>
                <?php } ?>

            <li><a href="contact.php">  Contact </a></li>

        </ul>

    </nav>
        <h1 class="title_page">Articles</h1>
        <div class="upperline_article"></div>
        
            <?php foreach($articles as $article):?>
                <div class="article">
                    <h2 class="titre_sujet"><?= $article->titresujet?></h2>
                    <p><?=$article->textesujet ?></p>
                    <br /><?=$article->datesujet ?><br />
                    
                    <div class="liresuite"><a href="article.php?id=<?=$article->idsujet ?>">Lire la suite</a></div>
                </div>
            <?php endforeach;?>
        
        
</body>
</html> 