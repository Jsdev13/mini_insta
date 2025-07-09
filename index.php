
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mini Insta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>MINI INSTA !</h1>
<p>Ajoutez une photo !</p>

<section class="formulaire-inscription">
  <form class="formulaire" action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="photo" accept="image/*" required>
    <input type="submit" value="Envoyer">
  </form>
  <br><hr>
  
  <?php
  $dossier = 'uploads/';
  if (is_dir($dossier)) {
    $fichiers = array_diff(scandir($dossier), ['.', '..']);
    foreach ($fichiers as $fichier) {
      $chemin = $dossier . $fichier;
      echo "<img src='$chemin' class='image' style='max-width:200px; margin:10px;' alt='image uploadée'>";
    }
  } else {
    echo "<p>Aucune image pour le moment.</p>";
  }
  ?>
</section>

</body>
</html>

