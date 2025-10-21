<?php
include("crud_php/conexao_cadastro.php");

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
<html lang="pt-BR">
 
<head>
    
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css_dash/tabela_estilo.css">
    <link rel="stylesheet" href="../css_dash/bootstrap.min.css"> 
    <link href="../css_dash/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css_dash/caixa_estilo.css"> 
    <link rel="stylesheet" href="../css_dash/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../css_dash/morris.css">
    
    <link rel="stylesheet" href="../css_dash/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="icon" href="img/vagas.ico" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>VAGASPARK</title>
</head>

<body>
    <!-- ============================================================== -->
   <!-- navbar e lateral do menu -->
   
   <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="/dashboard_tcc/comando_php/vagas_park.php">Vagas Park</a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <!-- nome de quem logou -->
                        <li class=" nav-item  dropdown notification" style="margin:0 23px"> <a class="nav-link nav-icons"  id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span><?php echo "Bem vindo &nbsp;" ,recuperarNomeToken() ?></a></li>
                        <!-- fim -->
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons"  id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notificação</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a  class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="img/img_sistema/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Atonio Carlos</span>Acabou de Adicionar um Cliente.
                                                        <div class="notification-date">Agora </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a  class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="img/img_sistema/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Enzo</span>Acabou de fazer Suarice no Sistema
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a  class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="img/img_sistema/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Rayza</span> Acaba de excluir sua conta
                                                        <div class="notification-date">3 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a  class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="img/img_sistema/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Rafa</span>Alterou documentação
                                                        <div class="notification-date">10 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a >Todas as Notificações</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a  class="connection-item"><img src="img/img_sistema/github.png" alt="" > <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a  class="connection-item"><img src="img/img_sistema/dribbble.png" alt="" > <span>Cadastro</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a  class="connection-item"><img src="img/img_sistema/dropbox.png" alt="" > <span>Tabela</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a  class="connection-item"><img src="img/img_sistema/bitbucket.png" alt=""> <span>Contatos</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a  class="connection-item"><img src="img/img_sistema/mail_chimp.png" alt="" ><span>Email</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a  class="connection-item"><img src="img/img_sistema/slack.png" alt="" > <span>Produtos</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"><a >More</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img"  id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $diretorio,'/',$foto_gerente ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $nome_gerente?></h5>
                                    <span class="status"></span><span class="ml-2">Perfil</span>
                                </div>
                                 <a href="/dashboard_tcc/comando_php/adm.php" class="dropdown-item" ><i  class="fas fa-user mr-2"></i>Conta</a>
                                <a href="/dashboard_tcc/comando_php/configuracao.php" class="dropdown-item" ><i class="fas fa-cog mr-2"></i>Configuração</a>
                                <a href='logout.php' class="dropdown-item" ><i class="fas fa-power-off mr-2"></i>Sair</a>
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
                                <a class="nav-link active"  data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Vagas Park<span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu">
                                    <ul class="nav flex-column">
                                         
                                        <li class="nav-item">
                                            <a class="nav-link"  data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2"><i class="fas fa-users"></i>Área Clientes</a>
                                            <div id="submenu-1-2" class="collapse submenu">
                                            <ul class="nav flex-column">
                                                <ul class="nav flex-column">
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="/dashboard_tcc/comando_php/form-validation.php">Cliente Cadastro</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="/dashboard_tcc/comando_php/data-tables.php">Lista de Clientes</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="/dashboard_tcc/comando_php/detalhamento_servico_tabela.php">Planilha de Serviços</a>
                                                                </li>
                                                              
                                                            </ul>
                                                                                                
                                                                                                  
                                                    <!-- fim do cadastro cliente -->                                                   
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- detalhamento financeiro -->                                       
                            <li class="nav-item">
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
                            </li>
                            <!-- fim do comercio -->  
                                     
                                     
	                                </ul>
	                            </div>
	                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard_tcc/comando_php/cards.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fa fa-fw fa-file"></i>Avisos</a>
                               
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard_tcc/comando_php/vagas_detalhes.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fa fa-fw fa-rocket"></i>Reservas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard_tcc/comando_php/adm.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fa fa-fw fa-users"></i>Administrador</a>
                            </li>                      
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard_tcc/comando_php/relatorio_atividade.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fa fa-fw fa-users"></i>Relatório de Atividade</a>
                            </li>
                            
                            <li class="nav-divider">
                                Suporte
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="/dashboard_tcc/comando_php/regras_de_negocio.php" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i>Regras de Negocio</a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="/dashboard_tcc/comando_php/configuracao.php" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Configurações<span class="badge badge-secondary">New</span></a>
                               
                            </li>                      
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
                 <!-- navbar e lateral do menu -->
         <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">        
                    <!-- pageheader  -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Tela Inicial do Sistema </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Tela Inicial do Sistema</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

 <!-- chama Status Vagas -->

