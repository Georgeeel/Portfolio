<?php
// la configuration de la connexion à la base de donnees 

//création d'une variable $online(en ligne) avec le type boolean à  true 
$online = false;
if(!$online){
    $host = "localhost";
    $user = "root";
    $password = "";
    $bdd = "portfolio";
} else {
    //à remplir avec les données que vous fournira votre hébergeur
    //le nom du serveur
    $host = "";
    //l'utilisateur
    $user = "";
    //mot de passe
    $password = "";
    //le nom de la bdd
    $bdd = "";
}

//mise en place de la connexion à la bdd
$connexion = mysqli_connect($host,$user,$password,$bdd);
mysqli_query($connexion, "SET NAMES 'utf8'");
//passage des retours de requêtes au format d'encodage UTF-8


