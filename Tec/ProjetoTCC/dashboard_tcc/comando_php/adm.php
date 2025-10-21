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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css_dash/bootstrap.min.css"> 
    <link href="../css_dash/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css_dash/caixa_estilo.css">
    <link rel="stylesheet" href="../css_dash/morris.css">
    <link rel="stylesheet" href="../css_dash/fonts/fontawesome/css/fontawesome-all.css">
    
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
                    <li class="nav-item">
<!-- nome de quem logou -->
                        <li class=" nav-item  dropdown notification" style="margin:0 23px"> <a class="nav-link nav-icons"  id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span><?php echo "Bem vindo &nbsp;" ,recuperarNomeToken() ?></a></li>
                        <!-- fim -->
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
                            <a class="nav-link" href="/dashboard_tcc/comando_php/cards.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fa fa-fw fa-rocket"></i>Avisos</a>
                           
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

        <!-- FIM DO MENU LATERAL @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="influence-profile">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2">Área Administrativa</h3>
                                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Gerente</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- =========PEGANDO AS INFORMAÇÕES DO GERENTE NO BANCO=========== -->
                    <div class="row">
              
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar text-center d-block">
                                        <img src="<?php echo $diretorio,'/',$foto_gerente ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                    </div>
                                    <div class="text-center">
                                        <h2 class="font-24 mb-0"><?php echo $row_gerente['nm_gerente'] ?></h2>
                                        <p>Cargo de <strong style='font-size:17px'><?php echo $row_gerente['nm_cargo'] ?></strong> Empresa</p>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16">Contact Information</h3>
                                    <div class="">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i><?php echo $row_gerente['nm_email'] ?></li>
                                        <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i><?php echo $row_gerente['cd_telefone'] ?></li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16">Avaliação da Empresa</h3>
                                    <h1 class="mb-0">4.8</h1>
                                    <div class="rating-star">
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <p class="d-inline-block text-dark">14 comentários</p>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16">Social Channels</h3>
                                    <div class="">
                                        <ul class="mb-0 list-unstyled">
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-facebook-square mr-1 facebook-color"></i>fb.me/vagaspark</a></li>
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-twitter-square mr-1 twitter-color"></i>twitter.com/vagaspark</a></li>
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-instagram mr-1 instagram-color"></i>instagram.com/vagaspark</a></li>
                                        <li class="mb-1"><a href="#"><i class="fas fa-fw fa-rss-square mr-1 rss-color"></i>vagaspark.com/blog</a></li>
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-pinterest-square mr-1 pinterest-color"></i>pinterest.com/vagaspark</a></li>
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-youtube mr-1 youtube-color"></i>youtube/vagaspark</a></li>
                                    </ul>
                                    </div>
                                </div>
                                <!-- <div class="card-body border-top">
                                    <h3 class="font-16">Category</h3>
                                    <div>
                                        <a href="#" class="badge badge-light mr-1">Fitness</a><a href="#" class="badge badge-light mr-1">Life Style</a><a href="#" class="badge badge-light mr-1">Gym</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <!-- ============================================================== -->
                        <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
<?php
    if(isset($_SESSION['msg'])){

    echo $_SESSION['msg'];
    unset($_SESSION['msg']); 
}  

