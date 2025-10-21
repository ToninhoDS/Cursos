<?php
session_start();

ob_start();
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
    <title>Home, <?php echo $_SESSION['nome'] ?></title>
</head>
<body style="background-color: #f3f3f3;">
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
    
    <div id="myModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color: #FFB800"><strong>Maua Estacionamentos</strong></h3>
                <button type="button" id="btnClose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <h5>Atende:</h5>
               <div class="veiculos-modal">
                   <div style="display: flex; justify-content: space-around; margin-top: 1%; margin-bottom: 2%">
                        <img src="./img/moto-icon.svg" alt="ícone de bicicleta">
                        <img src="./img/carro-icon.svg" alt="ícone de bicicleta">
                   </div>
                   <p>25 vagas disponíveis</p>
                   <p><strong>Horário: </strong> Segunda a Sábado das 10hrs às 23hrs </p>
                   <form action="reservar-vaga.php" method="post">
                        <button type="submit" class="btn-reserva">Reservar</button>
                   </form>
               </div>
            </div>
            <hr>
            <div>
                <h2 style="text-align: center; margin-bottom: 4%; color: #FFB800; font-weight: 700">Contato</h2>
                <h6 style="margin-left: 3%"><strong>Telefone: </strong>528872-7412</h6>
                <h6 style="margin-left: 3%"><strong>Celular: </strong>(13) 98422-6612</h6>
                <h6 style="margin-left: 3%; margin-bottom: 3%"><strong>E-mail: </strong>estacionamentomaua@gmail.com</h6>
            </div>
            </div>
        </div>
    </div>

    <div id="myModal2" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: #FFB800"><strong>Estacionamento Sérgio</strong></h4>
                    <button type="button" id="btnClose2" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Atende:</h5>
                    <div class="veiculos-modal">
                        <div style="display: flex; justify-content: space-between; margin-top: 1%; margin-bottom: 2%">
                            <img src="./img/bicicleta-icon.svg" alt="ícone de bicicleta">
                        </div>
                        <p>18 vagas disponíveis</p>
                        <p><strong>Horário: </strong> Segunda a Sábado das 7hrs às 20hrs </p>
                        <form action="reservar-vaga.php" method="post" class="form-reserva">
                            <button type="submit" class="btn-reserva">Reservar</button>
                        </form>
                    </div>
                </div>
                <hr>
                <div>
                    <h2 style="text-align: center; margin-bottom: 4%; color: #FFB800; font-weight: 700">Contato</h2>
                    <h6 style="margin-left: 3%"><strong>Telefone:</strong> 528872-7412</h6>
                    <h6 style="margin-left: 3%; margin-bottom: 3%"><strong>E-mail: </strong>estacionamentosergio@gmail.com</h6>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal3" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: #FFB800"><strong>Estacionamento Família Alcantara</strong></h4>
                    <button type="button" id="btnClose3" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Atende:</h5>
                    <div class="veiculos-modal">
                        <div style="display: flex; justify-content: space-between; margin-top: 1%; margin-bottom: 2%">
                            <img src="./img/bicicleta-icon.svg" alt="ícone de bicicleta">
                            <img src="./img/moto-icon.svg" alt="ícone de bicicleta">
                            <img src="./img/carro-icon.svg" alt="ícone de bicicleta">
                        </div>
                        <p>30 vagas disponíveis</p>
                        <p><strong>Horário: </strong> Segunda a Sábado das 7hrs às 23hrs </p>
                        <form action="reservar-vaga.php" method="post" class="form-reserva">
                            <button type="submit" class="btn-reserva">Reservar</button>
                        </form>
                    </div>
                </div>
                <hr>
                <div>
                    <h2 style="text-align: center; margin-bottom: 4%; color: #FFB800; font-weight: 700">Contato</h2>
                    <h6 style="margin-left: 3%"><strong>Telefone:</strong> 528872-7412</h6>
                    <h6 style="margin-left: 3%; margin-bottom: 3%"><strong>E-mail: </strong>estacionamentosergio@gmail.com</h6>
                </div>
            </div>
        </div>
    </div>

    <main>
  
    <div id="map" style="position: absolute; top: 36%; right: 10%; bottom: 10%; left: 10%; margin-top:3%"></div>
    <input disabled id="search-input" placeholder="Pesquisar estacionamento" style="position: absolute; top: 10px; right: 10px; z-index: 1000; visibility: hidden;">
    <br>
  
    <h1 class="title-map">Lista de estacionamentos</h1>
    <h4 style="text-align: center; font-family: 'Poppins'; margin-bottom: 3%; font-weight: 600;">Encontre sua vaga</h4>
    <ul id="estacionamentos-lista" style="text-align: center; list-style: none; font-weight: 600; display: flex; justify-content: space-around; cursor: pointer; font-family: 'Poppins', 'Arial Narrow', Arial, sans-serif; font-size: 105%; color: #ffc857; ">
    </ul> 
    <hr>

    </main>

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>