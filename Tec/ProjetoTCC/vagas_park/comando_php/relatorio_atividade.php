<?php
include("crud_php/conexao_cadastro.php");
// session_start(); 

ob_start();

include_once '../adm/config/valida_token.php';
include("crud_php/conexao_configuracao_sistema_form.php");
if(!validarToken()){

    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário realizar o login para acessar a página!</p>";

    header("Location:../adm/erro_404.php");

    exit();
    
}
$cargo = recuperarCargoToken();
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
    <link rel="stylesheet" href="../css_dash/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
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
                            <a class="nav-link active" href="/vagas_park/comando_php/relatorio_atividade.php" aria-expanded="false" data-target="#submenu-2"  ><i class="fa fa-fw fa-users"></i>Relatório de Atividade</a>
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
                 <div class="dashboard-wrapper">
                     <div class="dashboard-ecommerce">
                         <div class="container-fluid dashboard-content ">
                             
                             <!-- pageheader  -->
                             
                             <div class="row">
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                     <div class="page-header">
                                         <div id='voltar'></div> <!--voltar -->
                                         <h2 class="pageheader-title">Tabela de Vagas</h2>
                                         <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                         <div class="page-breadcrumb">
                                             <nav aria-label="breadcrumb">
                                                 <ol class="breadcrumb">
                                                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                                     <li class="breadcrumb-item active" aria-current="page">Relatório de Atividade</li>
                                                    </ol>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- chama Status Vagas -->
                                
                                <div class="ecommerce-widget">
	<div class="row">					       
        <div class='col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12'>
        		<div class="card">
                    <h3 class="card-header"  style='font-size: 40px;'id="msgAlerta" >Relatório de <strong>Atividade</strong></h3> 
                    <div class='row'>    
                        <div style="margin: 5px 5px ;" class="col-md-3">                                       
                            <input id="search-input" type="text" class="form-control"  placeholder="Pesquisar Vaga" value="" required="">
                        </div>
                        <!-- CASO NÃO SEJA GERENTA FACA -->
<?php
if($cargo == 'Funcionario'){
    echo "<div style='padding: 5px 5px;display:none;' class='col-md-3'>                                       
    <a href='relatorio_lixeira.php'><button  class='btn-success btn-lg'  style='width: 180px; height: 35px;padding: 0px 25px;'>Lixeira<div class='dot'></div></button></a>
    </div>";
}else{
    echo "<div style='padding: 5px 5px ;' class='col-md-3'>                                       
    <a href='relatorio_lixeira.php'><button  class='btn-success btn-lg'  style='width: 180px; height: 35px;padding: 0px 25px;'>Lixeira<div class='dot'></div></button></a>
    </div>";
}
?>
                	
                </div> 
                <span class="listar-relatorio_atividade"></span>
            </div>
        </div>                
    </div>
</div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<!-- <div class="modal fade" id="visualiza_status_vaga" tabindex="-1" role="dialog" aria-labelledby="visualiza_status_vaga" aria-hidden="true">
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
</div> -->
</div>  
</div> 

<!-- fim Modal -->
<!-- footer -->
  
    <!-- fim footer --> 
</div>  
</div>
  
    
    <!-- Optional JavaScript -->
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
	<script src="../chart_js/chartjs.js"></script>
	<script src="../chart_js/api_chart.js"></script>
    <script src="../chart_js/dashboard-influencer.js"></script>
    <script src="../chart_js/custom_relatorio_atividade.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../chart_js/custom_sessao_adm.js"></script>
    <!-- fim -->
</body>

</html>

