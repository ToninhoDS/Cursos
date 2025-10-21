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
    <title>Document</title>
</head>
<body>
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
            echo "0 results";
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