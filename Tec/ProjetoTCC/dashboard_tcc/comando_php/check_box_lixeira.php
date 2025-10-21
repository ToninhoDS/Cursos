<?php
include_once "crud_php/conexao_cadastro.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$acao_Relatorio_Atividade = 'DELETE';

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

// avalidar
if (!empty($id)){

    // //Relatorio de atividade
    $query_relatorio_atividade = "INSERT INTO tb_relatorio_atividade_lixeira (nm_nome_acao, nm_origem, nm_funcionario, cd_funcionario, dt_hora, dt_data, img_icon )
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
    $id_relatorio_atividade = $conn->lastInsertId();
    // //fiM 
    
    $query_relatorio_atividade ="DELETE FROM tb_relatorio_atividade WHERE cd_relatorio_atividade=:id";
    $result_relatorio_atividade = $conn->prepare($query_relatorio_atividade);
    $result_relatorio_atividade->bindParam(':id',$id);
    
     // avalidar se foi registrado no banco de dados com sucesso
    if($result_relatorio_atividade->execute()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Excluido com Sucesso!</div>"];

    }else{
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Não Excluiu </div>"];

    }

    
}else{
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro na Atualização</div>"];
}
 



echo json_encode($retorna);