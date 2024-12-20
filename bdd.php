<?php
 // On utilise l'objet PDO pour se connecter à la base de données.
    // 'mysql:dbname=artbox;host=localhost' veut dire qu'on se connecte à une base de données MySQL
    // appelée 'artbox' qui se trouve sur mon ordinateur (localhost).
    // 'root' est le nom d'utilisateur pour se connecter à la base de données (c'est le nom par défaut en local).
    // Le mot de passe est vide ici (''), car l'utilisateur 'root' n'a pas de mot de passe en local sur wamp.
function connexion() {
   
   $db_name = 'artbox';
   $hostname = 'localhost';
   $username ='root';
   $password = '';

   $monconnecteur_a_ma_base_de_donnees=new PDO ("mysql:dbname=$db_name;host=$hostname",$username,$password);
   return $monconnecteur_a_ma_base_de_donnees; 
}
?>

