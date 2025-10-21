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
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">Notificação do Sistema</h2>
                                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Avisos</a></li>
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Sistema</a></li>
                                                
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
                                            <h2>Sistema</h2><br>
                                            <p class="lead">Prezado usuário,<br>

Gostaríamos de informar que nosso sistema está passando por uma atualização importante e, como resultado, você pode esperar melhorias significativas em sua experiência. Essas atualizações visam aprimorar a segurança, a estabilidade e o desempenho de nossos serviços, garantindo que você tenha a melhor experiência possível.</p>
                                            <ul class="list-unstyled arrow">
                                                <li>Aviso de Sistema e Atualizações: Mantenha-se Informado e Desfrute de Suporte Excepcional</li>
                                                <li>As melhorias que essa atualização trará e esperamos que você também fique satisfeito com os resultados. Seu feedback é valioso para nós!!!</li>
                                                
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
                            <h5 class="card-header">Atualização 1.05</h5>
                            <div class="card-body">
                                <div class="media">
                                    <img class="mr-3 user-avatar-lg rounded" src="/vagas_park/img/configuracao_adm.png" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5>implementações de melhorias no Sistema </h5>
                                        <p>Nossa equipe de desenvolvimento e suporte tem trabalhado diligentemente para implementar essas melhorias e garantir que elas sejam compatíveis com suas necessidades. Queremos que você saiba que estamos aqui para apoiá-lo durante todo o processo de transição e responder a quaisquer perguntas ou preocupações que possam surgir.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="c-nav">
                            <h3 class="section-title" id="card_nav">Suporte ao Cliente <strong>Vagas Park</strong></h3>
                            <p>Deixei aqui sua dúvida ou problema, nossa aquipe irá te responder!!!</p>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header" id="Mensagens">Chat</h5>
                            <div class="card-body">
                                <div class="media">
                                    <img class="mr-3 user-avatar-lg rounded" src="<?php echo $diretorio.'/'.recuperarImagemToken() ?>" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0"><?php echo recuperarNomeToken() ?> - <strong>Cliente</strong></h5> O Sistema foi atualizado? - ficou muito bom, Melhorou bastante. Obrigado equipe Vagas Park
                                        <div class="media mt-3">
                                            <a class="pr-3" href="#">
                                                  <img class="mr-2 user-avatar-lg rounded" src="/vagas_park/img/configuracao_enge.png" alt="Generic placeholder image" ></a>
                                            <div class="media-body">
                                            <h5 class="mt-0">AntonioDS - <strong>Suporte</strong></h5> Estamos animados com as melhorias que essa atualização trará e esperamos que você também fique satisfeito com os resultados. Seu feedback é valioso para nós, e incentivamos você a compartilhar suas opiniões e sugestões à medida que se familiariza com as mudanças.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="c-nav">
                            <h3 class="section-title" id="card_nav">Histórico de Atualizações</h3>
                            <p>Consulte as atualizações que ocorreram no Sistema Dashboard</p>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header tab-regular">
                                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="card-tab-1" data-toggle="tab" href="#card-1" role="tab" aria-controls="card-1" aria-selected="true">Atualização 1.00</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="card-tab-2" data-toggle="tab" href="#card-2" role="tab" aria-controls="card-2" aria-selected="false">Atualização 1.02</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="card-tab-3" data-toggle="tab" href="#card-3" role="tab" aria-controls="card-3" aria-selected="false">Atualização 1.05</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="card-1" role="tabpanel" aria-labelledby="card-tab-1">
                                        <p>Nossa equipe de desenvolvimento e suporte tem trabalhado diligentemente para implementar essas melhorias e garantir que elas sejam compatíveis com suas necessidades.
                                    
                                        Queremos que você saiba que estamos aqui para apoiá-lo durante todo o processo de transição e responder a quaisquer perguntas ou preocupações que possam surgir.</p>
                                    </div>
                                    <div class="tab-pane fade" id="card-2" role="tabpanel" aria-labelledby="card-tab-2">
                                        <p>Com a conclusão desta atualização, você poderá desfrutar de recursos aprimorados, uma interface mais intuitiva e uma experiência geral mais agradável. Além disso, a atualização também trará correções de bugs e melhorias de segurança.</p>
                                        <p>
                                        Garantindo que seus dados e informações pessoais estejam protegidos de forma mais eficaz.</p>
                                    </div>
                                    <div class="tab-pane fade" id="card-3" role="tabpanel" aria-labelledby="card-tab-3">
                                        <p>Recomendamos que você mantenha-se informado sobre as atualizações por meio de nossos canais oficiais de comunicação. Publicaremos comunicados e instruções detalhadas sobre as mudanças, além de fornecer orientações claras para facilitar sua transição para a nova versão do sistema.</p>
                                        <p>
                                        Estamos animados com as melhorias que essa atualização trará e esperamos que você também fique satisfeito com os resultados. Seu feedback é valioso para nós, e incentivamos você a compartilhar suas opiniões e sugestões à medida que se familiariza com as mudanças</p>
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
                                <li><a href="#overview" class="active">Avisos do Sistemas</a></li>
                                <li><a href="#Mensagens">Ultima Atualização</a></li>
                                <li><a href="#card_nav">Chat - Suporte</a></li>
                                <li><a href="#card_vert">Histórico de Atualização</a></li>
                               
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
                                <a href="/vagas_park/comando_php/vagas_park.php">Voltar</a>
                                <a href="/vagas_park/comando_php/cards.php">Suporte</a>
                                <a href="/vagas_park/comando_php/configuracao.php">Configurações</a>
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
    <script src="../chart_js/custom_sessao_adm.js"></script>
   
</body>
 
</html>