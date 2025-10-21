<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cssCRUD.css"> <!-- atalho escreve link + tap-->
    <link rel="stylesheet" media="screen and (max-width:1024px" href="css/mobile.css">
    <link href="bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="css/fonts-icones.css"> <!-- icones-->
    
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <title>Minha Pokedex</title>
</head>
<body>
    <div id="pokedexbd"></div> <!-- clicar no botão vai vim para ca-->
    <nav id="navbar">
         
        <div id="navbar-container">
            <div class="image-logo">
            <a href="#">
                <img src="img/logo-pokekemon.png" >
            </a>
             </div>
            <h1 class="logo"></h1>
           
            <ul id="navbar-itemss">
                <li><a id="vavbar-items-1" href="home.php">Início</a></li>
                <li><a id="vavbar-items-4" href="index.php">BD Pokemon</a></li>
                
                <li><a id="vavbar-items-4" href="#gallery1">Minha Pokedex</a></li>
            </ul>
        </div>
    </nav>
    <header id="showcase" style="background-image:url(img/foto-pokedex.jpg);">
        
        <div id="showcase-container">
            <a >
                <img  id="imagem-some"  src="img/bola1.png" width="40px"><br> 
                <!-- essa imagem ira moestrar depois -->
                
            <div class="podekex-crud ">
                <br><a href="#page-adicionar" class="btn">Adicionar Pokemon</a>
                <a href="#gallery1" class="btn  ">Galeria Pokemon</a>
                <a href="#page-atualizar" class="btn ">Atualizar Pokemon</a>
                <a href="#page-deletar" class="btn">Deletar Pokemon</a>

                 
            </div>
        </div>
    </header>
    
    <!-- adcionar pokemon -->  
</section>
<section id="product" style="background-image:url(img/f5.jpg);">
    <div id="page-adicionar"></div> <!-- clicar no botão vai vim para ca-->
    <div class="headLine ">Adionar Pokemon</div>
    <div id="product-container" class="formularioContato box-artigo formularioContato">
        
        <form   action="adicionar.php">

            <label>
                <div class="item">
                <span><i class="icon icon-backpack-streamline-trekking"></i> Nome do Pokemon</span>
                <input type="text" name="nm_pokemon" required="">
            
            </div>
            </label>
            
            <label>
                <div class="item">
                <span><i class="icon icon-paw-1"></i> Tipo |</span>
                <input type="text" name="ds_tipo1" required="" class="fade_8S">
            </div>
            </label>

            <label>
                <div class="item">
                <span><i class="icon icon-paw-1"></i> Tipo ||</span>
                <input type="text" name="ds_tipo2" >
            </div>
            </label>
            
            <label>
                <div class="item">
                <span><i class="icon icon-picture-streamline-1"></i> Cola o Endereço da imagem</span>
                 <textarea name="url_img" rows="3" required=""></textarea> 
                </div>
            </label>
           
            <input type="hidden" name="acao" value="enviar" />
            <button class="btn-envia" type="submit"  value="Cadastrar" title="Enviar"><b class="icon icon-paper-plane-o"> Enviar</b></button>

        
        </form>
        <img src="img/picachu2.png" alt="" class="iphone-x">

        <!-- <div id="items">
            <div class="item">
                <a href="#"><img src="img/pro4.png" ></a> 
                 <p>OS Melhores preços de <strong>Nintendo Switch.</strong></p>
            </div>
             <div class="item">
                <a href="#"><img src="img/pro1.png" ></a> 
                 <p><strong>Pokémon GO</strong>, Atualização toda a Semana. </p>
         </div>
            <div class="item">
                <a href="#"><img src="img/pro2.png" ></a> 
                <p><strong>Pokedex</strong> repleta de Novidades nessa Season.</p>
            </div>
            <div class="item">
                <a href="#"><img src="img/pro3.png" ></a> 
               <p>Suporte <strong>24H.<strong></p>
            </div>
        </div> -->
    </div>
</section>
 <!-- fim  - adcionar pokemon -->
 
 <!-- Atualizar pokemon -->
</section>
<section id="product" style="background-image:url(img/f4.jpg);">
    <div id="page-atualizar"></div> <!-- clicar no botão vai vim para ca-->
    <div class="headLine ">Atualizar Pokemon</div>
    <div id="product-container" class="formularioContato box-artigo formularioContato">
        

        <form action="upgrade.php">
        <label>
                <div class="item">
                <span><i class="icon icon-paw-1"></i>Nome do Pokemon</span>
                <input   type="text" name="nm_pokemon" id="nm_pokemon" required class="fade_8S">
            </div>
            </label>
            <label>
                <div class="item">
                <span><i class="icon icon-paw-1"></i>Tipo |</span>
                <input type="text" name="ds_tipo1" id="ds_tipo1" required class="fade_8S">
            </div>
            </label>
            <label>
                <div class="item">
                <span><i class="icon icon-paw-1"></i>Tipo ||</span>
                <input type="text" name="ds_tipo2" id="ds_tipo2" required class="fade_8S">
            </div>
            </label>
            <label>
                <div class="item">
                <span><i class="icon icon-paw-1"></i>Código do Pokemon</span>
                <input type="text" name="cd_pokemon" id="cd_pokemon" required class="fade_8S">
            </div>
            </label>

            
            <button class="btn-envia" type="submit" title="Enviar"  value="Deletar" ><b class="icon icon-paper-plane-o"> Enviar</b></button>
        </form>
   
        <img src="img/pro2.png" alt="" class="iphone-x">
    </div>
</section>        
 <!-- Fim - Atualizar pokemon -->

 <!-- Deletar Pokemon -->
 <section id="product" style="background-image:url(img/tema2.jpg); ">
    <div id="page-deletar"></div> <!-- clicar no botão vai vim para ca-->
    <div class="headLine ">Deletar Pokemon</div>
    <div id="product-container" class="formularioContato box-artigo formularioContato">
        
        <form action="delete.php">

            <label>
                <div class="item">
                <span><i class="icon icon-backpack-streamline-trekking"></i> Código do Pokemon</span>
                <input type="text" name="cd_pokemon" required="">
            
            </div>
            </label>
            
            
           
            <input type="hidden" name="acao" value="enviar" />
            <button class="btn-envia" type="submit" title="Enviar"  value="Deletar" ><b class="icon icon-paper-plane-o"> Enviar</b></button>

        
        </form>
        <img src="img/picachu-triste.png" alt="" class="iphone-x">
    </div>
</section>   
 <!-- Fim deletar pokemon -->
<!-- Galeria Pokemon -->

    
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
    <section id="gallery1">
    
       <div class="headLine">Minha Galeria de Pokemon</div>
       <div class=" formularioContato box-artigo formularioContato">
        <a href="index.php">   
    <button class="btn-envia" title="Enviar"><b class="icon icon-clipboard-3">&nbsp;&nbsp;Ir Para Tabela POKEMON</b></button></div></a> <!--&nbsp; ele ta espaco-->
       
       <div id="gallery-container1">
 <!-- iniciar o codigo de repedição que vai trazer as imagem do banco de dados -->
<?php
        
        if ($result->num_rows > 0){
            //output data of each row
            while($row = $result->fetch_assoc()){
          
?>
          <!-- aqui vai ser aonde aparece as informaçoes do banco de dado no html -->
        <div class="nome-gallery"><a href="index.php">
            <div class="gallery-image1">
          <img src=<?php echo $row['url_img']; ?> alt="" >
            </div>   
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

<!-- fim da Galeria -->

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