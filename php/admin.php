
<?php
  function check_access($user) {
    if ($user['admin'] == 'true') {
      return true;
    }
    return false;
  }
  function show_admin_page() {
    if (check_access($_SESSION['user'])) {
      echo '<h1>MAP{nOT_a_fLAg}</h1>';
    } else {
      header('Location: index.php');
    }
  }
  if (isset($_SESSION['user'])) {
    show_admin_page();
  } else {
    header('Location: login.php');
  }
?>