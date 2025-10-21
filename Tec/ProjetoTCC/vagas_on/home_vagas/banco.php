<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db_tcc_estacionamento";

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
// $entrar = $_POST["entrar"];
// $telefone = $_POST["telefone"];
// $cpf = $_POST["cpf"];
$mensagemError = "Alerta: algo deu errado!";
$mensagem = "Cadastrado com sucesso!";
$mensagem2 = "Logado com sucesso";

$conn1 = new mysqli($servername, $username, $password, $dbname);
if ($conn1->connect_error) {
    die("Falha na conexão para inserir o email e senha: " . $conn1->connect_error);
}

    $sql1 = 'INSERT INTO tb_usuario (nm_usuario, cd_email_usuario, cd_senha_usuario ) VALUES ('. "'".$nome. "'"  .',' . "'".$email."'".','. "'" .$senha. "'" .')';
//$sql1 =    "INSERT INTO tb_cliente (cd_email_cliente, cd_senha_cliente) 
  //                      VALUES (:cd_email_cliente, :cd_senha_cliente)";

if ($conn1->query($sql1) === TRUE && $nome != '' && $email != '' && $senha != '') {
    echo "<script>alert('$mensagem');window.location.href = './login.php';</script>";
} else {
     echo "<script>alert('$mensagemError'); window.location.href = './login.php';</script>" . $conn1->error;
}


$conn1->close();


$conn2 = new mysqli($servername, $username, $password, $dbname);
if ($conn2->connect_error) {
    die("Falha na conexão para inserir CPF: " . $conn2->connect_error);
}



// $sql2 = 'INSERT INTO tb_pessoa_fisica (cd_cpf) VALUES ('. "'".$cpf. "'"  .')';

// if ($conn2->query($sql2) === TRUE && $cpf != '') {
//      echo "<script>alert('$mensagem');window.location.href = './login.php';</script>";
// } else {
//     echo "<script>alert('$mensagemError'); window.location.href = './login.php';</script>" . $conn2->error;
// }

// $conn2->close();



// $conn3 = new mysqli($servername, $username, $password, $dbname);
// if ($conn3->connect_error) {
//     die("Falha na conexão para inserir o telefone: " . $conn3->connect_error);
// }


// $sql3 = 'INSERT INTO tb_telefone (cd_numero1) VALUES ('. "'".$telefone. "'"   .')';

// if ($conn3->query($sql3) === TRUE && $telefone != '') {
//     echo "<script>alert('$mensagem');window.location.href = './login.php';</script>";
// } else {
//     echo "<script>alert('$mensagemError'); window.location.href = './login.php';</script>" . $conn3->error;
// }

// $conn3->close();


// $conn4 = new mysqli($servername, $username, $password, $dbname);
// if ($conn4->connect_error) {
//     die("Falha na conexão para inserir o email e senha: " . $conn4->connect_error);
// }

//     $sql4 = 'INSERT INTO tb_login (cd_email_cliente, cd_senha_cliente) VALUES ('. "'".$email. "'"  .',' . "'".$senha."'".')';

// if ($conn4->query($sql4) === TRUE && $senha != '' || $email != '') {
//     echo "<script>alert('$mensagem');window.location.href = '../index.php';</script>";
// } else {
//      echo "<script>alert('$mensagemError'); window.location.href = '../index.phpp';</script>" . $conn4->error;
// }

// $conn4->close();

?>

