

function toggleMenu(){
    //importa o elemento 'ul do dom
    const listaDoMenu = document.querySelector('ul');
    const activeStatus =  listaDoMenu.getAttribute('active');
    if(activeStatus){
        listaDoMenu.removeAttribute('active');
    }else{
        listaDoMenu.setAttribute('active',true)
    }
    
    

}