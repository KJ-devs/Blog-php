<?php
function getArticles() {
    require('connect.php');
    $req = $objPdo->prepare('SELECT * FROM sujet ORDER BY idsujet DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    
}
function getSingleArticle($id) {
    require('connect.php');
    $req = $objPdo->prepare('SELECT * FROM sujet WHERE idsujet = ?');
    $req->execute(array($id));
    if($req->rowCount() == 1) {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    } else {
        header('Location: article.php');
    }
}

function getAllReponse($id) {
    require('connect.php');
    $req = $objPdo->prepare('SELECT textereponse,pseudo,daterep FROM reponse,redacteur,sujet WHERE reponse.idredacteur = redacteur.idredacteur AND  sujet.idsujet = reponse.idsujet AND sujet.idsujet = ?');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    
}
function getTitle($id) {
    require('connect.php');
    $req = $objPdo->prepare('SELECT * FROM sujet WHERE idredacteur = ?');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}
function getCompte($id) {
    require('connect.php');
    $req = $objPdo->prepare('SELECT * FROM redacteur WHERE idredacteur = ?');
    $req->execute(array($id));
    if($req->rowCount() == 1) {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    } 
}
