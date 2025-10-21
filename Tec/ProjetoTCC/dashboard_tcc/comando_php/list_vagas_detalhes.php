
<?php

include("crud_php/conexao_cadastro.php");
$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if (!empty($pagina)) {
    $qnt_result_pg = 100; 
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;
    $query_usuarios = "SELECT  cd_status_vagas, cd_numero_vaga, nm_nome, img_icon, dt_entrada, sg_placa, cd_cpf, nm_status FROM tb_status_vagas ORDER BY cd_numero_vaga  DESC LIMIT $inicio, $qnt_result_pg";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();
    if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {
        $dados = "<div class='card-body p-0'>
                <div class='table-responsive'>
                    <table class='table' id='my-table'>
                        <thead class='bg-light'>
                            <tr class='border-0' style='font-size: 16px;font-family: Impact, fantasy;'>
                                <th class='border-0' >Nº Vagas</th>
                                <th class='border-0'>Imagem</th>
                                <th class='border-0'>Name</th>
                                <th class='border-0'>CPF</th>
                                <th class='border-0'>Placa</th>
                                <th class='border-0'>Data Entrada</th>
                                <th class='border-0'>Entrada</th>
                                <th class='border-0'>Hrs Vagas</th>
                                <th class='border-0'>Status</th>
                                <th class='border-0 alter_vagas' ><p>Alterar Vaga</p></th>   
                            </tr>
                        </thead>
                        <tbody>";
while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    extract($row_usuario);
    $Option_img = $row_usuario ['img_icon']; 
    $hora_min_vaga = $row_usuario ['dt_entrada']; 
    $ocultar_cpf = substr_replace($cd_cpf, '***.***', 4, -3); // ocutando o CPF
    $data_vagas = date("d/m/Y");
    $horas_min_atual_vagas = date("H:i:s");
    $diff = strtotime($horas_min_atual_vagas) - strtotime($hora_min_vaga);
    $diff_seconds = abs($diff );
    $diff_minutes = round($diff_seconds / 60 );
    $diff_hours = round( $diff_minutes / 60 );
    $diff_hours -= 1; 
    if ($diff_minutes >= 60) {
        $saber_horas_vagas = floor($diff_minutes / 60);
        $diff_minutes = $diff_minutes % 60;
} else {}
                             
                            
    if($row_usuario ['img_icon'] == 'Carro'){
        $img_icon ="../img/carro_vagas.png";
    }else{if($row_usuario ['img_icon'] == 'Moto'){
        $img_icon ="../img/moto_vagas.png";
    }else{if($row_usuario ['img_icon'] == 'Bicicleta'){
        $img_icon ="../img/bike_vagas.jpg";
    }else{if($row_usuario ['img_icon'] == 'Patins'){
        $img_icon ="../img/patins_vagas.png";
    }else{if($row_usuario ['img_icon'] == 'Outros'){
        $img_icon ="../img/outros_vagas.png";
    }else{if($row_usuario ['img_icon'] == 'Livre'){
        $img_icon ="../img/disponivel_vagas.png";
    }else{if($row_usuario ['img_icon'] == ''){
        $img_icon ="../img/disponivel_vagas.png";
    }else{}
}}}}}}
    // limpar a tabela quando select for Livre
    if($row_usuario ['nm_status'] == 'Livre'){
        $status = 'badge-success';
        $img_icon = "../img/disponivel_vagas.png";
        $diff_hours = 0;
        $diff_minutes = 0;
        $data_vagas = '';
        $cd_cpf = '';
    }elseif($row_usuario ['nm_status'] == 'Reserva'){
        $status = 'badge-danger';
}else{
        $status = 'badge-brand';
}


    $dados .= "
    <tr>
    <td id='valor_id$cd_status_vagas'>$cd_numero_vaga</td>
    <td>

    <select onchange='javascript:mostraAlerta(this);' id='img_Option$cd_status_vagas' name='$Option_img' value='$Option_img' style='display:none' class='btn btn-primary dropdown-toggle'>
        
        <option name='$Option_img' value='$Option_img'selected>$Option_img</option>
        <option name='Carro' value='Carro'>Carro</option>
        <option name='Moto' value='Moto'>Moto</option>
        <option name='Bicicleta' value='Bicicleta'>Bicicleta</option>
        <option name='Patins' value='Patins'>Patins</option>
        <option name='Outros' value='Outros'>Outros</option>
        </select>
    

    <div id='img_status_vagas$cd_status_vagas' style='display:block' class='m-r-10'><img  id='valor_img$img_icon' src='$img_icon' alt='user' class='rounded' width='45'></div>
    </td>
    
    <td id='valor_nome$cd_status_vagas'>$nm_nome</td>
    <td id='valor_cpf$cd_status_vagas'>$ocultar_cpf</td>
    <td id='valor_placa$cd_status_vagas'>$sg_placa</td>
    <td id='valor_horas$cd_status_vagas'>$data_vagas </td>
    <td id='valor_entrada$cd_status_vagas'>$dt_entrada</td>
    <td id='valor_horas$cd_status_vagas'>$diff_hours:$diff_minutes Hrs</td>
    
    <td>
        <div id='status_cores$cd_status_vagas' style='display:block;font-size:20px;color: black;'><span class='badge-dot $status mr-1' id='status'></span >$nm_status</div>
    </td>
    
    <td class='d-flex botaov'>

        <select id='Select_Option$cd_status_vagas' name='$nm_status' value='$nm_status' style='display:none;font-size:14px;margin: 0px 5px;' class='btn btn-primary  dropdown-toggle'>
        <option name='$nm_status' value='$nm_status'selected>$nm_status</option>
        <option name='Livre' value='Livre'>Livre</option>
        <option name='Reserva' value='Reserva'>Reserva</option>
        <option name='Ocupado' value='Ocupado'>Ocupado</option>
        </select>

        <button type='button' id='botao_editar$cd_status_vagas' class='btn btn-warning btn-sm me-1' onclick='editar_registro($cd_status_vagas)'>Editar</button>
        
        <button type='button' id='botao_salvar$cd_status_vagas' class='btn btn-warning btn-sm me-1'onclick='salvar_registro($cd_status_vagas)' style='display:none;font-size:12px;'>Salvar  </button>

        <button type='button' id='cancelarRG_salvar$cd_status_vagas' class='btn btn-warning btn-sm me-1'onclick='cancelar_registro($cd_status_vagas)' style='display:none;font-size:12px;margin: 0 5px;'>Cancelar  </button>
        
        <button style='margin: 0 5px; type='button' id='botao_visualizar$cd_status_vagas' value='$cd_status_vagas'name='id_visualizar$cd_status_vagas'class='btn btn-info btn-sm me-1'onclick='visualizar($cd_status_vagas)'>Informações</button>
                                            
     </td>
</tr>";
}

    $dados .= "</tbody>
        </table>
</div>";

        $query_pg = "SELECT COUNT(cd_status_vagas) AS num_result FROM tb_status_vagas";
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


