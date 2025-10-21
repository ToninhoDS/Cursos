<?php

include_once "crud_php/conexao_cadastro.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$id =$dados['id'];

// teste da tabela "Relatorio atividade criando uma variavel"
$acao_Relatorio_Atividade = 'UPDATE';

if($acao_Relatorio_Atividade  == 'DELETE'){
    $img_icon ="img/relatorio_delete.png";
}else{if($acao_Relatorio_Atividade  == 'UPDATE'){
    $img_icon ="img/relatorio_update.png";
}else{if($acao_Relatorio_Atividade  == 'CADASTRO'){
    $img_icon ="img/relatorio_cadastro.png";
}else{if($acao_Relatorio_Atividade  == 'INSERT'){
    $img_icon ="img/relatorio_insert.png";
}else{}
}}}
$nm_origem ='LISTA DE CLIENTES';
// teste

if(empty($dados['id'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o ID!</div>"];
}elseif (empty($dados['nome'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o Nome!</div>"];
}elseif (empty($dados['cpf'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o CPF!</div>"];

}elseif (empty($dados['placa'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar a placa!</div>"];

}elseif (empty($dados['email'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o EMAIL!</div>"];
}elseif (empty($dados['telefone'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o TELEFONE!</div>"];
}else{
    // depois da avalidação sera add no banco de dados 
    $query_telefone = "UPDATE tb_telefone SET cd_numero1=:telefone 
    WHERE cd_telefone=:id";
    $edit_telefone = $conn->prepare($query_telefone);
    $edit_telefone->bindParam(':telefone', $dados['telefone']);
    $edit_telefone->bindParam(':id', $dados['id']);
    $edit_telefone->execute();
   
    $query_usuario = "UPDATE tb_cliente SET nm_cliente=:nome, cd_email_cliente=:email 
    WHERE cd_cliente=:id";
    $edit_usuario = $conn->prepare($query_usuario);
    $edit_usuario->bindParam(':nome', $dados['nome']);
    $edit_usuario->bindParam(':email', $dados['email']);
    $edit_usuario->bindParam(':id', $dados['id']);
    $edit_usuario->execute();
   
        $query_pessoa_fisica = "UPDATE tb_pessoa_fisica SET cd_cpf=:cpf
        WHERE cd_pessoa_fisica=:id";
        $edit_pessoa_fisica = $conn->prepare($query_pessoa_fisica);
        $edit_pessoa_fisica->bindParam(':cpf', $dados['cpf']);
        $edit_pessoa_fisica->bindParam(':id', $dados['id']);
        $edit_pessoa_fisica->execute();

            $query_veiculo = "UPDATE tb_veiculo SET cd_placa=:placa
            WHERE cd_veiculo=:id";
            $edit_veiculo = $conn->prepare($query_veiculo);
            $edit_veiculo->bindParam(':placa', $dados['placa']);
            $edit_veiculo->bindParam(':id', $dados['id']);
            $edit_veiculo->execute();
                            //Relatorio de atividade
                $query_relatorio_atividade = "INSERT INTO tb_relatorio_atividade (nm_nome_acao, nm_origem, nm_funcionario, cd_funcionario, dt_hora, dt_data, img_icon )
                VALUES (:nm_nome_acao, :nm_origem, :nm_funcionario, :cd_funcionario, :dt_hora, :dt_data, :img_icon)";
                $cadastrar_relatorio_atividade = $conn->prepare($query_relatorio_atividade);
                $cadastrar_relatorio_atividade->bindParam(':nm_nome_acao',  $acao_Relatorio_Atividade);
                $cadastrar_relatorio_atividade->bindParam(':nm_origem', $nm_origem);
                $cadastrar_relatorio_atividade->bindParam(':nm_funcionario', $func_Relat_Ativ);
                $cadastrar_relatorio_atividade->bindParam(':cd_funcionario', $cd_funcionario);
                $cadastrar_relatorio_atividade->bindParam(':dt_hora', $horasRelatorio);
                $cadastrar_relatorio_atividade->bindParam(':dt_data', $dataRelatorio);
                $cadastrar_relatorio_atividade->bindParam(':img_icon', $img_icon);
                $cadastrar_relatorio_atividade->execute();
                //fiM 
            $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' s role='alert'>Atualizado com Sucesso !</div>"];
 
}

    


echo json_encode($retorna);