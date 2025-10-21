<?php

session_start();
ob_start();

include_once "crud_php/conexao_cadastro.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

 //echo var_dump($dados);

//deixar o nome tudo maiuscula
$cliente = $dados['nm_cliente'];
$cliente =strtoupper($cliente );
$sg_uf = $dados['sg_uf'];
$sg_uf =strtoupper($sg_uf );
$placa = $dados['cd_placa'];
$placa =strtoupper($placa );

// teste da tabela "Relatorio atividade criando uma variavel"
$acao_Relatorio_Atividade = 'INSERT';

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

$img_Relatorio = 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/123.png';
$nm_origem ='TABELA CADASTRO';

// teste

if(empty($dados['cd_senha_cliente'] == $dados['cd_senha_cliente_confirmar'] )){
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'><p style='font-size: 20px;' >ERRRO!!! Senha não são iguais</p></div>";
     header("Location: form-validation.php");
}else{
    
    
    // depois da avalidação sera add no banco de dados 
    $query_cliente =    "INSERT INTO tb_cliente (cd_email_cliente, cd_senha_cliente, nm_cliente) 
                        VALUES (:cd_email_cliente, :cd_senha_cliente, :nm_cliente)";

    $cadastrar_cliente = $conn->prepare($query_cliente);
    $cadastrar_cliente->bindParam(':cd_email_cliente', $dados['cd_email_cliente'], PDO::PARAM_STR);
    $cadastrar_cliente->bindParam(':cd_senha_cliente', $dados['cd_senha_cliente']);
    $cadastrar_cliente->bindParam(':nm_cliente', $cliente, PDO::PARAM_STR);
    $cadastrar_cliente->execute(); // para execultar 
    var_dump($conn->lastInsertId()); //puxar o id
    $id_cliente = $conn->lastInsertId();

    $query_telefone = "INSERT INTO tb_telefone (cd_numero1, cd_cliente)
    VALUES (:cd_numero1, :cd_cliente)";
    $cadastrar_telefone= $conn->prepare($query_telefone);
    $cadastrar_telefone->bindParam(':cd_numero1', $dados['cd_numero1'], PDO::PARAM_STR);
    $cadastrar_telefone->bindParam(':cd_cliente', $id_cliente, PDO::PARAM_INT);
    $cadastrar_telefone->execute();
    $id_telefone = $conn->lastInsertId();

    $query_sg_uf = "INSERT INTO tb_uf (sg_uf)
    VALUES (:sg_uf)";
    $cadastrar_sg_uf= $conn->prepare($query_sg_uf);
    $cadastrar_sg_uf->bindParam(':sg_uf',$sg_uf , PDO::PARAM_STR);
    $cadastrar_sg_uf->execute();
    $id_sg_uf = $conn->lastInsertId();

    $query_cidade = "INSERT INTO tb_cidade (nm_cidade, cd_uf)
    VALUES (:nm_cidade, :cd_uf)";
    $cadastrar_cidade= $conn->prepare($query_cidade);
    $cadastrar_cidade->bindParam(':nm_cidade',  $dados['nm_cidade'], PDO::PARAM_STR);
    $cadastrar_cidade->bindParam(':cd_uf', $id_sg_uf, PDO::PARAM_INT);
    $cadastrar_cidade->execute();
    $id_cidade = $conn->lastInsertId();

    $query_bairro = "INSERT INTO tb_bairro (nm_bairro, cd_cidade)
    VALUES (:nm_bairro, :cd_cidade)";
    $cadastrar_bairro= $conn->prepare($query_bairro);
    $cadastrar_bairro->bindParam(':nm_bairro', $dados['nm_bairro'], PDO::PARAM_STR);
    $cadastrar_bairro->bindParam(':cd_cidade', $id_cidade, PDO::PARAM_INT);
    $cadastrar_bairro->execute();
    $id_bairro = $conn->lastInsertId();
   // DADOS DO CARRO
    $query_marca = "INSERT INTO tb_marca (nm_marca)
    VALUES (:nm_marca)";
    $cadastrar_marca = $conn->prepare($query_marca);
    $cadastrar_marca->bindParam(':nm_marca', $dados['nm_marca'], PDO::PARAM_STR);
    $cadastrar_marca->execute();
    $id_marca = $conn->lastInsertId();

    $query_cor = "INSERT INTO tb_cor (nm_cor)
    VALUES (:nm_cor)";
    $cadastrar_cor = $conn->prepare($query_cor);
    $cadastrar_cor->bindParam(':nm_cor', $dados['nm_cor'], PDO::PARAM_STR);
    $cadastrar_cor->execute();
    $id_cor = $conn->lastInsertId();

    $query_modelo = "INSERT INTO tb_modelo (nm_modelo, cd_marca)
    VALUES (:nm_modelo, :cd_marca)";
    $cadastrar_modelo = $conn->prepare($query_modelo);
    $cadastrar_modelo->bindParam(':nm_modelo', $dados['nm_modelo'], PDO::PARAM_STR);
    $cadastrar_modelo->bindParam(':cd_marca', $id_marca, PDO::PARAM_INT);
    $cadastrar_modelo->execute();
    $id_modelo = $conn->lastInsertId();
    
    $query_veiculo = "INSERT INTO tb_veiculo (cd_placa, cd_cliente, cd_cor, cd_modelo)
    VALUES (:cd_placa, :cd_cliente, :cd_cor, :cd_modelo)";
    $cadastrar_veiculo = $conn->prepare($query_veiculo);
    $cadastrar_veiculo->bindParam(':cd_placa',  $placa, PDO::PARAM_STR);
    $cadastrar_veiculo->bindParam(':cd_cliente', $id_cliente, PDO::PARAM_INT);
    $cadastrar_veiculo->bindParam(':cd_cor', $id_cor, PDO::PARAM_INT);
    $cadastrar_veiculo->bindParam(':cd_modelo', $id_modelo, PDO::PARAM_INT);
    $cadastrar_veiculo->execute();
    $id_veiculo = $conn->lastInsertId();

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
    $id_relatorio_atividade = $conn->lastInsertId();
    //fim

    $query_pessoa_fisica = "INSERT INTO tb_pessoa_fisica (cd_cpf, cd_cliente, cd_bairro)
    VALUES (:cd_cpf, :cd_cliente, :cd_bairro )";
    $cadastrar_pessoa_fisica= $conn->prepare($query_pessoa_fisica);
    $cadastrar_pessoa_fisica->bindParam(':cd_cpf', $dados['cd_cpf'], PDO::PARAM_STR);
    $cadastrar_pessoa_fisica->bindParam(':cd_cliente', $id_cliente, PDO::PARAM_INT);
    $cadastrar_pessoa_fisica->bindParam(':cd_bairro', $id_bairro, PDO::PARAM_INT);
    
    $id_pessoa_fisica = $conn->lastInsertId();



    if($cadastrar_pessoa_fisica->execute()){
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'><p style='font-size: 20px;' >Cadastro do Usuário <string>$cliente</string> concluido com Sucesso!</p></div>";
        header("Location: form-validation.php");
    
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' ><p style='font-size: 15px;'>ERRO!  Usuário não Cadastrado!</p></div>";
         header("Location: form-validation.php");
    }
    
    }
    
    
    echo json_encode($retorna);