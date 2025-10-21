
<?php
include_once "crud_php/conexao_cadastro.php";


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
if (!empty($id)) {
    $query_funcionario = "SELECT  g.nm_gerente, f.cd_funcionario, f.nm_nome, f.nm_cargo, f.dt_emissao_contratual, f.nm_sexo, f.cd_data_nascimento, f.cd_cpf,
f.cd_credencial, f.cd_email_funcionario, f.cd_senha_funcionario, f.cd_telefone, f.img_imagem, b.cd_bairro, g.cd_gerente
    FROM tb_gerente as g
    JOIN tb_funcionario as f

    ON   f.cd_gerente = g.cd_gerente
    JOIN tb_bairro as b
    
    on f.cd_funcionario = b.cd_bairro
    WHERE f.cd_funcionario =:id LIMIT 1";
             //fazer a conexao
    $result_funcionario = $conn->prepare($query_funcionario);
    $result_funcionario->bindParam(':id', $id);
    $result_funcionario->execute();//executar o comando

    if(($result_funcionario) and ($result_funcionario->rowCount() != 0)){
        $row_usuario = $result_funcionario->fetch(PDO::FETCH_ASSOC);
         // ler o resultados ,PDO ultilar conexao PDO, FETCH_ASSSOC para imprimir atravez da coluna
        $retorna = ['status' => true, 'dados' => $row_usuario];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum Funcionario foi encontradodcdsd!!!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum Funcionario foi encontrado!</div>"];
}

echo json_encode($retorna);