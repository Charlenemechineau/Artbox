<?php require 'header.php'; ?> 
<!-- Cette ligne inclut le fichier 'header.php'. 
     Cela permet de réutiliser l'en-tête de la page (comme le menu de navigation, le titre, etc.) sur cette page. -->

<form action="traitement.php" method="POST">
    <!-- Le formulaire envoie les données à 'traitement.php' via la méthode POST. -->
    <div class="champ-formulaire">
        <!-- Un conteneur pour chaque champ de formulaire, avec la classe CSS 'champ-formulaire' -->
        
        <label for="titre">Titre de l'œuvre</label>
        <!-- Label pour le champ 'titre'. Le 'for' permet de lier ce label à l'élément 'input' correspondant -->
        <input type="text" name="titre" id="titre">
        <!-- Champ de saisie pour le titre de l'œuvre. 'name' sert à identifier les données envoyées (ici 'titre'). -->
    </div>

    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre</label>
        <!-- Label pour le champ 'artiste' -->
        <input type="text" name="artiste" id="artiste">
        <!-- Champ de saisie pour l'auteur de l'œuvre -->
    </div>

    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <!-- Label pour le champ 'image' -->
        <input type="url" name="image" id="image">
        <!-- Champ de saisie pour l'URL de l'image. Le type 'url' permet de valider l'entrée comme une URL. -->
    </div>

    <div class="champ-formulaire">
        <label for="description">Description</label>
        <!-- Label pour le champ 'description' -->
        <textarea name="description" id="description"></textarea>
        <!-- Champ de saisie pour la description de l'œuvre. 'textarea' permet d'avoir plusieurs lignes de texte. -->
    </div>

    <input type="submit" value="Valider" name="submit">
    <!-- Bouton de soumission du formulaire. Quand l'utilisateur clique sur ce bouton, les données sont envoyées à 'traitement.php'. -->
</form>

<?php require 'footer.php'; ?>
<!-- Cette ligne inclut le fichier 'footer.php'. 
     Cela permet de réutiliser le pied de page (comme les informations de copyright, liens supplémentaires, etc.) sur cette page. -->