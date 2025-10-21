<?php

// Credencias do banco de dados
$host = HOST;
$user = USER;
$pass = PASS;
$dbname = DBNAME;
$port = PORT;

try{
    // Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    // Conexão sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso!";
}catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}