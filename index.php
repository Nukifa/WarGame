<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Site Web Médical</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php include("php/header.php"); ?>
  <main>
    <div id="citationDiv">
      <p id="paragrapheCitationDiv">La citation du jour arrive !</p>
    </div>
    <section class="ordonnance">
      <h2>Ordonnance</h2>
      <?php #Affichage utilisateur connecté
       if(isset($_SESSION['user'])){ ?>

      <?php #Affichage utilisateur non connecté
      }else{?>
        <p>Vous devez vous connecter pour avoir accès à vos ordonances. connectez-vous en cliquant <a href="php/login.php" class="special-link">ici</a></p>
      <?php }?>
      <table>
        <tr>
          <th>Date</th>
          <th>Médecin</th>
          <th>Médicament</th>
          <th>Posologie</th>
          <th>Durée</th>
        </tr>
        <tr>
          <td>2023-07-20</td>
          <td>Dr. Dupont</td>
          <td>Aspirine</td>
          <td>2 comprimés par jour</td>
          <td>10 jours</td>
        </tr>
        <tr>
          <td>2023-08-03</td>
          <td>Dr. Martin</td>
          <td>Antibiotiques</td>
          <td>1 gélule par jour</td>
          <td>7 jours</td>
        </tr>
      </table>
    </section>
  </main>
  <footer>
    <p>Copyright &copy; 2023</p>
  </footer>
</body>
</html>
<script src="../js/script.js"></script>
