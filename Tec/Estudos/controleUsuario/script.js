function calcularTotalPrico() {
  var preco = document.getElementById("preco").value;
  var quant = document.getElementById("quantN").value;
  var total = preco * quant;
  if (quant > 10) {
    total = total * 0.9;
  }
  alert("Valor Total R$" + total);
}

function verificarNumeroPar() {
  var n = document.getElementById("quantN").value;
  if(n % 2 === 0) {
    alert("Par");
  } else {
    alert("Ímpar");
  }
}
