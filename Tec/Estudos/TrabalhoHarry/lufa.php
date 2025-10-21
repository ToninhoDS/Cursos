<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/lufa.css">
    <title>Lufa-Lufa</title>
</head>
<div class="divpai">
    <div class="centrologo">
    <img src="img/simbololufa.png" alt="" width="290px">
    </div>
    <div class="phap">
<?php

session_start();

$nome = $_SESSION["nome"];
echo "<h1>PARABÊNS MANO, ". $nome .", VOCÊ É UM INTEGRANTE DA LUFA-LUFA!!!</h1>";
    ?>
    </div>
    </div>
</body>
</html>