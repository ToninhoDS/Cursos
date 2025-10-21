
<?php

include("crud_php/conexao_cadastro.php");
include("crud_php/conexao_configuracao_sistema_form.php");
$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if (!empty($pagina)) {
    $qnt_result_pg = 1000; 
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;
    $query_usuarios = "SELECT  cd_status_vagas, cd_numero_vaga, nm_nome, img_icon, dt_entrada, sg_placa, cd_cpf, nm_status FROM tb_status_vagas WHERE img_icon = 'Moto' ORDER BY cd_numero_vaga  DESC LIMIT $inicio, $qnt_result_pg";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();
    if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {
        $dados = "<div class='card-body p-0'>
                <div class='table-responsive'>
                    <table class='table' id='my-table'>
                        <thead class='bg-light'>
                            <tr class='border-0' style='font-size: 16px;font-family: Impact, fantasy;'>
                                <th style='display:none;' class='border-0' >Tipo de veiculo</th>
                                <th class='border-0' >Nº Vagas</th>
                                <th class='border-0'>Name</th>
                                <th class='border-0'>CPF</th>
                                <th class='border-0'>Placa</th>
                                <th class='border-0'>Data Entrada</th>
                                <th class='border-0'>Entrada</th>
                                <th class='border-0'>Hrs Vagas</th>
                                <th class='border-0'>Status</th>
                                <th class='border-0 alter_vagas' ><p>Informações de Pagamento</p></th>   
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
        $tipo_veiculo ="Carro";
    }else{if($row_usuario ['img_icon'] == 'Moto'){
        $img_icon ="../img/moto_vagas.png";
        $tipo_veiculo ="Moto";
    }else{if($row_usuario ['img_icon'] == 'Bicicleta'){
        $img_icon ="../img/bike_vagas.jpg";
        $tipo_veiculo ="Bicicleta";
    }else{if($row_usuario ['img_icon'] == 'Patins'){
        $img_icon ="../img/patins_vagas.png";
        $tipo_veiculo ="Patins";
    }else{if($row_usuario ['img_icon'] == 'Outros'){
        $img_icon ="../img/outros_vagas.png";
        $tipo_veiculo ="Outros";
    }else{if($row_usuario ['img_icon'] == 'Livre'){
        $img_icon ="../img/disponivel_vagas.png";
        $tipo_veiculo ="Livre";
    }else{if($row_usuario ['img_icon'] == ''){
        $img_icon ="../img/disponivel_vagas.png";
        
    }else{}
}}}}}}
    // limpar a tabela quando select for Livre
    if($row_usuario ['nm_status'] == 'Livre'){
        $status = 'badge-success';
        // $img_icon = "../img/disponivel_vagas.png";
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
    <input type='text' id='valor_idP' style='display: none;' value='$cd_status_vagas'>
    <input type='text' id='valor_toleranciaP' style='display: none;' value='$vl_moto_tolerancia'>
    <input type='text' id='valor_entradaP' style='display: none;' value='$vl_moto_entrada'>
    <input type='text' id='valor_horaP' style='display: none;' value='$vl_moto_hora'>
    
    <tr>
    <td style='display:none; id='valor_id$cd_status_vagas'>$tipo_veiculo</td>
    <td id='valorN_planilha$cd_status_vagas'>$cd_numero_vaga</td>
    
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
        
        <button style='margin: 0 5px; type='button' id='botao_visualizar$cd_status_vagas' value='$cd_status_vagas'name='id_visualizar$cd_status_vagas'class='btn btn-info btn-sm me-1'onclick='visualizar($cd_status_vagas)'>Informações de Pagamento<img src='../img/dinheiro.png' style='margin:0 5px'width='25'></button>
                                            
     </td>
</tr>";
}

    $dados .= "</tbody>
        </table>
</div>";

       

        $retorna = ['status' => true, 'dados' => $dados];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>
        Não exite vagas na Tabela. Acesse as configurações!
      </div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>
    Não exite vagas na Tabela. Acesse as configurações!
  </div>"];
}


echo json_encode($retorna);


