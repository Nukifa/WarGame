
<?php
  // Fonction pour vérifier les droits d'accès
  function check_access($user) {
    // Si l'utilisateur est un administrateur, il a accès
    if ($user['admin'] == 'true') {
      return true;
    }

    // Sinon, l'utilisateur n'a pas accès
    return false;
  }

  // Fonction pour afficher la page d'administration
  function show_admin_page() {
    // Vérifier les droits d'accès
    if (check_access($_SESSION['user'])) {
      // L'utilisateur a accès, afficher la page
      echo '<h1>MAP{nOT_a_fLAg}</h1>';
    } else {
      // L'utilisateur n'a pas accès, rediriger vers la page d'accueil
      header('Location: index.php');
    }
  }
  // Vérifier si l'utilisateur est connecté
  if (isset($_SESSION['user'])) {
    // L'utilisateur est connecté, afficher la page d'administration
    show_admin_page();
  } else {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header('Location: login.php');
  }
?>