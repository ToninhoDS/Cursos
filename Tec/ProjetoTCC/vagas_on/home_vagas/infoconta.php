<?php

session_start(); 

ob_start();

include_once('conexa_infoconta.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
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
    <link rel="stylesheet" href="css/style-usuario.css">
    <title>Informações da Conta</title>
</head>
<body>
    
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

    <div class="foto-conta">
        <div class="form-info">
            <form>
                <h2>Informações da conta</h2>
                <div class="wrapper">
                    <label class="label-info" for="first_name">Nome</label>
                    <input type="text" class="info-conta" id="nome" name="nome" value="<?php echo $_SESSION['nome'];?>">

                    <label class="label-info" for="first_name">E-mail</label>
                    <input type="text"  class="info-conta" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
                 </div>
            </form>

            <div class="btn-class">
            <a class="btn-config-advance" href="conta-avanc.php">Configurações avançadas da conta <img class="icon-config" src="img/configuracao-icon.svg" alt=""></a>

            <a class="btn-config-advance" href="veiculos.php"> Configurações sobre o veículo <img class="icon-seta" src="img/seta-icon.svg" alt=""></a>
        </div>
        </div>
     </div>

    <div class="area-btn-logout">
     <a href="logout.php" class="btn-logout">Sair</a>
    </div>
</body>
</html>