<?php
include("crud_php/conexao_cadastro.php");
include("crud_php/conexao_configuracao_sistema_form.php");
session_start(); 

ob_start();

include_once '../adm/config/valida_token.php';

if(!validarToken()){

    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário realizar o login para acessar a página!</p>";

    header("Location:../adm/erro_404.php");

    exit();
}

?>

<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- FORM DE CONFIGURACAO -->
    <link rel="stylesheet" href="../css_dash/fonts/fonts-icones">
    <link rel="stylesheet" href="../css_dash/config_dashboard.css">  
    <link rel="stylesheet" href="../css_dash/config_sistema.css">  
    
    <!-- FIM -->
    <link rel="stylesheet" href="../css_dash/bootstrap.min.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="../css_dash/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css_dash/caixa_estilo.css">
    <link rel="stylesheet" href="../css_dash/morris.css">
    <link rel="stylesheet" href="../css_dash/fonts/fontawesome/css/fontawesome-all.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/png" href="../img/logotipoSglas.ico"/>
    <title>VAGASPARK</title>
<?php
include("adm_sessao.php"); // para validar fotos
 ?>
</head>
<body style="zoom:<?php echo $nm_layout_zoom?>%;">
     <!-- ============================================================== -->
   <!-- navbar e lateral do menu -->
   <!-- mudar a cor do navbar pelas configurações -->
   <?php
    if($nm_layout_navbar == 'verde'){
        $nm_layout_navbar = 'bg_whiteVerde';
    }elseif($nm_layout_navbar == 'azul'){
        $nm_layout_navbar = 'bg_whiteAmarelo';
    }else{
        $nm_layout_navbar = '';  
    }
