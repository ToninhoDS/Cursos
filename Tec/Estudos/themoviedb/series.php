<?php
 include("minhaKey.php");

 session_start();
 
 $pesquisa = $_GET["valor"] = "series";



 ?>

 </body>
 </html>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Hello!</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/carossel.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
  
  </head>
  <body>
  <nav class="nav-bar">
        <ul class="nav-bar-ul">
          <li> <a class="nav-bar-item" name="18+" href="index.php"> Home </a> </li>
          <li> <a class="nav-bar-item" href="lancamento.php"> Lançamento</a> </li>
          <li> <a class="nav-bar-item" href="#"> Series </a> </li>
        </ul>
      </nav>
      <!-- carossel ---------------------------------------------------------------------------- -->
      <?php
 
 $pesquisa = $_GET["valor"];
 
 

   


$url = "https://api.themoviedb.org/3/search/movie?query={$pesquisa}&api_key={$apiKey}";
$url1 = "https://image.tmdb.org/t/p/w500";
$url_filme = "https://api.themoviedb.org/3/movie/";
$url_filme_2 = "?api_key=58288aa41dae73d95a10c4c3ff96d5ee&language=en-US";


$json = file_get_contents($url); // pegar todos os dados
$obj= json_decode($json); // codificar
    // preparar a Buscar
    
  ?>

      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 6"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="6" aria-label="Slide 7"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="7" aria-label="Slide 8"></button>
  </div>
  
  <div class="carousel-inner ">
    <div class="carousel-item active img-corossel" data-bs-interval="5000">
      <img src="img/serie.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h2></h2>
        <p></p>
      </div>
    </div>
    <?php
foreach($obj->results as $resultado){
  $id = $resultado->id;  
  $id_filme = $url_filme .$resultado->id . $url_filme_2;
    ?>
    <div class="carousel-item inner " data-bs-interval="1500">
      <div class="img-corossel">
      <img src="<?php echo  $url1 .$resultado->poster_path;?>" class="d-block w-100 " alt="...">
    </div>
      
      <div class="carousel-caption d-none d-md-block">
        
      </div>
    </div>
   
  <?php
}
  ?>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" id="seta" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" id="seta" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  <!-- fim do carossel ------------------------------------------------------- -->
      
 
 
    <main>
   
      
     <!-- <form>
        <div class="search-bar" >
            <input type="text" id="myInput" name="valor" placeholder="Busca de contatos" title="Type in a name">
            <button type="submit">
              <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M26.9189 25.0593L18.154 16.2944C19.5142 14.5361 20.2499 12.3862 20.2499 10.125C20.2499 7.41822 19.1935 4.88023 17.2833 2.96661C15.3731 1.053 12.8283 0 10.125 0C7.42159 0 4.87685 1.05637 2.96661 2.96661C1.053 4.87685 0 7.41822 0 10.125C0 12.8283 1.05637 15.3731 2.96661 17.2833C4.87685 19.1969 7.41822 20.2499 10.125 20.2499C12.3862 20.2499 14.5327 19.5142 16.2911 18.1574L25.0559 26.9189C25.0816 26.9446 25.1121 26.965 25.1457 26.9789C25.1793 26.9928 25.2153 27 25.2516 27C25.288 27 25.324 26.9928 25.3576 26.9789C25.3912 26.965 25.4217 26.9446 25.4474 26.9189L26.9189 25.4508C26.9446 25.4251 26.965 25.3945 26.9789 25.361C26.9928 25.3274 27 25.2914 27 25.255C27 25.2187 26.9928 25.1827 26.9789 25.1491C26.965 25.1155 26.9446 25.085 26.9189 25.0593ZM15.4709 15.4709C14.0399 16.8986 12.1432 17.6849 10.125 17.6849C8.10671 17.6849 6.20997 16.8986 4.77898 15.4709C3.35136 14.0399 2.56499 12.1432 2.56499 10.125C2.56499 8.10671 3.35136 6.2066 4.77898 4.77898C6.20997 3.35136 8.10671 2.56499 10.125 2.56499C12.1432 2.56499 14.0433 3.34799 15.4709 4.77898C16.8986 6.20997 17.6849 8.10671 17.6849 10.125C17.6849 12.1432 16.8986 14.0433 15.4709 15.4709Z" fill="white"/>
          </svg>

            </button>
          </div>
      </form> -->
      <!-- Inicio da pesquisar Api---------------------------------------- -->
      <?php
 // manter um valor na variavel para nao dar erro
 $pesquisa = $_GET["valor"];
 
 if($pesquisa  == ''){
  $pesquisa = '007';
 }

   
//  // coloquei um gerador de numero para criar conteudos diferente para o usuario
// 	$gera = rand(1,4); // vai contar de 1 a 3

// 	if($gera == 1) {
// 		$pesquisa = "velozes";

// 	}if ($gera == 2){
// 		$pesquisa = "terror";

//   }if ($gera == 3){
// 		$pesquisa = "vida";

//   }if ($gera == 4){
//   $pesquisa = "desenho";
// }

// buscar o total de pagina

$url = "https://api.themoviedb.org/3/search/movie?query={$pesquisa}&api_key={$apiKey}";
$url1 = "https://image.tmdb.org/t/p/w500";
$url_filme = "https://api.themoviedb.org/3/movie/";
$url_filme_2 = "?api_key=58288aa41dae73d95a10c4c3ff96d5ee&language=en-US";


$json = file_get_contents($url); // pegar todos os dados
$obj= json_decode($json); // codificar
    // preparar a Buscar
  ?>
  
  <div class="main ">
      <ul class="cards">
  <?php
    foreach($obj->results as $resultado){
        $id = $resultado->id;  
        $id_filme = $url_filme .$resultado->id . $url_filme_2;
      ?>
       
       <li class="cards_item">
          <div class="card">
          <form action="conteudo.php" >
            <!-- imagem -->
            <div id="zoom" class="card_image"><img src="<?php echo  $url1 .$resultado->poster_path;?>"></div>
            <!-- pegando id da imagem -->
            <input type="hidden" name="imagem" value="<?php echo  $url1 .$resultado->poster_path;?>" />
            <div class="card_content"> <!-- arear aonde vai ser escrita-->
              <!-- titulo -->
              <h2 class="card_title"><?php echo $resultado->title;?></h2><br>
              <!-- pegando o id da pesquisa -->
              <input type="hidden" name="valor" value="<?php echo $id;?>" />
              <!-- texto da imagem -->
              <p class="card_text"><?php echo $resultado->overview;?><br></p>
              <button class="btn card_btn">Mais detalhes</button>
              </div>
          </div>
          </form>
      </li>
<?php 
  } 
?>
     </ul>
    </div>

  </main>


  <!-- <script src="js/carossel.js"></script> -->
</body>
</html>
