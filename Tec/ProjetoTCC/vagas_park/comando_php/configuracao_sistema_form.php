<?php

session_start();
ob_start();
include_once '../adm/config/valida_token.php';

if(!validarToken()){

    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário realizar o login para acessar a página!</p>";

    header("Location:../adm/erro_404.php");

    exit();
}
include_once "crud_php/conexao_cadastro.php"; // conexao
include_once "adm_sessao.php"; // trazer os contadores

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
// $id = 1;
// echo var_dump($dados);

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
$nm_origem ='UPDATE ITEM DO RELATÓRIO DE ATIVIDADE';

   // informações do relatorio do sistema
   $nm_empresa = 'Empresa Vagas Park, São Vicente';
   $nome_Funcionario = recuperarNomeToken();
   $cargo = recuperarCargoToken();
   $cd_funcionario = recuperarIdGerenteToken();

$invert_data = $dataRelatorio;
$invert_data = date("d/m/Y");
   // validar se é funcionario
   if($cargo == 'Funcionario'){
     
      $func_Relat_Ativ = $nome_Funcionario;
      $gerente_Relat_Ativ = null;
   }else{
       $gerente_Relat_Ativ = $nome_Funcionario;
      $func_Relat_Ativ = null;
   }
   $nm_descricao_acao ='Ação foi para EDITAR Configurações do Sistema';
   $acao_SistemaOculto = 'UPDATE';
   // fim


