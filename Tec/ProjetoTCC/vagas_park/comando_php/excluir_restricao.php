<?php
include_once "crud_php/conexao_cadastro.php";

include_once '../adm/config/valida_token.php';

if(!validarToken()){

    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário realizar o login para acessar a página!</p>";

    header("Location:../adm/erro_404.php");

    exit();
} 


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
$nm_origem ='RESTRIÇÃO';

         // informações do relatorio do sistema
         $nm_empresa = 'Empresa Vagas Park, São Vicente';
         $nome_Funcionario = recuperarNomeToken();
         $cargo = recuperarCargoToken();
         $cd_funcionario = recuperarIdGerenteToken();
         // validar se é funcionario
         if($cargo == 'Funcionario'){
         
         $func_Relat_Ativ = $nome_Funcionario;
         $gerente_Relat_Ativ = null;
         }else{
             $gerente_Relat_Ativ = $nome_Funcionario;
         $func_Relat_Ativ = null;
         }
         $nm_descricao_acao ='Ação foi para LIMPAR RESTRIÇÃO';
         $nm_origem ='LISTA RESTRIÇÃO';
         $acao_SistemaOculto = 'DELETE';
         // fim

// avalidar
if (!empty($id)){


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

    //Relatorio de atividade
    $query_relatorio_atividade = "INSERT INTO tb_relatorio_atividade (nm_nome_acao, nm_origem, nm_funcionario, cd_funcionario, dt_hora, dt_data, img_icon )
    VALUES (:nm_nome_acao, :nm_origem, :nm_funcionario, :cd_funcionario, :dt_hora, :dt_data, :img_icon)";
    $cadastrar_relatorio_atividade = $conn->prepare($query_relatorio_atividade);
    $cadastrar_relatorio_atividade->bindParam(':nm_nome_acao',  $acao_Relatorio_Atividade);
    $cadastrar_relatorio_atividade->bindParam(':nm_origem', $nm_origem);
    $cadastrar_relatorio_atividade->bindParam(':nm_funcionario', $nome_Funcionario);
    $cadastrar_relatorio_atividade->bindParam(':cd_funcionario', $cd_funcionario);
    $cadastrar_relatorio_atividade->bindParam(':dt_hora', $horasRelatorio);
    $cadastrar_relatorio_atividade->bindParam(':dt_data', $dataRelatorio);
    $cadastrar_relatorio_atividade->bindParam(':img_icon', $img_icon);
    $cadastrar_relatorio_atividade->execute();
    $id_relatorio_atividade = $conn->lastInsertId();
    //fiM 
    
    $query_usuario ="DELETE FROM tb_cliente WHERE cd_cliente=:id";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':id',$id);
    
     // avalidar se foi registrado no banco de dados com sucesso
    if($result_usuario->execute()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Excluido com Sucesso!</div>"];

    }else{
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Não Excluiu </div>"];

    }

    
}else{
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro na Atualização</div>"];
}
 



echo json_encode($retorna);