<div class="ecommerce-widget">
	<div class="row">					
        <!-- <span id="msgAlerta"></span> -->
        <div class='col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12'>
        	<div class="card">
            	<h3 class="card-header"  style='font-size: 40px;'id="msgAlerta" >Status das Vagas do <strong>Estacionamento</strong></h3> 
                <div style="padding: 5px 5px ;" class="col-md-3">                   
                    <input id="search-input" type="text" class="form-control"  placeholder="Pesquisar Vaga" value="" required="">
                 </div>
                    <span class="listar-usuarios"></span>
			</div>
    </div> 
<!-- FIM chama Status Vagas -->	

		<!-- Graficos principais  -->
        <?php

$query_Ocupado  = "SELECT COUNT(nm_status) as count_ocupado FROM tb_status_vagas WHERE nm_status = 'Ocupado' ";
    $result_Ocupado = $conn->prepare($query_Ocupado);
    $result_Ocupado->execute();
    $row_Ocupado = $result_Ocupado->fetch(PDO::FETCH_ASSOC);
    extract($row_Ocupado);

$query_Livre  = "SELECT COUNT(nm_status) as count_livre FROM tb_status_vagas WHERE nm_status = 'Livre' ";
    $result_Livre = $conn->prepare($query_Livre);
    $result_Livre->execute();
    $row_Livre = $result_Livre->fetch(PDO::FETCH_ASSOC);
    extract($row_Livre);

$query_reservado = "SELECT COUNT(nm_status) as count_reservado FROM tb_status_vagas WHERE nm_status = 'Reserva' ";
    $result_reservado = $conn->prepare($query_reservado);
    $result_reservado->execute();
    $row_reservado = $result_reservado->fetch(PDO::FETCH_ASSOC);
    extract($row_reservado);
   
?>
<!-- pegando contador de vagas -->
    <h5 id='valor_grafo_Ocupado' style='display:none' value='<?php echo $count_ocupado ?>'><?php echo $count_ocupado ?></h5>
    <h5 id='valor_grafo_Livre'  style='display:none' value='<?php echo $count_livre ?>'><?php echo $count_livre ?></h5> 
    <h5 id='valor_grafo_Reserva'  style='display:none' value='<?php echo $count_reservado ?>'><?php echo $count_reservado ?></h5>
	<!-- fim Graficos principais  -->
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-muted">Vagas Em uso</h4>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><h1 id="vagasLivesOcupadas"></h1></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                            <h2><span class="ml-1 "><h3 class="text-muted">Locação<i class="fa fa-fw fa-arrow-down text-danger"></i></span><span class="text-danger" id="reservasCanceladas">0%</span></h3>
                                        </div></h5>
                                    </div>
                                    
                                    <canvas id="myChartVagas"  width="415" height="100"></canvas>
                                </div>
                            </div>
                          <!-- Grafico de vagas Ocupada por intervalo de duas horas na vaga -->
                          <?php



