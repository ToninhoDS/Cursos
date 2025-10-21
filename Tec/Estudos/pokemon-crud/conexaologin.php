<?php
$nm_email= $_GET['cadastrar_email'];
$nm_senha= $_GET['cadastrar_senha'];
$confirma_senha = $_GET['confirma_senha'];




$servername = "localhost";
$username = "root"; 
$password = ""; //  se ultilidar o UBSserver mudar para usbW
$dbname = "db_login"; //Nome da Base de dados
//Criar uma conexão com banco de dados criado no xampp (ADM serve)
$conn = new mysqli($servername, $username, $password, $dbname);

//checar se ouve conexão
if($conn->connect_error){
    die("Conection failed: " . $conn->connect_error); // die seria para parar conexão, die( matar)
}// echo "Conexão com sucesso";
?> 

</section>
<section id="product" style="background-image:url(img/f5.jpg);">
    <div id="page-adicionar"></div> <!-- clicar no botão vai vim para ca-->
    <div class="headLine ">Tela de Login</div>

<?php
if(!$confirma_senha == $nm_senha){
    echo '<div class="alert alert-success" style="text-align: center;font-size:60px" role="alert">
    "A Sua senha, não é igual!!!
  </div>';
  
}else{}  
$sql ='INSERT INTO tb_usuario (nm_email, nm_senha)
VALUES ('. "'" . $nm_email ."'" . ',' ."'" . $nm_email . "'" .')';
 if($conn->query($sql) === TRUE){
    echo '<div class="alert alert-success" style="text-align: center;font-size:60px" role="alert">
    "O Seu Cadastrado foi feito com sucesso!!!
  </div>';
  
 }else{
 echo '<div class="alert alert-danger" style="text-align: center;font-size:40px" role="alert">
 Erro!
</div>'.$sql . "<br>" . $conn->error;
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="br-PT">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cssCRUD.css"> <!-- atalho escreve link + tap-->
    <link rel="stylesheet" media="screen and (max-width:1024px" href="css/mobile.css">
    
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
                <li><a id="vavbar-items-4" href="">BD Pokemon</a></li>
                
                <li><a id="vavbar-items-4" href="#">Minha Pokedex</a></li>
            </ul>
        </div>
    </nav><br><br><br><br>
<!-- banco de dados login -->



    
    <!-- tela de Login -->  

    <div id="product-container" class="formularioContato box-artigo formularioContato">
        
  <section id="product" style="background-image:url(img/f9.png);">
    <div id="page-adicionar"></div> <!-- clicar no botão vai vim para ca-->
    <div class="headLine ">Tela de Login</div>
    <div id="product-container" class="formularioContato box-artigo formularioContato">
        
        <form   action="conexaologin.php">
        <label>
                <div class="item">
                <span><i class="icon icon-torso" > </i> Seu nome</span>
                <input type="text" name="conexao.php" placeholder="Seu nome invocador" required="">
            
            </div>
            </label>
            <label>
                <div class="item">
                <span><i class="icon icon-user"></i> Seu email</span>
                <input type="text" name="login-email" required="">
            
            </div>
            </label>
            
            <label>
                <div class="item">
                <span><i class="icon icon-asterisk"></i>Senha</span>
                <input type="password" name="login-senha" required="" class="fade_8S">
            </div>
            </label>
           

            </label>
            <input type="hidden" name="acao" value="enviar" />
            <button class="btn-envia" type="submit"  value="Cadastrar" title="Enviar"><b class="icon icon-paper-plane-o"> Enviar</b></button>
    </form> 
   </section>
                 <!--fim da  tela de Login --> 
                
 
  
  <!-- inicar login -->




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
