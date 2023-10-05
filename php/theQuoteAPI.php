<?php
    if(!empty($_GET['cmd']) && !empty($_GET['token'])){
        if($_GET['cmd'] == "getQuote"){

        }else if($_GET['cmd'] == "getFlag" && (!isset($_GET['noflag']) || $_GET['noflag'] == "false")){

        }
    }else{
        echo "Vous devez définir la commande à exécuter et le token d'authentification.";
    }
?>