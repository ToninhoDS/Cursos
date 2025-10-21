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
    <link rel="stylesheet" href="../css_dash/bootstrap.min.css"> 
    <link href="../css_dash/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css_dash/caixa_estilo.css"> 
    <link rel="stylesheet" href="../css_dash/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../css_dash/morris.css">
    <link rel="stylesheet" href="../css_dash/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
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
     <!-- @@@@ fim do menu lateral MENU -->
     <!-- GUIA DO MENU -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Formulario Cliente</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Área Cliente</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Cadastro</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Formulário</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
<?php   // iniciar a sessao depois de feito o cadastro ou erro
if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']); 
        // é para destruir a mensagem  global para nao reproduzir de novo
    }  

?>
                <!-- ============================================================== -->
                <!-- 1 FORMULARIO DE CADASTRO CLIENTE SIMPLE-->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h2 class="card-header">Cadastro Completo</h2>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate action="cadastrar_cliente.php" method="POST"  id="contact_form">


    
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">Nome completo</label>
                                                <input  name="nm_cliente" id="nm_cliente" required="" placeholder="Digite o nome" class="form-control"  type="text" >
                                                <div class="valid-feedback">
                                                    Correto!
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2"><br>
                                                <label for="validationCustom03">CPF</label>
                                                <input  name="cd_cpf" id="cd_cpf" placeholder="Digite o CPF" required="" class="form-control"  type="text">
                                                <div class="invalid-feedback">
                                                    CPF incorreto!.
                                                </div>
                                            </div><br><br>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2"><br>
                                                <label for="validationCustom04">CNPJ</label>
                                                <input  name="cd_cnpj" id="cd_cnpj" placeholder="Digite o CNPJ" class="form-control"  type="text">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2"><br>
                                                <label for="validationCustom05">Celular</label>
                                                <input name="cd_numero1" id="cd_numero1" placeholder="Digite o numero"  class="form-control"  type="text">
                                                <div class="invalid-feedback">
                                                    Numero incorreto!.
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustomUsername">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">📧 </span>
                                                    </div>
                                                    <input name="cd_email_cliente" id="cd_email_cliente" placeholder="Email" class="form-control"  type="text">
                                                    <div class="invalid-feedback">
                                                        Email incorreto!.
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    
                                                
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">🔒</span>
                                                    </div>
                                                                                                        
                                                    <input name="cd_senha_cliente" id="cd_senha_cliente" placeholder="Senha" class="form-control"  type="text">
                                                    <div class="invalid-feedback">
                                                        Email incorreto!.
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">🔒👍</span>
                                                    </div>
                                                    <input name="cd_senha_cliente_confirmar" id="cd_senha_cliente_confirmar" placeholder="Confirmar senha" class="form-control"  type="text">
                                                    <div class="invalid-feedback">
                                                        Email incorreto!.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<br>
<hr>

                                        <div class="row">
                                            <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">Nome da Rua</label>
                                                <input  name="nm_bairro" id="nm_bairro"  placeholder="Digite a Rua" class="form-control"  type="text" >
                                                <div class="valid-feedback">
                                                    Correto!
                                                </div>
                                            </div> -->
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Bairro</label>
                                                <input  name="nm_bairro" id="nm_bairro" placeholder="Digite o Bairro"  class="form-control"  type="text">
                                                <div class="invalid-feedback">
                                                Bairro incorreto!.
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Cidade</label>
                                                <input  name="nm_cidade" id="nm_cidade" placeholder="Digite a Cidade" class="form-control"  type="text">
                                                <div class="invalid-feedback">
                                                Cidade incorreto!.
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom05">UF-Estado</label>
                                                <input name="sg_uf" id="sg_uf" placeholder="Digite o Estado"  class="form-control"  type="text">
                                                <div class="invalid-feedback">
                                                UF-Estado incorreto!.
                                                </div>
                                            </div>
                                        </div>
