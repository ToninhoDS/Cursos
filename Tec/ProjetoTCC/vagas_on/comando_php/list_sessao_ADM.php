
<?php

include("crud_php/conexao_cadastro.php");
include("crud_php/conexao_configuracao_sistema_form.php");
$paginaSessao = filter_input(INPUT_GET, "paginaSessao", FILTER_SANITIZE_NUMBER_INT);
// recuperando o id do Gerente
// session_start(); 

ob_start();

include_once '../adm/config/valida_token.php';

if(!validarToken()){

    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário realizar o login para acessar a página!</p>";

    header("Location:../adm/erro_404.php");

    exit();
}

$img_log = '';
$dig_msg = '';
// validar se é funcionario
$id_Login = recuperarIdGerenteToken();
$invert_data = 0;




if (!empty($paginaSessao)) { 
    $inicio = $qt_tabela_notificacao;
    $query_sessao_adm = "SELECT cd_registro_de_sistema, nm_nome_acao, nm_descricao_acao, 
    nm_origem, nm_funcionario, nm_empresa, dt_hora, dt_data, nm_gerente, nm_cargo 
    FROM tb_registro_de_sistema 
    ORDER BY cd_registro_de_sistema DESC LIMIT $inicio";
    $result_sessao_adm = $conn->prepare($query_sessao_adm);
    $result_sessao_adm->execute();
    if (($result_sessao_adm) and ($result_sessao_adm->rowCount() != 0)) {
        $dados = "";
while ($row_usuario = $result_sessao_adm->fetch(PDO::FETCH_ASSOC)) {
    extract($row_usuario);

    //arrumar a data
    $invert_data = $dt_data;
    $invert_data = date("d/m/Y");
    // validar imagem da notificação
    if($nm_nome_acao == "LOGIN"){
        $img_log ="login_acesso.png";
        $dig_msg = 'acabou de fazer:';
    }else{if($nm_nome_acao == "LOGOFF"){

        $img_log ="login_saiu.png";
        $dig_msg = 'acabou de fazer:';
    }else{if($nm_nome_acao == "DELETE"){

        $img_log ="relatorio_delete.png";
        $dig_msg = 'ação executada:';
    }else{if($nm_nome_acao == "UPDATE"){

        $img_log ="relatorio_update.png";
        $dig_msg = 'ação executada';
    }else{if($nm_nome_acao == "CADASTRO"){

        $img_log ="cadastro_semd.png";
        $dig_msg = 'ação executada';
    }else{if($nm_nome_acao == "Livre"){

        $img_log ="disponivel_vagas.png";
        $dig_msg = 'alterou a vaga para:';
    }else{if($nm_nome_acao == "Ocupado"){

        $img_log ="estaci002.png";
        $dig_msg = 'alterou a vaga para:';
    }else{if($nm_nome_acao == "Reserva"){
        $dig_msg = 'alterou a vaga para:';
        $img_log ="gestenci_esta.png";
    }else{
            
    }}}}}}}}
    $dados .= "<a class='list-group-item list-group-item-action'>
    <div class='notification-info' style='padding: 4px;border: 0.5px solid  rgba(199, 209, 209, 0.616);'>
        <div style='margin:10px' class='notification-list-user-img'><img src='../img/$img_log' alt='' class='user-avatar-md-sessao rounded-circle'></div>
        <div class='notification-list-user-block'><span class='notification-list-user-name'>$nm_cargo,</span> $dig_msg <strong>$nm_nome_acao.</strong>
            <div class='notification-date'>Hora:&nbsp;$dt_hora&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;data:&nbsp;$invert_data</div>
        </div>
    </div>
</a>
    ";
}

        $retorna_sessao = ['status' => true, 'dados_sessao' => $dados];
    } else {
       
    }
} else {
    
}


echo json_encode($retorna_sessao);


