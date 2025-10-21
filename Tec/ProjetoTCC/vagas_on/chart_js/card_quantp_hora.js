

$(function graficoPizza() {
    "use strict";
 let valorPizzar =  Math.floor(33.3* Math.random())
 let valorPizzar2 =  Math.floor(33.3* Math.random())
 let valorPizzar3 =  Math.floor(33.3* Math.random())
 let valorNaoParticiparam =  Math.floor(15* Math.random())
 
 //passar valor
 document.getElementById('graficoPizzaP').innerHTML = valorPizzar + valorPizzar2;
 document.getElementById('graficoPizzaN').innerHTML = valorNaoParticiparam;
// vagas dimoniveis
    Morris.Donut({
        element: 'gender_donut',
        data: [
            { value: valorPizzar, label: 'Ótimo' },
            { value: valorPizzar2, label: 'Bom' },
            { value: valorPizzar3, label: 'regular' }

        ],

        labelColor: '#5969ff',
        colors: [
            '#228B22',
            '#5969ff', 
            '#ff407b',
            
        ],



        formatter: function(x) { return x + "%" }
    });
  
});

const upDadosGraficoBarra=()=>{
    var valorSemanal = 0;
    var mediatolerancia = 0;
    var mediaEntrada = 0;
    var mediaHora = 0;

    var somaBarra = document.getElementById("somaHora_valor").innerHTML;
    var soma_carr_t = document.getElementById("vl_carro_tolerancia").innerHTML;
    var soma_carr_e = document.getElementById("vl_carro_entrada").innerHTML;
    var soma_carr_h = document.getElementById("vl_carro_hora").innerHTML;
    var soma_moto_t = document.getElementById("vl_moto_tolerancia").innerHTML;
    var soma_moto_e = document.getElementById("vl_moto_entrada").innerHTML;
    var soma_moto_h = document.getElementById("vl_moto_hora").innerHTML;
    var soma_bike_t = document.getElementById("vl_bike_tolerancia").innerHTML;
    var soma_bike_e = document.getElementById("vl_bike_entrada").innerHTML;
    var soma_outros_t = document.getElementById("vl_outros_tolerancia").innerHTML;
    var soma_outros_e = document.getElementById("vl_outros_entrada").innerHTML;
    // -----
    mediatolerancia = (soma_carr_t + soma_moto_t + soma_bike_t + soma_outros_t) /4;
    mediaEntrada = (soma_carr_e + soma_moto_e + soma_bike_e + soma_outros_e) /4;
    mediaHora = (soma_carr_h + soma_moto_h) /2;
    
    var Quanto_hora_estacionamento = mediaHora; //hora
        
  somaBarra = somaBarra * Quanto_hora_estacionamento; //mensal
  var somaMensal = somaBarra * 30;
  valorSemanal = somaBarra * 7;
//   console.log('QUANTP:',Quanto_hora_estacionamento);
//   console.log('Tolerancia',mediatolerancia);
//   console.log('media Hora',mediaHora);
//   console.log('Soma barra',somaBarra);
//   console.log('teste',soma_moto_t);
  

   
        
           document.getElementById("lucroAnual").innerHTML = "$"+somaMensal.toFixed(2);
           document.getElementById('cardOcupado').innerHTML = "$"+valorSemanal.toFixed(2);
           document.getElementById("lucroMensal").innerHTML = "$"+somaBarra.toFixed(2);
           


};
let intervalosPizza = setInterval(upDadosGraficoBarra,3000);