?>
<style>
    .bg-white
    {background-color:#fff!important}
    .bg_whiteVerde
    {background-color:#01504f!important}
    .bg_whiteAmarelo
    {background-color:#ffc107!important}
    
</style>
   <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white <?php echo $nm_layout_navbar?>  fixed-top">
            <a class="logo"><img src="../img/logo_fondo3-icon.png" width="80px" ></a>
                <a class="navbar-brand" href="/vagas_park/comando_php/vagas_park.php"><?php Echo $config_nomeEmpresa?></a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <!-- nome de quem logou -->
                        <li class=" nav-item  dropdown notification"> <a class="nav-link nav-icons"  id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span><?php echo "Bem vindo, &nbsp;" ,recuperarNomeToken() ?></a></li>
                        <!-- fim -->
                    
                    <li class="nav-item dropdown notification">
                        <a class="nav-link nav-icons"  id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator sino"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                            <li>
                                <div class="notification-title" style=""> Notificação</div>
                                <div class="notification-list">
                                    <div class="list-group">
                                       
                                        <!-- notificação de atividade -->
                                    <span class="listar_parceiros_sessaoadm"></span>
                                     <!--fim  -->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="list-footer"> <a ></a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img"  id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $diretorio.'/'.recuperarImagemToken() ?>" alt="" class="user-avatar-md rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name" ><?php echo '&#8927; ',recuperarNomeToken() ?></h5>
                                
                            </div>
                             <a href="/vagas_park/comando_php/adm.php" class="dropdown-item" ><i  class="fas fa-user mr-2"></i>Conta</a>
                            <a href="/vagas_park/comando_php/configuracao.php" class="dropdown-item" ><i class="fas fa-cog mr-2"></i>Configuração</a>
                            <a href="logout.php" class="dropdown-item" ><i class="fas fa-power-off mr-2"></i>Sair</a>
                            <!-- <a class="dropdown-item" onclick="sairDashboard()"><i class="fas fa-power-off mr-2"></i>Sair</a> -->
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" >Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link"  data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Vagas Park</a>
                            <div id="submenu-1" class="collapse submenu">
                                <ul class="nav flex-column">
                                     
                                    <li class="nav-item">
                                        <a class="nav-link"  data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2"><i class="fas fa-users"></i>Área Clientes</a>
                                        <div id="submenu-1-2" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <ul class="nav flex-column">
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="/vagas_park/comando_php/form-validation.php">Cliente Cadastro</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="/vagas_park/comando_php/data-tables.php">Lista de Clientes</a>
                                                            </li>
                                                            
                                                          
                                                        </ul>
                                                                                            
                                                                                              
                                                <!-- fim do cadastro cliente -->                                                   
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- detalhamento financeiro -->                                       
                        <!-- <li class="nav-item">
                            <a class="nav-link"  data-toggle="collapse" aria-expanded="false" data-target="#submenu-16" aria-controls="submenu-16"><i class="fas fa-building"></i>Detalhes Empresa</a>
                            <div id="submenu-16" class="collapse submenu">
                                <ul class="nav flex-column">
                                     <li class="nav-item">
                                    <a class="nav-link" href="#">Detalhamento</a>
                                </li>
                                 <li class="nav-item">
                                        <a class="nav-link" href="#">Planilha</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" >vazio </a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <!-- fim do comercio -->  
                                
                                 
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/vagas_park/comando_php/cards.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fa fa-fw fa-file"></i>Avisos</a>
                                
                            </li>
                        
                        <li class="nav-item">
                            <a class="nav-link " href="/vagas_park/comando_php/vagas_detalhes.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fa fa-fw fa-rocket"></i>Reservas</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/vagas_park/comando_php/detalhamento_servico_tabela.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fas fa-building"></i>Planilhas Serviços</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/vagas_park/comando_php/adm.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fa fa-fw fa-users"></i>Administrador</a>
                         </li>
                         <li class="nav-item">
                        <a class="nav-link" href="/vagas_park/comando_php/relatorio_atividade.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fa fa-fw fa-users"></i>Relatório de Atividade</a>
                         </li>
                        <li class="nav-divider">
                            Suporte
                        </li>
                        <li class="nav-item">
                                <a class="nav-link"  href="/vagas_park/comando_php/regras_de_negocio.php" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i>Guia Rápido</a>
                                
                            </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="/vagas_park/comando_php/configuracao.php" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Configurações</a>
                           
                        </li>                      
                        <li class="nav-item">
                            <a class="nav-link"  href="logout.php" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-power-off mr-2"></i>Sair do Sistema</a>
                           
                        </li>                      
                    </ul>
                </div>
            </nav>
        </div>
    </div>
             <!-- navbar e lateral do menu -->
<!-- navbar e lateral do menu -->
    <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="pageheader-title">Configurações </h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Config</li>
                                    </ol>
                                </nav>
                            </div>
                         </div>
                    </div><br>
                <!-- =================CONFIGURAÇÕES============================ -->
                <div class="col-xl-12 col-lg-12 col-md-6 col-12 col-12">
                    <div class="card">
                        <h2 class="card-header">Sistema</h2>
                        <div class="form-group"><br>
                             <?php  if(isset($_SESSION['msg'])){ echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
                        <label class=""><strong style=" margin-left: 30px;">Ultima Atualização</strong>: Data: <?php echo $dt_data_config_sistema ?>  /  Hora: <?php echo $dt_hora_config_sistema ?></label>
                        <div class="col-md-8 inputGroupContainer">
                        </div>
                    </div>
                                <!-- FORM DE CONFIGURAÇÃO @@@@ -->
                    <form class="well form-horizontal" novalidate  action="configuracao_sistema_form.php" method="POST"  id="contact_form">
                        <!-- well form-h deixa tudo no container separado em estilizado--> 
                    <fieldset>

                        <!-- Form Name -->


                        <legend style="text-align: center;font-size:25px;padding:0 0 20px">Valores e diarias do <strong>Estacionamento</strong></legend>

                        

            <div class="form-group"><br>
            <input type="hidden" class="form-control" name="cd_configuracao_dashboard"  aria-label="First name" id="cd_configuracao_dashboard" value="<?php echo $cd_configuracao_dashboard ?>">
            <label class="col-md-2 control-label">Carro</label>
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="vl_carro_tolerancia" id="vl_carro_tolerancia"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $vl_carro_tolerancia?>"><?php echo $vl_carro_tolerancia ?> min. de Tolerância</option>
            <option value="0" >0 min.</option>
            <option value="3" >3 min.</option>
            <option value="5" >5 min.</option>
            <option value="7" >7 min.</option>
            <option value="10" >10 min.</option>
            <option value="15" >15 min.</option>
            </select>
            </div>
            </div>
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="vl_carro_entrada" id="vl_carro_entrada"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $vl_carro_entrada?>">R$: <?php echo $vl_carro_entrada ?>,00 de Valor de Entrada </option>
            <option value="0" >R$0,00</option>
            <option value="2" >R$2,00</option>
            <option value="3" >R$3,00</option>
            <option value="5" >R$5,00</option>
            <option value="7" >R$7,00</option>
            <option value="10" >R$10,00</option>
            </select>
            </div>
            </div>
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="vl_carro_hora" id="vl_carro_hora"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $vl_carro_hora?>">R$: <?php echo $vl_carro_hora ?>,00 de Valor da Hora</option>
            <option value="0" >R$0,00</option>
            <option value="2" >R$2,00</option>
            <option value="3" >R$3,00</option>
            <option value="4" >R$4,00</option>
            <option value="5" >R$5,00</option>
            <option value="6" >R$6,00</option>
            <option value="8" >R$8,00</option>
            <option value="9" >R$9,00</option>
            <option value="10" >R$10,00</option>
            </select>
            </div>
            </div>


            </div>

            <!-- Text input-->
            <hr>
            <div class="form-group">
            <label class="col-md-2 control-label" >Moto</label> 
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="vl_moto_tolerancia" id="vl_moto_tolerancia"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $vl_moto_tolerancia?>"><?php echo $vl_moto_tolerancia ?> min. de Tolerância</option>
            <option value="0" >0 min.</option>
            <option value="3" >3 min.</option>
            <option value="5" >5 min.</option>
            <option value="7" >7 min.</option>
            <option value="10" >10 min.</option>
            <option value="15" >15 min.</option>
            </select>
            </div>
            </div>

            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="vl_moto_entrada" id="vl_moto_entrada"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $vl_moto_entrada?>">R$: <?php echo $vl_moto_entrada ?>,00 de Valor de Entrada </option>
            <option value="0" >R$0,00</option>
            <option value="0" >R$0,00</option>
            <option value="2" >R$2,00</option>
            <option value="3" >R$3,00</option>
            <option value="5" >R$5,00</option>
            <option value="7" >R$7,00</option>
            <option value="10" >R$10,00</option>
            </select>
            </div>
            </div>
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="vl_moto_hora" id="vl_moto_hora"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $vl_moto_hora?>">R$: <?php echo $vl_moto_hora ?>,00 de Valor da Hora</option>
            <option value="0" >R$0,00</option>
            <option value="2" >R$2,00</option>
            <option value="3" >R$3,00</option>
            <option value="4" >R$4,00</option>
            <option value="5" >R$5,00</option>
            <option value="6" >R$6,00</option>
            <option value="8" >R$8,00</option>
            <option value="9" >R$9,00</option>
            <option value="10" >R$10,00</option>
            </select>
            </div>
            </div>
            </div>
            <hr>
            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-2 control-label">Bicicleta</label>  
            <div class="col-md-5 inputGroupContainer">
            <div class="input-group">
            <select name="vl_bike_tolerancia" id="vl_bike_tolerancia"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $vl_bike_tolerancia?>"><?php echo $vl_bike_tolerancia ?>Valor por período</option>
            <option value="12" >12h</option>
            <option value="24" >24h</option>
            <option value="48" >2 dias</option>
            <option value="72" >3 dias</option>
            <option value="168" >7 dias</option>
            <option value="720">30 dias</option>
            </select>
            </div>
            </div>
                <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
            <select name="vl_bike_entrada" id="vl_bike_entrada"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $vl_bike_entrada?>">R$: <?php echo $vl_bike_entrada ?>,00 de Diária </option>
            <option value="0" >R$0,00</option>
            <option value="2" >R$2,00</option>
            <option value="2.5" >R$2,50</option>
            <option value="3" >R$3,00</option>
            <option value="3.5" >R$3,50</option>
            <option value="4" >R$4,00</option>
            <option value="4.5" >R$4,50</option>
            <option value="5" >R$5,00</option>
            <option value="5.5" >R$5,50</option>
            <option value="6" >R$6,00</option>
            <option value="6.5" >R$6,50</option>
            <option value="8" >R$8,00</option>
            <option value="8.5" >R$8,50</option>
            <option value="9" >R$9,00</option>
            <option value="9.5" >R$9,50</option>
            <option value="10" >R$10,00</option>
            </select>
            </div>
            </div>
                
            </div>
            <hr>

            <!-- Text input-->
            
            <div class="form-group">
            <label class="col-md-2 control-label">Outros</label>
            <div class="col-md-5 inputGroupContainer">
            <div class="input-group">
            <select name="vl_outros_tolerancia" id="vl_outros_tolerancia"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $vl_outros_tolerancia?>"><?php echo $vl_outros_tolerancia ?>Valor por período</option>
            <option value="12" >12h</option>
            <option value="24" >24h</option>
            <option value="48" >2 dias</option>
            <option value="72" >3 dias</option>
            <option value="168" >7 dias</option>
            <option value="720">30 dias</option>
            </select>
            </div>
            </div>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
            <select name="vl_outros_entrada" id="vl_outros_entrada"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $vl_outros_entrada?>">R$: <?php echo $vl_outros_entrada ?>,00 de Diária </option>
            <option value="0" >R$0,00</option>
            <option value="2" >R$2,00</option>
            <option value="2.5" >R$2,50</option>
            <option value="3" >R$3,00</option>
            <option value="3.5" >R$3,50</option>
            <option value="4" >R$4,00</option>
            <option value="4.5" >R$4,50</option>
            <option value="5" >R$5,00</option>
            <option value="5.5" >R$5,50</option>
            <option value="6" >R$6,00</option>
            <option value="6.5" >R$6,50</option>
            <option value="8" >R$8,00</option>
            <option value="8.5" >R$8,50</option>
            <option value="9" >R$9,00</option>
            <option value="9.5" >R$9,50</option>
            <option value="10" >R$10,00</option>
            </select>
            </div>
            </div>
            </div>
            <hr>
            <br>
            <legend style="text-align: center;font-size:25px;padding:0 0 20px">Quantidade será criada por <strong>Tipo de Vagas</strong></legend>

            <!-- Text input-->
            
            <div class="form-group"><br>
            <label class="col-md-2 control-label">Carro</label>  
            <div class="col-md-1 inputGroupContainer">
            <div class="input-group">
            <select name="qt_carro_vagas" id="qt_carro_vagas"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $qt_carro_vagas?>"><?php echo $qt_carro_vagas ?> vagas</option>
            <option value="0" >0</option>
            <option value="10" >10</option>
            <option value="15" >15</option>
            <option value="20" >20</option>
            <option value="25" >25</option>
            <option value="30" >30</option>
            <option value="35" >35</option>
            <option value="40" >40</option>
            <option value="45" >45</option>
            <option value="50" >50</option>
            <option value="60" >60</option>
            <option value="70" >70</option>
            <option value="80" >80</option>
            <option value="90" >90</option>
            <option value="100" >100</option>
            </select>
            </div>
            </div>
            <label class="col-md-1 control-label">Moto</label>  
            <div class="col-md-1 inputGroupContainer">
            <div class="input-group">
            <select name="qt_moto_vagas" id="qt_moto_vagas"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $qt_moto_vagas?>"><?php echo $qt_moto_vagas ?> vagas</option>
            <option value="0" >0</option>
            <option value="10" >10</option>
            <option value="15" >15</option>
            <option value="20" >20</option>
            <option value="25" >25</option>
            <option value="30" >30</option>
            <option value="35" >35</option>
            <option value="40" >40</option>
            <option value="45" >45</option>
            <option value="50" >50</option>
            <option value="60" >60</option>
            <option value="70" >70</option>
            <option value="80" >80</option>
            <option value="90" >90</option>
            <option value="100" >100</option>
            </select>
            </div>
            </div>
            <label class="col-md-1 control-label">Bicicleta</label>  
            <div class="col-md-1 inputGroupContainer">
            <div class="input-group">
            <select name="qt_bike_vagas" id="qt_bike_vagas"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $qt_bike_vagas?>"><?php echo $qt_bike_vagas ?> vagas</option>
            <option value="0" >0</option>
            <option value="10" >10</option>
            <option value="15" >15</option>
            <option value="20" >20</option>
            <option value="25" >25</option>
            <option value="30" >30</option>
            <option value="35" >35</option>
            <option value="40" >40</option>
            <option value="45" >45</option>
            <option value="50" >50</option>
            <option value="60" >60</option>
            <option value="70" >70</option>
            <option value="80" >80</option>
            <option value="90" >90</option>
            <option value="100" >100</option>
            <option value="110" >110</option>
            <option value="120" >120</option>
            <option value="130" >130</option>
            <option value="140" >140</option>
            <option value="150" >150</option>
            <option value="160" >160</option>
            <option value="170" >170</option>
            </select>
            </div>
            </div>
            <label class="col-md-1 control-label">Outros</label>  
            <div class="col-md-1 inputGroupContainer">
            <div class="input-group">
            <select name="qt_outros_vagas" id="qt_outros_vagas"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $qt_outros_vagas?>"><?php echo $qt_outros_vagas ?> vagas</option>
            <option value="0" >0</option>
            <option value="10" >10</option>
            <option value="15" >15</option>
            <option value="20" >20</option>
            <option value="25" >25</option>
            <option value="30" >30</option>
            <option value="35" >35</option>
            <option value="40" >40</option>
            <option value="45" >45</option>
            <option value="50" >50</option>
            <option value="60" >60</option>
            <option value="70" >70</option>
            <option value="80" >80</option>
            <option value="90" >90</option>
            <option value="100" >100</option>
            </select>
            </div>
            </div>

            </div>
            <hr>
            <br>
            <!-- Text input-->
            <legend style="text-align: center;font-size:25px;padding:0 0 20px">Quantidade linhas por  <strong>Página</strong></legend>

            <div class="form-group"><br>
            <label class="col-md-2 control-label">Tabelas CLiente</label>  
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="qt_tabela_cliente" id="qt_tabela_cliente"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $qt_tabela_cliente?>"><?php echo $qt_tabela_cliente ?> Linhas por página</option>
            <option value="5" >5</option>
            <option value="7" >7</option>
            <option value="10" >10</option>
            <option value="13" >13</option>
            <option value="16" >16</option>
            <option value="20" >20</option>
            <option value="25" >25</option>
            <option value="30" >30</option>
            <option value="40" >40</option>
            <option value="45" >45</option>
            <option value="50" >50</option>
            <option value="55" >55</option>
            <option value="60" >60</option>
            </select>
            </div>
            </div>
            <label class="col-md-2 control-label">Alerta Notificação</label>  
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="qt_tabela_notificacao" id="qt_tabela_notificacao"  placeholder="Tolerância" class="form-control"  type="text">
            <option value="<?php echo $qt_tabela_notificacao?>"><?php echo $qt_tabela_notificacao ?> Linhas por página</option>
            <option value="0" >0</option>
            <option value="5" >5</option>
            <option value="7" >7</option>
            <option value="10" >10</option>
            <option value="13" >13</option>
            <option value="20" >20</option>
            <option value="25" >25</option>
            <option value="30" >30</option>
            <option value="40" >40</option>
            <option value="45" >45</option>
            <option value="50" >50</option>
            <option value="55" >55</option>
            <option value="60" >60</option>
            </select>
            </div>
            </div>

            </div>

            <!-- Select cidade -->

            <div class="form-group"> 
            <label class="col-md-2 control-label">Tabelas Vagas</label>
            <div class="col-md-3 selectContainer">
            <div class="input-group">
            <select name="qt_tabela_vagas" class="form-control selectpicker" id="qt_tabela_vagas" >
            <option value="<?php echo $qt_tabela_vagas?>"><?php echo $qt_tabela_vagas ?> Linhas por página</option>
            <option value="5" >5</option>
            <option value="7" >7</option>
            <option value="10" >10</option>
            <option value="13" >13</option>
            <option value="16" >16</option>
            <option value="20" >20</option>
            <option value="25" >25</option>
            <option value="30" >30</option>
            <option value="40" >40</option>
            <option value="45" >45</option>
            <option value="50" >50</option>
            <option value="55" >55</option>
            <option value="60" >60</option>
            </select>
            </div> 
            </div>
            <label class="col-md-2 control-label">Tabelas Vagas Detalhes</label>  
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="qt_tabela_vagas_detalhes" class="form-control selectpicker" id="qt_tabela_vagas" >
            <option value="<?php echo $qt_tabela_vagas_detalhes?>"><?php echo $qt_tabela_vagas_detalhes ?> Linhas por página</option>
            <option value="5" >5</option>
            <option value="7" >7</option>
            <option value="10" >10</option>
            <option value="13" >13</option>
            <option value="16" >16</option>
            <option value="20" >20</option>
            <option value="25" >25</option>
            <option value="30" >30</option>
            <option value="40" >40</option>
            <option value="45" >45</option>
            <option value="50" >50</option>
            <option value="55" >55</option>
            <option value="60" >60</option>
            </select>
            </div>
            </div> 
            </div>
            <!-- Select cidade -->

            <div class="form-group"> 
            <label class="col-md-2 control-label">Botão: Relatório Lixeira</label>
            <div class="col-md-3 selectContainer">
            <div class="input-group">
            <select name="qt_tabela_relatorio_lixeira" class="form-control selectpicker" id="qt_tabela_vagas" >
            <option value="<?php echo $qt_tabela_relatorio_lixeira?>"><?php echo $qt_tabela_relatorio_lixeira ?> Linhas por página</option>
            <option value="5" >5</option>
            <option value="7" >7</option>
            <option value="10" >10</option>
            <option value="13" >13</option>
            <option value="16" >16</option>
            <option value="20" >20</option>
            <option value="25" >25</option>
            <option value="30" >30</option>
            <option value="40" >40</option>
            <option value="45" >45</option>
            <option value="50" >50</option>
            <option value="55" >55</option>
            <option value="60" >60</option>
            </select>
            </div> 
            </div>
            <label class="col-md-2 control-label">Botão: Relatório Limpar</label>  
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="qt_tabela_relatorio_limpar" class="form-control selectpicker" id="qt_tabela_vagas" >
            <option value="<?php echo $qt_tabela_relatorio_limpar?>"><?php echo $qt_tabela_relatorio_limpar ?> Linhas por página</option>
            <option value="5" >5</option>
            <option value="7" >7</option>
            <option value="10" >10</option>
            <option value="13" >13</option>
            <option value="16" >16</option>
            <option value="20" >20</option>
            <option value="25" >25</option>
            <option value="30" >30</option>
            <option value="40" >40</option>
            <option value="45" >45</option>
            <option value="50" >50</option>
            <option value="55" >55</option>
            <option value="60" >60</option>
            </select>
            </div>
            </div>
            
            
            </div>
            <!-- Select cidade -->

            <div class="form-group"> 
            <label class="col-md-2 control-label">Tabelas Relatorio Atividade</label>  
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="qt_tabela_relatorio_atividade" class="form-control selectpicker" id="qt_tabela_vagas" >
            <option value="<?php echo $qt_tabela_relatorio_atividade?>"><?php echo $qt_tabela_relatorio_atividade ?> Linhas por página</option>
            <option value="5" >5</option>
            <option value="7" >7</option>
            <option value="10" >10</option>
            <option value="13" >13</option>
            <option value="16" >16</option>
            <option value="20" >20</option>
            <option value="25" >25</option>
            <option value="30" >30</option>
            <option value="40" >40</option>
            <option value="45" >45</option>
            <option value="50" >50</option>
            <option value="55" >55</option>
            <option value="60" >60</option>
            </select>
            </div>
            </div> 
            </div>
            <hr>
            

            <!-- entrada e saida de carro-->
            <legend style="text-align: center;font-size:25px;padding:0 0 20px">Configuração de <strong>Layout do Sistema</strong></legend>
            <div class="form-group"><br>
            <label class="col-md-2 control-label">Cor do NavBar</label>  
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="nm_layout_navbar" class="form-control selectpicker" id="nm_layout_navbar">
            <option value="<?php echo $nm_layout_navbar?>">Tema de cor: <?php echo $nm_layout_navbar ?></option>
            <option value="branco" >Branco</option>
            <option value="verde" >Verde (Classico)</option>
            <option value="azul" >Amarelo</option>
            </select>
            </div>
            </div>
            <label class="col-md-2 control-label">Zoom Sistema</label> 
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="nm_layout_zoom" class="form-control selectpicker" id="nm_layout_zoom">
            <option value="<?php echo $nm_layout_zoom?>">Zoom: <?php echo $nm_layout_zoom ?>%</option>
            <option value="100" >100%</option>
            <option value="110" >110%</option>
            <option value="115" >115%</option>
            </select>
            </div>
            </div>
            </div>
            <div class="form-group">
            <label class="col-md-2 control-label">Nome da Empresa</label>  
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <input type="text" name="nm_config_nomeEmpresa" class="form-control selectpicker" maxlength="30" placeholder="Nome da Empresaa" id="nm_config_nomeEmpresa" value="<?php echo $config_nomeEmpresa?>"></input>
            
            </div>

            </div> 

            <!-- <label class="col-md-2 control-label">Modo de Discanso</label> 
            <div class="col-md-3 inputGroupContainer">
            <div class="input-group">
            <select name="nm_layout_discanso" class="form-control selectpicker" id="nm_layout_discanso">
            <option value="<?php echo $nm_layout_discanso?>"><?php echo $nm_layout_discanso ?></option>
            <option value="diturno" >Luz Diturno</option>
            <option value="noturna" >Luz Noturna</option>
            
            </select>
            </div>
            </div> -->
            </div>
            <!-- Button -->
            <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-12">
            <button type="submit" style="font-size: 30px; width: 100%;text-align: center" class="btn btn-warning" >Salvar as Configurações</button>
            </div>
            </div>

            </fieldset>
            </form>
            </div>


                     <!-- "FIM" DO FORM DE CONFIGURAÇÃO @@@@ -->
                <!-- <div class="row">
                 
                    
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Perfil</h5>
                                <div class="card-body">
                                    <form class="needs-validation"  action="cadastrar_funcionario.php" method="POST" id="Cadas_funcionario_form" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><br>
                                                <div id="img_imagem" style="">
                                                    <img id="imgFuncionario"style="width:250px; height:200px;">
                                                    <input style="width:250px; height:35px;"type="file" name="img_imagem" class="form-control" required=""  id='imagem' onchange=""/>
                                                    <div class="valid-feedback">
                                                        Correto!
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><br>
                                                <label for="">Nome: </label>
                                                <input name="nm_nome" id="nm_nome" required="Campo em Branco" placeholder="Digite o nome" class="form-control"  type="text" >
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><br>
                                                <label for="">Nome: </label>
                                                <input>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                   
                        <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Edição</h5>
                                <div class="card-body">

                                </div>
                            </div>
                        </div> -->
                        <!-- ============================================================== -->
                        </div>
                    </div>
            </div>
          
          
            <!-- ============================================================== -->
        </div>
    </div>

    <!-- ============================================================== -->
      <script src="../chart_js/jquery-3.3.1.min.js"></script>
    <script src="../chart_js/bootstrap.bundle.js"></script>
    <script src="../chart_js/jquery.slimscroll.js"></script>
    <script src="../chart_js/main-js.js"></script>
   
    <!-- This Page JS -->
    <script src="../chart_js/jquery-asColor.min.js"></script>
    <script src="../chart_js/jquery-asGradient.js"></script>
    <script src="../chart_js/jquery-asColorPicker.min.js"></script>
    <script src="../chart_js/jquery.minicolors.min.js"></script>
    <script src="../chart_js/custom_sessao_adm.js"></script> 
    <script src="../chart_js/config_dashboard.js"></script> 
    <script>
   $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
            control: $(this).attr('data-control') || 'hue',
            defaultValue: $(this).attr('data-defaultValue') || '',
            format: $(this).attr('data-format') || 'hex',
            keywords: $(this).attr('data-keywords') || '',
            inline: $(this).attr('data-inline') === 'true',
            letterCase: $(this).attr('data-letterCase') || 'lowercase',
            opacity: $(this).attr('data-opacity'),
            position: $(this).attr('data-position') || 'bottom left',
            swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
            change: function(value, opacity) {
                if (!value) return;
                if (opacity) value += ', ' + opacity;
                if (typeof console === 'object') {
                    console.log(value);
                }
            },
            theme: 'bootstrap'
        });

    });
    </script>
   
