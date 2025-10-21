<?php
session_start();

ob_start();

include_once('cadastrar-carro.php');
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,300&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Configurações - Carro</title>
</head>

<body style="background-color: #f3f3f3;">
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

<div id="section-veiculos"> 
        <div class="form-info">
            <div class="section-carro">
                <h2>Meus veículos - Carro </h2>
                <div class="img"><img src="img/carro-icon.svg" alt="" srcset=""></div> 
            </div>
                <form method="POST">
                    <div class="wrapper">
                        <label class="label-info" for="first_name">Placa do carro </label>
                        <input type="text" class="info-conta" id="marca_carro" name="placa_carro" value="<?php echo ($placa) ? $placa : '' ?>">

                        <label class="label-info" for="first_name">Modelo do carro</label>
                        <input type="text"  class="info-conta" id="cor_carro" name="modelo_carro" value="<?php echo ($modelo) ? $modelo : '' ?>">

                        <label class="label-info" for="first_name">Cor</label>
                        <input type="text"  class="info-conta" id="cor_carro" name="cor_carro" value="<?php echo ($cor) ? $cor : '' ?>">
                    </div>

                    <div class="btn-options">
                        <a class="btn-config-options-1" style="width: 18%" href="veiculos.php">Cancelar</a>
                        <!--fazer javascript de validação-->
                        <button class="btn-config-options-2" style="width: 15%;" type="submit">ENVIAR</button>
                    </div>
                </form>
         </div>
<div>


  
</body>
</html>   