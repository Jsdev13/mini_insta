
<?php

if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {

    $extension = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
    $tmp = $_FILES['photo']['tmp_name'];


    // Vérification des extensions autorisées
    $extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($extension, $extensions)) {
        echo "Extension de fichier non autorisée.";
        exit;
    }

    // Nettoyage de la description
    $description = isset($_POST['description']) ? $_POST['description'] : 'sans_description';
    $description_clean = preg_replace('/[^a-zA-Z0-9_-]/', '_', strtolower($description));

    // Ajoute la date au nom du fichier
    $date = date('Y-m-d');
    $nom_fichier = $date . '-' . $description_clean . '.' . $extension;

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





