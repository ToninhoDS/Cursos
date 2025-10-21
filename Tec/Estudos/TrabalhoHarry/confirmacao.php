<?php

session_start();



if (isset($_POST["nome"]) && !empty($_POST["nome"])){
    $nome = $_SESSION["nome"] = $_POST["nome"];
    
    header("location: validacao.php");
}else{
    header("location: validacao.php");
}