
<?php
if (
    isset($_FILES['photo']) && $_FILES['photo']['error'] === 0 &&
    isset($_POST['description'])
) {
    $tmp = $_FILES['photo']['tmp_name'];

    // Extension du fichier original (.png, .jpg, etc.)
    $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

    // Nom personnalisé (depuis le champ description)
    $nom_personnalise = preg_replace('/[^a-zA-Z0-9_-]/', '_', $_POST['description']);
    $auteur = preg_replace('/[^a-zA-Z0-9_-]/', '_', $_POST['auteur']);
    // On reconstruit le nom final avec l’extension
    $nom_fichier = $nom_personnalise . '.' . $extension;

    $dossier = 'uploads/';
    if (!is_dir($dossier)) {
        mkdir($dossier, 0755, true);
    }

    $chemin = $dossier . $nom_fichier;

    if (move_uploaded_file($tmp, $chemin)) {
        // Redirection avec nom modifié
        header("Location: confirmation.php?image=" . urlencode($nom_fichier));
        exit;
    } else {
        echo "Erreur lors du déplacement du fichier.";
    }
} else {
    echo "Aucun fichier reçu ou description manquante.";
}
?>



