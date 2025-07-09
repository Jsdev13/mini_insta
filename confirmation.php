<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="confirmation.css">
    <title>MINI INSTA</title>
</head>
<body>
    <h1>MINI INSTA</h1>
    <h2>Upload réussi !</h2>

    <?php
    if (isset($_GET['image'])) {
        $nomImage = htmlspecialchars($_GET['image']);
      
        echo "<img src='uploads/$nomImage?" . time() . "' alt='Image uploadée' style='max-width: 300px;'>";
    } else {
        echo "<p> Aucune image reçue.</p>";
    }
  
    ?>

    <p><a href="index.php">Retour à l'accueil</a></p>
</body>
</html>