<br>
<hr>                                        
                                        <div class="form-row">
                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Placa do Carro</label>
                                                <input type="text" name="cd_placa" id="cd_placa" placeholder="NUMERO DA PLACA" required="" class="form-control"  type="text">
                                                <div class="invalid-feedback">
                                                    Placa do Carro invalida!.
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Marca</label>
                                                <input type="nm_marca" name="nm_marca" id="nm_modelo" placeholder="Modelo"  class="form-control"  type="text">
                                                <div class="invalid-feedback">
                                                    Marca do Carro invalido!.
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Modelo</label>
                                                <input type="text" name="nm_modelo" id="nm_modelo" placeholder="Modelo"  class="form-control"  type="text">
                                                <div class="invalid-feedback">
                                                    Modelo do Carro invalido!.
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Cor</label>
                                                <input type="text" name="nm_cor" id="nm_cor" placeholder="Cor do carro" class="form-control"  type="text">
                                                <div class="invalid-feedback">
                                                    Cor do Carro invalido!.
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                        <label class="form-check-label" for="invalidCheck">
                                                            As informações estão corretas?
                                                        </label>
                                                        <div class="invalid-feedback">
                                                            Você, precisa confirma, se as informações estão corretas!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit">Cadastrar</button>
                                                
                                            </div>
                                        </div>
                                    </form>
                                         <!-- ir para tabelas cliente cadastrado -->               
                                        <div class="botao-ir-tabela">
                                             <form action="data-tables.php" class="needs-validation">
                                              <button class="btn btn-info" type="submdit">Ir para tabela Cadastro</button>
                                            </form>
                                        </div>
                                        <!-- fim -->
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <!-- FIM  FORMULARIO 2 DE CADASTRO CLIENTE SIMPLE- -->
                    <!-- ============================================================== -->
                    

                    <!--  FORMULARIO 2-->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h2 class="card-header">Cadastro Simples de Carro</h2>
                                <div class="card-body">
                                    <form action="#" id="basicform" data-parsley-validate="">
                                        <div class="form-group">
                                            <label for="inputUserName">User Name</label>
                                            <input id="inputUserName" type="text" name="name" data-parsley-trigger="change" required="" placeholder="Enter user name" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Email address</label>
                                            <input id="inputEmail" type="email" name="email" data-parsley-trigger="change" required="" placeholder="Enter email" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Password</label>
                                            <input id="inputPassword" type="password" placeholder="Password" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputRepeatPassword">Repeat Password</label>
                                            <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword" type="password" required="" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <label class="be-checkbox custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                                </label>
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Confirmar</button>
                                                    <button class="btn btn-space btn-secondary">Cancelar</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h2 class="card-header">Cadastro de Bicleta e Outros</h2>
                                <div class="card-body">
                                    <form id="form" novalidate action="cadastrar_bike_outros.php" method="POST"  id="cadastro_bike_outros">
                                    <div class="form-group row">
                                            <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Transporte</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="cd_transporte" name="cd_transporte" type="text" required="" data-parsley-type="email" placeholder="Qual meio de Transporte?" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword2" class="col-3 col-lg-2 col-form-label text-right">Informação</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="cd_detalhes" name="cd_detalhes" type="text" required="" placeholder="Detalhes" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword2" class="col-3 col-lg-2 col-form-label text-right">Nome do Cliente</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="cd_nome" type="text"  name="cd_nome" required="" placeholder="Nome" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputWebSite" class="col-3 col-lg-2 col-form-label text-right">Observações</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="cd_observacao"  name="cd_observacao" type="text" required="" data-parsley-type="url" placeholder="..." class="form-control">
                                            </div>
                                        </div>
                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <label class="be-checkbox custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Está tudo correto?</span>
                                                </label>
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Confirmar</button>
                                                    <button class="btn btn-space btn-secondary">Cancelar</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    </div>      
            </div>
            <!-- footer -->
            <!-- ============================================================== -->
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
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
      <script src="../chart_js/jquery-3.3.1.min.js"></script>
    <script src="../chart_js/bootstrap.bundle.js"></script>
    <script src="../chart_js/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/parsley/parsley.js"></script>
    <script src="../chart_js/main-js.js"></script>
    <script>
    $('#form').parsley();
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
</body>
 
</html>