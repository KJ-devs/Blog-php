<?php
function getUser($email, $pwd) {
    require "connect.php";

$req = $objPdo->prepare('SELECT * FROM redacteur WHERE pseudo = ? OR adressemail = ? AND motdepasse = ?');

    if($req->rowCount() == 1) {
        $redacteur = $req->fetchAll(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION["idredacteur"] = $redacteur[0]["idredacteur"];
        $_SESSION["pseudo"] = $redacteur[0]["pseudo"];
        $_SESSION["nom"] = $redacteur[0]["nom"];
        $_SESSION["prenom"] = $redacteur[0]["prenom"];
        
    } else {
        $stmt = null;
        header("location: ../connexion.php?error=Email ou mot de passe incorrect");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
</body>
</html>