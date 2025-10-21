<?php
session_start();

ob_start();

include_once('editarconta.php');

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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <title>Configurações Avançadas</title>
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
        <div class="form-info2">
            <div class="section-carro">
                <h2>Configurações avançadas da conta </h2>
            </div>
                <form method="POST" enctype="multipart/form-data">

                    <div class="pos-foto-perfil">
                        <img class="foto-perfil" src="<?php echo $fotoPerfil; ?>" alt="">
                        <label class="file-input" for="selecionar">Trocar foto</label>
                        <input type="file" name="img_perfil" id="selecionar" accept="image/jpeg, image/png">
                    </div>

                    <div class="container text-center">
                        <div class="row align-items-center">
                            <div class="col">
                                <label class="label-info2" >Nome</label>
                                <input type="text" class="info-conta2" id="nome" name="nome" value="<?php echo isset($nome) ? $nome : '' ?>">

                                <label class="label-info2" >CPF</label>
                                <input type="text"  class="info-conta2" id="cpf" name="cpf" value="<?php echo isset($cpf) ? $cpf : '' ?>">

                                <label class="label-info2" >CEP</label>
                                <input type="number"  class="info-conta2" id="cep" name="cep" value="<?php echo($cep) ? $cep : '' ?>">
                            </div>

                            <div class="col">
                                <label class="label-info2" >Endereço</label>
                                <input type="text"  class="info-conta2" id="endereco" name="endereco" value="<?php echo ($endereco) ? $endereco : '' ?>">

                                <label class="label-info2" >Bairro</label>
                                <input type="text"  class="info-conta2" id="bairro" name="bairro" value="<?php echo ($bairro) ? $bairro : '' ?>">

                                <label class="label-info2" >Cidade</label>
                                <input type="text"  class="info-conta2" id="cidade" name="cidade" value="<?php echo ($cidade) ? $cidade : '' ?>">
                            </div>
                        </div>
                    </div>

                    <div class="btn-options">
                    <a class="btn-config-options-1" href="infoconta.php">Cancelar</a>
                <!--fazer javascript de validação-->
                    <button class="btn-config-options-2" type="submit">ENVIAR</button>   

                 <!-- <a class="btn-config-options-2" href="infoconta.php">Concluído </a> -->
                    </div>

                </form>
                
         </div>
    <div>


  <script src="./js/cep.js"></script>
</body>
</html>   