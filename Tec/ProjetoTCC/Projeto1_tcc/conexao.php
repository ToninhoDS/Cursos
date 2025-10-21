<?php


$servername = "localhost:3306";
$username = "root"; 
$password = "acgsB07"; //  se ultilidar o UBSserver mudar para usbW
$dbname = "db_teste"; //Nome da Base de dados
//Criar uma conexão com banco de dados criado no xampp (ADM serve)
$conn =  mysqli_connect($servername, $username, $password, $dbname);



//checar se ouve conexão
if(!$conn){
    die("Conection failed: " .  mysqli_connect_erro()); // die seria para parar conexão, die( matar)
 }else{ 
    echo("conexao, ok");
 }

?> 