<?php
include("crud_php/conexao_cadastro.php");


// session_start(); 

ob_start();

include_once '../adm/config/valida_token.php';

if(!validarToken()){

    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário realizar o login para acessar a página!</p>";

    header("Location:../adm/erro_404.php");

    exit();
}

$id_sessao_gerente = recuperarIdGerenteToken();
$query_gerente  = "SELECT g.nm_gerente, g.cd_gerente, g.cd_img, f.cd_funcionario, f.nm_nome, f.nm_cargo, f.nm_sexo, f.cd_cpf, f.cd_credencial, f.cd_email_funcionario, f.img_imagem, f.cd_telefone
FROM tb_gerente as g
JOIN tb_funcionario as f
ON   f.cd_gerente = g.cd_gerente
WHERE f.cd_funcionario = $id_sessao_gerente ";
    $result_gerente = $conn->prepare($query_gerente);
    $result_gerente->execute();
    $row_gerente = $result_gerente->fetch(PDO::FETCH_ASSOC);
    extract($row_gerente); // array
    $cd_gerente = $row_gerente['cd_gerente'];
    $nome_gerente = $row_gerente['nm_gerente'];
    $foto_gerente = $row_gerente['cd_img'];
    $id_gerente = $row_gerente['cd_gerente'];
    $diretorio ='../img_funcionario/'.$nm_gerente.'_id-'.$cd_gerente;


    //contadores ADM EMPRESA STATUS DE VAGAS
    $vagas_livre = 'Livre';
    $vagas_ocupadas = 'Ocupado';
    $vagas_reservadas= 'Reserva';
    $vagas_total = 0;

    //Livre
    $resul_vagasLivres = $conn->prepare("SELECT COUNT(*) FROM tb_status_vagas WHERE nm_status = :livre");             
    $resul_vagasLivres->execute(array(':livre' => $vagas_livre));
    $count_Livre = $resul_vagasLivres->fetchColumn(); 
    //Ocupada
    $resul_vagasOcupada = $conn->prepare("SELECT COUNT(*) FROM tb_status_vagas WHERE nm_status = :ocupada");             
    $resul_vagasOcupada->execute(array(':ocupada' => $vagas_ocupadas));
    $count_Ocupada = $resul_vagasOcupada->fetchColumn();
    //Reserva
    $resul_reservas = $conn->prepare("SELECT COUNT(*) FROM tb_status_vagas WHERE nm_status = :reserva");             
    $resul_reservas->execute(array(':reserva' => $vagas_reservadas));
    $count_Resultado = $resul_reservas->fetchColumn(); 

    //total
    $vagas_total += $count_Livre + $count_Ocupada + $count_Resultado;
    //fim

    //tipo de veiculo estacionado
    $tipo_carro = 'Carro';
    $tipo_motos = 'Moto';
    $tipo_bicicleta = 'Bicicleta';
    $tipo_outros = 'Outros';
    //carro
    $resul_carro = $conn->prepare("SELECT COUNT(*) FROM tb_status_vagas WHERE img_icon = :carro");             
    $resul_carro->execute(array(':carro' => $tipo_carro));
    $count_carro = $resul_carro->fetchColumn(); 
    //carro
    $resul_motos = $conn->prepare("SELECT COUNT(*) FROM tb_status_vagas WHERE img_icon = :moto");             
    $resul_motos->execute(array(':moto' => $tipo_motos));
    $count_motos = $resul_motos->fetchColumn(); 
    //carro
    $resul_bicic = $conn->prepare("SELECT COUNT(*) FROM tb_status_vagas WHERE img_icon = :bike");             
    $resul_bicic->execute(array(':bike' => $tipo_bicicleta));
    $count_bicic = $resul_bicic->fetchColumn(); 
    //carro
    $resul_outros = $conn->prepare("SELECT COUNT(*) FROM tb_status_vagas WHERE img_icon = :outro");             
    $resul_outros->execute(array(':outro' => $tipo_outros));
    $count_outros = $resul_outros->fetchColumn(); 

    // nav bar status de login no icon do top direito
