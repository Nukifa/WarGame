<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
  session_start();
  if (isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
  }

  function get_user_by_username($username) {
    $db = new PDO('pgsql:host=localhost;dbname=medical_site;user=postgres;password=postgres');
  
    $login = $_POST['username'];
    $password = $_POST['password'];
    $requete = $db->query("SELECT * FROM users WHERE login = '$login' AND password = '$password'");
    $user = $requete->fetch();
    $db = null;
    return $user;
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = get_user_by_username($username);
    if ($user) {
      $_SESSION['user'] = $user;
      header('Location: ../index.php');
      exit;
    } else {
      $error = 'Les informations d\'identification ne sont pas correctes.';
    }
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Page de connexion</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php include("../php/header.php"); ?>
  <h1>Page de connexion</h1>

  <?php if (isset($error)) : ?>
    <div class="error"><?php echo $error; ?></div>
  <?php endif; ?>

  <form action="login.php" method="post">
    <input type="text" name="username" placeholder="Nom d'utilisateur">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="submit" value="Connexion">
  </form>

</body>
</html>