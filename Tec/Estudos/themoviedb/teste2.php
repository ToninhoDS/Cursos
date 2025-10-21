<?php
 include("minhaKey.php");
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="css/carossel2.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/card.css">


    <title>Document</title>
</head>
<body>
<form>
<div class="form-group">
    <label for="exampleInputPassword1">Pesquisar</label>
    <input type="text" value="007" id="valor" name="valor" class="form-control" id="exampleInputPassword1" >
  </div>
  <div class="form-check">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<div class="container1">
<div class="carossel-1">
    <img src="https://picsum.photos/seed/picsum/200/200" alt="">
  <img src="https://picsum.photos/seed/picsum/200/200" alt="">
  <img src="https://picsum.photos/seed/picsum/200/200" alt="">
  <img src="https://picsum.photos/seed/picsum/200/200" alt="">
  <img src="https://picsum.photos/seed/picsum/200/200" alt="">
  <img src="https://picsum.photos/seed/picsum/200/200" alt="">
  <img src="https://picsum.photos/seed/picsum/200/200" alt="">
  <img src="https://picsum.photos/seed/picsum/200/200" alt="">
  <img src="https://picsum.photos/seed/picsum/200/200" alt="">
  <img src="https://picsum.photos/seed/picsum/200/200" alt="">
  
</div>
</div>


<?php

// $pesquisa = $_GET["valor"];

 
//  $url = "https://api.themoviedb.org/3/search/movie?query={$pesquisa}&api_key={$apiKey}";
//  $url1 = "https://image.tmdb.org/t/p/w500";

//  $json = file_get_contents($url); // pegar todos os dados
// $obj= json_decode($json); // codificar
//   // pesquisar array da api
// // var_dump($obj); // debugar
// // echo "<pre>"; // chamando objeto> array>  indice>
// //  print_r($obj);
// // echo "</pre>";


// // foreach($obj->results as $resultado){
//     ?> 
//     <!-- <b>Iamgem</b> <?php echo $resultado->poster_path;?><br>
//      <b>Titulo</b> <?php echo $resultado->title;?><br>
     
//      <b>Lingua</b> <?php echo $resultado->original_language;?><br>
//      <b>data</b> <?php echo $resultado->release_date;?><br><br> -->
     
     
   
//     <?php
// // };
// ?>


// <?php
// // buscar o total de pagina

// $total_pagina = $obj->total_pages;

// for($x=1; $x <= $total_pagina; $x++){
//     $url_pagina = "https://api.themoviedb.org/3/search/movie?query={$pesquisa}&api_key={$apiKey}&page={$x}";
    
// $json_pagina  = file_get_contents($url_pagina); // pegar todos os dados
// $obj_pagina = json_decode($json_pagina ); // codificar
//     // preparar a Buscar
    
//     foreach($obj_pagina->results as $resultado){
         
//                ?>
        
//      <b>Iamgem</b><img src="<?php echo  $url1 .$resultado->poster_path;?>"><br>
//      <b>Titulo</b> <?php echo $resultado->title;?><br>
     
//       <b>Lingua</b> <?php echo $resultado->original_language;?><br>
//      <b>data</b> <?php echo $resultado->release_date;?><br><br>
//     <?php
    
//     } 
// }


// ?>
</body>
</html>