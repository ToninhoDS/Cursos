<?php
 session_start();
 $id_filme = $_GET["valor"];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Hello!</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
    
    <link rel="stylesheet" href="css/styles.css">
   
 <link rel="stylesheet" href="css/conteudo.css">
    
  </head>
  <body>
   


      <?php
 $id_filme = $_GET["valor"];
 $id_imagem = $_GET["imagem"];
$url_voltar ="http://localhost/themoviedb/index.php?valor=homem+aranha" ;
$url_filme = "https://api.themoviedb.org/3/movie/{$id_filme}?api_key=58288aa41dae73d95a10c4c3ff96d5ee&language=pt-BR";
 $ch = file_get_contents($url_filme);
$endereco = json_decode($ch);
// olhar os id do API -----------------------------------------------
// echo "<pre>";
// var_dump($endereco);
// echo "</pre>";

echo "'<img src='$id_imagem'>";
?>
&nbsp;&nbsp;

<!-- comando de teste -->
<style>
        body{
  height: 100vh;
  width: 100vw;
  position: relative;
  background-color: #000;
  background-image: linear-gradient(to left, rgba(55,55,55,0.5), #050505),url(<?php echo $id_imagem;?>);
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
  
  
  display: flex;
  align-items: center;
  justify-content: flex-start;
  padding-left: 16px;
    font-family: 'Halant', serif;
  line-height: 1.5;
}

    </style>
   <div class="container">
  <div class="row">
    <div class="col-12">
    <h1><?php echo $endereco->title;?> <span><br><?php echo $endereco->overview;?></span></h1>
<h1> <span></span></h1>
    </ul>
  </div>     
    <div class="col-6"><br>
    
   <form action="<?php echo $url_voltar;?>">
   <button   type="submit" id="botao_voltar"  class="btn btn-outline-info">Voltar</button>
   </form>
  </div>     
</div>
</div>



   
</svg>
<div class="container">
  <div class="row">
    <div class="col">
      <ul class="open">
      <li><span  style="color:aqua;">Nota:<br></span> <?php echo $endereco->vote_average;?></li>
      <li><span  style="color:aqua;">Contagem:<br></span> <?php echo $endereco->vote_count;?></li>
      <li><span  style="color:aqua;">Lançado:<br></span> <?php echo $endereco->release_date;?></li>
      <li><span  style="color:aqua;">Popularidade:<br></span> <?php echo $endereco->popularity;?></li>
      <li><span  style="color:aqua;"> Idioma:<br></span> <?php echo "PT " . $endereco->original_language;?></li>
      <li><span  style="color:aqua;">ID:<br></span> <?php echo $endereco->id;?></li>
    </ul>
  </div>     
</div>






<script src="js/js.js"></script>

</body>
</html>