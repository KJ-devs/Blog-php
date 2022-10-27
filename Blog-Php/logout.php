<?php 
    session_start();
    unset($_SESSION["idredacteur"]);
    unset($_SESSION["pseudo"]);
    unset($_SESSION["nom"]);
    unset($_SESSION["prenom"]);
    header("Location: connexion.php");
?>