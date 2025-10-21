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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css_dash/bootstrap.min.css"> 
    <link href="../css_dash/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css_dash/caixa_estilo.css">
    <link rel="stylesheet" href="../css_dash/morris.css">
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
                            <a class="nav-link "  data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Vagas Park</a>
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
                            <a class="nav-link active"  href="/vagas_park/comando_php/regras_de_negocio.php" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i>Guia Rápido</a>
                            
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
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                    <!-- pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                           <h2 class="pageheader-title">Guia Rápido</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/vagas_park/vagas_park/" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item"><a  class="breadcrumb-link">Linha do tempo Sistema</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Sistema</li>
                                      </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->
                      <!-- ============================================================== -->
                    <!-- timeline  -->
                    <!-- ============================================================== -->
                
                    <section class="cd-timeline js-cd-timeline" style='font-size: 20px;'>
                        <div class="cd-timeline__container">
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                                    <img src="/vagas_park/img/passos.png" alt="Picture">
                                </div>
                                <!-- cd-timeline__img -->
                                <div class="cd-timeline__content js-cd-content">
                                    <h2>Primeiro acesso</h2><hr>
                                    <p>O acesso inicial ao sistema não requear experiência ou ter conhecimento em RH para fazer um  cadastro completo de usuário, em pouco tempo já consegui mexer no sistema, garantindo a segurança e a integridade dos dados.</p>
                                    <a href="adm.php" class="btn btn-primary btn-lg">Saiba mais</a>
                                    <span class="cd-timeline__date">10 Janeiro, 2023</span>
                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                                    <img src="/vagas_park/img/cadastro_semd.png" alt="Movie">
                                </div>
                                <!-- cd-timeline__img -->
                                <div class="cd-timeline__content js-cd-content">
                                    <h2>Gerenciamento de cadastro</h2><hr>
                                    <p>O sistema permite a adição, edição e exclusão de usuários de forma intuitiva e segura, garantindo a integridade e a privacidade das informações dos usuários.</p>
                                 <a href="data-tables.php" class="btn btn-primary btn-lg">Saiba mais</a>
                                    <span class="cd-timeline__date">20 Janeiro, 2023</span>
                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                                    <img src="/vagas_park/img/visaosem.png" alt="Picture">
                                </div>
                                <!-- cd-timeline__img -->
                                <div class="cd-timeline__content js-cd-content">
                                    <h2>Visão do dashboard</h2><hr>
                                    <p>A visão do dashboard é projetada de forma abrangente, oferecendo uma visão panorâmica e detalhada das atividades do estacionamento, com informações relevantes apresentadas em gráficos interativos </p>
                                  <a href="cards.php" class="btn btn-primary btn-lg">Saiba mais</a>
                                    <span class="cd-timeline__date">04 Fervereiro, 2023</span>
                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img cd-timeline__img--location js-cd-img">
                                    <img src="/vagas_park/img/mapa_va.png" alt="Location">
                                </div>
                                <!-- cd-timeline__img -->
                                <div class="cd-timeline__content js-cd-content">
                                    <h2>Gráficos e mapa</h2><hr>
                                    <p>O sistema apresenta gráficos interativos e visualmente atraentes, oferecendo informações detalhadas sobre a ocupação do estacionamento, além de um mapa intuitivo para visualização da localização das vagas.</p>
                                 <a href="#0" class="btn btn-primary btn-lg">Saiba mais</a>
                                    <span class="cd-timeline__date">12 Fervereiro, 2023</span>
                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                                    <img src="/vagas_park/img/gestenci_esta.png" alt="Location">
                                </div>
                                <!-- cd-timeline__img -->
                                <div class="cd-timeline__content js-cd-content">
                                    <h2>Gerenciar o stacionamento</h2><hr>
                                    <p>Através do dashboard, é possível gerenciar as vagas disponíveis, monitorar a ocupação em tempo real, visualizar a localização das vagas em um mapa intuitivo e ter um controle preciso do cadastro de usuários, garantindo um gerenciamento eficiente e centralizado.</p>
                                 <a href="vagas_park.php" class="btn btn-primary btn-lg" >Saiba mais</a>
                                   
                                    <span class="cd-timeline__date">05 Março, 2023</span>
                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img cd-timeline__img--location js-cd-img">
                                    <img src="/vagas_park/img/estaci002.png" alt="Movie">
                                </div>
                                <!-- cd-timeline__img -->
                                <div class="cd-timeline__content js-cd-content">
                                    <h2>Controle de vagas</h2><hr>
                                    <p>Com recursos gráficos avançados, o sistema proporciona uma análise aprofundada do uso do estacionamento, permitindo tomadas de decisões estratégicas com base em dados concretos.</p>
                                    <a href="vagas_detalhes.php" class="btn btn-primary btn-lg">Saiba mais</a>
                                    <span class="cd-timeline__date">04 Abril, 2023</span>
                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                            <!-- cd-timeline__block -->
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                                    <img src="/vagas_park/img/ferramenta.png" alt="Movie">
                                </div>
                                <!-- cd-timeline__img -->
                                <div class="cd-timeline__content js-cd-content">
                                    <h2>Configurações</h2><hr>
                                    <p>Configurar um sistema simples e intuitivo, com interface de usuário amigável, fluxos de navegação claros e recursos de fácil compreensão, visando tornar a utilização do software fácil e intuitiva para os usuários, mesmo sem experiência prévia no sistema.</p>
                                    <a href="configuracao.php" class="btn btn-primary btn-lg" >Saiba mais</a>
                                    <span class="cd-timeline__date">15 Abril, 2023</span>
                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                            <!-- cd-timeline__block -->
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                                    <img src="/vagas_park/img/equipe01.png" alt="Movie">
                                </div>
                                <!-- cd-timeline__img -->
                                <div class="cd-timeline__content js-cd-content">
                                    <h2>Nossa Equipe</h2><hr>
                                Sistema conta com um suporte eficiente de humanos, composto por uma equipe de atendimento dedicada, pronta para auxiliar os usuários em caso de dúvidas, problemas técnicos ou necessidade de suporte adicional.<br><br>Esse suporte é realizado de forma rápida e personalizada, visando garantir a satisfação e a confiança dos usuários no sistema, oferecendo um atendimento humanizado e resolutivo.</p>
                                    <span class="cd-timeline__date">19 Abril, 2023</span>
                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                        </div>
                    </section>
                    <!-- cd-timeline -->
               
                  <!-- ============================================================== -->
                    <!-- end timeline  -->
                    <!-- ============================================================== -->
            </div>
               <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                      
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
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
      
    </div>
   <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
      <script src="../chart_js/jquery-3.3.1.min.js"></script>
    <script src="../chart_js/bootstrap.bundle.js"></script>
    <script src="../chart_js/jquery.slimscroll.js"></script>
    <script src="../chart_js/main-js.js"></script>
    <script src="assets/vendor/timeline/js/main.js"></script>
    <script src="../chart_js/custom_sessao_adm.js"></script>
</body>

 
</html>