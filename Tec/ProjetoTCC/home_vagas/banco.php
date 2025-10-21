<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tcc_estacionamento";


$cpf = $_POST["cpf"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$placa = $_POST["placa"];
$mensagemError = "Alerta: algo deu errado!";
$mensagem = "Cadastrado com sucesso!";


$conn1 = new mysqli($servername, $username, $password, $dbname);
if ($conn1->connect_error) {
    die("Falha na conexão para inserir o email e senha: " . $conn1->connect_error);
}

$sql1 = 'INSERT INTO tb_cliente (cd_email_cliente, cd_senha_cliente ) VALUES ('. "'".$email. "'"  .',' . "'".$senha."'".')';


if ($conn1->query($sql1) === TRUE && $senha != '' || $email != '') {
    echo "<script>alert('$mensagem');window.location.href = 'index.php';</script>";
} else {
     echo "<script>alert('$mensagemError'); window.location.href = 'index.php';</script>" . $conn1->error;
}


$conn1->close();


$conn2 = new mysqli($servername, $username, $password, $dbname);
if ($conn2->connect_error) {
    die("Falha na conexão para inserir CPF: " . $conn2->connect_error);
}


$sql2 = 'INSERT INTO tb_pessoa_fisica (cd_cpf) VALUES ('. "'".$cpf. "'"  .')';

if ($conn2->query($sql2) === TRUE && $cpf != '') {
     echo "<script>alert('$mensagem');window.location.href = 'index.php';</script>";
} else {
    echo "<script>alert('$mensagemError'); window.location.href = 'index.php';</script>" . $conn2->error;
}


$conn2->close();



$conn3 = new mysqli($servername, $username, $password, $dbname);
if ($conn3->connect_error) {
    die("Falha na conexão para inserir a placa: " . $conn3->connect_error);
}


$sql3 = 'INSERT INTO tb_veiculo (cd_placa) VALUES ('. "'".$placa. "'"  .')';

if ($conn3->query($sql3) === TRUE && $placa != '') {
    echo "<script>alert('$mensagem');window.location.href = 'index.php';</script>";
} else {
    echo "<script>alert('$mensagemError'); window.location.href = 'index.php';</script>" . $conn3->error;
}

$conn3->close();
?>

