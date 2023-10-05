<?php

// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=cybersecurite', 'root', '');

// Traitement du formulaire
if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['formation'])) {

  // Enregistrement de la commande
  $sql = "INSERT INTO commandes (nom, email, formation) VALUES (?, ?, ?)";
  $stmt = $db->prepare($sql);
  $stmt->execute(array($_POST['nom'], $_POST['email'], $_POST['formation']));

  // Redirection vers la page de confirmation
  header('Location: confirmation.php');
  exit();
}

?>
