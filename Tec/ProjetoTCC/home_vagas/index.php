<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- link do icones do cards -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
     <!-- Font Awesome CDN  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/footer_gif.css">
    <link rel="stylesheet" href="css/selection.css" />
    <link rel="stylesheet" href="css/cards.css" />
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/animacao.css"/>
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <link rel="icon" href="img/vagas.ico" type="image/png"/>
    <link rel="stylesheet" href="css/perfil-usuario.css">
    <link rel="stylesheet" href="css/faq.css">

    <script src="js/perfil-usuario.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
    
    <title>VAGASPARK</title>
</head>
<body>
  <header>
      
      <nav class="navbar navbar-expand-custom navbar-mainbg">
        <a class="logo"><img src="img/logo.png"></a>
        <a class="navbar-brand navbar-logo" href="#"><font color="white"> VAGASPARK </font></a>
 
        <?php 
// Conexão com o banco de dados
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "db_tcc_estacionamento";

//$conn = new mysqli($servername, $username, $password, $dbname);

//if ($conn->connect_error) {
 // die("Falha na conexão: " . $conn->connect_error);
//}

// Atualizar registro
//if(isset($_POST['submit'])) {
  //$cd_cliente = $_POST['id'];
//  $nome = $_POST['nome'];
 // $email = $_POST['email'];
 // $telefone = $_POST['telefone'];
 // $endereco = $_POST['endereco'];

  //$sql = "UPDATE tb_cliente SET nome='$nome', email='$email' WHERE id='$cd_cliente'";

  //if ($conn->query($sql) === TRUE) {
  //  echo "Registro atualizado com sucesso!";
  //} else {
  //  echo "Erro ao atualizar registro: " . $conn->error;
 // }
//}

// Selecionar registro para edição
//if(isset($_GET['id'])) {
  //$cd_cliente = $_GET['id'];
  //$sql = "SELECT * FROM tb_cliente WHERE id='$cd_cliente'";
  //$result = $conn->query($sql);

  //if ($result->num_rows > 0) {
   // $row = $result->fetch_assoc();
    //$nome = $row['nome'];
    //$email = $row['email'];
   // $telefone = $row['telefone'];
   // $endereco = $row['endereco'];
  //} else {
    //echo "Registro não encontrado";
//  }
//}

// Exibir registros
//$sql = "SELECT * FROM tb_cliente";
//$result = $conn->query($sql);

//if ($result->num_rows > 0) {
  //echo "<table>";
  //echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Endereço</th><th>Ação</th></tr>";
  //while($row = $result->fetch_assoc()) {
    //echo "<tr><td>".$row['id']."</td><td>".$row['nome']."</td><td>".$row['email']."</td><td><a href='edit.php?id=".$row['id']."'>Editar</a></td></tr>";
  //}
  //echo "</table>";
//} else {
 // echo "Nenhum registro encontrado";
//}

//$conn->close();
?>
<!-- 

<form method="POST" action="">
  <input type="hidden" name="id" value="<?php echo $cd_cliente; ?>">
  <label>Nome:</label>
  <input type="text" name="nome" value="<?php echo $nome; ?>"><br>
  <label>Email:</label>
  <input type="text" name="email" value="<?php echo $email; ?>"><br>
  <label>Telefone:</label>
  <input type="text" name="telefone" value="<?php echo $telefone; ?>"><br>
  <label>Endereço:</label>
 
  <input type="submit" name="submit" value="Salvar">
</form>
-->
   


        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li class="nav-item active">
                    <a class="nav-link tablinks" onclick="openPage(event, 'home')" id="defaultOpen" href="javascript:void(0);"><i class="fa fa-window-maximize" aria-hidden="true"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tablinks" onclick="openPage(event, 'pro')" href="javascript:void(0);"><i class="fas fa-tachometer-alt"></i>Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tablinks" onclick="openPage(event, 'serv')" href="javascript:void(0);"><i class="far fa-clone"></i>Serviços</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tablinks" onclick="openPage(event, 'Con')" href="javascript:void(0);"><i class="far fa-address-book"></i>Para Celular</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link tablinks" href="http://localhost/dashboard_tcc/vagas_park/login_parceiro.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Nossos Parceiros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tablinks" href="login.php"><i></i>Login</a>
                </li>
            </ul>
        </div>
    </nav>
    
  </header>
    
    <main>
