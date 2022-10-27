<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Graoully-Blog | Connexion</title>
    <?php
    require('connect.php');
    
    if(isset($_POST['connexion'])) {
      $req =('SELECT * FROM redacteur WHERE  adressemail = ? AND motdepasse = ?;');
      $insert = $objPdo->prepare($req);
      $insert->execute(array($_POST['email'],$_POST['password']));
        if($insert->rowCount() > 0) {
          $redacteur = $insert->fetchAll(PDO::FETCH_ASSOC);
          session_start();
          $_SESSION["idredacteur"] = $redacteur[0]["idredacteur"];
          $_SESSION["pseudo"] = $redacteur[0]["pseudo"];
          $_SESSION["nom"] = $redacteur[0]["nom"];
          $_SESSION["prenom"] = $redacteur[0]["prenom"];
        } else {
            $req = null;
            header("location: ../connection.php?error=noresultfound");
            exit();

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

  <div class="connexion-main">

    <div class="se-connecter">
      <h1>Se connecter</h1>
      <p>Vous n'avez pas de compte ? <a href="inscription.php">S'inscrire</a></p>
    </div>

    <div class="connexion">
        <form action="connexion.php" method="POST" name ='val'>

          <div class="emailclass"><input type="text" class="emailinput" placeholder="E-Mail" name="email" id="email"></div>
          <div class="mdpclass"><input type="password" class="mdpinput" placeholder="Mot de passe" name="password" id="password"></div>
          <button type="submit" name="connexion">Se connecter</button>
          
        </form>
      </div>
    </div>
        
    <footer class = "main-foot">
      <p class = "part">En partenariat avec <a href="https://www.univ-lorraine.fr/" target="_blank">Univ-Lorraine</a> !</p>
      <p class="rights">©2021 Graoully-Blog. All Rights Reserved.</p>
    </footer>
        
    </body>
</html>
