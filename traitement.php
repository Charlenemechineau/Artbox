<?php 
// var_dump affiche le contenu de $_POST pour voir ce qui a été envoyé par le formulaire
var_dump ($_POST);

// On vérifie si l'un des champs nécessaires est vide ou invalide
if (
    empty($_POST['artiste']) || // Si le champ 'artiste' est vide
    empty($_POST['description']) || // Si le champ 'description' est vide
    empty($_POST['image']) || // Si le champ 'image' est vide
    empty($_POST['titre']) || // Si le champ 'titre' est vide
    strlen($_POST['description']) < 3 || // Si la description fait moins de 3 caractères
    !filter_var($_POST['image'], FILTER_VALIDATE_URL) // Si l'URL de l'image n'est pas valide
) {
    // Si une des conditions ci-dessus est vraie, on renvoie l'utilisateur vers la page 'ajouter.php' avec un message d'erreur
    header('Location: ajouter.php?erreur=true');
    // 'exit' arrête l'exécution du script pour éviter que des actions supplémentaires soient faites
    exit;
} else {
    // Si tout est correct, on sécurise les données envoyées par l'utilisateur avec 'htmlspecialchars'
    // Cela empêche les attaques de type XSS (injection de code malveillant)

    $artiste = htmlspecialchars($_POST['artiste']); // On protège le champ 'artiste'
    $description = htmlspecialchars($_POST['description']); // On protège le champ 'description'
    $image = htmlspecialchars($_POST['image']); // On protège le champ 'image'
    $titre = htmlspecialchars($_POST['titre']); // On protège le champ 'titre'

    // Connexion à la base de données (fichier externe 'bdd.php' qui contient la fonction de connexion)
    require 'bdd.php';
    $bdd = connexion(); // Appel de la fonction de connexion à la base de données

    // Préparation de la requête SQL pour insérer l'œuvre dans la table 'oeuvres'
    $requete = $bdd->prepare('INSERT INTO oeuvres (titre, description, artiste, image) VALUES (?, ?, ?, ?)');
    
    // Exécution de la requête en passant les données sécurisées comme paramètres
    $requete->execute([$artiste, $description, $image, $titre]);

    // Redirection vers la page de l'œuvre créée avec l'ID de l'œuvre récemment insérée
    header('location: oeuvre.php?id=' .$bdd->lastInsertId());
}
?>