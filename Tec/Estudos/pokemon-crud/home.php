<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css"> <!-- atalho escreve link + tap-->
    <link rel="stylesheet" media="screen and (max-width:1024px" href="css/mobile.css">
    <link href="bootstrap.min.css" rel="stylesheet" >
    
    <title>Pokedex</title>
</head>
<body>
    <nav id="navbar">
         
        <div id="navbar-container">
            <div class="image-logo">
            <a href="#">
                <img src="img/logo-pokekemon.png" >
            </a>
             </div>
            <h1 class="logo"></h1>
           
            <ul id="navbar-items">
                <li><a id="vavbar-items-1" href="#showcase">Início</a></li>
                <li><a id="vavbar-items-2" href="#Insignia">Insígnia</a></li>
                <li><a id="vavbar-items-3" href="#gallery">Galeria</a></li>
                <li><a id="vavbar-items-4" href="pokedexbd.php">Minha Pokedex</a></li>
                
                <li><a id="vavbar-items-4" href="login.php">Login</a></li>
            </ul>

        </div>
    </nav>
    <header id="showcase">
   
        <div id="showcase-container">
            <a >
                <img src="img/poke1.png" width="40px">
            <h2></h2>  <!--dica usando lorem + algum valor ele gera texto lorem10-->
            <p></p>
            <a href="#" class="btn">saiba mais</a> <!--a + . + btn-->

        </div>
    </header>
    <!-- tratamento do video auto -->
    <div class="showcase-video">
        <video autoplay muted loop>
            <source src="img/video1.mp4" type="video/mp4">
        </video>
    </div>
<br>
<br>
    <!-- estrutura aout -->
    <section id="Insignia">
        <div class="headLine">Insígnias de Kanto</div>
            <div id="insignia-container"> <!--dica usa o ponto mais classe > .clients-container-->
                <div class="insignia-gallery"><a href="#">
                    <img src="img/InsigniaAlma.png" class="client" alt=""><!-- shift + alt e seta para baixo( ele vaicopitar)-->
                    <p>ddsdd</P>
                </div>
                <div class="insignia-gallery"><a href="#">
                    <img src="img/InsigniaArco-iris.png" class="client" alt="">
                    <p>ddsdd</P>
                </div>
                <div class="insignia-gallery"><a href="#">
                    <img src="img/InsigniaCascata.png" class="client" alt="">
                    <p>ddsdd</P>
                </div>
                <div class="insignia-gallery"><a href="#">
                    <img src="img/InsigniaPantano.png" class="client" alt="">
                    <p>ddsdd</P>
                </div> 
                <div class="insignia-gallery"><a href="#">
                    <img src="img/InsigniaRocha.png" class="client" alt="">
                    <p>ddsdd</P>
                </div>
                <div class="insignia-gallery" style="width:120px"><a href="#">
                    <img src="img/InsigniaTerra.png" class="client" alt="">
                    <p>ddsdd</P>
                </div>
                <div class="insignia-gallery"><a href="#">
                    <img src="img/InsigniaTrovao.png" class="client" alt="">
                    <p>ddsdd</P>
                </div>
                <div class="insignia-gallery"><a href="#">
                    <img src="img/InsigniaVulcao.png" class="client" alt="">
                    <p>ddsdd</P>
                    </div>
            </div>

    </section>

    <section id="features">
        <div class="headLine">NOVIDADES</div>
            <div id="features-container">
                <div class="feature">
                 <!-- usar . mais a class para criar rapido-->
                     <a href="#"><img src="img/poke3.png" ></a> 
                     <span class="feature-title">Desfilem em grande estilo </span><br>
                     <p><br>Mareanie e vários Pokémon com os últimos lançamentos da moda estão estreando na passarela do Pokémon GO! Furfrou também volta a brilhar no palco em suas várias formas.</p>
                </div>
                <div class="feature">
                 <!-- usar . mais a class para criar rapido-->
                 <a href="#"><img src="img/poke4.jpg" ></a> 
                     <span class="feature-title">Dia Comunitário de outubro</span><br><br>
                    <p><br>Sábado, 15 de outubro de 2022, das 14h às 17h, horário local Treinadores.<strong>Estamos felizes em anunciar que Litwick, </strong><br>
                     o Pokémon Vela, estará em destaque durante o Dia Comunitário de outubro!</p>
                </div>
                <div class="feature">
                 <!-- usar . mais a class para criar rapido-->
                 <a href="#"><img src="img/poke5.jpg" ></a> 
                 <span class="feature-title">O Ultra Beasts do tipo Aço</span><br>
                    <p>Treinadores,<br></p>

                        <p><br>Fortaleçam-se! As Ultra Beasts Celesteela e Kartana emergiram de Ultrafendas Especiais em todo o mundo, com Celesteela localizada ao sul do Equador e Kartana ao norte. </p>
                </div>
            </div>
        
    </section>
    <section id="product">
        <div class="headLine">Nossos Produtos</div>
        <div id="product-container">
            <img src="img/cel.png" alt="" class="iphone-x">
            <div id="items">
                <div class="item">
                    <a href="#"><img src="img/pro4.png" ></a> 
                     <p>OS Melhores preços de <strong>Nintendo Switch.</strong></p>
                </div>
                 <div class="item">
                    <a href="#"><img src="img/pro1.png" ></a> 
                     <p><strong>Pokémon GO</strong>, Atualização toda a Semana. </p>
             </div>
                <div class="item">
                    <a href="pokedexbd.php"><img src="img/pro2.png" ></a> 
                    <p><strong>Pokedex</strong> está repleto de Novidades nessa Season.</p>
                </div>
                <div class="item" >
                    <a href="#"><img src="img/pro3.png" ></a> 
                   <p>Suporte <strong>24H.<strong></p>
                </div>
            </div>
        </div>
    </section>

    <div id="testimonials">
        <div class="headLine">Principais Noticiais</div>
            <div id="testimonials-container">
             <div class="testimonial">
                <a href="https://www.youtube.com/watch?v=3uL73mESTB4">
                 <img src="img/tempora2.webp" alt="" class="testimonial-image"></a>
                <p>Jornadas Supremas Pokémon chega à Netflix em 2022</p>
            </div>
            <div class="testimonial">
                <a href="https://sportv.globo.com/site/e-sportv/noticia/pokemon-go-melhores-counters-para-duelar-contra-os-lideres-da-equipe-go-rocket.ghtml">
                    <img src="img/temporada2.webp" style="width: 490px" alt="" class="testimonial-image"></a>
               <p>Team GO Rocket Leader Arlo in Pokémon GO.</p>
           </div>
        </div>
    </div>
    </div>
    <!-- Iniciando o banco de dados, irei coletar apenas as imagem do meu banco -->
    <?php
    $servername = "localhost";
    $username = "root"; 
    $password = ""; //  se ultilidar o UBSserver mudar para usbW
    $dbname = "db_pokedex"; //Nome da Base de dados
    //Criar uma conexão com banco de dados criado no xampp (ADM serve)
    $conn = mysqli_connect($servername, $username, $password, $dbname);
   

  
    //checar se ouve conexão
    if(!$conn){
        die("Conection failed: " . mysqli_connect_erro()); // die seria para parar conexão, die( matar)
    }
    // echo "Conexão com sucesso";
    $sql ="SELECT cd_pokemon, nm_pokemon, ds_tipo1, ds_tipo2, url_img FROM tb_pokemon ORDER BY cd_pokemon DESC  ";
    // comando > ORDER BY cd_pokemon DESC < vai mostrar ultimos pokemon adicionados
    $result = $conn->query($sql); 
