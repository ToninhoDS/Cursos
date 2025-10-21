<?php

// session_start(); 

ob_start();

include_once '../adm/config/valida_token.php';

if(!validarToken()){

    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário realizar o login para acessar a página!</p>";

    header("Location:../adm/erro_404.php");

    exit();
}
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
   $nm_descricao_acao ='Ação foi para EDITAR TABELA';
   
   // fim


include_once "crud_php/conexao_cadastro.php";


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);



// teste da tabela "Relatorio atividade criando uma variavel"
$acao_Relatorio_Atividade = $dados['status_vagas'];

  $nm_nome_acao_tabela = '';
    if($acao_Relatorio_Atividade == 'CADASTRO'){
        $nm_nome_acao_tabela ="table-success";
        $acao_SistemaOculto = 'CADASTRO';
    }else{if($acao_Relatorio_Atividade == 'Livre'){
        $nm_nome_acao_tabela ="table-success";
        $img_icon ="img/disponivel_vagas.png";
        $acao_SistemaOculto = 'Livre';
    }else{if($acao_Relatorio_Atividade == 'Ocupado'){
        $nm_nome_acao_tabela ="table-warning";
        $img_icon ="img/relatorio_ocupado.png";
        $acao_SistemaOculto = 'Ocupado';
    }else{if($acao_Relatorio_Atividade == 'Reserva'){
        $nm_nome_acao_tabela ="table-danger";
        $acao_SistemaOculto = 'Reserva';
        $img_icon ="img/relatorio_reservado.png";
    }else{if($acao_Relatorio_Atividade == ''){
        $nm_nome_acao_tabela ="";
    }else{
            
    }}}}}

$img_Relatorio = 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/123.png';
$nm_origem ='TABELA S. VAGAS';
// teste

        
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

    //fiM 

    //Registro do Sistema 'tabela Ocuta' 
    $registro_de_sistema = "INSERT INTO tb_registro_de_sistema (nm_nome_acao, nm_descricao_acao, nm_origem, nm_funcionario, nm_empresa, dt_hora, dt_data, img_icon, nm_gerente, nm_cargo)

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
    $cadastrar_registro_de_sistema->bindParam(':nm_cargo', $cargo);
    $cadastrar_registro_de_sistema->execute();
    $id_registro_de_sistema = $conn->lastInsertId();
    //fim


        $query_vagas_livres = "UPDATE tb_status_vagas SET nm_nome=:nome_vaga, img_icon=:img_vaga, dt_entrada=:entrada_vaga, sg_placa=:placa_vaga, cd_cpf=:cpf_vaga, nm_status=:status_vaga
        WHERE cd_status_vagas=:id";
        $edit_vagas_livres = $conn->prepare($query_vagas_livres);
        $edit_vagas_livres->bindParam(':nome_vaga', $dados['nome_vagas']);
        $edit_vagas_livres->bindParam(':cpf_vaga', $dados['cpf_vagas']);
        $edit_vagas_livres->bindParam(':img_vaga', $dados['img_vagas']);
        $edit_vagas_livres->bindParam(':placa_vaga', $dados['placa_vagas']);
        $edit_vagas_livres->bindParam(':entrada_vaga', $dados['entrada_vagas']);
        $edit_vagas_livres->bindParam(':status_vaga', $dados['status_vagas']);
        $edit_vagas_livres->bindParam(':id', $dados['id']);
    
            if($edit_vagas_livres->execute()){
                $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Atualizado com Sucesso!</div>"];
        
            }else{
                $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro na Atualização</div>"];
        
            }
            
            // avalidar se foi registrado no banco de dados com sucesso
    




echo json_encode($retorna);