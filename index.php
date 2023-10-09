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
        if(isset($_SESSION['user'])){
          #Récupération des ordonances de l'utilisateur
          $db = new PDO('sql:host=localhost;dbname=medical_site;charset=utf8', 'postgres', 'postgres');
          $request = $db->prepare("SELECT * FROM ordonance WHERE user = ?");
          $request->execute(array($_SESSION['user']));
          echo "<table>
          <tr>
            <th>Date</th>
            <th>Médecin</th>
            <th>Médicament</th>
            <th>Posologie</th>
            <th>Durée</th>
          </tr>";
          while($result = $request->fetch()){
            echo "<tr>";
            echo "<td>" . $result['nom'] . "</td>";
            echo "<td>" . $result['date'] . "</td>";
            echo "<td>" . $result['nom_medecin'] . "</td>";
            echo "<tr>";
          }
          echo "</table>";
        }else{?>
          <p>Vous devez vous connecter pour avoir accès à vos ordonances. connectez-vous en cliquant <a href="php/login.php" class="special-link">ici</a></p>
        <?php }?>
      
        
        <!--<tr>
          <td>2023-08-03</td>
          <td>Dr. Martin</td>
          <td>Antibiotiques</td>
          <td>1 gélule par jour</td>
          <td>7 jours</td>
        </tr>-->
      
    </section>
  </main>
  <footer>
    <p>Copyright &copy; 2023</p>
  </footer>
</body>
</html>
<script src="../js/script.js"></script>
