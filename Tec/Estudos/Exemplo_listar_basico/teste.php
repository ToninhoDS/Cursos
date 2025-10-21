<?php

// Incluir a conexao com o banco de dados
include_once "conexao.php";

// Receber o id
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// validar o formulario
if (!empty($id)) {
    //chamar tados de duas tabelas
    $query_usuario = "SELECT usr.id, usr.nome, usr.email, 
            ende.logradouro, ende.numero
            FROM usuarios AS usr
            LEFT JOIN enderecos AS onde ON ende.usuario_id=usr.id 
            WHERE usr.id=:id LIMIT 1"; 
            //fazer a conexao
            $result_usuario = $conn->prepare($query_usuario);
            $result_usuario->bindParam(':id', $id);
            $result_usuario->execute(); //executar o comando

            //avalidação
            if(($result_usuario)and($result_usuario->rowCount()!= 0)){
                $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC); 
                $retorna = ['status' => true, 'dados' => $id];
                // ler o resultados ,PDO ultilar conexao PDO, FETCH_ASSSOC para imprimir atravez da coluna

                
            }else{
                $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nem usuário encontrado!</div>"];
            }
    


}  else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nem usuário encontrado!</div>"];
       
    }


echo json_encode($retorna);
