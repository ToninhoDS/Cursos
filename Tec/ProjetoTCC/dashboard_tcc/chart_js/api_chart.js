// // usando api, aleatoria
// const ctx10 = document.getElementById('apiAleatoria');
// let labelsX = ['Vagas', 'Ocupadas','Resevada', 'Desistêcia']
// let valores = [0,0,0,0] 

//     let graficoTcc = new Chart(ctx10, {
//         type: 'bar',
//         data: {
//         labels:labelsX,
//         datasets: [{
//             label: '',
//             data: valores,
//             borderColor: [
//                 'rgb(54, 162, 235)',
//                 'rgb(255, 159, 64)',
//                 'rgb(255, 205, 86)',
//                 'rgb(201, 203, 207)'
                
//               ],
//             backgroundColor: [
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 159, 64, 0.2)',
//                 'rgba(255, 205, 86, 0.2)',
//                 'rgba(201, 203, 207, 0.2)'
               
//               ],
//               borderWidth:1
//         }]
//         },
//         options: {
//         scales: {
//             y: {
//             beginAtZero: true
//             }
//         }
//         }
//     });
//     // vamos criar uma função para atulizar as informações do grafico cada 3 segundo

    
// const upDados_Atualizar=()=>{
//     const endpoint = "https://cfbcursosaula128.cfbcursos.repl.co"
//             fetch(endpoint)
//             .then(res=>res.json())
//             .then(res=>{
//                 // passar o valor tratado na api e passar para um array
//                 valores[0] = res.disponibilidade
//                 valores[1] = res.qualidade
//                 valores[2] = res.performance
//                 valores[3] = res.performance - res.qualidade
//                 if(valores[3]<= 0){ // evitar que o valor de negativo criei essa linha
//                   valores[3] = 0
//                 }
//                 // pegando o valor aleatorio da array e usando ele no calculo
//                 let ptg ="%"
//                 var vagasLivres = valores[0]
//                 var vagasOcupadas = valores[1]
//                 var vagasResevadas = valores[2]
//                 var desistencia = valores[3] 
//                 var totalVagas = 49; // total de vagas no estacionamento
//                 var totalDesistencia = 0;
//                 var somaVagasOcupadas = 0;
               
//                 somaVagasOcupadas += vagasLivres + vagasOcupadas + vagasResevadas;
//                 totalDesistencia = (desistencia / 100) * totalVagas;
//                 document.getElementById('vagasLivesOcupadas').innerHTML = somaVagasOcupadas; 
//                 document.getElementById('reservasCanceladas').innerHTML = totalDesistencia.toFixed(2)+ptg;
//             //     document.getElementById("cardVagas").innerHTML = 10;
//             // document.getElementById("cardOcupado").innerHTML = 10;
//                 graficoTcc.update()
               
//             })
//             .catch(erro=>{
//                console.log("Erro" +erro) 
//             })                
// };
// let intervalos = setInterval(upDados_Atualizar,3000);


// const ctx7 = document.getElementById('apiAleatoriaLinha');
// let labels24h = ['6h-8h','8h-10h','10h-12h','12h-14h','14h-16h','16h-18h','18h-20h','20h-22h','24h-0h','0h-2h','2h-4h']
// let val =[0,0,0,0,0,0,0,0,0,0,0,0]

//  var grafico24h = new Chart(ctx7, {
//       type: 'line',
//       data: {
//           labels: labels24h,
//           datasets: [{
//               label: 'Vagas ocupadas por Hora',
//               data: val, // chamando a rei  primeira coluna e linha
             
//               fill: false,
//               borderColor: 'rgb(75, 192, 192)',
//               backgroundColor: [
//                 'rgba(54, 255, 235)'
//               ],
              
//               borderWidth:2
//             }] 
//       },
      
//   });
 
//   const upDados_Atualizar24h=()=>{
//     const endpoint = "https://cfbcursosaula128.cfbcursos.repl.co"
//     fetch(endpoint)
//     .then(res=>res.json())
//     .then(res=>{
//         // passar o valor tratado na api e passar para um array
//         val[0] = res.disponibilidade
//         val[1] = Math.floor(10* Math.random())
//         val[2] = Math.floor(10* Math.random())
//         val[3] = res.performance - res.qualidade
//         val[4] = Math.floor(10* Math.random())
//         val[5] = res.performance
//         val[7] = Math.floor(10* Math.random())
//         val[8] = res.qualidade
//         val[9] = Math.floor(10* Math.random())
//         val[10] = Math.floor(10* Math.random())
//         val[11] = Math.floor(10* Math.random())
//         grafico24h.update()
//     })
//     .catch(erro=>{
//        console.log("Erro" +erro) 
//     })                
// };
// let intervalos24 = setInterval(upDados_Atualizar24h,5500);
