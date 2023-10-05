<?php
    $token = "presqueUnFlag";
    if(!empty($_GET['site']) && !empty($_GET['cmd'])){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, htmlspecialchars($_GET['site'])."?noflag=true&cmd=".$_GET['cmd']."&token=".$token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        echo $output;
        curl_close($ch);
    }else{
        echo "Pour accéder à l'API les champs site et cmd doivent être indiqués. Valeurs possibles pour cmd : getQuote, getFlag.";
    }
?>