<selection id="home"  class="tabcontent">
        <div class="headerr">
            <div class="container">
                <div class="intro-text">
                  <div class="intro-heading">Gestão de estacionamento</div>
                    <!-- <div class="intro-lead-in">Qualidade e Segurança</div> -->
                    
                </div>
            </div>
          </div>
        
        <!-- propagando -->
        <div class="section-223-copy wf-section">
          <div class="w-container">
            <div class="columns-16 w-row">
              <div class="w-col w-col-6">
                <div class="div-block-48 ">
                  <h1 class="heading-47-copy-copy">
                    <strong class="bold-text-21 ">VAGASPARK</strong>
                    </h1>
                    <p class="margin-bottom-26"><strong>Desenvolvido para solucionar os problemas de motoristas e gestores de estacionamento.</strong><br/>
                    ‍<br/>Assim como muitos motoristas sofrem em busca de uma vaga, os gestores procuram atrair clientes.</p>
                </div>
              </div>
                    <div class="w-col w-col-6">
                      <div class="div-block-47">
                      <img src="img/picwish.png" width="700" loading="lazy" alt="" class="image-34 animar" alt="Imagem Animada">
                      <a href="login.php" id="btn-subscribe-1" target="_blank" class="button-primary-2 b2 w-button animar">Inscreva-se</a>
                      </div>
                    </div>
            </div>
            </div>
          </div>

<section class="hero-sessao wf-section">
<div class="container">
<div class="hero-wrapper-2">
  <div class="hero-split animar_empresas">
  <img src="img/empresa.png" loading="lazy" width="303" alt="Imagem Animada" class="shadow-two-2"/>
  </div>
  <div class="hero-split">
    <h1 class="heading-39-copy">
      <strong class="bold-text-35">Para Empresas</strong>
      </h1>
      <p class="margin-bottom-26">Lidar com a gestão, manutenção, segurança, projetar metas e manter clientes são ações que sem a <strong>Organização</strong> e a <strong>Eficiência</strong> podem causar problemas futuros.</p>
      <a href="login.php" id="btn-subscribe-5" target="_blank" class="button-primary-2 b2 w-button">Inscreva-se</a>
      </div>
    </div>
  </div>
</section>
<section style="padding: 1px;"></section> 
<section class="segunda-dobra-01 wf-section">
<div class="container">
<h1 class="heading-40-copy">
  <strong class="bold-text-15">A solução</strong>
  </h1>
  <div class="pricing-grid anima_solucao01">
    <div id="w-node-_974380d3-70c9-716e-b239-4e871a69f7f0-13aa7487" class="pricing-card-three">
      <div>
        <div class="columns-12 w-row">
          <div class="column-16 w-col w-col-4">
            <img src="img/lampada_azul (2).png" width="250px" loading="lazy" alt="Imagem Animada" class="image-52"/>
          </div>
        <div class="column-15 w-col w-col-8">
          <h1 class="heading-41-copy">
            <strong class="bold-text-20">Soluções para seu dia-dia</strong></h1>
            <p class="paragraph-29">Nosso objetivo é fornecer uma plataforma em que ambos (clientes e gestores) possam se beneficiar.<br/>
            <br/></p>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="pricing-grid anima_solucao02">
  <div id="w-node-_974380d3-70c9-716e-b239-4e871a69f7fb-13aa7487" class="pricing-card-three">
    <div>
      <div class="columns-12 w-row">
        <div class="column-16 w-col w-col-4">
          <img src="img/segurando03.png" width="300px" loading="lazy" alt="Imagem Animada" class="image-53"/>
        </div>
      <div class="column-15 w-col w-col-8">
        <h1 class="heading-41-copy">
          <strong class="bold-text-19">Segurança aonde para seu meio de transporte</strong>
          </h1>
          <p class="paragraph-29">Hoje em dia, deixar seu carro, moto, ou até mesmo sua Bicicleta é algo que precisa te atenção<br><strong>Nós VAGAS PARK, queremos te ajudar!</strong></p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="pricing-grid anima_solucao03">
  <div id="w-node-_974380d3-70c9-716e-b239-4e871a69f7fb-13aa7487" class="pricing-card-three">
    <div>
      <div class="columns-12 w-row">
        <div class="column-16 w-col w-col-4">
          <img src="img/rapido.png" width="300px" loading="lazy" alt="Imagem Animada" class="image-53"/>
        </div>
      <div class="column-15 w-col w-col-8">
        <h1 class="heading-41-copy">
          <strong class="bold-text-19">Nosso Sistema não precisa Baixar. Sistema Web!</strong>
          </h1>
          <p class="paragraph-29">Nosso Sistema conta com tecnologia inovadora, buscando <string> Desempenho e Qualidade.</string><br/><br/></p>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</section>

