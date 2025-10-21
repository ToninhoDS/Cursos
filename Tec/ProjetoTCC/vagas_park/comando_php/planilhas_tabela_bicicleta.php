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
                                <a class="nav-link active" href="/vagas_park/comando_php/detalhamento_servico_tabela.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fas fa-building"></i>Planilhas Serviços</a>
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
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Detalhamento de Serviços</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/vagas_park/vagas_park/" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Planilha de Serviços</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabelas</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ====================   PLANILHAS ======================== -->
                              <!-- =========PEGANDO AS INFORMAÇÕES DO GERENTE NO BANCO=========== -->
          

              <!-- ============================================================== -->
              <div class="col-xl-12 col-lg-12 col-md-7 col-sm-12 col-12">
<?php
if(isset($_SESSION['msg'])){

echo $_SESSION['msg'];
unset($_SESSION['msg']); 
}  

?>
                    <div class="influence-profile-content pills-regular">
                        <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                        <li class="nav-item" style="margin:0 10px;">
                        <a class="nav-link " id="pills-review-tab" href="detalhamento_servico_tabela.php"  role="tab" aria-controls="pills-review" aria-selected="true">Planilha de Moto<img src='../img/moto_vagas.png' style="margin:0 5px"width='25'></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="pills-campaign-tab"  href="planilhas_tabela_carro.php" role="tab" aria-controls="pills-campaign" aria-selected="true">Planilha de Carro<img src='../img/carro_vagas.png' style="margin:0 5px"width='25'></a>
                            </li>
                            <li class="nav-item" style="margin:0 10px;">
                                <a class="nav-link active" id="pills-msg-tab"  href="planilhas_tabela_bicicleta.php" role="tab" aria-controls="pills-msg" aria-selected="false">Planilha de Bicicleta<img src='../img/bike_vagas.jpg' style="margin:0 5px"width='25'></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-packages-tab"  href="planilhas_tabela_outros.php" role="tab" aria-controls="pills-packages" aria-selected="false">Planilha de Outros<img src='../img/outros_vagas.png' style="margin:0 5px"width='25'></a>
                            </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                            </div>
                                
                                <!-- FIM MOTO -->
                                <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                                </div>
                                <!-- FIM OUTROS -->
                                <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                    <div class="ecommerce-widget">
                                        <div class="row">					       
                                            <div class='col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12'>
                                                <div class="card">
                                                    <h3 class="card-header"  style='font-size: 40px;' >Planilha de<strong> Bicicleta</strong></h3>
                                                    <span style='font-size: 30px;position: absolute;' id="msgAlerta"></span>            
                                                    <div style="padding: 5px 5px ;" class="col-md-3">                                       
                                                        <input id="search-input" type="text" class="form-control"  placeholder="Pesquisar Vaga" value="" required="">
                                                        
                                                        </div>
                                                        <span class="list_planilha_bicicleta"></span>
                                                    </div>
                                                </div>                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- FIM CARRO -->
                                <div class="tab-pane fade" id="pills-msg" role="tabpanel" aria-labelledby="pills-msg-tab">
                                    <h5 class="">bike</h5>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            <!-- ========================FIM PLANILHAS ========================= -->
    <!-- Modal -->
    <div class="modal fade" id="visualiza_status_vaga" tabindex="-1" role="dialog"      aria-labelledby="visualiza_status_vaga" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="visualiza_status_vaga_Title" STYLE="font-size:30px">Detalhes do Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"STYLE="font-size:30px">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                        <dl class="row">
                            <dt class="col-sm-3">ID</dt>
                            <dd class="col-sm-9"><span id="id_planilha_modal"></span></dd>
                            <dt class="col-sm-3">Nº Vagas</dt>
                            <dd class="col-sm-9"><span id="vaga_planilha_modal"></span></dd>
                            <dt class="col-sm-3">Nome:</dt>
                            <dd class="col-sm-9"><span id="nm_nomeP_modal"></span></dd>
                            <dt class="col-sm-3">CPF:</dt>
                            <dd class="col-sm-9"><span id="cpf_cliente_modal"></span></dd>
                            <!-- <dt class="col-sm-3">Placa:</dt></dt>
                            <dd class="col-sm-9"><span id="placaP_modal"></span></dd> -->
                            <dt class="col-sm-3">Entrada:</dt></dt>
                            <dd class="col-sm-9"><span id="entradaP_modal"></span></dd>
                        </dl>
                    </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="visualiza_status_vaga_Title" STYLE="font-size:25px">Detalhes de <strong>Pagamento<img src='../img/dinheiro.png' style='margin:0 5px'width='25'></strong></h5>
                </div>
                <div class="modal-body" style="color:black;font-size:20px">
                    <dl class="row">
                        <dt class="col-sm-5">Hora Atual:</dt>
                        <dd class="col-sm-4"><span id="horaAtualP_modal"></span></dd>
                        <dt class="col-sm-5">Tempo Est.:</dt>
                            <dd class="col-sm-4"><span id="tempoEstacionadoP_modal">0:00:00</span> hrs</dd>
                            <dt class="col-sm-5">Tolêrancia?:</dt>
                            <dd class="col-sm-7"><span id="toleranciaP_modal">Não</span></dd>
                            <dt class="col-sm-5">Valor será pago:</dt></dt>
                            <dd id="valorpagoP"class="col-sm-4"><span id="valorPagarP_modal">R$:0,00</span></dd>         
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
  
<!-- fim Modal -->
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
    <script src="assets/vendor/custom-js/jquery.multi-select.html"></script>
    <script src="../chart_js/main-js.js"></script>
    <script src="../chart_js/custom_sessao_adm.js"></script>
    <!-- planilhas -->
    <script src="../chart_js/custom_planilha_bicicleta.js"></script>

