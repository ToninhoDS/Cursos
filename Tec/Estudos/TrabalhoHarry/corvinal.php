<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/corvinal.css">
    <title>Corvinal</title>
</head>
<body>
    <div class="divpai">
    <div class="centrologo">
    <img src="img/simbolocorvinal.png" alt="">
    </div>
    <div class="phap">
<?php

session_start();

$nome = $_SESSION["nome"];
echo "<h1>PARABÊNS MANO, ". $nome .", VOCÊ É UM INTEGRANTE DA CORVINAL!!!</h1>";
    ?>
    </div>
    </div>
</body>
</html>