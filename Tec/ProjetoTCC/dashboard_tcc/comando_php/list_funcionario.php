
<?php

include_once "crud_php/conexao_cadastro.php";

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

//criando o caminho da pasta do gerente com as fotos


if (!empty($pagina)) {
    $qnt_result_pg = 10; 
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;
    $query_usuarios = "SELECT g.nm_gerente, f.cd_funcionario, f.nm_nome, f.nm_cargo, f.nm_sexo, f.cd_cpf, f.cd_credencial, f.cd_email_funcionario, f.img_imagem, f.cd_telefone
    FROM tb_gerente as g
    JOIN tb_funcionario as f
    ON   f.cd_gerente = g.cd_gerente
    WHERE g.cd_gerente = 1 ORDER BY f.cd_funcionario DESC LIMIT $inicio, $qnt_result_pg";
    $result_funcionario = $conn->prepare($query_usuarios);
    $result_funcionario->execute();
    if (($result_funcionario) and ($result_funcionario->rowCount() != 0)) {
        $dados = "<table class='table table-bordered'>
        <thead>
            <tr style='font-size:16px;>
                <th  scope='col'></th>
                <th scope='col'>Foto</th>
                <th scope='col'>Nome</th>
                <th scope='col'>Cargo</th>
                <th scope='col'>Credenciais</th>
                <th scope='col'>Telefone</th>
                <th scope='col'>Ações</th>
            </tr>
        </thead>
        <tbody>";
        while ($row_usuario = $result_funcionario->fetch(PDO::FETCH_ASSOC)) {
            extract($row_usuario);
            $dados .= "
            <tr>
            <td style='display:none;' id='valor_id$cd_funcionario'>$cd_funcionario</td>
            <td >
                <div id='img_status_vagas$cd_funcionario' style='display:block' class='m-r-10'><img  id='valor_img$img_imagem' src='$diretorio/$img_imagem'  alt='user' class='rounded' width='70px'height='70px' style='margin: auto;'>
                </div>
            </td>
            
            <td id='valor_nome$cd_funcionario'>$nm_nome</td>
            <td id='valor_placa$cd_funcionario'>$nm_cargo</td>
            <td id='valor_credencial$cd_funcionario'>$cd_credencial</td>
            
            <td id='valor_entrada$cd_funcionario'>$cd_telefone</td>
            <td >
                 <button class='btn btn-info btn-sm me-1'  id='botao_visualizar$cd_funcionario' value='$cd_funcionario'name='id_visualizar$cd_funcionario' onclick='visualizar($cd_funcionario)'>Informações</button>
                 <button class='btn btn-danger btn-sm me-1'  id='botao_delete_funcionario$cd_funcionario' value='$cd_funcionario'name='id_delete_funcionario$cd_funcionario' onclick='delete_funcionario($cd_funcionario)'>Delete</button>
             </td>
             </td>
        </tr>";
        }
        
            $dados .= "</tbody>
                </table>
        </div><br>";

        $query_pg = "SELECT COUNT(cd_funcionario) AS num_result FROM tb_funcionario";
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
        <a href='#voltar' id='vagas-detalhes' class='page-link'>Voltar ao topo<img src='../img/top_icon.png' width='20px'></a>
    </li>";
        $dados .=   "</ul></nav>";

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


