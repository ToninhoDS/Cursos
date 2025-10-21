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
    <title>Configurações da Bicicleta</title>
</head>

<body style="background-color: #f3f3f3;">
 <!--INICIO HEADER-->
<header class="header" id="header">
    <nav class="nav container">
        <a href="home-usuario.php" class="nav__logo"><img style="width: 20%;" src="./img/logotipoSglas.png" alt=""></a>
        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="#home" class="nav__link">
                        <i class='bx bxs-home'></i>
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
    </nav>   <!--fim do menu-->
</header>


<div id="section-veiculos"> 
        <div class="form-info">
            <div class="section-carro">
                <h2>Meus veículos - Bicicleta </h2>
                <div class="img"><img src="img/bicicleta-icon.svg" alt="" srcset=""></div> 
            </div>
                <form>
                    <div class="wrapper">
                        <label class="label-info" for="first_name">Marca da Bicicleta </label>
                        <input type="text" class="info-conta" id="marca_carro" name="marca_carro">

                        <label class="label-info" for="first_name">Cor</label>
                        <input type="text"  class="info-conta" id="cor_carro" name="cor_carro">
                    </div>

                    <div class="btn-options">
                        <a class="btn-config-options-1" href="veiculos.php" style="width: 20%">Cancelar</a>
                    <!--fazer javascript de validação-->
                        <button class="btn-config-options-2" style="width: 15%;" type="submit">ENVIAR</button>
                    </div>
                </form>
         </div>
<div>


  
</body>
</html>   