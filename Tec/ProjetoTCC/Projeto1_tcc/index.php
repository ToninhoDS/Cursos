 <?php
 include("conexao.php");
session_start(); // iniciar a sessao

?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts-icones.css"> <!--fonte icones-->
    <link rel="stylesheet" href="css/css.css"> <!--fonte icones-->
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>add tabela</title>
</head>
<body style="background: rgba(87, 145, 107, 0.813">
    <h1 style="text-align:center">Gestão de estacionamento</h1>
    <?php   // iniciar a sessao depois de feito o cadastro ou erro
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']); // é para destruir a mensagem  global para nao reproduzir de novo
        }  

?>



 <div class="container">
    
    
<section style="text-align:center" > 

    <div class="cadastroF">
        <form  action="processaF.php">
                <h3>Endereço</h3>
                <label for="ddlCores"></label>
            <input type="text" name="nm_bairro" id="nm_bairro" placeholder="Seu Bairro " required=""><br><br>

        </div> 
    </section>
</div>
    <div class="container">
<input style="font-size: 30px; width: 100%;text-align: center" type="submit" class="btn btn-secondary" value="Cadastrar" nome="cadUsario">
</div><br></br>
 
   
   
   

                    

             
                
           
           
           </form>
      

           <!-- exibir o banco de dados em tabela -->
<?php
           $sql ="SELECT cd_bairro, nm_bairro FROM tb_bairro ORDER BY cd_bairro DESC  ";
    // comando > ORDER BY cd_pokemon DESC < vai mostrar ultimos pokemon adicionados
    $result = $conn->query($sql); 
?>
    <!-- galeria fotoso do pokemon -->
    <div>Pesquisa<input id="filtro" type="text" class="form-control mt-3 mb-3" />
            <div>

            </div>
        </div></th>
    <table  class="table table-striped table-dark">
  <thead>
    <tr id="tabela-distancia">
    <th scope="col">
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Alteração</th>
    </tr>
  </thead>
  <tbody id="lista">
 <!-- iniciar o codigo de repedição que vai trazer as imagem do banco de dados -->
 <?php
        
        if ($result->num_rows > 0){
            //output data of each row
            while($row = $result->fetch_assoc()){
          
          ?>
          <!-- aqui vai ser aonde aparece as informaçoes do banco de dado no html -->
          <tr class="tabela-distancia">
      <th scope="row"></th>
      <td id="id_bairro" class="distancia1"><?php echo $row['cd_bairro']; ?> </td>
      <td id="id_nm_bairro" class="distancia1"><?php echo $row['nm_bairro']; ?> </td>
      <td>
        <form action="processaD.php" >
        <div class="container-botao">
        
            <button type="button" class="btn btn-success" id="botao_editar" onclick="editar_registro($id)">Atualiar</button>
            
            <button name="cd_bairro" class="btn btn-danger" type="submit" title="Deletar"  value="<?php echo $row['cd_bairro']; ?>" >
         
         <b class="icon icon-paper-plane-o "> Excluir</b></button> </td>
        </div>
        
         

            
        </form> 
      <!-- form deletar fim -->
      
      
      
    </tr>
        
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
       
  </tbody>
</table>            
                     
                     
<script src="js/pesquisa.js"></script>
</body>
</html>