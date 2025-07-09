//<?php
//if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
  //  $tmpName = $_FILES['photo']['tmp_name'];
   // $name = basename($_FILES['photo']['name']);
    //$destination = 'uploads/' . $name;

    //if (!is_dir('uploads')) {
      //  mkdir('uploads', 0755, true);
    //}

    //if (move_uploaded_file($tmpName, $destination)) {
        // ✅ Redirection vers une autre page après succès
       // header("Location: confirmation.php");
     //   exit;
   // } else {
    //    echo "Erreur lors de l'envoi de l'image.";
  //  }
//} else {
  //  echo "Aucune image reçue.";
//}

?>


<?php
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
    $tmp = $_FILES['photo']['tmp_name'];
    $nom = basename($_FILES['photo']['name']);
    $dossier = 'uploads/';


    if (!is_dir($dossier)) {
        mkdir($dossier, 0755, true); // Crée le dossier s'il n'existe pas
    }

    $chemin = $dossier . $nom;

    if (move_uploaded_file($tmp, $chemin)) {
        // Redirige vers confirmation.php avec le nom du fichier
        header("Location: confirmation.php?image=" . urlencode($nom));
        echo "<p>Nom du fichier : <strong>$nomImage</strong></p>";
        exit;
    } else {
        echo " Erreur lors du déplacement du fichier.";
    }
} else {
    echo "Aucun fichier reçu ou erreur dans le formulaire.";
}





?>


