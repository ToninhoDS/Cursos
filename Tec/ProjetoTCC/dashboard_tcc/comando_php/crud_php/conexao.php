<?php

$host = "localhost";
$user = "root";
$pass = "acgsB07";
$dbname = "db_celke";
$port = 3306;

try{
    //Conexão com a porta
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    //$conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

    //echo "Conexão com banco de dados 1realizado com sucesso!<br></br>";
}  catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $err->getMessage();
}





