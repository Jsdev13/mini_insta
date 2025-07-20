
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"> 
  <title>EUJIRO</title> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" href="style.css"> 
</head>
<body>

<h1>MONOCHROME</h1> 
<p>Ajoutez une photo !</p>

<!-- Section contenant le formulaire d'envoi de photo -->
<section class="formulaire-inscription">
  <!-- Formulaire permettant d'envoyer une image au serveur -->
  <form class="formulaire" action="upload.php" method="post" enctype="multipart/form-data">
    
    <!-- Champ texte pour entrer un nom ou une description de l'image -->
    <label for="description">Nom de l’image:</label>
    <input type="text" name="description" id="description" required>

    <!-- Champ pour sélectionner un fichier image à envoyer -->
    <input type="file" name="photo" accept="image/*" required>

    <!-- Bouton pour soumettre le formulaire -->
    <input type="submit" value="Envoyer">
  </form>
  <br><hr> <!-- Saut de ligne suivi d'une ligne horizontale -->
</section>

<!-- Section pour afficher la galerie d'images déjà envoyées -->
<section class="gallery">

<?php
// Dossier où sont stockées les images uploadées
$dossier = 'uploads/';

// Vérifie si le dossier existe
if (is_dir($dossier)) {
    
    // Tente d'ouvrir le dossier
    if ($handle = opendir($dossier)) {
        
        // Parcourt tous les fichiers du dossier, "Tant que readdir($handle) 
        // renvoie quelque chose de différent de false, continue la boucle."
        while (($fichier = readdir($handle)) !== false) {

            // Ignore les entrées spéciales "." et ".."
            if ($fichier !== '.' && $fichier !== '..') {

                // Crée le chemin complet du fichier
                $chemin = $dossier . $fichier;

                // Génère dynamiquement une div pour afficher l'image et son nom
                echo "<div class='image-container'>";
                echo "<img src='$chemin' alt='$fichier' class='image' style='max-width: 250px;'><br>";
                echo "<p class='image-name'>$fichier</p>";
                echo "</div>";
            }
        }
        
        // Ferme le dossier après lecture
        closedir($handle);
    }

} else {
    // Message affiché si le dossier n'existe pas
    echo "<p>Aucune image pour le moment.</p>";
}
?>

</section>

</body>
</html>
