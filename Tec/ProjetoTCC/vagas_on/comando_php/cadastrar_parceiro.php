<?php

// session_start(); // Iniciar a sessão

// Limpara o buffer de redirecionamento
ob_start();

// Incluir o arquivo que possui as configurações
include_once '../adm/config/config.php';
include("crud_php/conexao_configuracao_sistema_form.php");
// Incluir o arquivo com a conexão com banco de dados
include_once '../adm/lib/conexao.php';

?>
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
     <link rel="stylesheet" href="/vagas_park/home_vagas/css/footer_gif.css">
    <link rel="stylesheet" href="/vagas_park/home_vagas/css/selection_card.css" />
     <link rel="stylesheet" href="/vagas_park/home_vagas/css/cards.css" /> 
     <link rel="stylesheet" href="/vagas_park/home_vagas/css/style.css"/>
     <link rel="stylesheet" href="/vagas_park/home_vagas/css/animacao.css"/>
     <link rel="stylesheet" type="text/css" href="/vagas_park/home_vagas/css/header.css"/>
     <link rel="stylesheet" href="/vagas_park/home_vagas/css/perfil-usuario.css">
     <link rel="stylesheet" href="/vagas_park/home_vagas/css/faq.css"> 
    <script src="/vagas_park/home_vagas/js/perfil-usuario.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
    <link rel="stylesheet" href="/vagas_park/home_vagas/css/cards_precos.css">
    <link rel="icon" type="image/png" href="../img/logotipoSglas.ico"/>
    <title>VAGASPARK</title>

</head>
<body style="zoom:<?php echo $nm_layout_zoom?>%;">
  <header>
      <div id='navTOP'></div>
      <nav class="navbar navbar-expand-custom navbar-mainbg">
      <a class="logo"><img src="../home_vagas/img/logo_fondo3-icon.png"></a>
        <a class="navbar-brand navbar-logo"  href="/vagas_park/index.php"><img src="../home_vagas/img/nome_logotip.png" width="180px"></a>
 
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li class="nav-item ">
                    <a class="nav-link tablinks" href="/vagas_park/index.php"><i class="fa fa-window-maximize" aria-hidden="true"></i>Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link tablinks" href="/vagas_park/comando_php/cadastrar_parceiro.php"><i class="far fa-clone"></i>Serviços</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tablinks" href="/vagas_park/comando_php/login_mobile.php" ><i class="far fa-address-book"></i>Para Celular</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link tablinks" href="/vagas_park/comando_php/nosso_parceiro.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Nossos Parceiros</a>
                  <!-- <a class="nav-link tablinks" href="../vagas_park/comando_php/login_parceiro.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Nossos Parceiros</a> -->
                </li>
                
            </ul>
        </div>
    </nav>
    
  </header>
    
    <main>


<section class="hero-sessao wf-section">
<div class="container">
<div class="hero-wrapper-2">
  <div class="hero-split animar_empresas">
  <img  id='img_whatzap'src="/vagas_park/home_vagas/img/cadastro_parceiro01.png" loading="lazy" width="303" alt="Imagem Animada" class="shadow-two-2"/>
  </div>
  <div class="hero-split">
    <h1 class="heading-39-copy">
      <strong class="bold-text-35">Nosso WHATZAPP</strong>
      </h1>
      <p class="margin-bottom-26">Para que possamos ajudar você com rapidez e eficiência, entre em contato conosco usando seu  <strong style="cursor: pointer;">Celular.</strong></p><a href="https://wa.me/5513981603708?text=Adorei%20seu%20artigo">
        <img  id='img_whatzap_sessao'src="/vagas_park/home_vagas/img/zap10.png" loading="lazy"  alt="Imagem Animada" class="shadow-two-2"/>
    </a>
      </div>
    </div>
  </div>