$tempo6h = '';
$tempoInt = 0;
$tempo_hora_0h =0; 
$tempo_hora_2h =0; 
$tempo_hora_4h =0; 
$tempo_hora_6h =0; 
$tempo_hora_8h =0; 
$tempo_hora_10h =0; 
$tempo_hora_12h =0; 
$tempo_hora_14h =0; 
$tempo_hora_16h =0; 
$tempo_hora_18h =0; 
$tempo_hora_20h =0; 
$tempo_hora_22h =0; 
$query_usuarios = "SELECT  dt_entrada FROM tb_status_vagas";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();
    if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {
     
                        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                            extract($row_usuario);
                            
                           
                           
                            $tempo6h = $row_usuario ['dt_entrada']; //hora entrada
                            $tempoInt += 1;  
                           
                          
                            if($tempo6h >='00:00:02' && $tempo6h <= '02:59:59'){
                                $tempo_hora_0h += +1;
                            
                            }if($tempo6h >='02:00:00' && $tempo6h <= '03:59:59'){
                                $tempo_hora_2h += +1;
                            
                            }if($tempo6h >='04:00:00' && $tempo6h <= '05:59:59'){
                                $tempo_hora_4h += +1;
                             
                            }if($tempo6h >='06:00:00' && $tempo6h <= '07:59:59'){
                                $tempo_hora_6h += +1;
                             
                             }if($tempo6h >='08:00:00' && $tempo6h <= '08:59:59'){
                                $tempo_hora_8h += +1;
                             
                            }if($tempo6h >='10:00:00' && $tempo6h <= '11:59:59'){
                                $tempo_hora_10h += +1;
                             
                             }if($tempo6h >='12:00:00' && $tempo6h <= '13:59:59'){
                                $tempo_hora_12h += +1;
                             
                            }if($tempo6h >='14:00:00' && $tempo6h <= '15:59:59'){
                                $tempo_hora_14h += +1;
                             
                            }if($tempo6h >='16:00:00' && $tempo6h <= '17:59:59'){
                                $tempo_hora_16h += +1;
                             
                            }if($tempo6h >='18:00:02' && $tempo6h <= '19:59:59'){
                                $tempo_hora_18h += +1;   
                            
                            }if($tempo6h >='20:00:00' && $tempo6h <= '21:59:59'){
                                $tempo_hora_20h += +1;
                            
                            }if($tempo6h >='22:00:00' && $tempo6h <= '23:59:59'){
                                $tempo_hora_22h += +1;
                            
                            }elseif($tempo6h >='00:00:00' && $tempo6h <= '00:00:01'){
                               
                                
                            }              
         }
       
     }

    ?>
    <!-- pegando contador de vagas -->
    <h5 id='tempo_hora_0h' style='display:none' value='<?php echo $tempo_hora_0h ?>'><?php echo $tempo_hora_0h ?></h5>
    <h5 id='tempo_hora_2h' style='display:none' value='<?php echo $tempo_hora_2h ?>'><?php echo $tempo_hora_2h ?></h5>
    <h5 id='tempo_hora_4h' style='display:none' value='<?php echo $tempo_hora_4h ?>'><?php echo $tempo_hora_4h ?></h5>
    <h5 id='tempo_hora_6h' style='display:none' value='<?php echo $tempo_hora_6h ?>'><?php echo $tempo_hora_6h ?></h5>
    <h5 id='tempo_hora_8h' style='display:none' value='<?php echo $tempo_hora_8h ?>'><?php echo $tempo_hora_8h ?></h5>
    <h5 id='tempo_hora_10h' style='display:none' value='<?php echo $tempo_hora_10h ?>'><?php echo $tempo_hora_10h ?></h5>
    <h5 id='tempo_hora_12h' style='display:none' value='<?php echo $tempo_hora_12h ?>'><?php echo $tempo_hora_12h ?></h5>
    <h5 id='tempo_hora_14h' style='display:none' value='<?php echo $tempo_hora_14h ?>'><?php echo $tempo_hora_14h ?></h5>
    <h5 id='tempo_hora_16h' style='display:none' value='<?php echo $tempo_hora_16h ?>'><?php echo $tempo_hora_16h ?></h5>
    <h5 id='tempo_hora_18h' style='display:none' value='<?php echo $tempo_hora_18h ?>'><?php echo $tempo_hora_18h ?></h5>
    <h5 id='tempo_hora_20h' style='display:none' value='<?php echo $tempo_hora_20h ?>'><?php echo $tempo_hora_20h ?></h5>
    <h5 id='tempo_hora_22h' style='display:none' value='<?php echo $tempo_hora_22h ?>'><?php echo $tempo_hora_22h ?></h5>
    <!-- FIM -->
                          <!-- fim Grafico de vagas Ocupada por intervalo de duas horas na vaga -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total de Carros no Estacionamento 24h</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1" id="" ></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                            <span>N/A</span>
                                        </div>
                                    </div>
                                    <canvas id="apiAleatoriaLinha"  width="380" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                     </div>
					

                
<!-- Total cliente, grafico  -->
	             <div class="dashboard-influence">
	                    <div class="row">
	                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
	                                        <h5 class="text-muted">Vagas Livres</h5>
	                                        <h2 class="mb-0" id="cardVagas">0</h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
	                                        <i class="fa fa-eye fa-fw fa-sm text-info"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
	                                        <h5 class="text-muted">Lucro Por Hora</h5>
	                                        <h2 class="mb-0" id="lucroMensal">0</h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
	                                        <i class="fa fa-rocket fa-fw fa-sm text-primary"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>

                            	<!-- Card de Ganho por hora e o dia  -->
                                <?php


//fim

