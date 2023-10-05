<?php

// Vérifier si le fichier a été téléchargé avec succès
if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {

    // Obtenir l'extension du fichier
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    // Vérifier si l'extension du fichier est autorisée
    $extensions_autorisees = array('jpg', 'png', 'gif');
    if (!in_array($extension, $extensions_autorisees)) {
        echo 'L\'extension du fichier n\'est pas autorisée.';
        exit();
    }

    // Déplacer le fichier vers le répertoire de destination
    $destination = 'uploads/' . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $destination);

    // Afficher un message de succès
    echo 'Le fichier a été téléchargé avec succès.';
} else {
    // Afficher un message d'erreur
    echo 'Le fichier n\'a pas été téléchargé avec succès.';
}

?>