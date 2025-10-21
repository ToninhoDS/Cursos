<?php
session_start();
 // colocar, pq que hora do RELATORIO ATIVIDADE FUNCIONA

include_once "crud_php/conexao_cadastro.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//$id = $dados['id'];

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
$nm_origem ='EDIT. Form Funcionario';

// teste

if(empty($dados['cd_funcionario'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o ID!</div>"];
}elseif (empty($dados['nm_nome'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o Nome!</div>"];
}elseif (empty($dados['nm_cargo'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o CPF!</div>"];

}elseif (empty($dados['cd_credencial'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o TELEFONE!</div>"];

 }elseif (empty($dados['cd_credencial'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o EMAIL!</div>"];

}elseif (empty($dados['dt_emissao_contratual'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o BAIRRO!</div>"];

}elseif (empty($dados['nm_sexo'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar a CIDADE!</div>"];

}elseif (empty($dados['cd_data_nascimento'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o ESTADO!</div>"];

}elseif (empty($dados['cd_cpf'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar a PLACA!</div>"];
    
}elseif (empty($dados['cd_email_funcionario'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar o MODELO</div>"];

}elseif (empty($dados['cd_senha_funcionario'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar a MARCA!</div>"];

}elseif (empty($dados['cd_telefone'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Alera esta com ERRRO Enviar a COR!</div>"];
}else{
    // depois da avalidação sera add no banco de dados 
 
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
    
     //fim
     $query_uf_emppresa = " UPDATE tb_uf_empresa SET sg_uf=:sg_uf WHERE cd_uf=:id";
     $edit_uf_empresa = $conn->prepare($query_uf_emppresa);
     $edit_uf_empresa->bindParam(':sg_uf', $dados['nm_cliente']);
     $edit_uf_empresa->bindParam(':id', $dados['cd_cliente']);
     $edit_uf_empresa->execute();
     
     $query_cidade_empresa = "UPDATE tb_cidade_empresa SET nm_cidade=:nm_cidade  WHERE cd_cidade=:id";
     $cadastrar_cidade_empresa= $conn->prepare($query_cidade_empresa);
     $cadastrar_cidade_empresa->bindParam(':nm_cidade',$dados['sg_uf']);
     $cadastrar_cidade_empresa->bindParam(':id', $dados['cd_cliente']);
     $cadastrar_cidade_empresa->execute();

     $query_bairro_empresa = "UPDATE tb_bairro_empresa SET nm_bairro=:nm_bairro  WHERE cd_bairro=:id";   
     $cadastrar_bairro_empresa= $conn->prepare($query_bairro_empresa);
     $cadastrar_bairro_empresa->bindParam(':nm_bairro', $dados['cd_numero1']);
     $cadastrar_bairro_empresa->bindParam(':id', $dados['cd_cliente']);
     $cadastrar_bairro_empresa->execute();



    $query_funcionario = "UPDATE tb_funcionario SET 
    nm_nome=:nome, 
    nm_cargo=:nm_cargo, 
    dt_emissao_contratual=:dt_emissao_contratual, 
    nm_sexo=:nm_sexo, 
    cd_data_nascimento=:cd_data_nascimento, 
    cd_cpf=:cd_cpf, 
    cd_credencial=:cd_credencial,
    cd_email_funcionario=:cd_email_funcionario, 
    cd_senha_funcionario=:cd_senha_funcionario, 
    cd_telefone=:cd_telefone
    WHERE cd_funcionario=:id";
    $cadastrar_funcionario = $conn->prepare($query_funcionario);
    $cadastrar_funcionario->bindParam(':nome', $dados['nm_nome']);
    $cadastrar_funcionario->bindParam(':nm_cargo', $dados['nm_cargo']);
    $cadastrar_funcionario->bindParam(':dt_emissao_contratual', $dados['dt_emissao_contratual']);
    $cadastrar_funcionario->bindParam(':nm_sexo', $dados['nm_sexo']);
    $cadastrar_funcionario->bindParam(':cd_data_nascimento', $dados['cd_data_nascimento']);
    $cadastrar_funcionario->bindParam(':cd_cpf', $dados['cd_cpf']);
    $cadastrar_funcionario->bindParam(':cd_credencial', $dados['cd_credencial']);
    // $cadastrar_funcionario->bindParam(':img_imagem', $dados['img_imagem']);
    $cadastrar_funcionario->bindParam(':cd_email_funcionario', $dados['cd_email_funcionario']);
    $cadastrar_funcionario->bindParam(':cd_senha_funcionario', $dados['cd_senha_funcionario']);
    $cadastrar_funcionario->bindParam(':cd_telefone', $dados['cd_telefone']);
    $cadastrar_funcionario->bindParam(':id', $dados['cd_funcionario']);
    
    if($cadastrar_funcionario->execute()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Atualizado com Sucesso!</div>"];
        
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro na Atualização</div>"];

    }
   
}
echo json_encode($retorna);