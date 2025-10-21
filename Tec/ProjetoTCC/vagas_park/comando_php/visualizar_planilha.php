
<?php

// Incluir a conexao com o banco de dados
include_once "crud_php/conexao_cadastro.php";

// pegando o id
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
//$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//$id = '652.159.799-01';
// Acessa o IF quando a variavel ID possui valor
if (!empty($id)) {
    $query_usuario = "SELECT  cd_status_vagas, cd_numero_vaga, nm_nome, img_icon, dt_entrada, sg_placa, cd_cpf, nm_status FROM tb_status_vagas
    
    where cd_status_vagas=:id LIMIT 1";
             //fazer a conexao
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':id', $id);
    $result_usuario->execute();//executar o comando

    if(($result_usuario) and ($result_usuario->rowCount() != 0)){
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
         // ler o resultados ,PDO ultilar conexao PDO, FETCH_ASSSOC para imprimir atravez da coluna
        $retorna = ['status' => true, 'dados' => $row_usuario];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!!!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div>"];
}

echo json_encode($retorna);