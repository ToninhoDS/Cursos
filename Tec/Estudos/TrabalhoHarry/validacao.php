<?php
    $casas = rand(1, 4);
    $nomecasa = "";
    if($casas === 1){
        $nomecasa = "Sonserina";
        header("refresh: 1;sonserina.php");
    }else if($casas === 2){
        $nomecasa = "Corvinal";
        header("refresh: 1;corvinal.php");
    }else if($casas === 3){
        $nomecasa = "Lufa-Lufa";
        header("refresh: 1;lufa.php");
    }else if($casas === 4){
        $nomecasa = "Grifinória";
        header("refresh: 1;grifinoria.php");
    }
    ?>