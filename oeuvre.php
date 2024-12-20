<?php
    require 'header.php';
    require 'bdd.php'; // Inclusion du fichier pour se connecter à la base de données.//
    $bdd = connexion(); // Appel de la fonction connexion() pour établir la connexion à la base de données.//



    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if(empty($_GET['id'])) {
        header('Location: index.php');
    }
    
    $requete = $bdd->prepare('SELECT * FROM oeuvres WHERE ID = ?'); // Préparation de la requête SQL pour récupérer les informations de l'œuvre correspondant à l'ID donné dans l'URL.//
    $requete->execute([$_GET['id']]); // Exécution de la requête avec l'ID récupéré depuis l'URL. L'ID est transmis de manière sécurisée pour éviter les injections SQL.//
    $oeuvre = $requete->fetch(); // Récupération de la première ligne trouvée dans la base de données (l'œuvre correspondante).//

   
    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if(is_null($oeuvre)) {
        header('Location: index.php');
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
