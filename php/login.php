<?php
  session_start();
  if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
  }

  function get_user_by_username($username) {
    $db = new PDO('sql:host=localhost;dbname=medical_site;charset=utf8', 'postgres', 'postgres');
  
    $login = $_POST['login'];
    $password = $_POST['password'];
    $requete = $db->query("SELECT * FROM utilisateurs WHERE login = $login AND password = $password");
    $user = $requete->fetch(PDO::FETCH_ASSOC);
    $db = null;
    return $user;
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['login'];
    $password = $_POST['password'];
    $user = get_user_by_username($username);
    if ($user && password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user;
      header('Location: index.html');
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