<?php


$servername = "localhost";
$username = "root"; 
$password = ""; //  se ultilidar o UBSserver mudar para usbW
$dbname = "db_login"; //Nome da Base de dados
//Criar uma conexão com banco de dados criado no xampp (ADM serve)
$conn = new mysqli($servername, $username, $password, $dbname);

//checar se ouve conexão
if($conn->connect_error){
    die("Conection failed: " . $conn->connect_error); // die seria para parar conexão, die( matar)
// } echo "Conexão com sucesso";

?> 