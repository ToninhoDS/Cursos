<?php

session_start();



// Retorna os valores como um objeto JSON
// $response = array(
//   "nome" => $nome
// );

// header("Content-Type: application/json");
// echo json_encode($response);

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
<body>
 
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">Vagas Park</a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link">
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
         </nav>   <!--fim do menu--> 
    </header>
    
    <div id="myModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Vitor Estacionamentos</h5>
            <button type="button" id="btnClose"class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <h3>Atende:</h3>
           <div class="veiculos-modal">
           <img src="./img/bicicleta-icon.svg" alt="ícone de bicicleta">
           <p>5 vagas disponíveis</p>
           <button type="button" class="btn-reserva" onclick="">Reservar</button>
           </div>
        </div>
        <hr>
        <div>
            <h2>Contato</h2>
            <h6>528872-7412</h6>
            <h6>13984226612</h6> 
            <h6>estacionamentovitor@gmail.com</h6>
            <!-- <button type="button" class="btn btn-secondary" id="btnClose" data-bs-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
        </div>
    </div>
    </div>


    <main>
  
    <div id="map" style="position: absolute; top: 36%; right: 10%; bottom: 10%; left: 10%; margin-top:3%"></div>
    <input disabled id="search-input" placeholder="Pesquisar estacionamento" style="position: absolute; top: 10px; right: 10px; z-index: 1000; visibility: hidden;">
    <br>
  
    <h1 style="text-align: center; font-family: 'Poppins'; color: #aa7518">Lista de estacionamentos</h1>
    <h4 style="text-align: center; font-family: 'Poppins'; margin-bottom: 3%">Encontre sua vaga</h4>
    <ul id="estacionamentos-lista" style="text-align: center; list-style: none; font-weight: 600; display: flex; justify-content: space-around; cursor: pointer; font-family: 'Poppins', 'Arial Narrow', Arial, sans-serif; font-size: 105%; color: #ffc857; ">
    </ul> 
    <hr>

    <a href="logout.php"><input type="submit" name="" value="sair"></a>

    </main>

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script>

