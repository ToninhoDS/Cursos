<?php

session_start();
ob_start();
include_once "crud_php/conexao_cadastro.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//avaliar se recebir os dados
var_dump($dados);

// deixar o nome tudo maiuscula
$bike_Cliente_outros = $dados['cd_transporte'];
$bike_Cliente_outros =strtoupper($bike_Cliente_outros);
$bike_Cliente = $dados['cd_nome'];
$bike_Cliente =strtoupper($bike_Cliente);



// avalidar cd_senha_cliente_confirmar

if(empty($dados['cd_transporte'])){
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'><p style='font-size: 20px;' >ERRRO!!! Qual tipo de Transporte?</p></div>";
     header("Location: form-validation.php");
}else{
    
    // depois da avalidação sera add no banco de dados 
    $query_bike_outros = "INSERT INTO tb_bike_outros (cd_transporte, cd_detalhes, cd_nome, cd_observacao) 
                        VALUES (:cd_transporte, :cd_detalhes, :cd_nome, :cd_observacao)";

    $cadastrar_bike_outros = $conn->prepare($query_bike_outros);
    $cadastrar_bike_outros->bindParam(':cd_transporte', $dados['cd_transporte'], PDO::PARAM_STR);
    $cadastrar_bike_outros->bindParam(':cd_detalhes', $dados['cd_detalhes'],PDO::PARAM_STR);
    $cadastrar_bike_outros->bindParam(':cd_nome', $dados['cd_nome'], PDO::PARAM_STR);
    $cadastrar_bike_outros->bindParam(':cd_observacao', $dados['cd_observacao'], PDO::PARAM_STR);
    // var_dump($conn->lastInsertId()); //puxar o id
    $id_bike_outros = $conn->lastInsertId();

if($cadastrar_bike_outros->execute()){
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'><p style='font-size: 20px;' >Cadastro do Meio de Transporte: <string>$bike_Cliente_outros do Cliente $bike_Cliente </string>, foi concluido com Sucesso!</p></div>";
     header("Location: form-validation.php");

}else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' ><p style='font-size: 15px;'>ERRO! Cadastro do Meio de Transporte não foi Cadastrado!</p></div>";
     header("Location: form-validation.php");
}

}


echo json_encode($retorna);