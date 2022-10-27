<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Graoully-Blog | Inscription</title>

    <?php 
        $messageErreur= null;
        $count = 0;
       $Ok_inscri = true;
       $id = 0;
        if(isset($_POST['inscription'])) {
            if(empty($_POST['pseudo'])) {
                $messageErreur =$messageErreur."Saisir un pseudo"."<br>";
                $Ok_inscri = false;
                $count = $count+1;
            }
            if(empty($_POST['prenom'])) {
                 $messageErreur =$messageErreur."Saisir un prenom"."<br>";
                 $Ok_inscri = false;
                 $count = $count+1;
            }
            if(empty($_POST['nom'])) {
                 $messageErreur =$messageErreur."Saisir un nom"."<br>";
                $Ok_inscri = false;
                $count = $count+1;
            }
            if(!filter_var($_POST['mail_inscri'],FILTER_VALIDATE_EMAIL)) {
                 $messageErreur = $messageErreur."Veuillez saisir un email correcte"."<br>";
                $Ok_inscri = false;
                $count = $count+1;
            }
            if (empty($_POST['password_inscri'])) {
                 $messageErreur = $messageErreur."Saisir un mot de passe"."<br>";
                $Ok_inscri = false;
                $count = $count+1;
            }
            if(!ctype_alnum($_POST['password_inscri'])) {
                 $messageErreur = $messageErreur."Saisir un mot de passe avec uniquement des caractere et des nombres"."<br>";
                $Ok_inscri = false;
                $count = $count+1;
            }
            if(!strlen($_POST['password_inscri'])>6) {
                 $messageErreur = $messageErreur."Saisir un mot de passe avec minimum 6 caracteres"."<br>";
                $Ok_inscri = false;
                $count = $count+1;
            }
            if (!preg_match('`[A-Z]`',$_POST['password_inscri'])) {
                 $messageErreur = $messageErreur."Saisir aumoins une majuscule dans le mot de passe"."<br>";
                $Ok_inscri = false;
                $count = $count+1;
            }
            if(!preg_match('`[a-z]`',$_POST['password_inscri'])) {
                $messageErreur = $messageErreur."Saisir aumoins une minuscule dans le mot de passe"."<br>";
                $Ok_inscri = false;
                $count = $count+1;
            }
            if(!preg_match('`[0-9]`',$_POST['password_inscri'])) {
                 $messageErreur =  $messageErreur."Saisir aumoins un chiffre dans le mot de passe"."<br>";
                $Ok_inscri = false;
                $count = $count+1;
            }
            if ($Ok_inscri) {
                require_once ('connect.php');
                $req = 'INSERT INTO redacteur (idredacteur,nom,prenom,adressemail,motdepasse,pseudo) VALUES(?,?,?,?,?,?)';
                $insert = $objPdo->prepare($req);
                $insert->execute(array($id,$_POST['nom'],$_POST['prenom'],$_POST['mail_inscri'],$_POST['password_inscri'],$_POST['pseudo']));
            } 
        }       
    ?>

</head>
<body>
    <nav class="main-head">  
        <h1><a href="#"><span>G</span>raoully-<span>B</span>log</a></h1>

        <ul>
            <li><a href="accueil.php">Accueil</a></li>

            <li><a href="blog.php"> Blog    </a></li>

            <?php if(isset($_SESSION['pseudo'])) { ?>
                <li><a href="compte.php">  Compte </a></li>
                <?php } else { ?>
                <li><a href="connexion.php">  Se connecter </a></li>
                <?php } ?>

            <li><a href="contact.php">  Contact </a></li>

        </ul>

    </nav>

    <div class = "inscription-main">
      <div class="sinscire">
        <h1>S'inscrire</h1>
        <p>Vous avez déjà un compte ? <a href="connexion.php">Se connecter</a></p>
      </div>
      <div class="inscription">

        <form action="inscription.php" method="POST" name ='identification'>

          <div class="saisie"><label for="pseudo">Pseudo       </label><input type="text" name="pseudo" id="pseudo" placeholder = "Pseudo" > </div> </br>
          <div class="saisie"><label for="prenom">Prénom       </label><input type="text" name="prenom" id="prenom" placeholder = "Prénom" > </div> </br>
          <div class="saisie"><label for="nom">   Nom          </label><input type="text" name="nom" id="nom" placeholder = "Nom"> </div> </br>
          <div class="saisie"><label for="mel">   Email        </label><input type="text" name="mail_inscri" id="mail_inscri" placeholder = "Email"> </div> </br>
          <div class="saisie"><label for="mdp">   Mot de passe </label><input type="password" name="password_inscri" id="password_inscri" > </div> </br>
          <button type="submit" name="inscription">S'inscrire</button>
          <div><?php if($count == 0){
              echo "";
          } else {echo $messageErreur;} ?></div>
        </form>

      </div>

    </div>

    <footer class = "main-foot">
        <p class = "part">En partenariat avec <a href="https://www.univ-lorraine.fr/" target="_blank">Univ-Lorraine</a> !</p>
        <p class="rights">©2021 Graoully-Blog. All Rights Reserved.</p>
    </footer>
</body>
</html>
