<header>
    <h1>Site Web Médical</h1>
    <nav>
        <ul>
            <li><a href="../index.php">Accueil</a></li>
            <li><a href="#">Contact</a></li>
            <?php if(isset($_SESSION['user'])){ ?>
                <li><a href="../php/disconnect.php">Déconnexion</a></li>
                <li><a href="../php/admin.php">Admin</a></li>
                <li><a href="../upload.php">Télécharger un document</a></li>
            <?php }else{ ?>
                <li><a href="../php/login.php">Connexion</a></li>
            <?php } ?>
        </ul>
    </nav>
  </header>