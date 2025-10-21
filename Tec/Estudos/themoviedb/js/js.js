function myFunction() {
    var input, filter, ul, li, h1, i, txtValue;
  
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
  
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
  
    for (i = 0; i < li.length; i++) {
        h1 = li[i].getElementsByTagName("h1")[0];
        txtValue = h1.textContent || h1.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

// comando do conteudo --------------------------------------

const menu = document.querySelector('ul')
const btnClose = document.querySelector('.btn-close');
const btnOpen = document.querySelector('.btn-open');

btnOpen
btnOpen.onclick = () => {
    menu.classList.remove('close')
  menu.classList.add('open')

}
btnClose.onclick = () => {
  menu.classList.remove('open')
  menu.classList.add('close')
}