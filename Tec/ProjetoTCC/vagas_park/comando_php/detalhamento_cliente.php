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
    <link href="../css_dash/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css_dash/caixa_estilo.css">
    <link rel="stylesheet" href="../css_dash/fonts/fontawesome/css/fontawesome-all.css">
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
                                     <h2 class="pageheader-title">Detalhamento do Cliente</h2>
                                     <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                     <div class="page-breadcrumb">
                                         <nav aria-label="breadcrumb">
                                             <ol class="breadcrumb">
                                                 <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Detalhamento do Cliente</a></li>
                                                 <li class="breadcrumb-item active" aria-current="page">Informações do Cliente</li>
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
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
                                            <div class="product-slider">
                                                <div id="productslider-1" class="product-carousel carousel slide" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img class="d-block" src="img/img_sistema/eco-slider-img-1.png" alt="First slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block" src="img/img_sistema/eco-slider-img-2.png" alt="Second slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block" src="img/img_sistema/eco-slider-img-3.png" alt="Third slide">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                             <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                                    <div class="product-details">
                                        <div class="border-bottom pb-3 mb-3">
                                            <h2 class="mb-3">Nome do cliente</h2>
                                            <div class="product-rating d-inline-block float-right">
                                                <i class="fa fa-fw fa-star"></i>
                                                <i class="fa fa-fw fa-star"></i>
                                                <i class="fa fa-fw fa-star"></i>
                                                <i class="fa fa-fw fa-star"></i>
                                                <i class="fa fa-fw fa-star"></i>
                                            </div>
                                            <h3 class="mb-0 text-primary">Nota</h3>
                                        </div>
                                        <div class="product-colors border-bottom">
                                            <h4>Cor de Veiculo</h4>
                                            <input type="radio" class="radio" id="radio-1" name="group" />
                                            <label for="radio-1"></label>
                                            <input type="radio" class="radio" id="radio-2" name="group" />
                                            <label for="radio-2"></label>
                                            <input type="radio" class="radio" id="radio-3" name="group" />
                                            <label for="radio-3"></label>
                                        </div>
                                        <div class="product-size border-bottom">
                                            <h4>Tipo de veiculo</h4>
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <button type="button" class="btn btn-outline-light">Carro</button>
                                                <button type="button" class="btn btn-outline-light">Moto</button>
                                                <button type="button" class="btn btn-outline-light">Bicilete</button>
                                                <button type="button" class="btn btn-outline-light">Outros</button>
                                            </div>
                                            
                                        </div>
                                        <div class="product-description">
                                            <h4 class="mb-1">Descrição</h4>
                                            <p>Praesent et cursus quam. Etiam vulputate est et metus pellentesque iaculis. Suspendisse nec urna augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                                            <a href="#" class="btn btn-primary btn-block btn-lg">Voltar</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-60">
                                    <div class="simple-card">
                                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active border-left-0" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true">Feedback da Empresa</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">Feedback do Atendimento</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent5">
                                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                                                <p>Praesent et cursus quam. Etiam vulputate est et metus pellentesque iaculis. Suspendisse nec urna augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubiliaurae.</p>
                                                <p>Nam condimentum erat aliquet rutrum fringilla. Suspendisse potenti. Vestibulum placerat elementum sollicitudin. Aliquam consequat molestie tortor, et dignissim quam blandit nec. Donec tincidunt dui libero, ac convallis urna dapibus eu. Praesent volutpat mi eget diam efficitur, a mollis quam ultricies. Morbi eu turpis odio.</p>
                                                <ul class="list-unstyled arrow">
                                                    <li>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                        <li>Donec ut elit sodales, dignissim elit et, sollicitudin nulla.</li>
                                                        <li>Donec at leo sed nisl vestibulum fermentum.
                                                            </li>
                                                        </ul>
                                            </div>
                                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="product-tab-2">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“Vestibulum cursus felis vel arcu convallis, viverra commodo felis bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin non auctor est, sed lacinia velit. Orci varius natoque penatibus et magnis dis parturient montes nascetur ridiculus mus.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Virgina G. Lightfoot</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                                <div class="review-block border-top mt-3 pt-3">
                                                    <p class="review-text font-italic m-0">“Integer pretium laoreet mi ultrices tincidunt. Suspendisse eget risus nec sapien malesuada ullamcorper eu ac sapien. Maecenas nulla orci, varius ac tincidunt non, ornare a sem. Aliquam sed massa volutpat, aliquet nibh sit amet, tincidunt ex. Donec interdum pharetra dignissim.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Ruby B. Matheny</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                                <div class="review-block  border-top mt-3 pt-3">
                                                    <p class="review-text font-italic m-0">“ Cras non rutrum neque. Sed lacinia ex elit, vel viverra nisl faucibus eu. Aenean faucibus neque vestibulum condimentum maximus. In id porttitor nisi. Quisque sit amet commodo arcu, cursus pharetra elit. Nam tincidunt lobortis augueat euismod ante sodales non. ”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Gloria S. Castillo</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="section-block" id="basicform">
                                                
                                                </div>
                                                <div class="card">
                                                <h3 class="card-header">Dado do Cliente</h3>
                                                <div class="card-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="inputText3" class="col-form-label">Input Text</label>
                                                            <input id="inputText3" type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail">Email address</label>
                                                            <input id="inputEmail" type="email" placeholder="name@example.com" class="form-control">
                                                            <p>We'll never share your email with anyone else.</p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputText4" class="col-form-label">Number Input</label>
                                                            <input id="inputText4" type="number" class="form-control" placeholder="Numbers">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputPassword">Password</label>
                                                            <input id="inputPassword" type="password" placeholder="Password" class="form-control">
                                                        </div>
                                                        <div class="custom-file mb-3">
                                                            <input type="file" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">File Input</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Example textarea</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="card-body border-top">
                                                    <h3>Sizing</h3>
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="inputSmall" class="col-form-label">Small</label>
                                                            <input id="inputSmall" type="text" value=".form-control-sm" class="form-control form-control-sm">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputDefault" class="col-form-label">Default</label>
                                                            <input id="inputDefault" type="text" value="Default input" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputLarge" class="col-form-label">Large</label>
                                                            <input id="inputLarge" type="text" value=".form-control-lg" class="form-control form-control-lg">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
        <script>
        jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
        jQuery('.quantity').each(function() {
            var spinner = jQuery(this),
                input = spinner.find('input[type="number"]'),
                btnUp = spinner.find('.quantity-up'),
                btnDown = spinner.find('.quantity-down'),
                min = input.attr('min'),
                max = input.attr('max');

                btnUp.click(function() {
                    var oldValue = parseFloat(input.val());
                if (oldValue >= max) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue + 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });

            btnDown.click(function() {
                var oldValue = parseFloat(input.val());
                if (oldValue <= min) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue - 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });

        });
        </script>
</body>

 
</html>