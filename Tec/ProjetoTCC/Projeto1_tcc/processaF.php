<?php
//iniciar a sessao
session_start();
//limpar o buffer de saida
ob_start();
//conexao com banco de dados
include_once "conexao.php";
// vai receber os dados

$nm_bairro= $_GET['nm_bairro'];





//ENDERECO


 // MOSTRAR OS DADOS  QUE ESTA NA ARRAY
   // tabela cliente

    // tabela bairro
    $sql ='INSERT INTO tb_bairro (nm_bairro)
    VALUES ('. "'" . $nm_bairro ."'" . ')';
    $fim_comando = $conn->prepare($sql);
  
    //Fim


  
  




if($conn->query($sql) === TRUE){
    //criar a variavel global para salvar a mensagem de sucesso    
    $_SESSION['msg'] = '<div class="alert alert-success" style="text-align: center;font-size:40px" role="alert">
    "Usuário Cadastrado com sucesso!!!
  </div>';
    //Redirecionar o Usuário
    header("Location: index.php");
  
 }else{
 //criar a variavel global para salvar a mensagem de sucesso    
 $_SESSION['msg'] = '<div class="alert alert-danger" style="text-align: center;font-size:40px" role="alert">
 "Usuário Cadastrado com sucesso!!!
</div>';
 //Redirecionar o Usuário
 header("Location: index.php").$sql . "<br>" . $conn->error;
}


$conn->close();
?>
  