<section class="segunda-dobra-03 section-4 wf-section">
      <div class="w-container">
        <div class="columns-12 w-row">
          <div class="column-23 w-col w-col-4 anima_solucao04">
            <img src="img/logo.png" width="400px" style="margin: -10rem;" loading="lazy" alt="Imagem Animada" class="image-35"/>
          </div>
            <div class="column-19 w-col w-col-8">
              <div class="div-block-42">
                  <h1 class="heading-42-copy">
                  <strong class="bold-text-32">Nossa Missão <br/></strong></h1>
                   <p class="paragraph-32">Nossa missão é fornecer o melhor serviço possível para você, nosso usuário. Estamos comprometidos em atender às suas necessidades e exceder suas expectativas, garantindo a sua satisfação total. Nossa equipe trabalha incansavelmente para oferecer soluções rápidas e eficazes para quaisquer problemas que você possa enfrentar. Conte conosco para oferecer um serviço de alta qualidade e confiabilidade.</p><br>
               </div>
             </div>
           </div>
        </div>
        <div class="section-5 wf-section">
           <div class="container-26 w-container">
             <div class="div-block-134">
              <div class="w-row">
               <div class="column-18 w-col w-col-6">
                <div class="div-block-44"><h1 class="heading-44">
                      <strong class="bold-text-33">Equipe Tecnica</strong>
                     </h1>
                      <ol role="list" class="list-2">
                      <li class="item-lista"><strong>
                              Nossa equipe técnica</strong>  altamente capacitada está sempre pronta para fornecer soluções tecnológicas inovadoras e eficientes para atender às suas necessidades.
                       </li>
                          <li class="item-lista">
                           </strong>
                          </li>
                            <li class="item-lista">
                              <strong>Forma inteligente de ajudar Inteligência : </strong>para você aprender a lidar com os sentimentos e ansiedades de viver nesse mundão. É pensando assim que buscamos contruir um sistema que seja mais Humanizado.
                            </li>
                             <li class="item-lista">
                              <strong>Ferramentas para Gestão de estacionamento: </strong>Vamos encinar a usar nosso Serviços e também melhorar com sua ajuda.
                             </li>
                       </ol>
                     </div>
                    </div>
                      <div class="column-17 w-col w-col-6">
                        <div class="div-block-43">
                          <h1 class="heading-43">Dashboard</h1>
                          <ul role="list" class="list">
                            <li class="item-lista">
                              <strong>É uma interface gráfica<br/></strong>
                              que apresenta informações e dados de forma visual, geralmente em tempo real, permitindo que usuários monitorem e analisem o desempenho de um sistema, processo ou indicador-chave de desempenho (KPI)
                             </li>
                              <li class="item-lista">
                                <strong>Dashboards são comumente usados em áreas como: </strong>
                                negócios, finanças, marketing, tecnologia e ciência de dados para fornecer insights rápidos e acionáveis para tomada de decisões informadas. Eles geralmente incluem gráficos, tabelas, medidores e outros elementos visuais que ajudam a resumir informações complexas em um formato fácil de entender.<br/>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                          <a href="login.php" id="btn-subscribe-5" target="_blank" class="button-primary-2 w-button">Inscreva-se</a>
            </div>
          </div>
        </div>
</section>

  <!-- fim equipe -->
</selection>
<section id="pro" class="tabcontent"></section>
<section id="serv" class="tabcontent"></section>
<section id="Con" class="tabcontent">


</section>


<div id="pai-faq">
<div class="duvida-faq">
<h1>DÚVIDAS COM O  VAGASPARK</h1>
<div class="p-faq">
<p>
Conta para a gente! Estamos focados em atendê-lo da melhor maneira possível através dos nossos canais digitais, por isso, separamos aqui as perguntas mais frequentes para te ajudar. Caso ainda permaneça com alguma dúvida, é só clicar no botão “Precisa de ajuda?”.
</p>
</div>
</div>


