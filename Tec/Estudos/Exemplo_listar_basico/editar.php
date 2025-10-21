<?php
include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// avalidar

if(empty($dados['id'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o ID!</div>"];
}elseif (empty($dados['nome'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o Nome!</div>"];
}elseif (empty($dados['email'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o Email!</div>"];
}else{
    // depois da avalidação sera add no banco de dados 
    $query_usuario = "UPDATE usuarios SET nome=:nome, email=:email WHERE id=:id";
    $edit_usuario = $conn->prepare($query_usuario);
    $edit_usuario->bindParam(':nome', $dados['nome']);
    $edit_usuario->bindParam(':email', $dados['email']);
    $edit_usuario->bindParam(':id', $dados['id']);

    // avalidar se foi registrado no banco de dados com sucesso
    if($edit_usuario->execute()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Atualizado com Sucesso!</div>"];

    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro na Atualização</div>"];

    }

    

}



echo json_encode($retorna);