?>
    <!-- galeria fotoso do pokemon -->
    <section id="gallery">
       <div class="headLine">Minha Galeria de Pokemon</div>
       <div id="gallery-container">
 <!-- iniciar o codigo de repedição que vai trazer as imagem do banco de dados -->
 <?php
        
        if ($result->num_rows > 0){
            //output data of each row
            while($row = $result->fetch_assoc()){
          
          ?>
          <!-- aqui vai ser aonde aparece as informaçoes do banco de dado no html -->
        <div class="nome-gallery"><a href="index.php">
          <img src=<?php echo $row['url_img']; ?> alt="" class="gallery-image">
          <p id="nome-foto" style="color: redh"><?php echo $row['nm_pokemon']; ?></p></a>
        </div>
        <!-- finalizando a informação que estava no banco de dado -->
<?php
            }
        } else{
            echo '<div class="alert alert-warning" style="text-align: center;font-size:40px" role="alert">
            "0 resultados no Banco de dados - Pokemon!!!';
        }
        $conn->close();
    
?>
    <!-- assim que o banco de dado apresenta as infomaçoes e fecha, tem que finalizar a estrutura do html que chamou, tipo /div / section etc -->
         </div> 
    </section>


       
        
    <!-- roda pé -->
    <footer id="footer">
        <p>Copyright 2022 - Todos os Direitos resevados &copy;</p>
        <p>PokeGaleria</p>
    </footer>

    <!-- fonte do Awesome -->
    <script src="https://kit.fontawesome.com/9966bf467a.js" crossorigin="anonymous"></script>
    <!-- Jquery CDN -->
    <script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
  <!-- JS File -->
  <script src="js/main.js"></script>
</body>
</html>