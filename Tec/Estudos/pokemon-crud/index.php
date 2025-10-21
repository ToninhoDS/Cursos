<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Pokedex</title>
    <!-- CSS only -->
    <link href="bootstrap.min.css" rel="stylesheet" > 
    <link rel="stylesheet" href="css/cssCRUD.css"> <!-- atalho escreve link + tap-->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
<div class="headLine ">Tabela de Dados Pokemon</div>
<div class="d-grid gap-2 col-3 mx-auto ">
<a href="home.php">
<button class="btn btn-primary "  id="pokedex-buttom" type="button">Home</button>
</a>
<a href="pokedexbd.php">
<button class="btn btn-primary"  id="pokedex-buttom" type="button">Pokedex</button>
 </a>
</div>
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
    $result = $conn->query($sql); 
?>
      <!-- iniciar o card-->
      <table class="table container table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Nome</th>
      <th scope="col">Tipo |</th>
      <th scope="col">Tipo ||</th>
      <th scope="col">Imagem</th>
    </tr>
  </thead>
  <tbody>
    
        <!-- finalizar final do card -->
        <?php
        
        if ($result->num_rows > 0){
            //output data of each row
            while($row = $result->fetch_assoc()){
          
          ?>
          <tr>
      <th scope="row"><?php echo $row['cd_pokemon']; ?></th>
      <td><?php echo $row['nm_pokemon']; ?></td>
      <td><?php echo $row['ds_tipo1']; ?></td>
      <td><?php echo $row['ds_tipo2']; ?></td>
      <td><div class="zoom">
        
      <a href="#">
       
        <form action="delete.php"> 
          
       
        
        <img  src=<?php echo $row['url_img']; ?>  width="110px;"></a>&nbsp;&nbsp;
           <span><i class="icon icon-backpack-streamline-trekking"></i></span>
           
           <input type="hidden"  name="acao" value="enviar" />
               <button class="btn btn-danger" type="submit" title="Deletar"  value="Deletar" ><b class="icon icon-paper-plane-o"> Excluir</b></button>&nbsp;&nbsp;
               <input type="text" style="width:100px" placeholder="<?php echo "Digite-> " .$row['cd_pokemon']?>" name="cd_pokemon">
            
            </form>        
        </div>
     
        
    </td>
          
    </tr>
   
<?php
            }
        } else{
            echo '<div class="alert alert-warning" style="text-align: center;font-size:40px" role="alert">
            "0 resultados no Banco de dados - Pokemon!!!';
        }
        $conn->close();
    
?>

</tbody>
</table> 
         
    
</body>
</html>