$total1 = 0; 
$query_usuarios = "SELECT  cd_status_vagas, cd_numero_vaga, nm_nome, img_icon, dt_entrada, sg_placa, cd_cpf, nm_status FROM tb_status_vagas";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();
    if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {
     
                        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                            extract($row_usuario);
                        
                            $hora_min_vaga = $row_usuario ['dt_entrada']; //hora entrada
                           
                            //pegando o dia
                            $data_vagas = date("d/m/Y");
                            //pegando a hora
                            $horas_min_atual_vagas = date("H:i:s");
                            //calcular a hora do banco e hora atual
                            $diff = strtotime($horas_min_atual_vagas) - strtotime($hora_min_vaga);
                            $diff_seconds = abs($diff );
                            $diff_minutes = round($diff_seconds / 60 );
                            $diff_hours = round( $diff_minutes / 60 );
                                                 
                            $total1 = $total1 + $diff_hours;
                            $diff_hours -= 1; // tirar uma hora
                            
                            
                            //converter min em uma hora
                            if ($diff_minutes >= 60) {
                                $saber_horas_vagas = floor($diff_minutes / 60);
                                $diff_minutes = $diff_minutes % 60;
                            } else {}
                             
                       
    
                           
                            
        }
    }

    ?>
    <!-- pegando contador de de horas -->
    <h5 id='somaHora_valor' style='display:none' value='<?php echo $total1 ?>'><?php echo $total1 ?></h5>
    <!-- fim Card de Ganho por hora e o dia  -->
	                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
	                                        <h5 class="text-muted">Lucro Semanal</h5>
	                                        <h2 class="mb-0" id="cardOcupado">$0.00</h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
	                                        <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
	                                        <h5 class="text-muted">Lucro Mensal</h5>
	                                        <h2 class="mb-0" id="lucroAnual"> $0.00</h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
	                                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
<!-- fim coixa de mensagem -->
	                    <div class="row">
	            
<!-- Frafico do estacionamento   -->
	                      
	                        <div style='display:none'class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
	                            <div class="card">
	                                <h2 class="card-header"><img src="img/feedback-do-cliente.png"  width="35px" height="35px"> Feedback</h2>
	                                <div class="card-body">
	                                    <div id="gender_donut" style="height: 230px;"></div>
	                                </div>
	                                <div class="card-footer p-0 bg-white d-flex">
	                                    <div class="card-footer-item card-footer-item-bordered w-50">
	                                        <h2  id="graficoPizzaP"></h2>
	                                        <p>Votos</p>
	                                    </div>
	                                    <div class="card-footer-item card-footer-item-bordered">
	                                        <h2  id="graficoPizzaN"> </h2>
	                                        <p>Não Voltaram</p></p>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
						<div style='display:none' class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="card">
								<h5 class="card-header"><img src="img/registro-de-tempo.png"  width="35px" height="35px"> Tempo por Vaga</h5>
								<div class="card-body">
									<div class="mb-3">
										<div class="d-inline-block">
											<h4 class="mb-0">Vaga - 1</h4>
										</div>
										<div class="progress mt-2 float-right progress-md">
											<div class="progress-bar bg-secondary" role="progressbar" style="width: 60%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="mb-3">
										<div class="d-inline-block">
											<h4 class="mb-0">Vaga - 2</h4>
										</div>
										<div class="progress mt-2 float-right progress-md">
											<div class="progress-bar bg-secondary" role="progressbar" style="width: 55%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="mb-3">
										<div class="d-inline-block">
											<h4 class="mb-0">Vaga - 3</h4>
										</div>
										<div class="progress mt-2 float-right progress-md">
											<div class="progress-bar bg-secondary" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="mb-3">
										<div class="d-inline-block">
											<h4 class="mb-0">Vaga - 4</h4>
										</div>
										<div class="progress mt-2 float-right progress-md">
											<div class="progress-bar bg-secondary" role="progressbar" style="width: 35%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="mb-3">
										<div class="d-inline-block">
											<h4 class="mb-0">Vaga - 5</h4>
										</div>
										<div class="progress mt-2 float-right progress-md">
											<div class="progress-bar bg-secondary" role="progressbar" style="width: 21%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="mb-3">
										<div class="d-inline-block">
											<h4 class="mb-0">Vaga - 6</h4>
										</div>
										<div class="progress mt-2 float-right progress-md">
											<div class="progress-bar bg-secondary" role="progressbar" style="width: 85%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="mb-3">
										<div class="d-inline-block">
											<h4 class="mb-0">Vaga - 7</h4>
										</div>
										<div class="progress mt-2 float-right progress-md">
											<div class="progress-bar bg-secondary" role="progressbar" style="width: 25%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
	                        <div style='display:none' class="col-xl-5 col-lg-12 col-md-6 col-sm-12 col-12">
	                            <div class="card">
	                                <h5 class="card-header"><img src="img/dinheiro.png"  width="35px" height="35px"> Receita Mensal </h5>
	                                <div class="card-body">
	                                    <canvas style='display:none' id="chartjs_bar_horizontal"></canvas>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                 </div>
	               </div>
                 </div>
             </div>
