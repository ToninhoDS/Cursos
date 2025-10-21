let campo = document.querySelector('#cep');
let campoEndereco = document.querySelector('#endereco');
let campoBairro = document.querySelector('#bairro');
let campoCidade = document.querySelector('#cidade');

campo.addEventListener("blur", consultaEndereco);

function consultaEndereco(){
    let cep = document.querySelector('#cep').value;

    if (cep.length !== 8){
        alert ('CEP Inválido!');
        return;
    }

    let url = `https://viacep.com.br/ws/${cep}/json/`;

    fetch(url)
    .then(response => response.json())
    .then(data => mostrarEndereco(data))
    .catch(error => {
        console.log('Erro ao consultar o CEP: ', error);
        mostrarEndereco(null);
    })
}

function mostrarEndereco(dados) {
    if(dados && !dados.erro) {
        campoEndereco.value = dados.logradouro;
        campoBairro.value = dados.bairro;
        campoCidade.value = dados.localidade;
    } else {
        campoEndereco.value = "";
        campoBairro.value = "";
        campoCidade.value = "";
        alert('Não foi possível localizar o endereço!');
    }
}


   