
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

<section class="formulaire-inscription">
  <form class="formulaire" action="upload.php" method="post" enctype="multipart/form-data">
  

    <label for="description">Nom de l’image:</label>
    <input type="text" name="description" id="description" required>

    <input type="file" name="photo" accept="image/*" required>
    <input type="submit" value="Envoyer">
  </form>
  <br><hr>
</section>

  <?php

  $dossier = 'uploads/';
  
  if (is_dir($dossier)) {
    $fichiers = array_diff(scandir($dossier), ['.', '..']);
    foreach ($fichiers as $fichier) {
    $chemin = $dossier . $fichier;
    
        echo "<div class='image-container'>";
        echo "<img src='$chemin' alt='$fichier' class='image'>";
        echo "<p class='image-name'>$fichier</p>";
        echo "</div>";
    }
    
  } else {
    echo "<p>Aucune image pour le moment.</p>";
  }

  
  ?>

</body>
</html>

