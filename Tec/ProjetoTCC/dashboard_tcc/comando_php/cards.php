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
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css_dash/bootstrap.min.css">
    <link href="../css_dash/fonts/circular-std/style.css" rel="stylesheet"><link rel="stylesheet" href="../css_dash/caixa_estilo.css">
    
    <link rel="stylesheet" href="../css_dash/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="icon" href="img/vagas.ico" type="image/png">
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
                            <a href="logout.php" class="dropdown-item" ><i class="fas fa-power-off mr-2"></i>Sair</a>
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
                            <a class="nav-link "  data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Vagas Park<span class="badge badge-success">6</span></a>
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
                            <a class="nav-link active" href="/dashboard_tcc/comando_php/cards.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fa fa-fw fa-rocket"></i>Avisos</a>
                           
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

        <!-- FIM DO MENU LATERAL @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">Cards </h2>
                                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">UI Elements</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Cards</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- overview  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-section" id="overview">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h2>Overview</h2>
                                            <p class="lead">A card is a flexible and extensible content container. It includes options for headers and footers, a wide variety of content, contextual background colors, and powerful display options.</p>
                                            <ul class="list-unstyled arrow">
                                                <li>Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.</li>
                                                <li>Additional card with action button like dropdown on right side.</li>
                                                <li>Card with tabs.</li>
                                                <li>Card with buttons on top header. </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end overview  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- simple cards  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                <!-- basic media -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Basic Example of Media</h5>
                            <div class="card-body">
                                <div class="media">
                                    <img class="mr-3 user-avatar-lg rounded" src="/dashboard_tcc/img/img_sistema/avatar-1.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5>Media heading</h5>
                                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic media -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- nesting media -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header" id="Mensagens">Nesting Media</h5>
                            <div class="card-body">
                                <div class="media">
                                    <img class="mr-3 user-avatar-lg rounded" src="/dashboard_tcc/img/img_sistema/avatar-2.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0">Media heading</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                        <div class="media mt-3">
                                            <a class="pr-3" href="#">
                                                  <img class="mr-2 user-avatar-lg rounded" src="/dashboard_tcc/img/img_sistema/avatar-3.jpg" alt="Generic placeholder image" ></a>
                                            <div class="media-body">
                                                <h5 class="mt-0">Media heading</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Top-aligned media</h5>
                            <div class="card-body">
                                <div class="media">
                                    <img class="mr-3 user-avatar-lg rounded" src="/dashboard_tcc/img/img_sistema/avatar-4.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0">Top aligned media</h5>
                                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                        <p>Donec sed odio dm sociis natoque penat lorem ippum dolor sait maettempus viverra turpis. Fusce condimentum nuncac nisi dis parturient montes, nascetur ridiculus mus.</p>
                                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante solliciturus ondimentum nunc ac sit ametm nisi vulputate frinue felis in faucibus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="c-nav">
                            <h3 class="section-title" id="card_nav">Card Navigation</h3>
                            <p>Add some navigation to a card’s header (or block) with Bootstrap’s nav components.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header tab-regular">
                                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="card-tab-1" data-toggle="tab" href="#card-1" role="tab" aria-controls="card-1" aria-selected="true">Card Tab 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="card-tab-2" data-toggle="tab" href="#card-2" role="tab" aria-controls="card-2" aria-selected="false">Card Tab 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="card-tab-3" data-toggle="tab" href="#card-3" role="tab" aria-controls="card-3" aria-selected="false">Card Tab 3</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="card-1" role="tabpanel" aria-labelledby="card-tab-1">
                                        <p>Etiam odio eraturabitur scelerisque leo at lectus mollis, ac dictum lectus fermentum. Donec vitae tellus sapieestas sit amet risus eu, interdum sodales metus. </p>
                                        <p>
                                            Phasellus vulputate dui quam, a pretium lorem vestibulum nec. Cras risus nisi, sollicitudin eget dui eu, porta tinci consectetur, leo vel tincidunt imperdiet, nibh nisl consectetur titor purus dui vitae nibh. Donec ut rhoncus elit, eget aliquam enim. </p>
                                    </div>
                                    <div class="tab-pane fade" id="card-2" role="tabpanel" aria-labelledby="card-tab-2">
                                        <p>Donec vitae tellus sapieniam odio erat egestas sit amet risus euCurabitur scelerisque leo at lectus mollisac dictum lectus fermentuminterdum sodales metus. </p>
                                        <p>
                                            Cras risus nisi, sollicitudin eget dui eu, porta tincidunt sem. Donec consectetur, leo vel tincidunt imperdiet, nibh nisl consectetur orci, ut porttitor purus dui vitae nibh. Donec ut rhoncus elit, eget aliquam enim. </p>
                                    </div>
                                    <div class="tab-pane fade" id="card-3" role="tabpanel" aria-labelledby="card-tab-3">
                                        <p>Curabitur scelerisque leo at lectus mollis, ac dictum lectus fermentum. Donec vitae tellus sapien. Etiam odio erat, egestas sit amet risus eu, interdum sodales metus. </p>
                                        <p>
                                            Phasellus vulputate dui quam, a pretium lorem vestibulum nec. Cras risus nisi, sollicitudin eget dui eu, porta tincidunt sem. Donec consectetur, leo vel tincidunt imperdiet, nibh nisl consectetur orci, ut porttitor purus dui vitae nibh. Donec ut rhoncus elit, eget aliquam enim. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header pills-regular">
                                <ul class="nav nav-pills card-header-pills" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="card-pills-1" data-toggle="tab" href="#card-pill-1" role="tab" aria-controls="card-1" aria-selected="true">Card Tab 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="card-pills-2" data-toggle="tab" href="#card-pill-2" role="tab" aria-controls="card-2" aria-selected="false">Card Tab 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="card-pills-3" data-toggle="tab" href="#card-pill-3" role="tab" aria-controls="card-3" aria-selected="false">Card Tab 3</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="card-pill-1" role="tabpanel" aria-labelledby="card-tab-1">
                                        <p>Curabitur scelerisque leo at lectus mollis, ac dictum lectus fermentum. Donec vitae tellus sapien. Etiam odio erat, egestas sit amet risus eu, interdum sodales metus. </p>
                                        <p>
                                            Phasellus vulputate dui quam, a pretium lorem vestibulum nec. Cras risus nisi, sollicitudin eget dui eu, porta tincidunt sem. Donec consectetur, leo vel tincidunt imperdiet, nibh nisl consectetur orci, ut porttitor purus dui vitae nibh. Donec ut rhoncus elit, eget aliquam enim. </p>
                                    </div>
                                    <div class="tab-pane fade" id="card-pill-2" role="tabpanel" aria-labelledby="card-tab-2">
                                        <p>Etiam libero metus, dapibus vel sollicitudin vel, cursus sit amet urna. Nam imperdiet sem et purus varius aliquam. </p>
                                        <p>
                                            Proin pulvinar diam tempor auctor egestas. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec consectetur, leo vel tincidunt imperdiet, nibh nisl consectetur orci, ut porttitor purus dui vitae nibh. Donec ut rhoncus elit, eget aliquam enim. </p>
                                    </div>
                                    <div class="tab-pane fade" id="card-pill-3" role="tabpanel" aria-labelledby="card-tab-3">
                                        <p>Donec vitae tellus sapietiam odio erat, egestas sit amet risus euabitur scelerisque leo at lectus mollis, ac dictum lectus fermentum. interdum sodales metus. </p>
                                        <p>
                                            Cras risus nisi, sollicitudin eget dui eu porta tincidunt sem. Donec consectetur, leo vel tincidunt imperdiet, nibh nisl consectetur orci, ut porttitor purus dui vitae nibh. Donec ut rhoncus elit, eget aliquam enim. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                            <div class="section-block">
                                <h5 class="section-title" id="card_vert">Vertical tabs</h5>
                                <p>Takes the basic nav from above and adds the .nav-tabs class to generate a tabbed interface..</p>
                            </div>
                            <div class="tab-vertical">
                                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-vertical-tab" data-toggle="tab" href="#home-vertical" role="tab" aria-controls="home" aria-selected="true">Tab Vertical #1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-vertical-tab" data-toggle="tab" href="#profile-vertical" role="tab" aria-controls="profile" aria-selected="false">Tab Vertical #2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-vertical-tab" data-toggle="tab" href="#contact-vertical" role="tab" aria-controls="contact" aria-selected="false">Tab Vertical #3</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent3">
                                    <div class="tab-pane fade show active" id="home-vertical" role="tabpanel" aria-labelledby="home-vertical-tab">
                                        <p class="lead"> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. </p>
                                        <p>Phasellus non ante gravida, ultricies neque a, fermentum leo. Etiam ornare enim arcu, at venenatis odio mollis quis. Mauris fermentum elementum ligula in efficitur. Aliquam id congue lorem. Proin consectetur feugiasse platea dictumst. Pellentesque sed justo aliquet, posuere sem nec, elementum ante.</p>
                                        <a href="#" class="btn btn-secondary">Go somewhere</a>
                                    </div>
                                    <div class="tab-pane fade" id="profile-vertical" role="tabpanel" aria-labelledby="profile-vertical-tab">
                                        <h3>Tab Heading Vertical Title</h3>
                                        <p>Nullam et tellus ac ligula condimentum sodales. Aenean tincidunt viverra suscipit. Maecenas id molestie est, a commodo nisi. Quisque fringilla turpis nec elit eleifend vestibulum. Aliquam sed purus in odio ullamcorper congue consectetur in neque. Aenean sem ex, tempor et auctor sed, congue id neque. </p>
                                        <p> Fusce a eros pellentesque, ultricies urna nec, consectetur dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.</p>
                                    </div>
                                    <div class="tab-pane fade" id="contact-vertical" role="tabpanel" aria-labelledby="contact-vertical-tab">
                                        <h3>Tab Heading Vertical Title</h3>
                                        <p>Vivamus pellentesque vestibulum lectus vitae auctor. Maecenas eu sodales arcu. Fusce lobortis, libero ac cursus feugiat, nibh ex ultricies tortor, id dictum massa nisl ac nisi. Fusce a eros pellentesque, ultricies urna nec, consectetur dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.</p>
                                        <p> Fusce a eros pellentesque, ultricies urna nec, consectetur dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <!-- ============================================================== -->
                        <!-- end basic pills  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- vertical pills  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                            <div class="section-block">
                                <h5 class="section-title">Vertical Pills tabs</h5>
                                <p>Takes the basic nav from above and adds the .nav-tabs class to generate a tabbed interface..</p>
                            </div>
                            <div class="pills-vertical">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Tab#1</a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Tab#2</a>
                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Tab#3</a>
                                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Tab#4</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 ">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <p class="lead"> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. </p>
                                                <p>Phasellus non ante gravida, ultricies neque a, fermentum leo. Etiam ornare enim arcu, at venenatis odio mollis quis. Mauris fermentum elementum ligula in efficitur. Aliquam id congue lorem. Proin consectetur feugiasse platea dictumst. Pellentesque sed justo aliquet, posuere sem nec, elementum ante.</p>
                                                <a href="#" class="btn btn-secondary">Go somewhere</a>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <p>Nullam et tellus ac ligula condimentum sodales. Aenean tincidunt viverra suscipit. Maecenas id molestie est, a commodo nisi. Quisque fringilla turpis nec elit eleifend vestibulum. Aliquam sed purus in odio ullamcorper congue consectetur in neque. Aenean sem ex, tempor et auctor sed, congue id neque. </p>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                <p>Vivamus pellentesque vestibulum lectus vitae auctor. Maecenas eu sodales arcu. Fusce lobortis, libero ac cursus feugiat, nibh ex ultricies tortor, id dictum massa nisl ac nisi. Fusce a eros pellentesque, ultricies urna nec, consectetur dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.</p>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                <p>Vivamus pellentesque vestibulum lectus vitae auctor. Maecenas eu sodales arcu. Fusce lobortis, libero ac cursus feugiat, nibh ex ultricies tortor, id dictum massa nisl ac nisi. Fusce a eros pellentesque, ultricies urna nec, consectetur dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
                 
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
                        <div class="sidebar-nav-fixed">
                            <ul class="list-unstyled">
                                <li><a href="#overview" class="active">Overview</a></li>
                                <li><a href="#Mensagens">Mensagens</a></li>
                                <li><a href="#card_nav">Cartão de Navegação</a></li>
                                <li><a href="#card_vert">Cartão Verticais</a></li>
                               
                            </ul>
                        </div>
                    </div>
               
                </div>
            </div>
         
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                          
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">Voltar</a>
                                <a href="javascript: void(0);">Suporte</a>
                                <a href="javascript: void(0);">ContatoUs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
  
      <script src="../chart_js/jquery-3.3.1.min.js"></script>
    <script src="../chart_js/bootstrap.bundle.js"></script>
    <script src="../chart_js/jquery.slimscroll.js"></script>
    <script src='../assets/libs/js/main-js.js'></script>
   
</body>
 
</html>