<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Upload de fichier</title>
  <link rel="stylesheet" href="../css/upload.css">
</head>
<body>
  <h1>Upload de fichier</h1>
  <form action="../php/upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="envoyer" value="Envoyer">
  </form>
</body>
</html>

<?php
if(isset($_POST['envoyer'])) {
    // Vérifier si le fichier a été téléchargé avec succès
    if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {

        // Obtenir l'extension du fichier
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        // Vérifier si l'extension du fichier est autorisée
        $extensions_non_autorisees = array('js', 'sh', 'exe', 'bat');
        if (in_array($extension, $extensions_non_autorisees)) {
            echo 'L\'extension du fichier n\'est pas autorisée.';
            exit();
        }

        // Déplacer le fichier vers le répertoire de destination
        $destination = '/var/www/html/uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $destination);

        // Afficher un message de succès
        echo 'Le fichier a été téléchargé avec succès.';
    } else {
        // Afficher un message d'erreur
        echo 'Le fichier n\'a pas été téléchargé avec succès.';
    }
}
?>
