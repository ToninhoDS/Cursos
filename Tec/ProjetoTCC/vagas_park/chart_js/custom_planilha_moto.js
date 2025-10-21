

/* Inicio listar os registros do banco de dados */
const tbody = document.querySelector(".listar-usuarios");

// Funcao para listar os registros do banco de dados
const listarUsuarios = async (pagina) => {

    // Fazer a requisicao para o arquivo PHP responsavel em recuperar os registros do banco de dados
    const dados = await fetch("./list_planilha_moto.php?pagina=" + pagina);

    // Ler o objeto retornado pelo arquivo PHP
    const resposta = await dados.json();

    // Acessa o IF quando nao encontrar nenhum registro no banco de dados
    if (!resposta['status']) {
        // Envia a mensagem de erro para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        // Recuperar o SELETOR do HTML que deve receber os registros
        const conteudo = document.querySelector(".list_planilha_moto");

        // Somente acessa o IF quando existir o SELETOR ".listar-vagas_detalhes"
        if (conteudo) {

            // Enviar os dados para o arquivo HTML
            conteudo.innerHTML = resposta['dados'];
        }
    }
}

// Chamar a funcao para listar os registro do banco de dados
listarUsuarios(1);

/* Fim listar os registros do banco de dados */


// vamos substiuir o tewxto do campo

function editar_registro(id){
//   ocultar o Botao editar
    document.getElementById("botao_salvar" +id ).style.display = "block";
    document.getElementById("Select_Option" +id ).style.display = "block";
    document.getElementById("cancelarRG_salvar" +id ).style.display = "block";
   
    document.getElementById("botao_editar" +id ).style.display = "none";



//   recuperar o registro

   var nome = document.getElementById("valor_nome" + id);
   var cpf = document.getElementById("valor_cpf" + id);
   var placa = document.getElementById("valor_placa" + id);
   var entrada = document.getElementById("valor_entrada" + id);

 

//    subistituir o texto em input

nome.innerHTML = "<input type='text' id='nome_text" + id + "' value='"+ nome.innerHTML +"' size='10' maxlength='50'>";
cpf.innerHTML = "<input type='text' id='cpf_text" + id + "' value='"+ cpf.innerHTML +"' size='10' maxlength='50'>";
placa.innerHTML = "<input  type='text' id='placa_text"  + id + "' value='"+ placa.innerHTML +"' size='20' maxlength='50'>";
entrada.innerHTML = "<input type='time' id='entrada_text" + id + "' value='"+ entrada.innerHTML +"' size='10' maxlength='50'>";
Option_vagas.innerHTML = "<option name='Livre' value='Livre'selected>" + Option_vagas.Option_vagas.innerHTML + "</option><option name='reserva' value='reserva'>Reserva</option><option name='ocupado' value='ocupado'>Ocupado</option></select></div><h3><span class='badge-dot  mr-1' id='status'></span >$nm_status</h3></div></td>";



                               
}


// substituir o texto e salvar

async function salvar_registro(id){
    // recuperar o valor do camppo
    var nome_valor = document.getElementById("nome_text" +id).value;
    var cpf_valor = document.getElementById("cpf_text" +id).value;
    var placa_valor = document.getElementById("placa_text" +id).value.toUpperCase();
    var entrada_valor = document.getElementById("entrada_text" +id).value;
    var Option_vagas_valor = document.getElementById("Select_Option" +id).value;
    var img_Option_valor = 'Moto';
   
    //validação se a vaga for livra apagar tudo
    if(Option_vagas_valor == 'Livre'){

       let text;
        if (confirm("Deseja Apagar o Status da Vaga? \n Pressione o button!") == true) {
            nome_valor = '';
            placa_valor = '';
            cpf_valor = '';
            entrada_valor = 0;  
        } else {
            listarUsuarios(1);
            //window.location.reload(10); // carrega a pagina
        text = "You canceled!";

        }
    }else{
        
    }
        
  
   
    document.getElementById("valor_nome" + id).innerHTML = nome_valor;
    document.getElementById("valor_cpf" + id).innerHTML = cpf_valor;
    document.getElementById("valor_placa" + id).innerHTML = placa_valor;
    document.getElementById("valor_entrada" + id).innerHTML = entrada_valor;
    document.getElementById("Select_Option" + id).innerHTML = Option_vagas_valor;
   
   
    
    

    // salvar dados para enviar em uma string e mandar para banco de dados

    var dadosForm = "id=" + id + "&nome_vagas=" + nome_valor + "&placa_vagas=" + placa_valor 
    + "&entrada_vagas=" + entrada_valor + "&status_vagas=" + Option_vagas_valor + "&img_vagas=" + img_Option_valor + "&cpf_vagas=" + cpf_valor;

    // fazer requisicao com FEtch para um arquivo php e enviar patravez do metodo POST dados do formulario
   //console.log(dadosForm);
    const dados = await fetch("editar_tabela_vagas.php",{
        method: "POST",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: dadosForm
    });

    // ler o objeto a respota do arquivo php

    const resposta = await dados.json();
    //console.log(resposta);

        // acessa o if quando nao conseguir editar no banco
        if(!resposta['status']){
            // aviso de mensagem de erro caso de erro

    document.getElementById("msgAlerta").innerHTML = resposta['msg'];
        
    }else{
          // aviso de mensagem de sucesso caso de sucesso
          document.getElementById("msgAlerta").innerHTML = resposta['msg'];

        //   chamar uma função para remover a mensagem apos alguns segundos
        removerMsgALerta();

        // agora ocultar e inverter o botão

        //   apresentar o Botao editar
   document.getElementById("botao_editar" +id ).style.display = "block";;
 
   // ocultar o Botao salvar
   
   document.getElementById("botao_salvar" +id ).style.display = "none";
   document.getElementById("cancelarRG_salvar" +id ).style.display = "none";
   document.getElementById("Select_Option" +id ).style.display = "none";
   
   
    //   apresentar o Botao excluir
    

    listarUsuarios(1);
    }
    
}



