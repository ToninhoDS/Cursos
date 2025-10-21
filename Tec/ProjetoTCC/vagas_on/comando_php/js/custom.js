

/* Inicio listar os registros do banco de dados */
const tbody = document.querySelector(".listar-usuarios");

// Funcao para listar os registros do banco de dados
const listarUsuarios = async (pagina) => {

    // Fazer a requisicao para o arquivo PHP responsavel em recuperar os registros do banco de dados
    const dados = await fetch("./list.php?pagina=" + pagina);

    // Ler o objeto retornado pelo arquivo PHP
    const resposta = await dados.json();

    // Acessa o IF quando nao encontrar nenhum registro no banco de dados
    if (!resposta['status']) {
        // Envia a mensagem de erro para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
        removerMsgALerta();
    } else {
        // Recuperar o SELETOR do HTML que deve receber os registros
        const conteudo = document.querySelector(".listar-clientes");

        // Somente acessa o IF quando existir o SELETOR ".listar-usuarios"
        if (conteudo) {

            // Enviar os dados para o arquivo HTML
            conteudo.innerHTML = resposta['dados'];
        }
    }
}

// Chamar a funcao para listar os registro do banco de dados
listarUsuarios(1);
const Modal_cliente_Form = document.getElementById("edit_formulario_cliente");

function editar_registro(id){
    console.log(id);
//   ocultar o Botao editar
   document.getElementById("botao_editar" +id ).style.display = "none";

// apresentar o Botao salvar
document.getElementById("botao_salvar" +id ).style.display = "block";


//   ocultar o Botao excluir
document.getElementById("botao_excluir" +id ).style.display = "none";
document.getElementById("cancelarRG_salvar" +id ).style.display = "block";
//   recuperar o registro

   var nome = document.getElementById("valor_nome" + id);
   var cpf = document.getElementById("valor_cpf" + id);
   var placa= document.getElementById("valor_placa" + id);
   var email = document.getElementById("valor_email" + id);
   var telefone= document.getElementById("valor_telefone" + id);
    console.log(email);
// controle do input 
   
//    subistituir o texto em input

nome.innerHTML = "<input type='text' id='nome_text" + id + "' value='"+ nome.innerHTML +"' size='10' maxlength='50'>";
cpf.innerHTML = "<input type='text' id='cpf_text" + id + "' value='"+ cpf.innerHTML +"' size='10' maxlength='50'>";
placa.innerHTML = "<input type='text' id='placa_text" + id + "' value='"+ placa.innerHTML +"' size='10' maxlength='50'>";
email.innerHTML = "<input type='text' id='email_text"  + id + "' value='"+ email.innerHTML +"' size='20' maxlength='50'>";
telefone.innerHTML = "<input type='text' id='telefone_text" + id + "' value='"+ telefone.innerHTML +"' size='10' maxlength='50'>";


}

// cancelar a pagar
function cancelar_excluir(id){
    //   ocultar o Botao confirmar e de cancelar e cancelar excluir
       document.getElementById("botao_confirma" +id ).style.display = "none";
       document.getElementById("botao_excluir_cancelar" +id ).style.display = "none";
    
    // apresentar o Botao excluir e de editar
    document.getElementById("botao_excluir" +id ).style.display = "block";
    document.getElementById("botao_editar" +id ).style.display = "block";
    

}

// substituir o texto e salvar

