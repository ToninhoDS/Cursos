var ptg ='%';
var livre = document.getElementById("valor_grafo_Livre").innerHTML;
var grafo = document.getElementById("valor_grafo_Ocupado").innerHTML;
var reserva = document.getElementById("valor_grafo_Reserva").innerHTML;
var reservaInt = parseInt(grafo); // passanto valor para numero int
var grafoInt = parseInt(reserva);
var livreInt = parseInt(livre);
var total_vas = reservaInt + grafoInt;
var total_vagas = reservaInt + grafoInt + livreInt;
var total_resto = ( total_vas / (reservaInt + grafoInt + livreInt)) * 100 ;

console.log(total_vas);
console.log(livreInt);
console.log(total_resto);
document.getElementById('vagasLivesOcupadas').innerHTML = total_vas; // ocupada mais reservadas
document.getElementById('cardVagas').innerHTML = livreInt; // mostras as vagas
document.getElementById('reservasCanceladas').innerHTML = total_resto.toFixed(0)+ptg;


const ctx = document.getElementById('myChartVagas');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Livre', 'Ocupada', 'Reserva', 'Total Pendencias'],
    datasets: [{
      label: '# of Votes',
      data: [livre, grafo, reserva, total_vas, 0],
      backgroundColor: [
    'rgba(201, 203, 207, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(255, 99, 132, 0.2)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
var tempo_hora_0h = document.getElementById("tempo_hora_0h").innerHTML;
var tempo_hora_2h = document.getElementById("tempo_hora_2h").innerHTML;
var tempo_hora_4h = document.getElementById("tempo_hora_4h").innerHTML;
var tempo_hora_6h = document.getElementById("tempo_hora_6h").innerHTML;
var tempo_hora_8h = document.getElementById("tempo_hora_8h").innerHTML;
var tempo_hora_10h = document.getElementById("tempo_hora_10h").innerHTML;
var tempo_hora_12h = document.getElementById("tempo_hora_12h").innerHTML;
var tempo_hora_14h = document.getElementById("tempo_hora_14h").innerHTML;
var tempo_hora_16h = document.getElementById("tempo_hora_16h").innerHTML;
var tempo_hora_18h = document.getElementById("tempo_hora_18h").innerHTML;
var tempo_hora_20h = document.getElementById("tempo_hora_20h").innerHTML;
var tempo_hora_22h = document.getElementById("tempo_hora_22h").innerHTML;



const ctx7 = document.getElementById('apiAleatoriaLinha');
let labels24h = ['6h-8h','8h-10h','10h-12h','12h-14h','14h-16h','16h-18h','18h-20h','20h-22h','22h-0h','0h-2h','2h-4h']
let val =[tempo_hora_0h,tempo_hora_2h,tempo_hora_4h,tempo_hora_6h,tempo_hora_8h,tempo_hora_10h,tempo_hora_12h,tempo_hora_14h,tempo_hora_16h,tempo_hora_18h,tempo_hora_20h,tempo_hora_22h]

 var grafico24h = new Chart(ctx7, {
      type: 'line',
      data: {
          labels: labels24h,
          datasets: [{
              label: 'Vagas ocupadas por Hora',
              data: val, // chamando a rei  primeira coluna e linha
             
              fill: false,
              borderColor: 'rgb(75, 192, 192)',
              backgroundColor: [
                'rgba(54, 255, 235)'
              ],
              
              borderWidth:2
            }] 
      },
      
  });
  