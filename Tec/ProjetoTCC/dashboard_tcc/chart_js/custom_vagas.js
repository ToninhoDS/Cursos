

/* Inicio listar os registros do banco de dados */
const tbody = document.querySelector(".listar-usuarios");

// Funcao para listar os registros do banco de dados
const listarUsuarios = async (pagina) => {

    // Fazer a requisicao para o arquivo PHP responsavel em recuperar os registros do banco de dados
    const dados = await fetch("./list_vagas.php?pagina=" + pagina);

    // Ler o objeto retornado pelo arquivo PHP
    const resposta = await dados.json();

    // Acessa o IF quando nao encontrar nenhum registro no banco de dados
    if (!resposta['status']) {
        // Envia a mensagem de erro para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        // Recuperar o SELETOR do HTML que deve receber os registros
        const conteudo = document.querySelector(".listar-usuarios");

        // Somente acessa o IF quando existir o SELETOR ".listar-usuarios"
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
    document.getElementById("img_Option" +id ).style.display = "block";


    document.getElementById("botao_editar" +id ).style.display = "none";
    document.getElementById("img_status_vagas" +id ).style.display = "none";


//   recuperar o registro

   var nome = document.getElementById("valor_nome" + id);
   var cpf = document.getElementById("valor_cpf" + id);
   var placa= document.getElementById("valor_placa" + id);
   var entrada = document.getElementById("valor_entrada" + id);
   var Option_vagas = document.getElementById("Select_Option" + id);
   var img_Option = document.getElementById("img_Option" + id);
// tratamento do cpf

//    subistituir o texto em input

nome.innerHTML = "<input type='text' id='nome_text" + id + "' value='"+ nome.innerHTML +"' size='10' maxlength='50'>";
cpf.innerHTML = "<input type='text' id='cpf_text" + id + "' value='"+ cpf.innerHTML +"' size='10' maxlength='50'>";
placa.innerHTML = "<input  type='text' id='placa_text"  + id + "' value='"+ placa.innerHTML +"' size='20' maxlength='50'>";
entrada.innerHTML = "<input type='time' id='entrada_text" + id + "' value='"+ entrada.innerHTML +"' size='10' maxlength='50'>";
Option_vagas.innerHTML = "<option name='Livre' value='Livre'selected>" + Option_vagas.Option_vagas.innerHTML + "</option><option name='reserva' value='reserva'>Reserva</option><option name='ocupado' value='ocupado'>Ocupado</option></select></div><h3><span class='badge-dot  mr-1' id='status'></span >$nm_status</h3></div></td>";
img_Option.innerHTML = "<option name='Livre' value='Livre'selected>Livre</option><option name='carro' value='carro'>Carro</option><option name='moto' value='moto'>Moto</option><option name='bicicleta' value='bicicleta'>Bicicleta</option><option name='patins' value='patins'>Patins</option><option name='outros' value='outros'>Outros</option>";


                               
}


// substituir o texto e salvar

async function salvar_registro(id){
    // recuperar o valor do camppo
    var nome_valor = document.getElementById("nome_text" +id).value;
    var cpf_valor = document.getElementById("cpf_text" +id).value;
    var placa_valor = document.getElementById("placa_text" +id).value.toUpperCase();
    var entrada_valor = document.getElementById("entrada_text" +id).value;
    var Option_vagas_valor = document.getElementById("Select_Option" +id).value;
    var img_Option_valor = document.getElementById("img_Option" +id).value;
   
    //validação se a vaga for livra apagar tudo
    if(Option_vagas_valor == 'Livre'){

       let text;
        if (confirm("Deseja Apagar o Status da Vaga? \n Pressione o button!") == true) {
            nome_valor = '';
            placa_valor = '';
            cpf_valor = ''; //esqueci
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
    document.getElementById("img_Option" + id).innerHTML = img_Option_valor;
   
    
    

    // salvar dados para enviar em uma string e mandar para banco de dados

    var dadosForm = "id=" + id + "&nome_vagas=" + nome_valor + "&placa_vagas=" + placa_valor 
    + "&entrada_vagas=" + entrada_valor + "&status_vagas=" + Option_vagas_valor + "&img_vagas=" + img_Option_valor + "&cpf_vagas=" + cpf_valor;

    // fazer requisicao com FEtch para um arquivo php e enviar patravez do metodo POST dados do formulario
   console.log(dadosForm);
    const dados = await fetch("editar_tabela_vagas.php",{
        method: "POST",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: dadosForm
    });

    // ler o objeto a respota do arquivo php

    const resposta = await dados.json();
    console.log(resposta);

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
   document.getElementById("img_status_vagas" +id ).style.display = "block";
   // ocultar o Botao salvar
   
   document.getElementById("botao_salvar" +id ).style.display = "none";
   document.getElementById("cancelarRG_salvar" +id ).style.display = "none";
   document.getElementById("Select_Option" +id ).style.display = "none";
   document.getElementById("img_Option" +id ).style.display = "none";
   
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
       document.getElementById("img_Option" +id ).style.display = "none";
    
    // apresentar o Botao excluir e de editar
   
    document.getElementById("botao_editar" +id ).style.display = "block";;
   document.getElementById("img_status_vagas" +id ).style.display = "block";
    
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

// aplicação modal
async  function visualizar(id){
   
  
    var array_placa_modal = document.getElementById("valor_placa" + id).innerHTML;
    //console.log('placa: ' +array_placa_modal);
    //console.log('cpf'+array_cpf_modal);
    const dados = await fetch('visualizar.php?id=' +array_placa_modal);
    const resposta = await dados.json();
     if(!resposta['status']){
         document.getElementById('msgAlerta').innerHTML = resposta['msg'];
     }else{
         document.getElementById('msgAlerta').innerHTML = "";
         const visModal = new bootstrap.Modal(document.getElementById('visualiza_status_vaga_index'));
         visModal.show();
          
         var cpf = resposta['dados'].cd_cpf; // CPF original
         var cpfFormatado = cpf.slice(0, 3) + '.***.***.' + cpf.slice(0,2); // Formata o CPF com pontos e barras
         console.log(cpfFormatado); // Saída: "123.456.789-01"
        
         document.getElementById("id_cliente_modal").innerHTML = resposta['dados'].cd_cliente;
         document.getElementById("cpf_cliente_modal").innerHTML = cpfFormatado;
         document.getElementById("nm_cliente_modal").innerHTML = resposta['dados'].nm_cliente;
         document.getElementById("email_cliente_modal").innerHTML = resposta['dados'].cd_email_cliente;
         document.getElementById("bairro_cliente_modal").innerHTML = resposta['dados'].nm_bairro;
         document.getElementById("cidade_cliente_modal").innerHTML = resposta['dados'].nm_cidade;
         document.getElementById("sg_uf_cliente_modal").innerHTML = resposta['dados'].sg_uf;
         document.getElementById("telefone_cliente_modal").innerHTML = resposta['dados'].cd_numero1;
         document.getElementById("placa_cliente_modal").innerHTML = resposta['dados'].cd_placa;
         document.getElementById("modelo_cliente_modal").innerHTML = resposta['dados'].nm_modelo;
         document.getElementById("marca_cliente_modal").innerHTML = resposta['dados'].nm_marca;
         document.getElementById("cor_cliente_modal").innerHTML = resposta['dados'].nm_cor;
     }
     
 }
 // fim
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
          var N_vaga_pesquisa = $(this).find('td:nth-child(1)').text().toLowerCase();
          var nome_vaga_pesquisa = $(this).find('td:nth-child(3)').text().toLowerCase();
          var placa_vaga_pesquisa = $(this).find('td:nth-child(4)').text().toLowerCase();
          var status_vagas_pesquisa = $(this).find('td:nth-child(9)').text().toLowerCase();
          if (N_vaga_pesquisa.indexOf(searchTerm) !== -1 || nome_vaga_pesquisa.indexOf(searchTerm) !== -1 || placa_vaga_pesquisa.indexOf(searchTerm) !== -1 || status_vagas_pesquisa.indexOf(searchTerm) !== -1) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      });