var map;
    var newMarker;
    var FamiliaAlcantaraLati = -23.963891;
    var FamiliaAlcantaraLong = -46.384387;
    var MauaEstaLati = -23.964806;
    var MauaEstaLong = -46.385101;
    var EstaSergioLati = -23.963320;
    var EstaSergioLong = -46.386558;
    var routingControl;
    var estacionamentos = [
        {
            nome: 'Familia Alcantara',
            latitude: -23.963891,
            longitude: -46.384387
        },
        {
            nome: 'Sérgio Estacionamento',
            latitude: -23.963320,
            longitude: -46.386558
        },
        {
            nome: 'Maua Estacionamento',
            latitude: -23.964806,
            longitude: -46.385101
        }
    ];

    function success(pos) {

        function atualizaLocalizacao(){
// Validade se continua no mesmo lugar ou nao
if (map === undefined) {
    map = L.map('map').setView([pos.coords.latitude, pos.coords.longitude], 13);
} else {
    map.remove();
    map = L.map('map').setView([pos.coords.latitude, pos.coords.longitude], 13);
}
}

atualizaLocalizacao();
    L.tileLayer('https://api.maptiler.com/maps/openstreetmap/{z}/{x}/{y}.jpg?key=GfQDBCSJOZyOaIOA9eO5', {
    tileSize: 512,
    zoomOffset: -1,
    minZoom: 1,
    attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
    crossOrigin: true
    }).addTo(map);

    

    var veiculo = L.icon({
        iconUrl: './img/bicicleta-icon.svg',
        iconSize: [50, 50]
    });

    var estacionamento = L.icon({
        iconUrl: 'imgMap/logoVagaspark.png',
        iconSize: [50, 50]
    });


    //utilizando o ajax 
    var marker = L.marker([pos.coords.latitude, pos.coords.longitude], { icon: veiculo }).addTo(map).bindPopup('')

    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) {
    //     // Manipula a resposta recebida
    //     var response = JSON.parse(this.responseText);
    //     var nome = response.nome;
    //     // var idade = response.idade;
    
    //     // Atualiza o conteúdo do popup com os valores da sessão
    //     marker.setPopupContent('Nome: ' + nome + '<br>');
    //     marker.openPopup();
    //   }
    // };
    // xhttp.open("GET", "home-usuario.php", true);
    // xhttp.send();




    var markFamiliaAlcantara = L.marker([FamiliaAlcantaraLati, FamiliaAlcantaraLong], { icon: estacionamento })

    
    var markEstaSergio = L.marker([EstaSergioLati, EstaSergioLong], { icon: estacionamento }).addTo(map)
    .bindPopup('Estacionamento Sérgio')
    
    var markMauaEsta = L.marker([MauaEstaLati, MauaEstaLong], { icon: estacionamento }).addTo(map).addEventListener('click', function(){ 
        var modal = document.getElementById('myModal');
        modal.style.display = 'block';
    })

    var btnClose = document.getElementById('btnClose');

    btnClose.addEventListener('click', function () {
        var modal = document.getElementById('myModal');
        modal.style.display = 'none';
    })
        

    var searchInput = document.getElementById('search-input');
    var searchControl = L.Control.geocoder({
        geocoder: new L.Control.Geocoder.Nominatim()
    }).addTo(map);

searchInput.addEventListener('keydown', function (event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        var searchTerm = searchInput.value;
        searchControl.geocode(searchTerm, function (results) {
            if (results.length > 0) {
                var result = results[0];
                var destination = result.center;
                var destinationMarker = L.marker(destination).addTo(map);
                var waypoints = [
                    L.latLng(pos.coords.latitude, pos.coords.longitude),
                    L.latLng(destination[0], destination[1])
                ];

                routingControl = L.Routing.control({
                    waypoints: waypoints,
                    show: false
                }).addTo(map);

                routingControl.on('routesfound', function (e) {
                    var routes = e.routes;
                    var coordinates = routes[0].coordinates;
                    var currentIndex = 0;

                    function moveMarker() {
                        if (destination[0] === pos.coords.latitude && destination[1] === pos.coords.longitude) {
                            alert('Chegou ao destino!');
                            window.location.reload(10);
                            newMarker.remove();
                            routingControl.remove();
                            return;
                        }

                        var coord = coordinates[currentIndex];
                        marker.setLatLng([pos.coords.latitude, pos.coords.longitude]);
                        currentIndex++;
                        setTimeout(moveMarker, 300);
                    }

                    moveMarker();
                });
            }
        });
    }
});

            // Limpa a lista de estacionamentos antes de adicionar os novos
            var estacionamentosLista = document.getElementById('estacionamentos-lista');
            estacionamentosLista.innerHTML = '';

            // Adiciona os estacionamentos à lista
            estacionamentos.forEach(function (estacionamento) {
                var li = document.createElement('li');
                li.textContent = estacionamento.nome;

                li.addEventListener('click', function () {
                    var destination = ([estacionamento.latitude, estacionamento.longitude]);
                    var destinationMarker = L.marker(destination).addTo(map);
                    var waypoints = [
                        L.latLng(pos.coords.latitude, pos.coords.longitude),
                        L.latLng(destination[0], destination[1])
                    ];

                    routingControl = L.Routing.control({
                        waypoints: waypoints,
                        show: false
                    }).addTo(map);

                    routingControl.on('routesfound', function (e) {
                        var routes = e.routes;
                        var coordinates = routes[0].coordinates;
                        var currentIndex = 0;

                        function moveMarker() {
                            if (destination[0] === pos.coords.latitude && destination[1] === pos.coords.longitude){
                                alert('Chegou ao destino!');
                                window.location.reload(10); 
                                newMarker.remove();
                                routingControl.remove();
                               
                                return;
                            }

                            var coord = coordinates[currentIndex];
                            marker.setLatLng([pos.coords.latitude, pos.coords.longitude]);
                            currentIndex++;
                            setTimeout(moveMarker, 300);
                        }

                        moveMarker();
                    });
                });

                estacionamentosLista.appendChild(li);
            });

            
        }

        function error(err) {
            console.warn(`ERROR(${err.code}): ${err.message}`);
        }

        navigator.geolocation.getCurrentPosition(success, error);

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>