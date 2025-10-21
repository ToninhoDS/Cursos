<?php
include_once "conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

// avalidar

if (!empty($id)){

    $query_usuario ="DELETE FROM usuarios WHERE id=:id";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':id',$id);
    
     // avalidar se foi registrado no banco de dados com sucesso
    if($result_usuario->execute()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Excluido com Sucesso!</div>"];

    }else{
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Não Excluiu </div>"];

    }

    
}else{
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro na Atualização</div>"];
}
 



echo json_encode($retorna);