<?php
    quotes_array = array("");
    if(!empty($_GET['cmd']) && !empty($_GET['token'])){
        if($_GET['cmd'] == "getQuote"){
        echo quotes_array[random(0, sizeof(quotes_array)-1)];
        }else if($_GET['cmd'] == "getFlag" && (!isset($_GET['noflag']) || $_GET['noflag'] == "false")){
            echo "MAP{Ca_C'est_un_beau_flag}";
        }
    }else{
        echo "Vous devez définir la commande à exécuter et le token d'authentification.";
    }
?>