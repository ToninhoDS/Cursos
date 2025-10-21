

/* Inicio listar os registros do banco de dados */
const tbody = document.querySelector(".listar-usuarios");

// Funcao para listar os registros do banco de dados
const listarUsuarios = async (pagina) => {

    // Fazer a requisicao para o arquivo PHP responsavel em recuperar os registros do banco de dados
    const dados = await fetch("./list_relatorio_lixeira.php?pagina=" + pagina);

    // Ler o objeto retornado pelo arquivo PHP
    const resposta = await dados.json();

    // Acessa o IF quando nao encontrar nenhum registro no banco de dados
    if (!resposta['status']) {
        // Envia a mensagem de erro para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        // Recuperar o SELETOR do HTML que deve receber os registros
        const conteudo = document.querySelector(".listar_relatorio_lixeira");

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

//função reseta a pagina depois de alguns segundos
function resetaPagina(){
    setTimeout(function(){
        // substituir a mensagem 
        window.location.reload(10); 
        
    }, 1000);
   
} 




async function confirma_registro(){

const dados = await fetch('excluir_relatorio_lixeira.php?id=' ); 
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