
<?php

// Vérifie que le formulaire a bien été soumis et que le fichier est présent
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {

    $extension = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
    $tmp = $_FILES['photo']['tmp_name'];

    // Nom personnalisé basé sur la description
    $nom_personnalise = preg_replace('/[^a-zA-Z0-9_-]/', '_', $_POST['description']);
    $nom_fichier = $nom_personnalise . '.' . $extension;

    // Vérification des extensions autorisées
    $extensions_autorisees = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($extension, $extensions_autorisees)) {
        echo "Extension de fichier non autorisée.";
        exit;
    }

    // Vérifie que le fichier est bien une image
    $check = getimagesize($tmp);
    if ($check === false) {
        echo "Le fichier n'est pas une image valide.";
        exit;
    }

    // Crée le dossier si nécessaire
    $dossier = 'uploads/';
    if (!is_dir($dossier)) {
        mkdir($dossier, 0755, true);
    }

    $chemin = $dossier . $nom_fichier;

    // Déplace le fichier dans le dossier
    if (move_uploaded_file($tmp, $chemin)) {
        header("Location: confirmation.php?image=" . urlencode($nom_fichier));
        exit;
    } else {
        echo "Erreur lors du déplacement du fichier.";
    }

} else {
    echo "Aucun fichier reçu ou erreur lors de l'envoi.";
}
?>




