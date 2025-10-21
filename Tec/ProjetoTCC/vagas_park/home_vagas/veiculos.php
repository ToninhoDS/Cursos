<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-usuario.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <title>Opções Veículos</title>
</head>
<body>
    
    <!--INICIO HEADER-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="home-usuario.php" class="nav__logo"><img style="width: 20%;" src="./img/logotipoSglas.png" alt=""></a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="home-usuario.php" class="nav__link">
                            <i class='bx bxs-home' ></i>
                            <span class="nav__name">Home</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#atividade" class="nav__link">
                            <i class='bx bx-notepad'></i>
                            <span class="nav__name">Atividade</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="infoconta.php" class="nav__link">
                            <i class='bx bxs-user-circle' ></i>
                            <span class="nav__name">Conta</span>
                        </a>
                    </li>
                </ul>
            </div>
             </li>
         </nav>     
    </header>
<!--fim do menu-->

    <div class="veiculos-container text-center">
        <div class="row">
          <div class="col-3 mt-3"><a class="veiculos" href="veiculo-carro.php">
            <img style="width:35%;" src="img/carro-icon.svg" alt="">
        </a></div>
          <div class="col-3 mt-3"><a class="veiculos" style="padding-bottom: 5.5em;" href="veiculo-moto.php">
            <img style="width: 35%;" src="img/moto-icon.svg" alt="">
         </a></div>
      
          <!-- Force next columns to break to new line at md breakpoint and up -->
          <div class="w-100 d-none d-md-block"></div>
      
          <div class="col-3 mt-3"><a class="veiculos" href="veiculo-bike.php">
            <img style="width: 35%;" src="img/bicicleta-icon.svg" alt="">
        </a></div>

          <div class="col-3 mt-3"><a class="veiculos" href="veiculo-patins.php">
            <img style="width: 35%;" src="img/patins-icon.svg" alt="">
        </a>
          </div>
        </div>
      </div> 


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>