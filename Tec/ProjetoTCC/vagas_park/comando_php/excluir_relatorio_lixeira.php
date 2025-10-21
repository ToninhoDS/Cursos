<?php
include_once "crud_php/conexao_cadastro.php";

include_once '../adm/config/valida_token.php';

if(!validarToken()){

    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário realizar o login para acessar a página!</p>";

    header("Location:../adm/erro_404.php");

    exit();
} 

$id ='delete';

$teste = 'delete';

// avalidar
if (!empty($id)){

                // informações do relatorio do sistema
        $nm_empresa = 'Empresa Vagas Park, São Vicente';
        $nome_Funcionario = recuperarNomeToken();
        $cargo = recuperarCargoToken();
        
        // validar se é funcionario
        if($cargo == 'Funcionario'){
        
        $func_Relat_Ativ = $nome_Funcionario;
        $gerente_Relat_Ativ = null;
        }else{
            $gerente_Relat_Ativ = $nome_Funcionario;
        $func_Relat_Ativ = null;
        }
        $nm_descricao_acao ='Ação foi para LIMPAR LIXEIRA';
        $nm_origem ='LISTA LIXEIRA';
        $acao_SistemaOculto = 'DELETE';
        // fim

   
       //Registro do Sistema 'tabela Ocuta' 
       $registro_de_sistema = "INSERT INTO tb_registro_de_sistema (nm_nome_acao, nm_descricao_acao, nm_origem, nm_funcionario, nm_empresa, dt_hora, dt_data, img_icon, nm_gerente, nm_cargo )

       VALUES (:nm_nome_acao, :nm_descricao_acao, :nm_origem, :nm_funcionario, :nm_empresa, :dt_hora, :dt_data, :img_icon, :nm_gerente, :nm_cargo)";
       $cadastrar_registro_de_sistema = $conn->prepare($registro_de_sistema);
       $cadastrar_registro_de_sistema->bindParam(':nm_nome_acao',  $acao_SistemaOculto);
       $cadastrar_registro_de_sistema->bindParam(':nm_descricao_acao', $nm_descricao_acao);
       $cadastrar_registro_de_sistema->bindParam(':nm_origem', $nm_origem);
       $cadastrar_registro_de_sistema->bindParam(':nm_funcionario', $func_Relat_Ativ);
       $cadastrar_registro_de_sistema->bindParam(':nm_empresa', $nm_empresa);
       $cadastrar_registro_de_sistema->bindParam(':dt_hora', $horasRelatorio);
       $cadastrar_registro_de_sistema->bindParam(':dt_data', $dataRelatorio);
       $cadastrar_registro_de_sistema->bindParam(':img_icon', $img_icon);
       $cadastrar_registro_de_sistema->bindParam(':nm_gerente', $gerente_Relat_Ativ);
       $cadastrar_registro_de_sistema->bindParam(':nm_cargo', $cargo );
       $cadastrar_registro_de_sistema->execute();
       $id_registro_de_sistema = $conn->lastInsertId();
       //fim


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