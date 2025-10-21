
<?php

include("crud_php/conexao_cadastro.php");
$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

                            
if (!empty($pagina)) {
    $qnt_result_pg = 30; 
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;
    $query_usuarios = "SELECT  cd_relatorio_atividade_lixeira, nm_nome_acao, nm_origem, nm_funcionario, cd_funcionario, dt_hora, dt_data, img_icon FROM tb_relatorio_atividade_lixeira ORDER BY cd_relatorio_atividade_lixeira DESC LIMIT $inicio, $qnt_result_pg";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();
    if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {
        $dados = "<div class='card-body p-0'>
        <div class='table-responsive'>
            <table class='table' id='my-table'>
                <thead class='bg-light'>
                    <tr class='border-0' style='font-size: 17px;font-family: Impact, fantasy;'>
                        <th  class='border-0' >ID</th>
                        <th class='border-0'>IMAGEM</th>
                        <th class='border-0'>AÇÃO</th>
                        <th class='border-0'>ORIGEM</th>
                        <th class='border-0'>ID</th>
                        <th class='border-0'>FUNCIONARIO</th>
                        <th class='border-0'>HORA</th>
                        <th class='border-0'>DATA</th>
                        <th class='border-0'>
                        <div class='form-check'>

                        <button type='button' id='botao_confirma' value=''name='id_confirma'class='btn-danger btn-lg'onclick='confirma_registro()'' style='width: 180px; height: 35px;padding: 0px 25px;'>Limpar Lixeira</button>
                        
                        </th>
                                   
                            </tr>
                        </thead>
                        <tbody>
                        
                        <tr  class='$' >
                            <td id='valor_id'>-</td> 
                            <td><div id='img_status_vagas$' style='display:block' class='m-r-10'>
                                 -</div>
                             </td>
                            <td id='valor_nome$'>-</td>
                            <td  id='valor_cpf'>-</td>
                            <td id='valor_horas'>-</td>
                            <td id='valor_placa'>-</td>
                            <td id='valor_entrada'>-</td>
                            <td id='valor_horas'>-</td>
                            
                    </tr>";
while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    extract($row_usuario);
    $nm_nome_acao_tabela = '';
    if($row_usuario ['nm_nome_acao'] == "DELETE"){
        $nm_nome_acao_tabela ="table-danger";
    }else{if($row_usuario ['nm_nome_acao'] == 'UPDATE'){
        $nm_nome_acao_tabela ="table-primary";
    }else{if($row_usuario ['nm_nome_acao'] == 'INSERT'){
        $nm_nome_acao_tabela ="img/bike_vagas.jpg";
    }else{if($row_usuario ['nm_nome_acao'] == 'CADASTRO'){
        $nm_nome_acao_tabela ="table-success";
    }else{if($row_usuario ['nm_nome_acao'] == 'Livre'){
        $nm_nome_acao_tabela ="table-success";
    }else{if($row_usuario ['nm_nome_acao'] == 'Ocupado'){
        $nm_nome_acao_tabela ="table-warning";
    }else{if($row_usuario ['nm_nome_acao'] == 'Reserva'){
        $nm_nome_acao_tabela ="table-danger";
    }else{if($row_usuario ['nm_nome_acao'] == ''){
        $nm_nome_acao_tabela ="";
    }else{
            
    }}}}}}}}
    $dt_data = date("d/m/Y");
    $dados .= "
    <tr  class='$nm_nome_acao_tabela' >
        <td  id='valor_id$cd_relatorio_atividade_lixeira'>$cd_relatorio_atividade_lixeira</td> 
        <td><div id='img_status_vagas$cd_relatorio_atividade_lixeira' style='display:block' class='m-r-10'>
             <img id='valor_img$img_icon' src='../$img_icon' alt='user' class='rounded' width='45'></div>
         </td>
        <td id='valor_nome$cd_relatorio_atividade_lixeira'>$nm_nome_acao</td>
        <td  id='valor_cpf$cd_relatorio_atividade_lixeira'>$nm_origem</td>
        <td id='valor_horas$cd_relatorio_atividade_lixeira'>$cd_funcionario </td>
        <td id='valor_placa$cd_relatorio_atividade_lixeira'>$nm_funcionario</td>
        <td id='valor_entrada$cd_relatorio_atividade_lixeira'>$dt_hora</td>
        <td id='valor_horas$cd_relatorio_atividade_lixeira'>$dt_data</td>
        <td class='d-flex botaov'></td>
</tr>";
}

    $dados .= "</tbody>
        </table>
</div><br>";

        $query_pg = "SELECT COUNT(cd_relatorio_atividade_lixeira) AS num_result FROM tb_relatorio_atividade_lixeira";
        $result_pg = $conn->prepare($query_pg);
        $result_pg->execute();
        $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        $max_links = 2;

        $dados .= '<nav aria-label="Page navigation example"><ul class="pagination pagination-sm justify-content-center">';

        $dados .= "<li class='page-item'><a href='#' class='page-link' onclick='listarUsuarios(1)'>Primeira</a></li>";

        for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
            if ($pag_ant >= 1) {
                $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($pag_ant)' >$pag_ant</a></li>";
            }
        }

        $dados .= "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

        for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
            if ($pag_dep <= $quantidade_pg) {
                $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($pag_dep)'>$pag_dep</a></li>";
            }
        }

        $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($quantidade_pg)'>Última</a></li><li colspan='3'>
        <a href='#voltar' id='vagas-detalhes' class='page-link'>Voltar ao topo<img src='img/top_icon.png' width='20px'></a>
    </li>";
        $dados .=   "</ul></nav>";

        $retorna = ['status' => true, 'dados' => $dados];
    } else {
        $retorna = ['status' => false, 'msg' => "<a href='relatorio_atividade.php'><div class='alert alert-success' role='alert'>
        Lixeira Limpa! <strong>Voltar</strong>
       </div></a>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>
    Alera esta com ERRRO Usuario nao encontrado!
  </div>"];
}


echo json_encode($retorna);


