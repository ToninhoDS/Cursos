<?php
include_once "crud_php/conexao_cadastro.php";

$id ='delete';

$teste = 'delete';

// avalidar
if (!empty($id)){
   
   
    $query_relatorio_lixeira ="DELETE FROM tb_relatorio_atividade_lixeira WHERE nm_nome_acao LIKE 'DELETE%' ";
    $result_relatorio_lixeira = $conn->prepare($query_relatorio_lixeira);
    
     // avalidar se foi registrado no banco de dados com sucesso
    if($result_relatorio_lixeira->execute()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Excluido com Sucesso!</div>"];

    }else{
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Não Excluiu </div>"];

    }

    
}else{
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro na Atualização</div>"];
}
 



echo json_encode($retorna);