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


if (map === undefined) {
    map = L.map('map').setView([pos.coords.latitude, pos.coords.longitude], 15);
} else {
    map.setView([pos.coords.latitude, pos.coords.longitude], 15);
}

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

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    // Manipula a resposta recebida
    var response = JSON.parse(this.responseText);
    var nome = response.nome;
    // var idade = response.idade;

    // Atualiza o conteúdo do popup com os valores da sessão
    marker.setPopupContent('Nome: ' + nome + '<br>');
    marker.openPopup();
  }
};
xhttp.open("GET", "home-usuario.php", true);
xhttp.send();




var markFamiliaAlcantara = L.marker([FamiliaAlcantaraLati, FamiliaAlcantaraLong], { icon: estacionamento }).addTo(map)
.addEventListener('click', function() {
    var modal = document.getElementById("myModal3");
    modal.style.display = 'block';
    setTimeout(function () {
        modal.classList.add('show');
    }, 10)
});

var btnClose3 = document.getElementById("btnClose3");

btnClose3.addEventListener('click', function () {
    var modal = document.getElementById('myModal3');
    modal.classList.remove('show');
    setTimeout(function () {
        modal.style.display = 'none';
    }, 300)
})


var markEstaSergio = L.marker([EstaSergioLati, EstaSergioLong], { icon: estacionamento }).addTo(map)
.addEventListener('click', function() {
    var modal = document.getElementById("myModal2");
    modal.style.display = 'block';
    setTimeout(function () {
        modal.classList.add('show');
    }, 10)
})

var btnClose2 = document.getElementById("btnClose2");

btnClose2.addEventListener('click', function () {
    var modal = document.getElementById('myModal2');
    modal.classList.remove('show');
    setTimeout(function () {
        modal.style.display = 'none';
    }, 300)
})

var markMauaEsta = L.marker([MauaEstaLati, MauaEstaLong], { icon: estacionamento }).addTo(map).addEventListener('click', function(){ 
    var modal = document.getElementById('myModal');
    modal.style.display = 'block';
    setTimeout(function () {
        modal.classList.add('show');
    }, 10)
})

var btnClose = document.getElementById('btnClose');

btnClose.addEventListener('click', function () {
    var modal = document.getElementById('myModal');
    modal.classList.remove('show');
    setTimeout(function() {
        modal.style.display = 'none';
    }, 300)
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
                    if (currentIndex >= coordinates.length) {
                        alert('Chegou ao destino!');
                        window.location.reload(10);
                        newMarker.remove();
                        routingControl.remove();
                        return;
                    }

                    var coord = coordinates[currentIndex];
                    marker.setLatLng([coord.lat, coord.lng]);
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
                        if (currentIndex >= coordinates.length) {
                            alert('Chegou ao destino!');
                            window.location.reload(10); 
                            newMarker.remove();
                            routingControl.remove();
                           
                            return;
                        }

                        var coord = coordinates[currentIndex];
                        marker.setLatLng([coord.lat, coord.lng]);
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