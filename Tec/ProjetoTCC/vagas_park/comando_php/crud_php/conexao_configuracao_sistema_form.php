<?php
include  "conexao_cadastro.php";

$query_config_sistema = "SELECT 
                    cd_configuracao_dashboard, 
                    vl_carro_tolerancia, 
                    vl_carro_entrada, 
                    vl_carro_hora, 
                    vl_moto_tolerancia, 
                    vl_moto_entrada, 
                    vl_moto_hora, 
                    vl_bike_tolerancia, 
                    vl_bike_entrada, 
                    vl_outros_tolerancia, 
                    vl_outros_entrada, 
                    qt_carro_vagas,
                    qt_moto_vagas, 
                    qt_bike_vagas, 
                    qt_outros_vagas, 
                    qt_tabela_cliente, 
                    qt_tabela_notificacao, 
                    qt_tabela_vagas, 
                    nm_layout_navbar, 
                    nm_layout_font, 
                    nm_layout_zoom, 
                    nm_layout_discanso, 
                    qt_tabela_vagas_detalhes, 
                    qt_tabela_relatorio_lixeira, 
                    qt_tabela_relatorio_limpar, 
                    qt_tabela_relatorio_atividade,
                    nm_config_nomeEmpresa, 
                    dt_hora, 
                    dt_data 
FROM tb_configuracao_dashboard";

$result_config_sistema = $conn->prepare($query_config_sistema);
$result_config_sistema->execute();

if (($result_config_sistema) and ($result_config_sistema->rowCount() != 0)) {
$row_funcionario = $result_config_sistema->fetch(PDO::FETCH_ASSOC);

$cd_configuracao_dashboard = $row_funcionario['cd_configuracao_dashboard'];
$vl_carro_tolerancia = $row_funcionario['vl_carro_tolerancia'];
$vl_carro_entrada = $row_funcionario['vl_carro_entrada'];
$vl_carro_hora = $row_funcionario['vl_carro_hora'];
$vl_moto_tolerancia = $row_funcionario['vl_moto_tolerancia'];
$vl_moto_entrada = $row_funcionario['vl_moto_entrada'];
$vl_moto_hora = $row_funcionario['vl_moto_hora'];
$vl_bike_tolerancia = $row_funcionario['vl_bike_tolerancia'];
$vl_bike_entrada = $row_funcionario['vl_bike_entrada'];
$vl_outros_tolerancia = $row_funcionario['vl_outros_tolerancia'];
$vl_outros_entrada = $row_funcionario['vl_outros_entrada'];
$qt_carro_vagas = $row_funcionario['qt_carro_vagas'];
$qt_moto_vagas = $row_funcionario['qt_moto_vagas'];
$qt_bike_vagas = $row_funcionario['qt_bike_vagas'];
$qt_outros_vagas = $row_funcionario['qt_outros_vagas'];
$qt_tabela_cliente = $row_funcionario['qt_tabela_cliente'];
$qt_tabela_notificacao = $row_funcionario['qt_tabela_notificacao'];
$qt_tabela_vagas = $row_funcionario['qt_tabela_vagas'];
$nm_layout_navbar = $row_funcionario['nm_layout_navbar'];
$nm_layout_font = $row_funcionario['nm_layout_font'];
$nm_layout_zoom = $row_funcionario['nm_layout_zoom'];
$nm_layout_discanso = $row_funcionario['nm_layout_discanso'];
$qt_tabela_vagas_detalhes = $row_funcionario['qt_tabela_vagas_detalhes'];
$qt_tabela_relatorio_lixeira = $row_funcionario['qt_tabela_relatorio_lixeira'];
$qt_tabela_relatorio_limpar = $row_funcionario['qt_tabela_relatorio_limpar'];
$qt_tabela_relatorio_atividade = $row_funcionario['qt_tabela_relatorio_atividade'];
$config_nomeEmpresa = $row_funcionario['nm_config_nomeEmpresa'];
$dt_hora_config_sistema = $row_funcionario['dt_hora'];
$dt_data_config_sistema = $row_funcionario['dt_data'];
$dt_data_config_sistema = date("d/m/Y");

//  $config_nomeEmpresa = 'Nome da Sua empresa';



} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: inválida!</p>";
}

?>