<!-- Modal -->
<div class="modal fade" id="visualiza_status_vaga_index" tabindex="-1" role="dialog" aria-labelledby="visualiza_status_vaga" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="visualiza_status_vaga_Title"STYLE="font-size:30px">Detalhes do Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" STYLE="font-size:50px">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9"><span id="id_cliente_modal"></span></dd>
            <dt class="col-sm-3">Nome:</dt>
            <dd class="col-sm-9"><span id="nm_cliente_modal"></span></dd>
            <dt class="col-sm-3">CPF:</dt>
            <dd class="col-sm-9"><h5 id="cpf_cliente_modal"></h5></dd>
            <dt class="col-sm-3">Email:</dt></dt>
            <dd class="col-sm-9"><span id="email_cliente_modal"></span></dd>
            <dt class="col-sm-3">Bairro:</dt></dt>
            <dd class="col-sm-9"><span id="bairro_cliente_modal"></span></dd>
            <dt class="col-sm-3">Cidade:</dt></dt>
            <dd class="col-sm-9"><span id="cidade_cliente_modal"></span></dd>
            <dt class="col-sm-3">UF-Estado:</dt></dt>
            <dd class="col-sm-9"><span id="sg_uf_cliente_modal"></span></dd>
            <dt class="col-sm-3">Telefone:</dt></dt>
            <dd class="col-sm-9"><span id="telefone_cliente_modal"></span></dd>
        </dl>
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="visualiza_status_vaga_Title" STYLE="font-size:25px">Detalhes do Veiculo</h5>
      </div>
      <div class="modal-body">
        <dl class="row">
            <dt class="col-sm-3">Placa:</dt>
            <dd class="col-sm-9"><span id="placa_cliente_modal">u</span></dd>
            <dt class="col-sm-3">Modelo:</dt>
            <dd class="col-sm-9"><span id="modelo_cliente_modal">u</span>u</dd>
            <dt class="col-sm-3">Marca:</dt>
            <dd class="col-sm-9"><span id="marca_cliente_modal">u</span></dd>
            <dt class="col-sm-3">Cor:</dt></dt>
            <dd class="col-sm-9"><span id="cor_cliente_modal">u</span></dd>
        
        </dl>
      </div>
      
    </div>
  </div>
</div>
<br>
<br>

<!-- fim Modal -->
<!-- footer -->

            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">Voltar</a>
                                <a href="javascript: void(0);">Suporte</a>
                                <a href="javascript: void(0);">ContatoUs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- fim footer --> 
        </div>  
    </div>
  
    
    <!-- Optional JavaScript -->
    <!-- sempre excluir o  link do js, mesmo  '// marcado com texto ele ainda vai buscar e da erro' -->
    <script src="../chart_js/jquery-3.3.1.min.js"></script>
    <script src="../chart_js/bootstrap.bundle.js"></script>
    <script src="../chart_js/jquery.slimscroll.js"></script>     
    <script src="../chart_js/main-js.js"></script>
    <script src="../chart_js/chartist.min.js"></script>
    <script src="../chart_js/jquery.sparkline.js"></script>
    <script src="../chart_js/raphael.min.js"></script>
    <script src="../chart_js/morris.js"></script>
    <script src="../chart_js/c3.min.js"></script>
    <script src="../chart_js/d3-5.4.0.min.js"></script>
    <script src="../chart_js/C3chartjs.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.js" integrity="sha512-Cv3WnEz5uGwmTnA48999hgbYV1ImGjsDWyYQakowKw+skDXEYYSU+rlm9tTflyXc8DbbKamcLFF80Cf89f+vOQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../chart_js/chart.js"></script>
	<script src="../chart_js/Chart.bundle.js"></script>
    <script src="../chart_js/custom_vagas.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- graficos -->
      <script src="../chart_js/card_quantp_hora.js"></script>
      <script src="../chart_js/graficos_vagas.js"></script>
    <!-- fim -->
</body>
 
</html>
                        