<div class="faq-container">
        <h1 class="faq-title">Perguntas Frequentes</h1>
        <ul class="faq-list">
          <li class="faq-item">
            <div class="faq-question">
              <h3 class="faq-question-title">Planos e preços</h3>
              <div class="faq-arrow"></div>
            </div>
            <div class="faq-answer">
              <p class="faq-answer-text">
              Oferecemos diferentes planos e preços para atender às suas necessidades de estacionamento. Desde planos mensais até tickets avulsos, escolha a melhor opção para você e pague com segurança pelo nosso aplicativo ou pelo site.
              </p>
            </div>
          </li>
          <li class="faq-item">
            <div class="faq-question">
              <h3 class="faq-question-title">Serviços Vagaspark </h3>
              <div class="faq-arrow"></div>
            </div>
            <div class="faq-answer">
              <p class="faq-answer-text">O sistema Vagaspark é a forma mais fácil e rápida de comprar o seu ticket de estacionamento. Disponível para Android e iOS, ele permite que você encontre a vaga mais próxima, compre o seu ticket e renove pelo tempo que precisar, tudo sem precisar se deslocar até o parquímetro.</p>
            </div>
          </li>
          <li class="faq-item">
            <div class="faq-question">
              <h3 class="faq-question-title">Como funciona o sistema Vagaspark</h3>
              <div class="faq-arrow"></div>
            </div>
            <div class="faq-answer">
              <p class="faq-answer-text">O sistema Vagaspark funciona por meio de parquímetros que estão distribuídos nas principais vias da cidade. Com o seu ticket, você pode estacionar por um período de tempo determinado, que varia de acordo com a zona onde está estacionado. Para renovar o seu ticket, basta utilizar o nosso aplicativo ou se dirigir a um dos parquímetros disponíveis.</p>
            </div>
          </li>
        </ul>
      </div>
      </div>




  <!-- fooder -->
  <footer class="new_footer_area bg_color">
    <div class="new_footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Entre em Contato</h3>
                        <p>Nossa Equipe está pronta para Atender! 24h/7d</p>
                        <form action="login.php" class="f_subscribe_two mailchimp" method="post" novalidate="true" _lpchecked="1">
                            <input type="text" name="nome" class="form-control nome" id="nome" placeholder="nome"><br>
                            <input type="number" name="tel" class="form-control telefone" id="tel" placeholder="9 0000-0000">
                            <input type="email" name="email" class="form-control email" id="email" placeholder="Email">
                            <button class="btn btn_get btn_get_two" type="submit">Inscreva-se</button>
                            <p class="mchimp-errmessage" style="display: none;"></p>
                            <p class="mchimp-sucmessage" style="display: none;"></p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Download</h3>
                        <ul class="list-unstyled f_list">
                            <li><a href="#">Empresa</a></li>
                            <li><a href="#">Web Site</a></li>
                            <li><a href="#">Aplicativo para Android</a></li>
                            <li><a href="#">Desktop</a></li>
                            <li><a href="#">Projetos</a></li>
                            <li><a href="#">Nossa Missão</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Ajuda</h3>
                        <ul class="list-unstyled f_list">
                            <li><a href="#">Perguntas Frequentes</a></li>
                            <li><a href="#">Termos &amp; Condições</a></li>
                            <li><a href="#">Comunicação</a></li>
                            <li><a href="#">Documentação</a></li>
                            <li><a href="#">Política de suporte</a></li>
                            <li><a href="#">Privacidade</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Redes Sociais</h3>
                        <div class="f_social_icon" >
                            <a href="" class="fab fa-facebook"></a>
                            <a href="" class="fab fa-twitter"></a>
                            <a href="" class="fab fa-linkedin"></a>
                            <a href="" class="fab fa-pinterest"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bg"><!--RUA-->
            <div class="footer_bg_1"></div><!--CARRO-->
            <div class="footer_bg_2"></div><!--BIKE-->
            <div class="footer_bg_3"></div><!--BIKE 3-->
            <div class="footer_bg_4"></div><!--BIS-->
            <div class="footer_bg_5"></div><!--BIKE 2-->
            <div class="footer_bg_6"></div><!--PATINETE-->
          </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-7 ">
                  <br>
                  <br>
                  <p class="mb-0 f_400"><a id="fooder-nome" href="">© VAGASPARK</a> - Todos os direitos reservados 2023</p>
                </div>
            </div>
        </div>
    </div>

    <!-- teste de animação no home -->
    <style>
      /* Defina a classe para a animação de texto */

    </style>
  
    
    <script>
      // Função para verificar quando o elemento está visível na janela
  function estaVisivel(elemento) {
    var rect = elemento.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }
  
  // Função para adicionar a classe animada quando o elemento está visível
  function animarElemento() {
    var elementosAnimar = document.querySelectorAll('.animar , .animar_empresas, .anima_solucao01, .anima_solucao02, .anima_solucao03, .anima_solucao04');
    
    elementosAnimar.forEach(function(elemento) {
      if (estaVisivel(elemento)) {
        elemento.classList.add('animada');
      }
    });
  }
  
  // Chame a função animarElemento quando a página é rolada
  window.addEventListener('scroll', animarElemento);
    </script>
    <!-- fim teste de animação no home -->
  </footer>
  <!-- fim fooder -->

  <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js'></script>
  <script src="js/script.js"></script>
  <script src="js/scriptt.js"></script>
  <script src="js/selection.js"></script>
  <script src="js/faq.js"></script>

</body>
</html>