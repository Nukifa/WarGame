<?php
    $quotes_array = array(
        "La médecine a beau faire des progrès tous les jours, on n'a encore rien trouvé contre la connerie. À voir le nombre de gens atteints, ça mériterait pourtant qu'on vote des crédits. - Marie-Sabine Roger",
        "La médecine a fait tellement de progrès que plus personne n'est en bonne santé. - Aldous Huxley",
        "Il n'est pas bon, pour un médecin, d'admettre qu'il ne se sent pas bien. - Herbert George Wells",
        "Ce n'est pas les médecins qui nous manquent, c'est la médecine. - Charles de Montesquieu",
        "À lire des livres de médecine, on se persuade toujours d'éprouver les douleurs dont ils parlent. - Umberto Eco",
        "Les patients du médecin légiste ne se plaignent jamais. - Denis Leroy",
        "On choisit son médecin, mais on ne choisit pas sa maladie ! - Dallerit Christiane",
        "La dépression frappe au hasard : c'est une maladie, pas un état d'âme. - Tahar Ben Jelloun",
        "La maladie de l'adolescence est de ne pas savoir ce que l'on veut et de le vouloir cependant à tout prix. - Philippe Sollers",
        "La mort est le meilleur médecin. Une visite lui suffit. - Paul Masson"
    );
    if(!empty($_GET['cmd']) && !empty($_GET['token'])){
        if($_GET['cmd'] == "getQuote"){
        echo $quotes_array[rand(0, sizeof($quotes_array)-1)];
        }else if($_GET['cmd'] == "getFlag" && (!isset($_GET['noflag']) || $_GET['noflag'] == "false")){
            echo "MAP{Ca_c_est_un_beau_flag}";
        }else if($_GET['cmd'] == "getFlag"){
            echo "Vous ne pouvez pas obtenir le flag avec le noflag activé.";
        }else{
            echo "Les commandes valides sont getQuote et getFlag.";
        }
    }else{
        echo "Vous devez définir la commande à exécuter et le token d'authentification.";
    }
?>