// cancelar a edição
function cancelar_registro(id){
    //   ocultar o Botao confirmar e de cancelar e cancelar excluir
       
       document.getElementById("botao_salvar" +id ).style.display = "none";
       document.getElementById("cancelarRG_salvar" +id ).style.display = "none";
       document.getElementById("Select_Option" +id ).style.display = "none";
    
    
    // apresentar o Botao excluir e de editar
   
    document.getElementById("botao_editar" +id ).style.display = "block";;
  
    
   window.location.reload(); // carrega a pagina
}
// fim do editar o banco de dados


// iniciar função de remoção de mensagem
function removerMsgALerta(){
    setTimeout(function(){
        // substituir a mensagem 
        document.getElementById("msgAlerta").innerHTML = "";
        // colocar o milisegundos que precisa 2000
   
    }, 1000);
   
} 

// função reseta a pagina depois de alguns segundos
// function resetaPagina(){
//     setTimeout(function(){
//         // substituir a mensagem 
//         window.location.reload(10); 
        
//     }, 1000);
   
// }

// Obter a data e hora atual
var dataAtual = new Date();

// Extrair as informações de hora, minuto e segundo
var hora_atual_planilha = dataAtual.getHours();
var minuto_atual_planilha = dataAtual.getMinutes();
var segundo_atual_planilha = dataAtual.getSeconds();

// Exibir a hora atual
var cal_hora_planilha = hora_atual_planilha + ":" + minuto_atual_planilha + ":" + segundo_atual_planilha;


