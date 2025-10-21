<?php

session_start();
ob_start();

include_once "crud_php/conexao_cadastro.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
 //echo var_dump($dados);


 //DADOS DO GERENTE
 //echo var_dump($row_gerente);
 $id_gerente = $row_gerente['cd_gerente'];
 $nome_gerente = $row_gerente['nm_gerente'];

 //pegando imagem array para tratar ela 
 $nome_imagem = $_FILES['img_imagem']['name'];

 

//deixar o nome tudo maiuscula
$nm_cargo = $dados['nm_cargo'];
$nm_cargo =strtoupper($nm_cargo );
$nm_nomeFuncionario = $dados['nm_nome'];
$nm_cargo =strtoupper($nm_cargo );
$sg_uf = $dados['sg_uf'];
$sg_uf =strtoupper($sg_uf );
// $nome_Funcionario = $dados['nm_nome'];
// $nome_Funcionario =strtoupper($nome_Funcionario );

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
    $nm_origem ='CADASTRO DE FUNCIONARIO';

    // depois da avalidação sera add no banco de dados 
  
    $query_sg_uf_empresa = "INSERT INTO tb_uf_empresa (sg_uf)
    VALUES (:sg_uf)";
    $cadastrar_sg_uf_empresa= $conn->prepare($query_sg_uf_empresa);
    $cadastrar_sg_uf_empresa->bindParam(':sg_uf',$sg_uf , PDO::PARAM_STR);
    $cadastrar_sg_uf_empresa->execute();
    $id_sg_uf = $conn->lastInsertId();

    $query_cidade_empresa = "INSERT INTO tb_cidade_empresa (nm_cidade, cd_uf)
    VALUES (:nm_cidade, :cd_uf)";
    $cadastrar_cidade_empresa= $conn->prepare($query_cidade_empresa);
    $cadastrar_cidade_empresa->bindParam(':nm_cidade',  $dados['nm_cidade'], PDO::PARAM_STR);
    $cadastrar_cidade_empresa->bindParam(':cd_uf', $id_sg_uf, PDO::PARAM_INT);
    $cadastrar_cidade_empresa->execute();
    $id_cidade = $conn->lastInsertId();

    $query_bairro_empresa = "INSERT INTO tb_bairro_empresa (nm_bairro, cd_cidade)
    VALUES (:nm_bairro, :cd_cidade)";
    $cadastrar_bairro_empresa= $conn->prepare($query_bairro_empresa);
    $cadastrar_bairro_empresa->bindParam(':nm_bairro', $dados['nm_bairro'], PDO::PARAM_STR);
    $cadastrar_bairro_empresa->bindParam(':cd_cidade', $id_cidade, PDO::PARAM_INT);
    $cadastrar_bairro_empresa->execute();
    $id_bairro = $conn->lastInsertId();


    // Salvando a imagem em uma pasta
	//Substituir os caracteres especiais
	$original = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:,\\\'<>°ºª';
    $substituir = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                ';	
	$nome_imagem = strtr(utf8_decode($nome_imagem), utf8_decode($original), $substituir);
	
	//Substituir o espaco em branco pelo traco
	$nome_imagem = str_replace(' ', '-', $nome_imagem);
	
	//Converter para minusculo
	$nome_imagem = strtolower($nome_imagem);

   
	echo "Nome da Imagem do produto: $nome_imagem <br>";

	//Salvar no banco de dados
    $query_funcionario = "INSERT INTO tb_funcionario 
    (nm_nome, nm_cargo, nm_formacao, dt_emissao_contratual, nm_sexo, nm_maternidade, nm_estado_civil, cd_data_nascimento,  cd_idade, cd_cpf, cd_rg, cd_credencial, cd_email_funcionario, cd_senha_funcionario, cd_telefone, img_imagem, cd_bairro, cd_gerente)
    
    VALUES (:nm_nome, :nm_cargo, :nm_formacao, :dt_emissao_contratual, :nm_sexo, :nm_maternidade, :nm_estado_civil, :cd_data_nascimento, :cd_idade, :cd_cpf, :cd_rg, :cd_credencial, :cd_email_funcionario, :cd_senha_funcionario, :cd_telefone, :img_imagem, :cd_bairro, :cd_gerente)";

    $cadastrar_funcionario = $conn->prepare($query_funcionario);
    $cadastrar_funcionario->bindParam(':nm_nome', $dados['nm_nome'], PDO::PARAM_STR);
    $cadastrar_funcionario->bindParam(':nm_cargo', $dados['nm_cargo']);
    $cadastrar_funcionario->bindParam(':nm_formacao', $dados['nm_formacao']);
    $cadastrar_funcionario->bindParam(':dt_emissao_contratual', $dados['dt_emissao_contratual']);
    $cadastrar_funcionario->bindParam(':nm_sexo', $dados['nm_sexo']);
    $cadastrar_funcionario->bindParam(':nm_maternidade', $dados['nm_maternidade']);
    $cadastrar_funcionario->bindParam(':nm_estado_civil', $dados['nm_estado_civil']);
    $cadastrar_funcionario->bindParam(':cd_data_nascimento', $dados['cd_data_nascimento']);
    $cadastrar_funcionario->bindParam(':cd_idade', $dados['cd_idade']);
    $cadastrar_funcionario->bindParam(':cd_cpf', $dados['cd_cpf']);
    $cadastrar_funcionario->bindParam(':cd_rg', $dados['cd_rg']);
    $cadastrar_funcionario->bindParam(':cd_credencial', $dados['cd_credencial']);
    $cadastrar_funcionario->bindParam(':cd_email_funcionario', $dados['cd_email_funcionario']);
    $cadastrar_funcionario->bindParam(':cd_senha_funcionario', $dados['cd_senha_funcionario']);
    $cadastrar_funcionario->bindParam(':cd_telefone', $dados['cd_telefone']);
    $cadastrar_funcionario->bindParam(':img_imagem', $nome_imagem);
    $cadastrar_funcionario->bindParam(':cd_bairro', $id_bairro, PDO::PARAM_INT);
    $cadastrar_funcionario->bindParam(':cd_gerente', $id_gerente ,PDO::PARAM_INT);
    $cadastrar_funcionario->execute(); // para execultar 
    //var_dump($conn->lastInsertId()); //puxar o id
    $id_funcionario = $conn->lastInsertId();
    
	echo "Ultimo Id Inserido: $id_funcionario <br>";
	
	//Pasta onde o arquivo vai ser salvo nome do gerente e o seu id para ser o nome
	$_UP['pasta'] = '../img_funcionario/'.$nome_gerente.'_id-'.$id_gerente.'/';
	
	//Criar a pasta de foto do produto
	mkdir($_UP['pasta'], 0777);
	
	//Verificar se é possive mover o arquivo para a pasta escolhida
    if(move_uploaded_file($_FILES['img_imagem']['tmp_name'],$_UP['pasta'].$nome_imagem)){
		echo "Imagem salva com sucesso!<br>";
	}else{
        echo 'errp';
    }

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
    $id_relatorio_atividade = $conn->lastInsertId();
    //fim

    

    if($cadastrar_relatorio_atividade->execute()){
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'><p style='font-size: 20px;' >Cadastro do Funcionário <string>$nm_nomeFuncionario</string> concluido com Sucesso!</p></div>";
        header("Location: adm.php");
    
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' ><p style='font-size: 15px;'>ERRO! Funcionário não Cadastrado!</p></div>";
        header("Location: adm.php");
    }
    
 
    
    
    echo json_encode($retorna);