if(empty($dados['cd_configuracao_dashboard'])){
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' ><p style='font-size: 15px;'>ERRO! Não tem o ID!</p></div>";
}else{
   
    $query_edit_config_sistema ="UPDATE tb_configuracao_dashboard 
                    SET 
                            vl_carro_tolerancia =:carro_tolerancia, 
                            vl_carro_entrada =:carro_entrada, 
                            vl_carro_hora =:carro_hora, 
                            vl_moto_tolerancia =:moto_tolerancia, 
                            vl_moto_entrada =:moto_entrada, 
                            vl_moto_hora =:moto_hora, 
                            vl_bike_tolerancia =:bike_tolerancia, 
                            vl_bike_entrada =:bike_entrada, 
                            vl_outros_tolerancia =:outros_tolerancia, 
                            vl_outros_entrada =:outros_entrada, 
                            qt_carro_vagas =:carro_vagas, 
                            qt_moto_vagas =:moto_vagas, 
                            qt_bike_vagas =:bike_vagas, 
                            qt_outros_vagas =:outros_vagas, 
                            qt_tabela_cliente =:tabela_cliente, 
                            qt_tabela_notificacao =:tabela_notificacao, 
                            qt_tabela_vagas =:tabela_vagas, 
                            nm_layout_navbar =:layout_navbar, 
                            nm_layout_font =:layout_font, 
                            nm_layout_zoom =:layout_zoom, 
                            nm_layout_discanso =:layout_discanso, 
                            qt_tabela_vagas_detalhes =:tabela_vagas_detalhes, 
                            qt_tabela_relatorio_lixeira =:tabela_relatorio_lixeira, 
                            qt_tabela_relatorio_limpar =:tabela_relatorio_limpar, 
                            qt_tabela_relatorio_atividade =:tabela_relatorio_atividade,
                            nm_config_nomeEmpresa  =:config_nomeEmpresa,
                            dt_hora =:hora_sistema_dash, 
                            dt_data =:data_sistema_dash 
                    WHERE   cd_configuracao_dashboard =:id";
    $edit_config_sistema = $conn->prepare($query_edit_config_sistema);
    $edit_config_sistema->bindParam(':carro_tolerancia', $dados['vl_carro_tolerancia']);
    $edit_config_sistema->bindParam(':carro_entrada', $dados['vl_carro_entrada']);
    $edit_config_sistema->bindParam(':carro_hora', $dados['vl_carro_hora']);
    $edit_config_sistema->bindParam(':moto_tolerancia', $dados['vl_moto_tolerancia']);
    $edit_config_sistema->bindParam(':moto_entrada', $dados['vl_moto_entrada']);
    $edit_config_sistema->bindParam(':moto_hora', $dados['vl_moto_hora']);
    $edit_config_sistema->bindParam(':bike_tolerancia', $dados['vl_bike_tolerancia']);
    $edit_config_sistema->bindParam(':bike_entrada', $dados['vl_bike_entrada']);
    $edit_config_sistema->bindParam(':outros_tolerancia', $dados['vl_outros_tolerancia']);
    $edit_config_sistema->bindParam(':outros_entrada', $dados['vl_outros_entrada']);
    $edit_config_sistema->bindParam(':carro_vagas', $dados['qt_carro_vagas']);
    $edit_config_sistema->bindParam(':moto_vagas', $dados['qt_moto_vagas']);
    $edit_config_sistema->bindParam(':bike_vagas', $dados['qt_bike_vagas']);
    $edit_config_sistema->bindParam(':outros_vagas', $dados['qt_outros_vagas']);
    $edit_config_sistema->bindParam(':tabela_cliente', $dados['qt_tabela_cliente']);
    $edit_config_sistema->bindParam(':tabela_notificacao', $dados['qt_tabela_notificacao']);
    $edit_config_sistema->bindParam(':tabela_vagas', $dados['qt_tabela_vagas']);
    $edit_config_sistema->bindParam(':layout_navbar', $dados['nm_layout_navbar']);
    $edit_config_sistema->bindParam(':layout_font', $dados['nm_layout_font']);
    $edit_config_sistema->bindParam(':layout_zoom', $dados['nm_layout_zoom']);
    $edit_config_sistema->bindParam(':layout_discanso', $dados['nm_layout_discanso']);
    $edit_config_sistema->bindParam(':tabela_vagas_detalhes', $dados['qt_tabela_vagas_detalhes']);
    $edit_config_sistema->bindParam(':tabela_relatorio_lixeira', $dados['qt_tabela_relatorio_lixeira']);
    $edit_config_sistema->bindParam(':tabela_relatorio_limpar', $dados['qt_tabela_relatorio_limpar']);
    $edit_config_sistema->bindParam(':tabela_relatorio_atividade', $dados['qt_tabela_relatorio_atividade']);
    $edit_config_sistema->bindParam(':config_nomeEmpresa', $dados['nm_config_nomeEmpresa']);
    $edit_config_sistema->bindParam(':hora_sistema_dash',$horasRelatorio);
    $edit_config_sistema->bindParam(':data_sistema_dash', $dataRelatorio);
    $edit_config_sistema->bindParam(':id', $dados['cd_configuracao_dashboard']);
    $edit_config_sistema->execute();
   
    // add multplo insert no BANCO DE DADOS
    //CARRO
    $cd_numero_vaga_mult = 10;
    $nm_nome_mult = '';
    $img_icon_mult_carro = 'Carro';
    $img_icon_mult_moto = 'Moto';
    $img_icon_mult_bike = 'Bicicleta';
    $img_icon_mult_outros = 'Outros';
    $dt_entrada_mult = '';
    $sg_placa_mult = '';
    $cd_cpf_mult = '';
    $nm_status_mult = 'Livre';
    $valores_carro = $dados['qt_carro_vagas'];
    $valores_moto = $dados['qt_moto_vagas'];
    $valores_bike = $dados['qt_bike_vagas'];
    $valores_outros = $dados['qt_outros_vagas'];

    // TRATANDO CONTADOR PARA CRIAR EXCLUSAO EM MASSA $count_carro(vem de outra pag no includ);
    // if se o valor for zero, nao faça a repetição
    if(!$valores_carro == 0){
                $delet_vagas_Carro ="DELETE FROM 
                tb_status_vagas
                WHERE img_icon = 'Carro' 
                ORDER BY cd_numero_vaga 
                DESC LIMIT $count_carro";
                    $result_delet_vagas_Carro = $conn->prepare($delet_vagas_Carro);
                    $result_delet_vagas_Carro->execute();
            //fim
            for ( $i = 0, $valores_carro; $i < $valores_carro; $i++ )
            {
            $c_carro = 1;
            $c_carro = $c_carro + $i;
            $query_mult_vagasC = "INSERT INTO tb_status_vagas (
            cd_numero_vaga, 
            nm_nome, 
            img_icon, 
            dt_entrada, 
            sg_placa, 
            cd_cpf, 
            nm_status
            ) 
            VALUES (
            :cd_numero_vaga, 
            :nm_nome, 
            :img_icon, 
            :dt_entrada, 
            :sg_placa, 
            :cd_cpf, 
            :nm_status
            )";
            $cadastrar_mult_vagasC = $conn->prepare($query_mult_vagasC);
            $cadastrar_mult_vagasC->bindParam(':cd_numero_vaga', $c_carro);
            $cadastrar_mult_vagasC->bindParam(':nm_nome', $nm_nome_mult);
            $cadastrar_mult_vagasC->bindParam(':img_icon', $img_icon_mult_carro);
            $cadastrar_mult_vagasC->bindParam(':dt_entrada', $dt_entrada_mult);
            $cadastrar_mult_vagasC->bindParam(':sg_placa', $sg_placa_mult);
            $cadastrar_mult_vagasC->bindParam(':cd_cpf', $cd_cpf_mult);
            $cadastrar_mult_vagasC->bindParam(':nm_status', $nm_status_mult);
            $cadastrar_mult_vagasC->execute();

}
    }else{}
    
 // add multplo insert no banco CARRO @@@@@@ FIM  @@@@@
 if(!$valores_moto == 0){

                //Moto TRATANDO CONTADOR PARA CRIAR EXCLUSAO EM MASSA;
            $delet_vagas_moto ="DELETE FROM 
            tb_status_vagas
            WHERE img_icon = 'Moto' 
            ORDER BY cd_numero_vaga 
            DESC LIMIT $count_motos";
        $result_delet_vagas_moto = $conn->prepare($delet_vagas_moto);
        $result_delet_vagas_moto->execute();
        //fim
        for ( $i = 0, $valores_moto; $i < $valores_moto; $i++ )
        {
        $c_moto = 1;
        $c_moto = $c_moto + $i;
        $query_mult_vagasM = "INSERT INTO tb_status_vagas (
        cd_numero_vaga, 
        nm_nome, 
        img_icon, 
        dt_entrada, 
        sg_placa, 
        cd_cpf, 
        nm_status
        ) 
        VALUES (
        :cd_numero_vaga, 
        :nm_nome, 
        :img_icon, 
        :dt_entrada, 
        :sg_placa, 
        :cd_cpf, 
        :nm_status
        )";
        $cadastrar_mult_vagasM = $conn->prepare($query_mult_vagasM);
        $cadastrar_mult_vagasM->bindParam(':cd_numero_vaga', $c_moto);
        $cadastrar_mult_vagasM->bindParam(':nm_nome', $nm_nome_mult);
        $cadastrar_mult_vagasM->bindParam(':img_icon', $img_icon_mult_moto);
        $cadastrar_mult_vagasM->bindParam(':dt_entrada', $dt_entrada_mult);
        $cadastrar_mult_vagasM->bindParam(':sg_placa', $sg_placa_mult);
        $cadastrar_mult_vagasM->bindParam(':cd_cpf', $cd_cpf_mult);
        $cadastrar_mult_vagasM->bindParam(':nm_status', $nm_status_mult);
        $cadastrar_mult_vagasM->execute();

}
 }else{}
   
 // add multplo insert no banco Moto @@@@@@ FIM  @@@@@

