

/* Inicio listar os registros do banco de dados */
const tbody = document.querySelector(".listar-usuarios");

// Funcao para listar os registros do banco de dados
const listarUsuarios = async (pagina) => {

    // Fazer a requisicao para o arquivo PHP responsavel em recuperar os registros do banco de dados
    const dados = await fetch("./list_relatorio_atividade.php?pagina=" + pagina);

    // Ler o objeto retornado pelo arquivo PHP
    const resposta = await dados.json();

    // Acessa o IF quando nao encontrar nenhum registro no banco de dados
    if (!resposta['status']) {
        // Envia a mensagem de erro para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        // Recuperar o SELETOR do HTML que deve receber os registros
        const conteudo = document.querySelector(".listar-relatorio_atividade");

        // Somente acessa o IF quando existir o SELETOR ".listar-relatorio_atividade"
        if (conteudo) {

            // Enviar os dados para o arquivo HTML
            conteudo.innerHTML = resposta['dados'];
        }
    }
}

// Chamar a funcao para listar os registro do banco de dados
listarUsuarios(1);

// iniciar função de remoção de mensagem
function removerMsgALerta(){
    setTimeout(function(){
        // substituir a mensagem 
        document.getElementById("msgAlerta").innerHTML = "";
        // colocar o milisegundos que precisa 2000
   
    }, 1000);
   
}
function resetaPagina(){
    setTimeout(function(){
        // substituir a mensagem 
        window.location.reload(10); 
        
    }, 1000);
   
} 


function excluir_check(id){
    var check_box = document.getElementById("id_check" + id).innerHTML;
    console.log(check_box);




}

function cancelar_excluir(id){
    //   ocultar o Botao confirmar e de cancelar e cancelar excluir
       document.getElementById("botao_confirma" +id ).style.display = "none";
       document.getElementById("botao_excluir_cancelar" +id ).style.display = "none";
    
    // apresentar o Botao excluir e de editar
    document.getElementById("botao_excluir" +id ).style.display = "block";
    

}

async function excluir_registro(id){
    
    //   ocultar o Botao excluir
   document.getElementById("botao_excluir" +id ).style.display = "none";
   // apresentar o Botao confirmar
   document.getElementById("botao_confirma" +id ).style.display = "block";

   document.getElementById("botao_excluir_cancelar" +id ).style.display = "block";


   
}

// confirmar exclusao

async function confirma_registro(id){

var  $id_valor = document.getElementById("valor_id" + id).innerHTML;
console.log("ecluir id> " +id); // olhar se chamou a função


// fazer requisicao com FEtch para um arquivo php e enviar patravez do metodo POST dados do formulario

const dados = await fetch('excluir_relatorio_atividade.php?id=' + id); // atribuir a uma constante

const retorna = await dados.json();
if(retorna['erro']){
    msgAlerta.innerHTML = retorna['msg'];
    console.log('voltei');
        listarUsuarios(1);
        removerMsgALerta();
        resetaPagina();
    }else{
        msgAlerta.innerHTML =retorna['msg'];
        //  atualizar a pagina 
        
        listarUsuarios(1);
        removerMsgALerta();
        resetaPagina();
    }
}

async function confirma_limpeza(){

    const dados = await fetch('limpar_tudo_relatorio.php?id='); 
    const retorna = await dados.json();
    if(retorna['erro']){
        msgAlerta.innerHTML = retorna['msg'];
        resetaPagina()
        removerMsgALerta();
    
        }else{
            msgAlerta.innerHTML =retorna['msg'];
            //  atualizar a pagina 
            removerMsgALerta();
            resetaPagina()
            listarUsuarios(1);
    
        }
    }

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
          var N_pesquisa = $(this).find('td:nth-child(1)').text().toLowerCase();
          var acao_pesquisa = $(this).find('td:nth-child(3)').text().toLowerCase();
          var origem_pesquisa = $(this).find('td:nth-child(4)').text().toLowerCase();
          var funcionario_pesquisa = $(this).find('td:nth-child(6)').text().toLowerCase();
          var hora_pesquisa = $(this).find('td:nth-child(7)').text().toLowerCase();
          var datas_pesquisa = $(this).find('td:nth-child(8)').text().toLowerCase();
          if (N_pesquisa.indexOf(searchTerm) !== -1 || acao_pesquisa.indexOf(searchTerm) !== -1 || origem_pesquisa.indexOf(searchTerm) !== -1 || funcionario_pesquisa.indexOf(searchTerm) !== -1 || hora_pesquisa.indexOf(searchTerm) !== -1 || datas_pesquisa.indexOf(searchTerm) !== -1) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      });