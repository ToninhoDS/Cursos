<?php
include_once "crud_php/conexao_cadastro.php";

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if (!empty($pagina)) {

    //Calcular o inicio visualização
    $qnt_result_pg = 10; //Quantidade de registro por página
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    $query_usuarios = "SELECT c.cd_cliente,  c.nm_cliente, pf.cd_cpf, c.cd_email_cliente, b.nm_bairro, ci.nm_cidade, uf.sg_uf, tf.cd_numero1, ve.cd_placa, mo.nm_modelo, ma.nm_marca, co.nm_cor
    from tb_cliente as c
    join tb_pessoa_fisica as pf
    on pf.cd_cliente = c.cd_cliente
    
    join tb_bairro as b
    on pf.cd_bairro = b.cd_bairro
    
    join tb_cidade as ci
     on ci.cd_cidade = b.cd_cidade
     
    join tb_uf as uf 
    on uf.cd_uf = ci.cd_uf
    
    join tb_telefone as tf
    on tf.cd_cliente = c.cd_cliente
    
    join tb_veiculo as ve 
    on ve.cd_cliente = c.cd_cliente
    
    join tb_modelo as mo 
    on mo.cd_modelo = ve.cd_modelo
    
    join tb_marca as ma
    on ma.cd_marca = mo.cd_marca
    
    join tb_cor as co
    on co.cd_cor = ve.cd_cor
    ORDER BY cd_cliente DESC LIMIT $inicio, $qnt_result_pg";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {

        $dados = "<div class='card-body p-0'>
        <div class='table-responsive'>
            <table class='table' id='my-table'>
                <thead class='bg-light'>
                    <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Placa</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Ações</th>>
                    </tr>
                </thead>
                <tbody>";
        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
            extract($row_usuario);
            $ocultar_cpf = substr_replace($cd_cpf, '***.***', 4, -3); // ocutando o CPF
            $dados .= "<tr>
                    <td id='valor_id$cd_cliente'>$cd_cliente</td>
                    <td id='valor_nome$cd_cliente'>$nm_cliente</td>
                    <td  id='valor_cpf$cd_cliente'>$ocultar_cpf</td>
                    <td id='valor_placa$cd_cliente'>$cd_placa</td>
                    <td id='valor_email$cd_cliente'>$cd_email_cliente</td>
                    <td id='valor_telefone$cd_cliente'>$cd_numero1</td>
                    <td class='d-flex botaov'>
                        
                        <button type='button' id='botao_editar$cd_cliente' class='btn btn-warning btn-sm me-1' onclick='editar_registro($cd_cliente)'>Editar</button>
                        
                        <button type='button' id='botao_salvar$cd_cliente' class='btn btn-warning btn-sm me-1'onclick='salvar_registro($cd_cliente)' style='display:none;font-size:12px;'>Salvar  </button>

                        <button type='button' id='cancelarRG_salvar$cd_cliente' class='btn btn-warning btn-sm me-1'onclick='cancelar_registro($cd_cliente)' style='display:none;font-size:12px'>Cancelar  </button>
                        
                        <button type='button' id='botao_excluir$cd_cliente' class='btn btn-danger btn-sm me-1'onclick='excluir_registro($cd_cliente)'>Excluir</button>
                        <button type='button' id='botao_confirma$cd_cliente' value='$cd_cliente'name='id_confirma$cd_cliente'class='btn btn-danger btn-sm me-1'onclick='confirma_registro($cd_cliente)' style='display:none;font-size:9px'>Confirma</button>
                        <button type='button' id='botao_excluir_cancelar$cd_cliente' value='$cd_cliente'name='id_cancela$cd_cliente'class='btn btn-danger btn-sm me-1'onclick='cancelar_excluir($cd_cliente)' style='display:none;font-size:10px'>Cancelar</button>

                        <button type='button' id='botao_visualizar$cd_cliente' value='$cd_cliente'name='id_visualizar$cd_cliente'class='btn btn-info btn-sm me-1'onclick='visualizar($cd_cliente)'>Informações</button>
                        
                        
                    </td>
                </tr>";
        }

        $dados .= "</tbody>
        </table>
    </div><br>";

        //Paginação - Somar a quantidade de usuários
        $query_pg = "SELECT COUNT(cd_cliente) AS num_result FROM tb_cliente";
        $result_pg = $conn->prepare($query_pg);
        $result_pg->execute();
        $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

        //Quantidade de pagina
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

        $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($quantidade_pg)'>Última</a></li>";
        $dados .=   '</ul></nav>';

        $retorna = ['status' => true, 'dados' => $dados];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>
        Alera esta com ERRRO Usuario nao encontrado!
      </div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>
    Alera esta com ERRRO Usuario nao encontrado!
  </div>"];
}


echo json_encode($retorna);
