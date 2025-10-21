<?php

$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "db_tcc_estacionamento";
$port = 3306;

try{
    //Conexão com a porta
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    //$conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

 //echo "<br>Conexão com banco de dados realizado com sucesso!</br>"; /*tirar // para ver a conexao*/ 
}  catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $err->getMessage();
}

// Datos de login do usuario e suas sessao

// $func_Relat_Ativ = 'Antonio';
// $func_Relat_Ativ = strtoupper($func_Relat_Ativ);
//pegando a hora
//$dataRelatorio= date("d/m/Y");
// pehar a hora no relatorio atividades
date_default_timezone_set('America/Sao_Paulo');
$dataRelatorio= date("Y/m/d");
$horasRelatorio = date("H:i:s");

