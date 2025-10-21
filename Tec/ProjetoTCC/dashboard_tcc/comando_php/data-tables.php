<?php
include_once "crud_php/conexao_cadastro.php"; 

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
    <link rel="stylesheet" href="../css_dash/bootstrap.min.css"> 
    <link href="../css_dash/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css_dash/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../css_dash/morris.css">
    <link rel="stylesheet" href="../css_dash/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css_dash/caixa_estilo.css"> <!-- esta dando confrito com a dicima-->
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
                                            <a  class="connection-item"><img src="../img/img_sistema/github.png" alt="" > <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a  class="connection-item"><img src="../img/img_sistema/dribbble.png" alt="" > <span>Cadastro</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a  class="connection-item"><img src="../img/img_sistema/dropbox.png" alt="" > <span>Tabela</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a  class="connection-item"><img src="../img/img_sistema/bitbucket.png" alt=""> <span>Contatos</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a  class="connection-item"><img src="../img/img_sistema/mail_chimp.png" alt="" ><span>Email</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a  class="connection-item"><img src="../img/img_sistema/slack.png" alt="" > <span>Produtos</span></a>
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
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
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
                 <!--@@@@@@ Fim-->
         <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Tabelas dos Clientes</h2>
                            <p class="pageheader-text">.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Área Cliente</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tabela</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Informações de Cadastro</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <!-- tabela do cadastro do cliente -->
                <div class="row">					       
        	<div class='col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12'>
        		<div class="card">
            	<h3 class="card-header"  style='font-size: 40px;'id="" >Lista de Clientes    <strong>Cadastrados</strong><span id="msgAlerta"></span></h3>         
                	<div style="padding: 5px 5px ;" class="col-md-3">                                       
                    <input id="search-input" type="text" class="form-control"   value="" required="">
                 	</div>
                    <span class="listar-clientes"></span>
			</div>
    </div>
<!-- fim -->
<!-- inicio do Modal -->
<!-- Modal -->
<div class="modal fade" id="visualiza_status_vaga" tabindex="-1" role="dialog" aria-labelledby="visualiza_status_vaga" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="visualiza_status_vaga_Title" STYLE="font-size:30px">Detalhes do Cliente</h4>    
      </div>
      <div class="modal-body">
        <span id="msgAlertaErroEdit"></span>
                <form class="row g-3" id="edit_formulario_cliente"> 
                <div class="row">
                  <div class="col">
                    <input type="hidden" class="form-control" name="cd_cliente"  aria-label="First name" id="id_cliente_modal">
                  </div>
                  <div class="col-md-12">
                  <label for="email" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nm_cliente"aria-label="Last name" id="nm_cliente_modal">
                  </div>
                </div>
                  <div class="col-md-6">
                      <label for="inputAddress" class="form-label">CPF</label>
                      <input type="text" class="form-control" name="cd_cpf" id="cpf_cliente_modal" >
                    </div>
                  <div class="col-md-6">
                    <label for="inputCity" class="form-label">Telefone</label>
                    <input type="text" class="form-control" name="cd_numero1" id="telefone_cliente_modal">
                  </div>
                    <div class="col-12">
                      <label for="inputAddress2" class="form-label">Email</label>
                      <input type="text" class="form-control" name="cd_email_cliente" id="email_cliente_modal" >
                    </div>
                  <div class="col-md-5">
                    <label for="inputCity" class="form-label">Bairro</label>
                    <input type="text" class="form-control" name="nm_bairro" id="bairro_cliente_modal">
                  </div>
                    <div class="col-md-5">
                      <label for="inputCity" class="form-label">Cidade</label>
                      <input type="text" class="form-control" name="nm_cidade" id="cidade_cliente_modal">
                    </div>
                  <div class="col-md-2">
                    <label for="inputState" class="form-label">Estado</label>
                    <input type="text" class="form-control" name="sg_uf" id="sg_uf_cliente_modal">
                    <!-- <select id="inputState" class="form-select">
                      <option selected>Choose...</option>
                      <option>...</option>
                    </select> -->
                  </div>
                  <h4 class="modal-title" id="visualiza_status_vaga_Title" STYLE="font-size:25px">Detalhes do Veículo</h4>
                    <div class="col-md-6">
                      <label for="inputAddress" class="form-label">Placa</label>
                      <input type="text" class="form-control" name="cd_placa" id="placa_cliente_modal" >
                    </div>
                  <div class="col-md-6">
                    <label for="inputCity" class="form-label">Modelo</label>
                    <input type="text" class="form-control" name="nm_modelo" id="modelo_cliente_modal">
                  </div>
                    <div class="col-md-6">
                      <label for="inputAddress" class="form-label">Marca</label>
                      <input type="text" class="form-control" name="nm_marca" id="marca_cliente_modal" >
                    </div>
                  <div class="col-md-6">
                    <label for="inputCity" class="form-label">Cor</label>
                    <input type="text" class="form-control" name="nm_cor" id="cor_cliente_modal">
                  </div>
                  <div class="col-md-6">
                      <input type="submit" class="btn btn-warning btn-lg btn-block" id="edit-usuario-btn" value="Editar">
                    </div>
                    <div class="col-md-4"> 
                      <button type="button" class="btn btn-primary btn-lg btn-block" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
             </div>
          </div>
      </div>  
   </div>
<!-- fim Modal -->
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
        <h4 id="msgCardconfirmacao" style="font-size:28px">Dados do Cliente, <strong>Atualizados!!!</strong></h4>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-outline-success " id="edit-clouse-btn" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
            <!-- ============================================================== -->

       
    <script src="../chart_js/jquery-3.3.1.min.js"></script>
<script src="../chart_js/bootstrap.bundle.js"></script>
<script src="../chart_js/jquery.slimscroll.js"></script>
<script src="../chart_js/jquery.multi-select.js"></script>
<script src="../chart_js/main-js.js"></script>
<script src="../chart_js/dataTables.bootstrap4.min.js"></script>
<script src="../chart_js/buttons.bootstrap4.min.js"></script>
 <script src="../chart_js/data-table.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <script src="js/custom.js"></script> 

  

   
</body>

</html>