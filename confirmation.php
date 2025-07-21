<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="confirmation.css">
    <title>EULJIRO</title>
</head>
<body>
    <h1>EULJIRO MEMORIES</h1>
    <h2>Upload réussi !</h2>

    <?php

    if (isset($_GET['image'])) {
        $nomImage = htmlspecialchars($_GET['image']);
        $cheminImage = 'uploads/' . $nomImage;

        echo "<img src='$cheminImage' style='max-width:300px;'><br>";
        echo "<p>$nomImage</p>";

        // Nom sans extension
        $nomBase = pathinfo($nomImage, PATHINFO_FILENAME);

        // Liste des extensions à chercher
        $extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        foreach ($extensions as $extension) {
            $fichier = "uploads/$nomBase.$extension";

            // Ne pas afficher le fichier déjà montré
            if ($fichier !== $cheminImage && file_exists($fichier)) {
                echo "<img src='$fichier' style='max-width:100px; margin:10px;'><br>";
                echo "<p>$nomBase.$extension</p>";
            }
        }
        
    } else {
        echo "<p>Aucune image reçue</p>";
    }
    ?>

    <p><a href="index.php">← Retour à l'accueil</a></p>
    



</body>
</html>