if(!$valores_bike == 0){

                //Bike  TRATANDO CONTADOR PARA CRIAR EXCLUSAO EM MASSA;
                $delet_vagas_bike ="DELETE FROM 
                tb_status_vagas
                WHERE img_icon = 'Bicicleta' 
                ORDER BY cd_numero_vaga 
                DESC LIMIT $count_bicic";
        $result_delet_vagas_bike = $conn->prepare($delet_vagas_bike);
        $result_delet_vagas_bike->execute();
        //fim
        for ( $i = 0, $valores_bike; $i < $valores_bike; $i++ )
        {
        $c_bike = 1;
        $c_bike = $c_bike + $i;
        $query_mult_vagasM = "INSERT INTO tb_status_vagas (
        cd_numero_vaga, 
        nm_nome, 
        img_icon, 
        dt_entrada, 
        sg_placa, 
        cd_cpf, 
        nm_status
        ) 
        VALUES (
        :cd_numero_vaga, 
        :nm_nome, 
        :img_icon, 
        :dt_entrada, 
        :sg_placa, 
        :cd_cpf, 
        :nm_status
        )";
        $cadastrar_mult_vagasM = $conn->prepare($query_mult_vagasM);
        $cadastrar_mult_vagasM->bindParam(':cd_numero_vaga', $c_bike);
        $cadastrar_mult_vagasM->bindParam(':nm_nome', $nm_nome_mult);
        $cadastrar_mult_vagasM->bindParam(':img_icon', $img_icon_mult_bike);
        $cadastrar_mult_vagasM->bindParam(':dt_entrada', $dt_entrada_mult);
        $cadastrar_mult_vagasM->bindParam(':sg_placa', $sg_placa_mult);
        $cadastrar_mult_vagasM->bindParam(':cd_cpf', $cd_cpf_mult);
        $cadastrar_mult_vagasM->bindParam(':nm_status', $nm_status_mult);
        $cadastrar_mult_vagasM->execute();

        }

}else{}


 // add multplo insert no banco CARRO @@@@@@ FIM  @@@@@

 if(!$valores_outros == 0){
    //OUTROS  TRATANDO CONTADOR PARA CRIAR EXCLUSAO EM MASSA;
    $delet_vagas_outros ="DELETE FROM 
                        tb_status_vagas
                        WHERE img_icon = 'Outros' 
                        ORDER BY cd_numero_vaga 
                        DESC LIMIT $count_outros";
    $result_delet_vagas_outros = $conn->prepare($delet_vagas_outros);
    $result_delet_vagas_outros->execute();
    //fim
for ( $i = 0, $valores_outros; $i < $valores_outros; $i++ )
{
    $c_outros = 1;
    $c_outros = $c_outros + $i;
    $query_mult_vagasM = "INSERT INTO tb_status_vagas (
        cd_numero_vaga, 
        nm_nome, 
        img_icon, 
        dt_entrada, 
        sg_placa, 
        cd_cpf, 
        nm_status
        ) 
        VALUES (
        :cd_numero_vaga, 
        :nm_nome, 
        :img_icon, 
        :dt_entrada, 
        :sg_placa, 
        :cd_cpf, 
        :nm_status
        )";
        $cadastrar_mult_vagasM = $conn->prepare($query_mult_vagasM);
        $cadastrar_mult_vagasM->bindParam(':cd_numero_vaga', $c_outros);
        $cadastrar_mult_vagasM->bindParam(':nm_nome', $nm_nome_mult);
        $cadastrar_mult_vagasM->bindParam(':img_icon', $img_icon_mult_outros);
        $cadastrar_mult_vagasM->bindParam(':dt_entrada', $dt_entrada_mult);
        $cadastrar_mult_vagasM->bindParam(':sg_placa', $sg_placa_mult);
        $cadastrar_mult_vagasM->bindParam(':cd_cpf', $cd_cpf_mult);
        $cadastrar_mult_vagasM->bindParam(':nm_status', $nm_status_mult);
        $cadastrar_mult_vagasM->execute();

}
 }else{}

 // add multplo insert no banco OUTROS @@@@@@ FIM  @@@@@

        
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
    
    $id_registro_de_sistema = $conn->lastInsertId();
    //fim
    
    if($cadastrar_registro_de_sistema->execute()){
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'><p style='font-size: 20px;' >Alterações feita com Sucesso <string> Hora: $horasRelatorio</string> / <string> Data: $invert_data</string></p></div>";
        header("Location: configuracao.php");
    
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' ><p style='font-size: 15px;'>ERRO!</p></div>";
         header("Location: configuracao.php");
    }         
    
    
}

    


echo json_encode($retorna);