</body>
 
</html>

<!--<h4 class="card-title">Control Types</h4>
                                    <div class="form-group">
                                        <label for="hue-demo">Hue (default)</label>
                                        <input type="text" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
                                    </div>
                                    <div class="form-group">
                                        <label for="saturation-demo">Saturation</label>
                                        <input type="text" id="saturation-demo" class="form-control demo" data-control="saturation" value="#0088cc">
                                    </div>
                                    <div class="form-group">
                                        <label for="brightness-demo">Brightness</label>
                                        <input type="text" id="brightness-demo" class="form-control demo" data-control="brightness" value="#00ffff">
                                    </div>
                                    <div class="form-group">
                                        <label for="wheel-demo">Wheel</label>
                                        <input type="text" id="wheel-demo" class="form-control demo" data-control="wheel" value="#ff99ee">
                                    </div>-->

<!--<h6 class="card-subtitle">Valid positions include bottom left, bottom right, top left, and top right.</h6>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="position-bottom-left">bottom left (default)</label>
                                                <input type="text" id="position-bottom-left" class="form-control demo" data-position="bottom left" value="#0088cc">
                                            </div>
                                            <div class="form-group">
                                                <label for="position-top-left">top left</label>
                                                <input type="text" id="position-top-left" class="form-control demo" data-position="top left" value="#0088cc">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="position-bottom-right">bottom right</label>
                                                <input type="text" id="position-bottom-right" class="form-control demo" data-position="bottom right" value="#0088cc">
                                            </div>
                                            <div class="form-group">
                                                <label for="position-top-right">top right</label>
                                                <input type="text" id="position-top-right" class="form-control demo" data-position="top right" value="#0088cc">
                                            </div>
                                        </div>
                                    </div>-->