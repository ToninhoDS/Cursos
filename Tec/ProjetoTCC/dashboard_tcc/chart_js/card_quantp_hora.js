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
var Quanto_hora_estacionamento = 1.1; //hora
var valorSemanal = 0;    
var somaBarra = document.getElementById("somaHora_valor").innerHTML;
  somaBarra *= Quanto_hora_estacionamento; //mensal
  var somaMensal = somaBarra * 30;
  valorSemanal = somaBarra * 7;
   console.log(somaBarra);

   
        
           document.getElementById("lucroAnual").innerHTML = "$"+somaMensal.toFixed(2);
           document.getElementById('cardOcupado').innerHTML = "$"+valorSemanal.toFixed(2);
           document.getElementById("lucroMensal").innerHTML = "$"+somaBarra.toFixed(2);
           


};
let intervalosPizza = setInterval(upDadosGraficoBarra,3000);


