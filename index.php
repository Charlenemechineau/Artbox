<?php
    require 'header.php';
    require 'bdd.php'; // Connexion du fichier à la base de donnée//

    $bdd = connexion (); // Appel de la fonction connexion() pour obtenir un objet PDO//
    $oeuvres = $bdd ->query ('SELECT * FROM oeuvres');// Exécution de la requête SQL pour récupérer toutes les œuvres//
?>
<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