?>
                            <div class="influence-profile-content pills-regular">
                                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                    <li class="nav-item" style="margin:0 10px;">
                                        <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Empresa</a>
                                    </li>
                                    <li class="nav-item" style="margin:0px 4px;">
                                        <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Prestador de Serviço</a>
                                    </li>
                                    <li class="nav-item" style="margin:0 10px;">
                                        <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false">Cadastro de Funcionário</a>
                                    </li>
                                    <li class="nav-item" style="margin:0 20px;">
                                        <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages" aria-selected="false">Packages</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="section-block">
                                                    <h3 class="section-title">Status das Vagas</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">9</h1>
                                                        <p>Livres</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">35</h1>
                                                        <p>Ocupadas</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">8</h1>
                                                        <p>Reservas</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">1</h1>
                                                        <p>Total de Vagas</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="section-block">
                                                    <h3 class="section-title">Detalhamento das Vagas Ocupadas</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">9</h1>
                                                       <p>ocupada por<strong style='font-size:18px'>  Carro</p></strong> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">35</h1>
                                                        <p>ocupada por<strong style='font-size:18px'>  Motos</p></strong> 
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">8</h1>
                                                        <p>ocupada por<strong style='font-size:18px'>  Biciletas</p></strong> 
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">1</h1>
                                                        <p>ocupada por<strong style='font-size:18px'>  Outros</p></strong> 
                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section-block">
                                            <h3 class="section-title">Companhias Filiais</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="media influencer-profile-data d-flex align-items-center p-2">
                                                            <div class="mr-4">
                                                                <img src="img/img_sistema/slack.png" alt="User Avatar" class="user-avatar-lg">
                                                            </div>
                                                            <div class="media-body ">
                                                                <div class="influencer-profile-data">
                                                                    <h3 class="m-b-10">Vagas Park - Santos, SP</h3>
                                                                    <p>
                                                                        <span class="m-r-20 d-inline-block">Park do Irmão
                                                                            <span class="m-l-10 text-primary">24 Jan 2023</span>
                                                                        </span>
                                                                        
                                                                            <span class="m-r-20 d-inline-block">Aberto dia <span class="m-l-10  text-info">30 May, 2018</span>
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="border-top card-footer p-0">
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">45k</h4>
                                                    <p>Total Reach</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">29k</h4>
                                                    <p>Total Views</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">5k</h4>
                                                    <p>Total Click</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">4k</h4>
                                                    <p>Engagement</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">2k</h4>
                                                    <p>Conversion</p>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="media influencer-profile-data d-flex align-items-center p-2">
                                                            <div class="mr-4">
                                                                <img src="img/img_sistema/dribbble.png" alt="User Avatar" class="rounded-circle user-avatar-lg">
                                                            </div>
                                                            <div class="media-body">
                                                                 <h3 class="m-b-10">Vagas Park - Praia Grande, SP</h3>
                                                                     <p><span class="m-r-20 d-inline-block">Park do Mano<span class="m-l-10 d-inline-block text-primary">28 Jan 2018</span></span>
                                                                         <span class="m-r-20 d-inline-block"> Fereiado
                                                                            <span class="m-l-10 text-secondary">20 March 2018</span>
                                                                     </span><span class="m-r-20">Aberto dia <span class="m-l-10 text-info">10 July, 2018</span></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="border-top card-footer p-0">
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0 ">35k</h4>
                                                    <p>Total Reach</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0 ">45k</h4>
                                                    <p>Total Views</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">8k</h4>
                                                    <p>Total Click</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0 ">10k</h4>
                                                    <p>Engagement</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">3k</h4>
                                                    <p>Conversion</p>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="card">
                                           
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                                        <!-- <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="section-block">
                                                    <h2 class="section-title">My Packages</h2>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-header bg-primary text-center p-3 ">
                                                        <h4 class="mb-0 text-white"> Basic</h4>
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <h1 class="mb-1">$150</h1>
                                                        <p>Per Month Plateform</p>
                                                    </div>
                                                    <div class="card-body border-top">
                                                        <ul class="list-unstyled bullet-check font-14">
                                                            <li>Facebook, Instagram, Pinterest,Snapchat.</li>
                                                            <li>Guaranteed follower growth for increas brand awareness.</li>
                                                            <li>Daily updates on choose platforms</li>
                                                            <li>Stronger customer service through daily interaction</li>
                                                            <li>Monthly progress report</li>
                                                            <li>1 Million Followers</li>
                                                        </ul>
                                                        <a href="#" class="btn btn-outline-secondary btn-block btn-lg">Get Started</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-header bg-info text-center p-3">
                                                        <h4 class="mb-0 text-white"> Standard</h4>
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <h1 class="mb-1">$350</h1>
                                                        <p>Per Month Plateform</p>
                                                    </div>
                                                    <div class="card-body border-top">
                                                        <ul class="list-unstyled bullet-check font-14">
                                                            <li>Facebook, Instagram, Pinterest,Snapchat.</li>
                                                            <li>Guaranteed follower growth for increas brand awareness.</li>
                                                            <li>Daily updates on choose platforms</li>
                                                            <li>Stronger customer service through daily interaction</li>
                                                            <li>Monthly progress report</li>
                                                            <li>2 Blog Post & 3 Social Post</li>
                                                            <li>5 Millions Followers</li>
                                                            <li>Growth Result</li>
                                                        </ul>
                                                        <a href="#" class="btn btn-secondary btn-block btn-lg">Get Started</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-header bg-primary text-center p-3">
                                                        <h4 class="mb-0 text-white">Premium</h4>
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <h1 class="mb-1">$550</h1>
                                                        <p>Per Month Plateform</p>
                                                    </div>
                                                    <div class="card-body border-top">
                                                        <ul class="list-unstyled bullet-check font-14">
                                                            <li>Facebook, Instagram, Pinterest,Snapchat.</li>
                                                            <li>Guaranteed follower growth for increas brand awareness.</li>
                                                            <li>Daily updates on choose platforms</li>
                                                            <li>Stronger customer service through daily interaction</li>
                                                            <li>Monthly progress report & Growth Result</li>
                                                            <li>4 Blog Post & 6 Social Post</li>
                                                        </ul>
                                                        <a href="#" class="btn btn-secondary btn-block btn-lg">Contact us</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                    
                                        <div class="card">
                                        <div class="row">
                        <!-- ============================================================== -->
                        <!-- tabela DE FUNCIONARIO DO GERENTE -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                </div>
                                <h2  class="card-header">Gerenciamento de Funcionario<span id="msgAlerta"></span></h2>                               
                                    <span class="listar_funcionario"></span>                               
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- FIM DA TABELA DO FUNCIONARIO GERENTE -->
            <!-- Modal -->