// aplicação modal
async  function visualizar(id){

   
    //var array_cpf_modal = document.getElementById("valor_cpf" + id).innerHTML;
    //criar uma array
    var Option_vagas_valor = document.getElementById("Select_Option" +id).value

    var valor_idP = document.getElementById("valorN_planilha" + id).innerHTML;
    console.log(valor_idP); // id do cliente
    var config_toleranciaP = document.getElementById("valor_toleranciaP");
    var valor_toleranciaP = config_toleranciaP.value;
    console.log('valor tolerencia',valor_toleranciaP);
    var config_entradaP = document.getElementById("valor_entradaP"); // valor de entrada aposta a tolerancia
    var valor_entradaP = parseInt(config_entradaP.value,10);
    console.log('valor entrada',valor_entradaP);
    var config_horaP = document.getElementById("valor_horaP");
    var valor_horaP = config_horaP.value;
    console.log('valor hora',valor_horaP); 

    //fim valores config

    const dados = await fetch('visualizar_planilha.php?id=' +valor_idP); //id do veiculo
    const resposta = await dados.json();
    //console.log(resposta);
  
    if(!resposta['status']){
        document.getElementById('msgAlerta').innerHTML = resposta['msg'];
    }else{
        document.getElementById('msgAlerta').innerHTML = "";
        const visModal = new bootstrap.Modal(document.getElementById('visualiza_status_vaga'));
        visModal.show();
        
        // CONVERTER A HORA QUE VEM DO BANCO DE DADOS
        var horaCompleta = resposta['dados'].dt_entrada;

        var partes = horaCompleta.split(":");
        var hora_banco = partes[0];
        var minuto_banco = partes[1];
        // var segundo_banco = partes[2];

        //TEMPO ESTACIONADO
        var TempoP_hora = hora_atual_planilha - hora_banco;
        var TempoP_minuto = minuto_banco - minuto_atual_planilha ;
        //tirar simbolo de negativo do resultado
        var TempoP_horaSemSinal = Math.abs(TempoP_hora);
        var TempoP_minutoSemSinal = Math.abs(TempoP_minuto);
        // console.log("Hora: " + hora_banco);
        // console.log("Minuto: " + minuto_banco);
        // console.log("Segundo: " + segundo_banco);
        // FIM

        // IF DE TOLERANCIA ESTACIONADO NO ESTACIONAMENTO, CASO PASSE O TEMPO ESTIBULADO NAS CONFIIGURAÇÕES SERA COBRADO X
        var cal_hora = (TempoP_horaSemSinal * 60) + TempoP_minutoSemSinal;
        var tolerancia_avisoP = "";
        if(cal_hora >= valor_toleranciaP){
            tolerancia_avisoP = "Não tem Tolêrancia";
            
        }else{
            tolerancia_avisoP = "Está na Tolêrancia";
            valor_entradaP = 0;
        }

        //FIM DA TOLERANCIA
        console.log("vlaor entrada: " + valor_entradaP);
        // calcular valor pago pelo usuario do serço, valor vem das configurações do sistema
        var calular_valorPagarP = ((TempoP_horaSemSinal * 60) + TempoP_minutoSemSinal) * (valor_horaP / 60) + valor_entradaP;
        // fim do calculo
        var cpf = resposta['dados'].cd_cpf; // CPF original
        var cpfFormatado = cpf.slice(0, 3) + '.***.***.' + cpf.slice(0,2); // Formata o CPF com pontos e barras
        // console.log(cpfFormatado); // Saída: "123.456.789-01"
       
              //Se a vaga estiver vazia apagar os valores
              if(Option_vagas_valor == 'Livre'){
                calular_valorPagarP ='0.00';
                tolerancia_avisoP = 'Não informado';
                TempoP_horaSemSinal = 0;
                TempoP_minutoSemSinal = 0;
            }else{
                calular_valorPagarP = calular_valorPagarP.toFixed(2);
            }

        document.getElementById("id_planilha_modal").innerHTML = resposta['dados'].cd_status_vagas;
        document.getElementById("vaga_planilha_modal").innerHTML = resposta['dados'].cd_numero_vaga;
        document.getElementById("cpf_cliente_modal").innerHTML = cpfFormatado;
        document.getElementById("nm_nomeP_modal").innerHTML = resposta['dados'].nm_nome;
        document.getElementById("placaP_modal").innerHTML = resposta['dados'].sg_placa;
        document.getElementById("entradaP_modal").innerHTML = resposta['dados'].dt_entrada;
        // DETALHES DE PAGAMENTO
        document.getElementById("horaAtualP_modal").innerHTML = hora_atual_planilha + ":" + minuto_atual_planilha + ":" + segundo_atual_planilha;
        document.getElementById("tempoEstacionadoP_modal").innerHTML = TempoP_horaSemSinal +":"+ TempoP_minutoSemSinal;
        document.getElementById("toleranciaP_modal").innerHTML = tolerancia_avisoP;
        document.getElementById("valorPagarP_modal").innerHTML ="R$" + calular_valorPagarP;  //.toFixed(2) ficar os centavos
       
    }
   
}
// fim

// limpar quando selecionar na option bicicleta
function mostraAlerta(elemento)
    {
       
        if(elemento.value == 'Bicicleta'){
            console.log(elemento.value);
            
        }else{}
    }
    // INPUT de pesquisa vagas
    $('#search-input').on('keyup', function() {
        var searchTerm = $(this).val().toLowerCase();
        $('#my-table tbody tr').each(function() {
          var N_vaga_veiculo = $(this).find('td:nth-child(2)').text().toLowerCase();
          var N_vaga_pesquisa = $(this).find('td:nth-child(3)').text().toLowerCase();
          var nome_vaga_pesquisa = $(this).find('td:nth-child(5)').text().toLowerCase();
          var placa_vaga_pesquisa = $(this).find('td:nth-child(6)').text().toLowerCase();
          var status_vagas_pesquisa = $(this).find('td:nth-child(9)').text().toLowerCase();
          if (N_vaga_veiculo.indexOf(searchTerm) !== -1 || N_vaga_pesquisa.indexOf(searchTerm) !== -1 || nome_vaga_pesquisa.indexOf(searchTerm) !== -1 || placa_vaga_pesquisa.indexOf(searchTerm) !== -1 || status_vagas_pesquisa.indexOf(searchTerm) !== -1) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      }); 