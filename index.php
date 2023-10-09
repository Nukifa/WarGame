<?php
session_start();
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
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
          $db = new PDO('pgsql:host=localhost;dbname=medical_site;user=postgres;password=postgres');
          $request = $db->prepare("SELECT * FROM ordonnance WHERE login = ?");
          $request->execute(array($_SESSION['user']['login']));
          echo "Vous avez ". $request->rowCount() . " ordonances.";
          if($request->rowCount() > 0){
            echo "<table>
            <tr>
              <th>Ordonance</th>
              <th>Médicament</th>
              <th>Fréquence</th>
              <th>date</th>
              <th>Médecin</th>
            </tr>";
            while($result = $request->fetch()){
              echo "<tr>";
              echo "<td>" . $result['nom'] . "</td>";
              echo "<td>" . $result['medicament'] . "</td>";
              echo "<td>" . $result['frequence'] . "</td>";
              echo "<td>" . $result['date'] . "</td>";
              echo "<td>" . $result['nom_medecin'] . "</td>";
              echo "<tr>";
            }
            echo "</table>";
          }
        }else{?>
          <p>Vous devez vous connecter pour avoir accès à vos ordonances. connectez-vous en cliquant <a href="php/login.php" class="special-link">ici</a></p>
        <?php }?>
    </section>
  </main>
  <footer>
    <p>Copyright &copy; 2023</p>
  </footer>
</body>
</html>
<script src="../js/script.js"></script>