<div class="modal fade" id="visualiza_funcionario_adm" tabindex="-1" role="dialog" aria-labelledby="visualiza_funcionario_adm" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="visualiza_funcionario_adm_Title" STYLE="font-size:30px">Detalhes do Funcionário</h4>    
      </div>
      <div class="modal-body">
        <span id="msgAlertaErroEdit"></span>
                <form class="row g-3" id="edit_formulario_funcionario"> 
                <div class="row">
                  <div class="col">
                    <input type="hidden" class="form-control" name="cd_funcionario"  aria-label="First name" id="id_cliente_modal">
                  </div>
                  <div class="col-md-6">
                  <label for="email" class="form-label">Nome</label>
                    <input type="text" style="width: 130%;
            height: 27%;margin:0 -60px" class="form-control" name="nm_nome"aria-label="Last name" id="nm_nome_modal">
                </div>
                <div class="col-md-4">
                  <label for="inputAddress2" style=" " class="form-label">Imagens</label>
                  <img type="image" class="form-control" name="img_imagem" id="img_imagem_modal" src="">
                
                </div>
                </div>
                  <div class="col-md-8">
                      <label for="inputAddress" class="form-label">Cargo</label>
                      <input type="text" class="form-control" name="nm_cargo" id="nm_cargo_modal" >
                    </div>
                  <div class="col-md-4">
                    <label for="inputCity" class="form-label">Credencial</label>
                    <input type="text" class="form-control" name="cd_credencial" id="credencial_modal">
                  </div>
                  <div class="col-md-5">
                    <label for="inputCity" class="form-label">Inicio Contratual</label>
                    <input type="date" class="form-control" name="dt_emissao_contratual" id="dt_emissao_contratual_modal">
                  </div>
                    <div class="col-md-3">
                      <label for="inputCity" class="form-label">Sexo</label>
                      <input type="text" class="form-control" name="nm_sexo" id="nm_sexo_modal">
                    </div>
                  <div class="col-md-4">
                    <label for="inputState" class="form-label">data de Nasc.</label>
                    <input type="date" class="form-control" name="cd_data_nascimento" id="cd_data_nascimento_modal">
                  </div>
                  
                    <div class="col-md-4">
                      <label for="inputAddress" class="form-label">CPF</label>
                      <input type="text" class="form-control" name="cd_cpf" id="cd_cpf_modal" >
                    </div>
                  <div class="col-md-8">
                    <label for="inputCity" class="form-label">Email</label>
                    <input type="email" class="form-control" name="cd_email_funcionario" id="cd_email_funcionario_modal">
                  </div>
                    <div class="col-md-6">
                      <label for="inputAddress" class="form-label">Senha</label>
                      <input type="password" class="form-control" name="cd_senha_funcionario" id="cd_senha_funcionario_modal" >
                    </div>
                  <div class="col-md-6">
                    <label for="inputCity" class="form-label">Telefone</label>
                    <input type="number" class="form-control" name="cd_telefone" id="cd_telefone_modal">
                  </div>
                    <div class="col-12">
                      <label for="inputAddress" class="form-label">Endereco</label>
                      <input type="text" class="form-control" name="nm_bairro" id="cd_senha_bairro_modal" >
                    </div>
                  <div class="col-md-8">
                    <label for="inputCity" class="form-label">Cidade</label>
                    <input type="text" class="form-control" name="nm_cidade" id="cd_cidade_modal">
                  </div>
                  <div class="col-md-4">
                    <label for="inputCity" class="form-label">Estado</label>
                    <input type="text" class="form-control" name="sg_uf" id="cd_estado_modal">
                  </div>
                  <div class="col-md-6">
                    
                    <input type="hidden" class="form-control" name="cd_bairro" id="cd_bairro_modal">
                  </div>
                  <div class="col-md-6">
                    
                    <input type="hidden" class="form-control" name="cd_gerente" id="cd_gerente_modal">
                  </div>
                  <div class="col-md-6">
                      <input type="submit" class="btn btn-warning btn-lg btn-block" id="edit-usuario-btn" value="Editar">
                    </div>
                    <div class="col-md-4"> 
                      <button type="button" class="btn btn-primary btn-lg btn-block" id="edit-clouse-btn" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
             </div>
          </div>
      </div>  
   </div>
            <!-- ============================================================== -->
           <!-- JANELA MODAL DE CONFIRMAÇÃO -->