async function salvar_registro(id){
    // recuperar o valor do camppo
    var nome_valor = document.getElementById("nome_text" +id).value;
    var cpf_valor = document.getElementById("cpf_text" +id).value;
    var placa_valor = document.getElementById("placa_text" +id).value;
    var email_valor = document.getElementById("email_text" +id).value;
    var telefone_valor = document.getElementById("telefone_text" +id).value;
   
    document.getElementById("valor_nome" + id).innerHTML = nome_valor;
    document.getElementById("valor_cpf" + id).innerHTML = cpf_valor;
    document.getElementById("valor_placa" + id).innerHTML = placa_valor;
    document.getElementById("valor_email" + id).innerHTML = email_valor;
    document.getElementById("valor_telefone" + id).innerHTML = telefone_valor;

    // salvar dados para enviar em uma string e mandar para banco de dados

    var dadosForm = "id=" + id + "&nome=" + nome_valor + "&cpf=" + cpf_valor 
    + "&placa=" + placa_valor + "&email=" + email_valor + "&telefone=" + telefone_valor;

    // fazer requisicao com FEtch para um arquivo php e enviar patravez do metodo POST dados do formulario
   
    const dados = await fetch("editar.php",{
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
        
        // agora ocultar e inverter o botão
        removerMsgALerta();

        //   apresentar o Botao editar

        //   apresentar o Botao editar
   document.getElementById("botao_editar" +id ).style.display = "block";;
   document.getElementById("botao_excluir" +id ).style.display = "block";
   // ocultar o Botao salvar
   
   document.getElementById("botao_salvar" +id ).style.display = "none";
   document.getElementById("cancelarRG_salvar" +id ).style.display = "none";
   document.getElementById("Select_Option" +id ).style.display = "none";
   
    //   apresentar o Botao excluir
    
    listarUsuarios(1);
     //window.location.reload(10); // carrega a pagina
    }
    
}

// cancelar a edição
function cancelar_registro(id){
    //   ocultar o Botao confirmar e de cancelar e cancelar excluir
       document.getElementById("cancelarRG_salvar" +id ).style.display = "none";
       document.getElementById("botao_salvar" +id ).style.display = "none";
    
    // apresentar o Botao excluir e de editar
    document.getElementById("botao_excluir" +id ).style.display = "block";
    document.getElementById("botao_editar" +id ).style.display = "block";
    resetaPagina();

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
function removerSalvando(){
    setTimeout(function(){
        // substituir a mensagem 
        //document.getElementById('edit-usuario-btn').value ="Concluido...";
        document.getElementById("msgAlertaErroEdit").innerHTML ="";
        $('#visualiza_status_vaga').modal('hide');
        // colocar o milisegundos que precisa 2000
        
    }, 250);
   
} 
function mostrarConfirmação(){
    setTimeout(function(){
        // substituir a mensagem 
        document.getElementById('msgCardconfirmacao').innerHTML ="Salvando no Banco de Dados....";
        $('#msgCardSucesso').modal('show');
        // colocar o milisegundos que precisa 2000
   
    }, 350);
   
} 
function edicaoConcluida(){
    setTimeout(function(){
        // substituir a mensagem 
        document.getElementById('msgCardconfirmacao').innerHTML ="<h3 style='font-size:25px'>Dados do Cliente, <strong>Atualizados!!!</strong></h3>";
        // colocar o milisegundos que precisa 2000
   
    }, 2000);
   
} 



async function excluir_registro(id){
    
    //   ocultar o Botao excluir
   document.getElementById("botao_excluir" +id ).style.display = "none";
   // apresentar o Botao confirmar
   document.getElementById("botao_confirma" +id ).style.display = "block";

   document.getElementById("botao_excluir_cancelar" +id ).style.display = "block";

    //   ocultar o Botao Editar
    document.getElementById("botao_editar" +id ).style.display = "none";

   //   chamar uma função para remover a mensagem apos alguns segundos
   
}

// confirmar exclusao

async function confirma_registro(id){

var  $id_valor = document.getElementById("valor_id" + id).innerHTML;
console.log("excluir > id> " +id); // olhar se chamou a função


// fazer requisicao com FEtch para um arquivo php e enviar patravez do metodo POST dados do formulario
const dados = await fetch('excluir_restricao.php?id=' + id); // atribuir a uma constante

const retorna = await dados.json();
if(retorna['erro']){
    msgAlerta.innerHTML = retorna['msg'];
  

    }else{
        msgAlerta.innerHTML =retorna['msg'];
        //  atualizar a pagina 
        removerMsgALerta();

        listarUsuarios(1);

    }
}

// criar uma função que  reseta os botoes de editar e excluir


// criando função que visualizar as informaçoes

async  function visualizar(id){
    document.getElementById("msgAlertaErroEdit").innerHTML = "";
    document.getElementById('edit-usuario-btn').value ="Editar";

    var array_placa_modal = document.getElementById("valor_placa" + id).innerHTML;
    //console.log('placa: ' +array_placa_modal);
    const dados = await fetch('visualizar.php?id=' +array_placa_modal);
    const resposta = await dados.json();
    //console.log(resposta);
  
    if(!resposta['status']){
        document.getElementById('msgAlerta').innerHTML = resposta['msg'];
    }else{
        console.log('dsdos modal',resposta);
        document.getElementById('msgAlerta').innerHTML = "";
        const visModal = new bootstrap.Modal(document.getElementById('visualiza_status_vaga'));
        visModal.show();
 
        //var cpf = resposta['dados'].cd_cpf; // CPF original
        //var cpfFormatado = cpf.slice(0, 3) + '.***.***.' + cpf.slice(0,2); // Formata o CPF com pontos e barras
        //console.log(cpfFormatado); // Saída: "123.456.789-01"
       
        document.getElementById("id_cliente_modal").value = resposta['dados'].cd_cliente;
        document.getElementById("cpf_cliente_modal").value = resposta['dados'].cd_cpf;
        //document.getElementById("cpf_cliente_modal").innerHTML = cpfFormatado; ocultar o cpf
        document.getElementById("nm_cliente_modal").value = resposta['dados'].nm_cliente;
        document.getElementById("email_cliente_modal").value = resposta['dados'].cd_email_cliente;
        document.getElementById("bairro_cliente_modal").value = resposta['dados'].nm_bairro;
        document.getElementById("cidade_cliente_modal").value = resposta['dados'].nm_cidade;
        document.getElementById("sg_uf_cliente_modal").value = resposta['dados'].sg_uf;
        document.getElementById("telefone_cliente_modal").value = resposta['dados'].cd_numero1;
        document.getElementById("placa_cliente_modal").value = resposta['dados'].cd_placa;
        document.getElementById("modelo_cliente_modal").value = resposta['dados'].nm_modelo;
        document.getElementById("marca_cliente_modal").value = resposta['dados'].nm_marca;
        document.getElementById("cor_cliente_modal").value = resposta['dados'].nm_cor;
    }
    
}

//Editar os dadso do modal
const editForm = document.getElementById("edit_formulario_cliente");
//console.log(editForm);
if(editForm){
    editForm.addEventListener("submit", async (e)=>{
        e.preventDefault();

        const dadosForm = new FormData(editForm);

        document.getElementById('edit-usuario-btn').value ="Salvando....";
        
       const dados = await fetch("editar_modal.php",{
            method:"POST",
            body: dadosForm
        });
       
        const resposta = await dados.json();
        console.log(resposta);
       
        if(!resposta['status']){

            document.getElementById("msgAlertaErroEdit").innerHTML = resposta['msg'];
            document.getElementById('msgCardconfirmacao').value ="Salvando....";
            
        
        }else{
           
            removerSalvando();
            mostrarConfirmação();
            edicaoConcluida();
           listarUsuarios(1);
            
         }
         });
         
}

// mandar dropdawn aberto 

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
          var N_vaga_pesquisa = $(this).find('td:nth-child(2)').text().toLowerCase();
          var nome_vaga_pesquisa = $(this).find('td:nth-child(3)').text().toLowerCase();
          var placa_vaga_pesquisa = $(this).find('td:nth-child(4)').text().toLowerCase();
          var status_vagas_pesquisa = $(this).find('td:nth-child(6)').text().toLowerCase();
          if (N_vaga_pesquisa.indexOf(searchTerm) !== -1 || nome_vaga_pesquisa.indexOf(searchTerm) !== -1 || placa_vaga_pesquisa.indexOf(searchTerm) !== -1 || status_vagas_pesquisa.indexOf(searchTerm) !== -1) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      });
