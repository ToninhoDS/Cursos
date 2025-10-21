
/* Inicio listar os registros do banco de dados */


// Funcao para listar os registros do banco de dados
const listarUsuariosSessao = async (paginaSessao) => {

    // Fazer a requisicao para o arquivo PHP responsavel em recuperar os registros do banco de dados
    const dados_sessao = await fetch("./list_sessao_adm.php?paginaSessao=" + paginaSessao);

    // Ler o objeto retornado pelo arquivo PHP
    const resposta_sessao = await dados_sessao.json();

    // Acessa o IF quando nao encontrar nenhum registro no banco de dados_sessao
    if (!resposta_sessao['status']) {
        // Envia a mensagem de erro para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta_sessao['msg'];
    } else {
        // Recuperar o SELETOR do HTML que deve receber os registros
        const conteudo = document.querySelector(".listar_parceiros_sessaoadm");

        // Somente acessa o IF quando existir o SELETOR ".listar-usuarios"
        if (conteudo) {

            // Enviar os dados para o arquivo HTML
            conteudo.innerHTML = resposta_sessao['dados_sessao'];
        }
    }
}

listarUsuariosSessao(1);