<!-- Modal -->
             <div class="modal fade" id="msgCardSucesso" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                 <div class="modal-dialog modal-dialog-centered" role="document">
                         <div class="modal-content">
                            <div class="modal-header alert alert-success">
                                <h4 class="modal-title" id="TituloModalCentralizado">Atualização de Cadastro</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true"></span>
                                </button>
                                     </div>
                            <div class="modal-body">
                                <h4 id="msgCardconfirmacao" style="font-size:28px">Dados do Funcionario, <strong>Atualizados!!!</strong></h4>
                                 </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-outline-success " id="edit-clouse-btn" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                        </div>
                    </div>
 <!-- CADASTRO DE FUNCIONARIO-->
 <!-- ============================================================== -->
                        <div class="tab-pane fade" id="pills-msg" role="tabpanel" aria-labelledby="pills-msg-tab">
                            <div class="card">
                                <h5 class="card-header">Cadastro de Funcionario</h5>
                                <div class="card-body">
                                <form class="needs-validation"  action="cadastrar_funcionario.php" method="POST" id="Cadas_funcionario_form" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Cargo</label>
                                             <input  name="nm_cargo" id="nm_cargo" required="Campo em Branco" placeholder="Digite" class="form-control"  type="text" >
                                             <div class="valid-feedback">
                                                    Correto!
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Numero de Registro</label>
                                             <input  name="cd_credencial" id="cd_credencial" required="Campo em Branco" placeholder="Digite" class="form-control"  type="number" >
                                             <div class="valid-feedback">
                                                    Correto!
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Data de Matricula</label>
                                             <input  name="dt_emissao_contratual" id="dt_emissao_contratual" required="Campo em Branco" placeholder="Digite" class="form-control"  type="date" >
                                             <div class="valid-feedback">
                                                    Correto!
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 "><br>
                                            <label for="validationCustom01">Nome Completo do Funcionario</label>
                                             <input  name="nm_nome" id="nm_nome" required="Campo em Branco" placeholder="Digite o nome" class="form-control"  type="text" >
                                             <div class="valid-feedback">
                                                    Correto!
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2"><br>
                                            <label for="validationCustom03">CPF</label>
                                            <input  name="cd_cpf" id="cd_cpf" placeholder="Digite o CPF" required="Campo em Branco" class="form-control"  type="number">
                                            <div class="invalid-feedback">
                                                CPF incorreto!.
                                            </div>
                                            
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2"><br>
                                            <label for="validationCustom04">Sexo</label>
                                            <input  name="nm_sexo" id="nm_sexo" placeholder="Digite o Sexo" class="form-control"  type="text">
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><br>
                                        <div id="img_imagem" style="">
                                            <img id="imgFuncionario"style="width:250px; height:200px;">
                                                <input style="width:250px; height:35px;"type="file" name="img_imagem" class="form-control" required="Campo em Branco"  id='imagem' onchange="previewImagem()"/>
                                            <div class="valid-feedback">
                                                     Correto!
                                            </div>
                                            </div>
                                        </div>
                                    <br><br>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2"><br>
                                            <label for="validationCustom04">Formação</label>
                                            <input  name="nm_formacao" id="nm_formacao" required="Campo em Branco" placeholder="Profissional" class="form-control"  type="text">
                                            <div class="invalid-feedback">
                                                Invalido
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2"><br>
                                            <label for="validationCustom05">Nome da Mãe</label>
                                            <input name="nm_maternidade" id="nm_maternidade"  required="Campo em Branco" placeholder="Digite o numero"  class="form-control"  type="mother">
                                            <div class="invalid-feedback">
                                                Numero incorreto!.
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2"><br>
                                            <label for="validationCustom05">Celular</label>
                                            <input name="cd_telefone" id="cd_telefone"  required="Campo em Branco" placeholder="Digite o numero"  class="form-control"  type="tel">
                                            <div class="invalid-feedback">
                                                Numero incorreto!.
                                            </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-2"><br>
                                            <label for="validationCustom03">Data de Nascimento</label>
                                            <input type="date" name="cd_data_nascimento" id="cd_data_nascimento" placeholder="Digite o nascimento" required="Campo em Branco" class="form-control"  type="text">
                                            <div class="invalid-feedback">
                                                Placa do Carro invalida!.
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                        <br>
                        
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-2"><br>
                                            <label for="validationCustom03">Estado Civil</label>
                                            <input type="text" name="nm_estado_civil" id="nm_estado_civil" placeholder="Digite "  class="form-control"  type="text">
                                            <div class="invalid-feedback">
                                                Marca do Carro invalido!.
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-2"><br>
                                            <label for="validationCustom03">RG</label>
                                            <input type="number" name="cd_rg" id="cd_rg" placeholder="Digite"  class="form-control"  type="text">
                                            <div class="invalid-feedback">
                                                Modelo do Carro invalido!.
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-2"><br>
                                            <label for="validationCustom03">Idade</label>
                                            <input type="number" name="cd_idade" required="Campo em Branco" id="cd_idade" placeholder="Digite" class="form-control"  type="text">
                                            <div class="invalid-feedback">
                                                Cor do Carro invalido!.
                                            </div>
                                        </div>
                            
                                       
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustomUsername">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">📧 </span>
                                                </div>
                                                <input name="cd_email_funcionario" id="cd_email_funcionario"  required="Campo em Branco" placeholder="Email" class="form-control"  type="text">
                                                <div class="invalid-feedback">
                                                    Email incorreto!.
                                                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">🔒</span>
                                                </div>                                                
                                                <input name="cd_senha_funcionario" id="cd_senha_funcionario"  required="Campo em Branco" placeholder="Senha" class="form-control"  type="password">
                                                <div class="invalid-feedback">
                                                    Email incorreto!.
                                                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">🔒👍</span>
                                                </div>
                                                <input name="cd_senha_funcionario_conf" id="cd_senha_funcionario_conf" required="Campo em Branco" placeholder="Confirmar senha" class="form-control"  type="password">
                                                <div class="invalid-feedback">
                                                    Email incorreto!.
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2"><br>
                                            <label for="validationCustom03">Bairro</label>
                                            <input  name="nm_bairro" id="nm_bairro"  required="Campo em Branco" placeholder="Digite o Bairro"  class="form-control"  type="text">
                                            <div class="invalid-feedback">
                                            Bairro incorreto!.
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2"><br>
                                            <label for="validationCustom04">Cidade</label>
                                            <input  name="nm_cidade" id="nm_cidade"  required="Campo em Branco" placeholder="Digite a Cidade" class="form-control"  type="text">
                                            <div class="invalid-feedback">
                                            Cidade incorreto!.
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2"><br>
                                            <label for="validationCustom05">UF-Estado</label>
                                            <input name="sg_uf" id="sg_uf"  required="Campo em Branco" placeholder="Digite o Estado"  class="form-control"  type="text">
                                            <div class="invalid-feedback">
                                            UF-Estado incorreto!.
                                            </div>
                                        </div>
                                    </div>                                       
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><br>
                                            <div class="form-group">
                                                <div class="form-check" style="margin:0 1%">
                                                    <input class="form-check-input" style="font-size:22px;"type="checkbox" value="" id="invalidCheck" required>
                                                    <label class="form-check-label" style="font-size:20px" for="invalidCheck">
                                                        As informações estão corretas?
                                                    </label>
                                                    <div class="invalid-feedback">
                                                        Você, precisa confirma, se as informações estão corretas!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <input type="submit" value="Cadastrar" class="btn btn-lg btn-primary" >
                                            <button type="reset" class="btn btn-secondary btn-lg"  onclick="LimparpreviewImagem()">Limpar</button>        
                                        </div>
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
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- jquery 3.3.1  -->
    <script src="../chart_js/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../chart_js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../chart_js/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="../chart_js/main-js.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/custom_funcionario.js"></script>
    
   
</body>
 
</html>