</section>
<!-- SESSAO DOS PRECOS CARD -->
<section>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://wa.me/5513981603708?text=Adorei%20seu%20artigo" style="color:#FFF;" class="zapzap" target="_blank">
<i style="margin-top:16px" class="fa fa-whatsapp"></i>
</a>
<div class="section-223-copy wf-section">
          <div class="" style="margin: 0 100px ">
            <div class="columns-16 w-row">
              <div class="w-col w-col-6">
                <div class="div-block-48 ">
                  <h1 class="heading-47-copy-copy">
                    <strong class="bold-text-21 ">Comece hoje!</strong>
                    </h1>
                    <p class="margin-bottom-26"><strong>Nossos especialistas estão à disposição para mostrar como Contratar o Sistema</strong><br/>
                    ‍<br/>Em Poucos cliques, nosso time está a disposição</p>
                </div>
              </div>
                    <div class="w-col w-col-6">
                      <div class="div-block-47">
                      
                        </a>
                   <div class="">
                    <!-- inicio do card -->
                    <header class='header_card'>
                        <h1 id="card_h1">Nossos preços</h1>
                            <div class="toggle_card">
                              <label>Mensal</label>
                              <div class="toggle_card-btn">
                                <input type="checkbox" class="checkbox_card" id="checkbox" />
                                <label class="sub_card" id="sub_card" for="checkbox">
                                  <div class="circle_card"></div>
                                </label>
                              </div>
                              <label>Anual</label>
                            </div>
                    </header>
                      <div class="cards_pai">
                        <div class="card_filho btn-latera shadow">
                          <ul class="card_ul_bas">
                            <li class="pack">básico</li>
                            <li id="basic" class="price_card bottom-bar">R&dollar;0.0</li>
                            <li class="bottom-bar">Acesso por 3 Meses</li>
                            <li class="bottom-bar">Sistema 4 Maquínas</li>
                            <li class="bottom-bar">Até 5 contas</li>
                            <li class="bottom-bar">Suporte 24h/7</li>
                            <li><a href="form_parceiro.php"><button class="btn_card">Teste</button></a></li>
                          </ul>
                        </div>
                        <div class="card_filho btn-11 active">
                          <ul class="card_ul_pro">
                            <li class="pack">Profissional</li>
                            <li id="professional" class="price_card bottom-bar">R&dollar;24.99</li>
                            <li class="bottom-bar">Sistema de Gestão</li>
                            <li class="bottom-bar">Sistema 4 Maquínas</li>
                            <li class="bottom-bar">Até 5 contas</li>
                            <li class="bottom-bar">Suporte 24h/7</li>
                            
                            <li><button class="btn_card active-btn">Comprar</button></li>
                          </ul>
                        </div>
                        <div class="card_filho  shadow ">
                          <ul class="card_ul">
                            <li class="pack">Mestre</li>
                            <li id="master" class="price_card bottom-bar">R&dollar;39.99</li>
                            <li class="bottom-bar">Sistema de Gestão</li>
                            <li class="bottom-bar">Sistem 7 Maquínas</li>
                            <li class="bottom-bar">Até 7 contas</li>
                            <li class="bottom-bar">Suporte 24h/7</li>
                            <li class="bottom-bar">Locação de Equipamento</li>
                            <li><button class="btn_card">Comprar</button></li>
                          </ul>
                        </div>
                      </div>
      <!-- fim docard -->              
                  </div>
                </div>
              </div>
            </div>
          </div>
       </div>

  <!-- fim equipe -->
</selection>
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
                        <form action="#" class="f_subscribe_two mailchimp" method="post" novalidate="true" _lpchecked="1">
                            <input type="text" name="nome" class="form-control nome" id="nome" placeholder="nome">
                            <input type="number" name="tel" class="form-control telefone" id="tel" placeholder="9 0000-0000">
                            <input type="email" name="email" class="form-control email" id="email" placeholder="Email">
                            <button class="btn btn_get btn_get_two" type="submit">Enviar</button>
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
  <script src="/vagas_park/home_vagas/js/script.js"></script>
  <script src="/vagas_park/home_vagas/js/scriptt.js"></script>                                                                                                       
  <script src="/vagas_park/home_vagas/js/selection.js"></script>
  <script src="/vagas_park/home_vagas/js/faq.js"></script>
  <script src="/vagas_park/home_vagas/js/cards_precos.js"></script>
  

</body>
</html>