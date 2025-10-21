<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/grifinoria.css">
    <title>Grifinória</title>
</head>
<div class="divpai">
    <div class="centrologo">
    <img src="img/simbologrifinoria.png" alt="" width="300px">
    </div>
    <div class="php">
<?php

session_start();

$nome = $_SESSION["nome"];
echo "<h1>PARABÊNS MANO, ". $nome .", VOCÊ É UM INTEGRANTE DE GRIFINÓRIA!!!</h1>";
    ?>
    </div>
    </div>
</body>
</html>