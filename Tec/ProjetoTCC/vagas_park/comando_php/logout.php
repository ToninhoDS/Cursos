<?php


session_start(); // Iniciar a sessão

// Limpara o buffer de redirecionamento
ob_start();
include_once '../adm/config/valida_token.php';

include_once "crud_php/conexao_cadastro.php";



// Deletar o cookie
// setcookie('token');

//validar quem esta logado
$cargo_Login = recuperarCargoToken();
$email = recuperarEmailToken();
$nm_cliente = recuperarNomeToken();
$cd_funcionario = recuperarIdGerenteToken(); 

If($cargo_Login == 'Funcionario'){ //se for funcionario

    $nm_empresa = 'Empresa Vagas Park, São Vicente';
    $func_Relat_Ativ = $email;
    $gerente_Relat_Ativ = null;
    $nm_descricao_acao ='Ação LOGOFF  Funcionario';
    $cargo = recuperarCargoToken();
    $acao_Relatorio_Atividade ="$nm_cliente fez LOGOFF";
    $nm_origem ='Tela de LOGOFF Sistema';
    $img_icon ='visaosem.png';
        $acao_Relatorio_Atividade = 'LOGOFF';
                  //Registro do Sistema 'tabela Ocuta' 
    $registro_de_sistema = "INSERT INTO tb_registro_de_sistema (nm_nome_acao, nm_descricao_acao, nm_origem, nm_funcionario, nm_empresa, dt_hora, dt_data, img_icon, nm_gerente, nm_cargo )

    VALUES (:nm_nome_acao, :nm_descricao_acao, :nm_origem, :nm_funcionario, :nm_empresa, :dt_hora, :dt_data, :img_icon, :nm_gerente, :nm_cargo )";
    $cadastrar_registro_de_sistema = $conn->prepare($registro_de_sistema);
    $cadastrar_registro_de_sistema->bindParam(':nm_nome_acao',  $acao_Relatorio_Atividade);
    $cadastrar_registro_de_sistema->bindParam(':nm_descricao_acao', $nm_descricao_acao);
    $cadastrar_registro_de_sistema->bindParam(':nm_origem', $nm_origem);
    $cadastrar_registro_de_sistema->bindParam(':nm_funcionario', $func_Relat_Ativ);
    $cadastrar_registro_de_sistema->bindParam(':nm_empresa', $nm_empresa);
    $cadastrar_registro_de_sistema->bindParam(':dt_hora', $horasRelatorio);
    $cadastrar_registro_de_sistema->bindParam(':dt_data', $dataRelatorio);
    $cadastrar_registro_de_sistema->bindParam(':img_icon', $img_icon);
    $cadastrar_registro_de_sistema->bindParam(':nm_gerente', $gerente_Relat_Ativ);
    $cadastrar_registro_de_sistema->bindParam(':nm_cargo', $cargo);
    // $cadastrar_registro_de_sistema->execute();
    
    if($cadastrar_registro_de_sistema->execute()){

        // Deletar o cookie
        setcookie('token');
        // Criar a mensagem de sucesso e atribuir para variável global
        $_SESSION['msg'] = "<p style='color: green;'>Deslogado com sucesso!</p>";
        // Redireciona o o usuário para o arquivo vagas_park.php
        header("Location: /vagas_park/comando_php/nosso_parceiro.php");

    }else{
        $_SESSION['msg'] = "<p style='color: green;'>Erro!</p>";
    }



}else{ // se for gerente

$nm_empresa = 'Empresa Vagas Park, São Vicente';
$func_Relat_Ativ = null;
$gerente_Relat_Ativ = $email;
$nm_descricao_acao ='Ação LOGOFF Gerente';
$cargo = recuperarCargoToken();
$acao_Relatorio_Atividade ="$nm_cliente FEZ LOGOFF";
$nm_origem ='Tela de LOGOFF Sistema';
$img_icon ='visaosem.png';
$acao_Relatorio_Atividade = 'LOGOFF';
    //Registro do Sistema 'tabela Ocuta'

$registro_de_sistema = "INSERT INTO tb_registro_de_sistema (nm_nome_acao, nm_descricao_acao, nm_origem, nm_funcionario, nm_empresa, dt_hora, dt_data, img_icon, nm_gerente, nm_cargo )

VALUES (:nm_nome_acao, :nm_descricao_acao, :nm_origem, :nm_funcionario, :nm_empresa, :dt_hora, :dt_data, :img_icon, :nm_gerente, :nm_cargo )";
$cadastrar_registro_de_sistema = $conn->prepare($registro_de_sistema);
$cadastrar_registro_de_sistema->bindParam(':nm_nome_acao',  $acao_Relatorio_Atividade);
$cadastrar_registro_de_sistema->bindParam(':nm_descricao_acao', $nm_descricao_acao);
$cadastrar_registro_de_sistema->bindParam(':nm_origem', $nm_origem);
$cadastrar_registro_de_sistema->bindParam(':nm_funcionario', $func_Relat_Ativ);
$cadastrar_registro_de_sistema->bindParam(':nm_empresa', $nm_empresa);
$cadastrar_registro_de_sistema->bindParam(':dt_hora', $horasRelatorio);
$cadastrar_registro_de_sistema->bindParam(':dt_data', $dataRelatorio);
$cadastrar_registro_de_sistema->bindParam(':img_icon', $img_icon);
$cadastrar_registro_de_sistema->bindParam(':nm_gerente', $gerente_Relat_Ativ);
$cadastrar_registro_de_sistema->bindParam(':nm_cargo', $cargo);
// $cadastrar_registro_de_sistema->execute();    

    if($cadastrar_registro_de_sistema->execute()){

        // Deletar o cookie
        setcookie('token');
        // Criar a mensagem de sucesso e atribuir para variável global
        $_SESSION['msg'] = "<p style='color: green;'>Deslogado com sucesso!</p>";
        // Redireciona o o usuário para o arquivo vagas_park.php
        header("Location: /vagas_park/comando_php/nosso_parceiro.php");

    }else{
        $_SESSION['msg'] = "<p style='color: green;'>Erro!</p>";
    }






} // fim gerente




           