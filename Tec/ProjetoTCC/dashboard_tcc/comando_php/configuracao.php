<?php
include("crud_php/conexao_cadastro.php");

session_start(); // Iniciar a sessão

// Limpara o buffer de redirecionamento
ob_start();

// Incluir o arquivo para validar e recuperar dados do token
include_once '../adm/config/valida_token.php';

// Chamar a função validar o token, se a função retornar FALSE significa que o token é inválido e acessa o IF
if(!validarToken()){
    // Criar a mensagem de erro e atribuir para variável global
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário realizar o login para acessar a página!</p>";

    // Redireciona o o usuário para o arquivo vagas_park.php
    header("Location:../adm/erro_404.php");

    // Pausar o processamento da página
    exit();
}

// Chamar a função para recuperar o nome salvo no token
//echo "Bem vindo " . recuperarNomeToken() . ". <br>";

?>
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
    <link href="../css_dash/jquery.minicolors.css" rel="stylesheet">
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
                            <a class="nav-link active"  href="/dashboard_tcc/comando_php/configuracao.php" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Configurações<span class="badge badge-secondary">New</span></a>
                           
                        </li>                      
                    </ul>
                </div>
            </nav>
        </div>
    </div>
             <!-- navbar e lateral do menu -->
     <!-- ============================================================== -->
        <!-- ============================================================== -->
    
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                         <h2 class="pageheader-title">Color Picker </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Color Picker</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
              
               
              
                    <div class="row">
                        <!-- ============================================================== -->
                        
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Minicolors</h5>
                                <div class="card-body">
                                    <h4 class="card-title">Control Types</h4>
                                    <div class="form-group">
                                        <label for="hue-demo">Hue (default)</label>
                                        <input type="text" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
                                    </div>
                                    <div class="form-group">
                                        <label for="saturation-demo">Saturation</label>
                                        <input type="text" id="saturation-demo" class="form-control demo" data-control="saturation" value="#0088cc">
                                    </div>
                                    <div class="form-group">
                                        <label for="brightness-demo">Brightness</label>
                                        <input type="text" id="brightness-demo" class="form-control demo" data-control="brightness" value="#00ffff">
                                    </div>
                                    <div class="form-group">
                                        <label for="wheel-demo">Wheel</label>
                                        <input type="text" id="wheel-demo" class="form-control demo" data-control="wheel" value="#ff99ee">
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Positions</h5>
                                <div class="card-body">
                                    <h6 class="card-subtitle">Valid positions include bottom left, bottom right, top left, and top right.</h6>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="position-bottom-left">bottom left (default)</label>
                                                <input type="text" id="position-bottom-left" class="form-control demo" data-position="bottom left" value="#0088cc">
                                            </div>
                                            <div class="form-group">
                                                <label for="position-top-left">top left</label>
                                                <input type="text" id="position-top-left" class="form-control demo" data-position="top left" value="#0088cc">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="position-bottom-right">bottom right</label>
                                                <input type="text" id="position-bottom-right" class="form-control demo" data-position="bottom right" value="#0088cc">
                                            </div>
                                            <div class="form-group">
                                                <label for="position-top-right">top right</label>
                                                <input type="text" id="position-top-right" class="form-control demo" data-position="top right" value="#0088cc">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        </div>
                    </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
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
                                <a href="javascript: void(0);">Voltar</a>
                                <a href="javascript: void(0);">Suporte</a>
                                <a href="javascript: void(0);">ContatoUs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <!-- ============================================================== -->
        </div>
    </div>

    <!-- ============================================================== -->
      <script src="../chart_js/jquery-3.3.1.min.js"></script>
    <script src="../chart_js/bootstrap.bundle.js"></script>
    <script src="../chart_js/jquery.slimscroll.js"></script>
    <script src="../chart_js/main-js.js"></script>
   
    <!-- This Page JS -->
    <script src="../chart_js/jquery-asColor.min.js"></script>
    <script src="../chart_js/jquery-asGradient.js"></script>
    <script src="../chart_js/jquery-asColorPicker.min.js"></script>
    <script src="../chart_js/jquery.minicolors.min.js"></script>
    <script>
   $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
            control: $(this).attr('data-control') || 'hue',
            defaultValue: $(this).attr('data-defaultValue') || '',
            format: $(this).attr('data-format') || 'hex',
            keywords: $(this).attr('data-keywords') || '',
            inline: $(this).attr('data-inline') === 'true',
            letterCase: $(this).attr('data-letterCase') || 'lowercase',
            opacity: $(this).attr('data-opacity'),
            position: $(this).attr('data-position') || 'bottom left',
            swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
            change: function(value, opacity) {
                if (!value) return;
                if (opacity) value += ', ' + opacity;
                if (typeof console === 'object') {
                    console.log(value);
                }
            },
            theme: 'bootstrap'
        });

    });
    </script>
   
</body>
 
</html>