
<?php

// Incluir a conexao com o banco de dados
include_once "crud_php/conexao_cadastro.php";

// pegando o id
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
//$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//$id = '652.159.799-01';
// Acessa o IF quando a variavel ID possui valor
if (!empty($id)) {
    $query_usuario = "SELECT c.cd_cliente,  c.nm_cliente, pf.cd_cpf, c.cd_email_cliente, b.nm_bairro, ci.nm_cidade, uf.sg_uf, tf.cd_numero1, ve.cd_placa, mo.nm_modelo, ma.nm_marca, co.nm_cor
    from tb_cliente as c
    join tb_pessoa_fisica as pf
    on pf.cd_cliente = c.cd_cliente
    
    join tb_bairro as b
    on pf.cd_bairro = b.cd_bairro
    
    join tb_cidade as ci
     on ci.cd_cidade = b.cd_cidade
     
    join tb_uf as uf 
    on uf.cd_uf = ci.cd_uf
    
    join tb_telefone as tf
    on tf.cd_cliente = c.cd_cliente
    
    join tb_veiculo as ve 
    on ve.cd_cliente = c.cd_cliente
    
    join tb_modelo as mo 
    on mo.cd_modelo = ve.cd_modelo
    
    join tb_marca as ma
    on ma.cd_marca = mo.cd_marca
    
    join tb_cor as co
    on co.cd_cor = ve.cd_cor
    
    where ve.cd_placa=:id LIMIT 1";
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