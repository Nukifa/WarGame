<?php
  // Vérifier si l'utilisateur est déjà connecté
  if (isset($_SESSION['user'])) {
    // L'utilisateur est déjà connecté, rediriger vers la page d'accueil
    header('Location: index.php');
    exit;
  }

  function get_user_by_username($username) {
    // Connexion à la base de données
    $db = new PDO('sql:host=localhost;dbname=medical_site;charset=utf8', 'postgres', 'postgres');
  
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Préparez la requête SQL
    $requete = $db->query("SELECT * FROM utilisateurs WHERE login = $login AND password = $password");
    // Exécution de la requête SQL
  
    // Récupération des résultats de la requête
    $user = $requete->fetch(PDO::FETCH_ASSOC);
  
    // Fermeture de la connexion à la base de données
    $db = null;
  
    // Retour de l'objet utilisateur
    return $user;
  }
  
  // Vérifier si le formulaire a été soumis
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $username = $_POST['login'];
    $password = $_POST['password'];

    // Vérifier les informations d'identification
    $user = get_user_by_username($username);
    if ($user && password_verify($password, $user['password'])) {
      // Les informations d'identification sont valides, authentifier l'utilisateur
      $_SESSION['user'] = $user;

      // Rediriger vers la page d'accueil
      header('Location: index.php');
      exit;
    } else {
      // Les informations d'identification sont invalides, afficher un message d'erreur
      $error = 'Les informations d\'identification ne sont pas correctes.';
    }
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Page de connexion</title>
</head>
<body>
  <h1>Page de connexion</h1>

  <?php if ($error) : ?>
    <div class="error"><?php echo $error; ?></div>
  <?php endif; ?>

  <form action="login.php" method="post">
    <input type="text" name="username" placeholder="Nom d'utilisateur">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="submit" value="Connexion">
  </form>

</body>
</html>