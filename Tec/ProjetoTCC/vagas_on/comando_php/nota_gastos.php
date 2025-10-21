<?php
include("crud_php/conexao_cadastro.php");
include("crud_php/conexao_configuracao_sistema_form.php");
// session_start(); 

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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css_dash/bootstrap.min.css">
    <link href="../css_dash/fonts/circular-std/style.css" rel="stylesheet"><link rel="stylesheet" href="../css_dash/caixa_estilo.css">
    
    <link rel="stylesheet" href="../css_dash/fonts/fontawesome/css/fontawesome-all.css">
    <link href="assets/vendor/bootstrap-colorpicker/%40claviska/jquery-minicolors/jquery.minicolors.css" rel="stylesheet">
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
                            <a class="nav-link active"  data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Vagas Park</a>
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
                                <a class="nav-link" href="/vagas_park/comando_php/vagas_detalhes.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fa fa-fw fa-rocket"></i>Reservas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/vagas_park/comando_php/detalhamento_servico_tabela.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fas fa-building"></i>Planilhas Serviços</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/vagas_park/comando_php/adm.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fa fa-fw fa-users"></i>Administrador</a>
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
             <!-- ============================================================== -->
             <!-- FIM DO MENU LATERAL @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
             
             <!-- ============================================================== -->
             <!-- end left sidebar -->
             <!-- ============================================================== -->
             <!-- ============================================================== -->
             <!-- wrapper  -->
             <!-- ============================================================== -->
             <div class="dashboard-wrapper">
                 <div class="dashboard-ecommerce">
                     <div class="container-fluid dashboard-content ">
                         <!-- ============================================================== -->
                         <!-- pageheader  -->
                         <!-- ============================================================== -->
                         <div class="row">
                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                 <div class="page-header">
                                     <h2 class="pageheader-title">E-commerce Product Invoice </h2>
                                     <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                     <div class="page-breadcrumb">
                                         <nav aria-label="breadcrumb">
                                             <ol class="breadcrumb">
                                                 <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">E-coommerce</a></li>
                                                 <li class="breadcrumb-item active" aria-current="page">E-Commerce Product Invoice</li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end pageheader  -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-header p-4">
                                            <a class="pt-2 d-inline-block" href="index.html">Concept</a>
                                            
                                            <div class="float-right"> <h3 class="mb-0">Invoice #1</h3>
                                            Date: 3 Dec, 2020</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <h5 class="mb-3">From:</h5>                                            
                                                    <h3 class="text-dark mb-1">Gerald A. Garcia</h3>
                                                    
                                                    <div>2546 Penn Street</div>
                                                    <div>Sikeston, MO 63801</div>
                                                    <div>Email: info@gerald.com.pl</div>
                                                    <div>Phone: +573-282-9117</div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h5 class="mb-3">To:</h5>
                                                    <h3 class="text-dark mb-1">Anthony K. Friel</h3>                                            
                                                    <div>478 Collins Avenue</div>
                                                    <div>Canal Winchester, OH 43110</div>
                                                    <div>Email: info@anthonyk.com</div>
                                                    <div>Phone: +614-837-8483</div>
                                                </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="center">#</th>
                                                    <th>Item</th>
                                                    <th>Description</th>
                                                    <th class="right">Unit Cost</th>
                                                    <th class="center">Qty</th>
                                                    <th class="right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="center">1</td>
                                                    <td class="left strong">Origin License</td>
                                                    <td class="left">Extended License</td>
                                                    <td class="right">$1500,00</td>
                                                    <td class="center">1</td>
                                                    <td class="right">$1500,00</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">2</td>
                                                    <td class="left">Custom Services</td>
                                                    <td class="left">Instalation and Customization (cost per hour)</td>
                                                    <td class="right">$110,00</td>
                                                    <td class="center">20</td>
                                                    <td class="right">$22.000,00</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">3</td>
                                                    <td class="left">Hosting</td>
                                                    <td class="left">1 year subcription</td>
                                                    <td class="right">$309,00</td>
                                                    <td class="center">1</td>
                                                    <td class="right">$309,00</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">4</td>
                                                    <td class="left">Platinum Support</td>
                                                    <td class="left">1 year subcription 24/7</td>
                                                    <td class="right">$5.000,00</td>
                                                    <td class="center">1</td>
                                                    <td class="right">$5.000,00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5">
                                            </div>
                                            <div class="col-lg-4 col-sm-5 ml-auto">
                                                <table class="table table-clear">
                                                    <tbody>
                                                        <tr>
                                                            <td class="left">
                                                                <strong class="text-dark">Subtotal</strong>
                                                            </td>
                                                            <td class="right">$28,809,00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="left">
                                                                <strong class="text-dark">Discount (20%)</strong>
                                                            </td>
                                                            <td class="right">$5,761,00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="left">
                                                                <strong class="text-dark">VAT (10%)</strong>
                                                            </td>
                                                            <td class="right">$2,304,00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="left">
                                                            <strong class="text-dark">Total</strong>
                                                        </td>
                                                        <td class="right">
                                                            <strong class="text-dark">$20,744,00</strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <p class="mb-0">2983 Glenview Drive Corpus Christi, TX 78476</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="/vagas_park/comando_php/vagas_park.php">Voltar</a>
                                <a href="/vagas_park/comando_php/cards.php">Suporte</a>
                                <a href="/vagas_park/comando_php/configuracao.php">Configurações</a>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end footer -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- end wrapper  -->
                <!-- ============================================================== -->
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <!-- jquery 3.3.1 -->
          <script src="../chart_js/jquery-3.3.1.min.js"></script>
          <!-- bootstap bundle js -->
          <script src="../chart_js/bootstrap.bundle.js"></script>
          <!-- slimscroll js -->
          <script src="../chart_js/jquery.slimscroll.js"></script>
          <!-- main js -->
        <script src="../chart_js/main-js.js"></script>
        <script src="../chart_js/custom_sessao_adm.js"></script>
</body>
 
</html>