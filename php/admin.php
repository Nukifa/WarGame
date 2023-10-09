
<?php
  session_start();
  ?>
  <html>
    <head>
      <title>Page administrateur</title>
      <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
  <?php
  include("../php/header.php");
  function check_access($user) {
    if ($user['admin'] == 'true') {
      return true;
    }
    return false;
  }
  function show_admin_page() {
    if (check_access($_SESSION['user'])) {
      echo '<h1>MAP{Cool_admin_flag}</h1>';
    } else {
      header('Location: ../index.php');
    }
  }
  if (isset($_SESSION['user'])) {
    show_admin_page();
  } else {
    header('Location: login.php');
  }
?>
    </body>
  </html>