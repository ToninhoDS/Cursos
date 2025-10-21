

const input = document.getElementById('filtro');
const trs = document.getElementById('lista');

input.addEventListener('keyup' , ()=>{
    let expressao = input.value.toLocaleLowerCase();
        if(expressao.length === 1){
            return;
        }
    let linhas = trs.getElementsByTagName("tr");

    for (let posicao in linhas){
        if (true === isNaN(posicao)){
            continue;
        }
        let conteudoLinha = linhas[posicao].innerHTML.toLocaleLowerCase();
        if(true === conteudoLinha.includes(expressao)){
            linhas[posicao].style.display ='';
        }else{
            linhas[posicao].style.display ='none';
        }
    }
    
});

function editar_registro(id){
    var nomeBairro = document.getElementById("id_bairro");
        console.log(nomeBairro);
    // subistituir o texto  por input

    nomeBairro.innerHTML = "<input type='text' id='nome_texto" +id+ "' value='" + nomeBairro.innerHTML + "'>";
}