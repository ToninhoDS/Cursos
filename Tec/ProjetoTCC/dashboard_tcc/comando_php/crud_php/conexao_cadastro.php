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

//  CONEXAO DO GERENTE

$query_gerente  = "SELECT cd_gerente, nm_cargo,nm_gerente, nm_descricao, nm_reviews, nm_idade, nm_email, nm_senha, cd_telefone ,cd_img FROM tb_gerente WHERE cd_gerente= 1"; //QUAL GERENTE ESTA LOGANDO
    $result_gerente = $conn->prepare($query_gerente);
    $result_gerente->execute();
    $row_gerente = $result_gerente->fetch(PDO::FETCH_ASSOC);
    extract($row_gerente); // array
    $cd_gerente = $row_gerente['cd_gerente'];
    $nome_gerente = $row_gerente['nm_gerente'];
    $foto_gerente = $row_gerente['cd_img'];
    $id_gerente = $row_gerente['cd_gerente'];
    $diretorio ='../img_funcionario/'.$nome_gerente.'_id-'.$id_gerente;
    
       



// Datos de login do usuario e suas sessao

$func_Relat_Ativ = 'Antonio';
$func_Relat_Ativ = strtoupper($func_Relat_Ativ);
$cd_funcionario = '1';
//pegando a hora
//$dataRelatorio= date("d/m/Y");
// pehar a hora no relatorio atividades
date_default_timezone_set('America/Sao_Paulo');
$dataRelatorio= date("Y/m/d");
$horasRelatorio = date("H:i:s");
