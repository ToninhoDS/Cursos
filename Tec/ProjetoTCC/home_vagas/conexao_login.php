<?php
$host = "localhost:3306";
$dbname = "db_tcc_estacionamento";
$user = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$placa = $_POST["placa"];


$sql = "INSERT INTO tb_cadastro (nome, cpf, email, senha, placa) VALUES (:nome, :cpf, :email, :senha, :placa)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha);
$stmt->bindParam(':placa', $placa);
$stmt->execute();

echo "Dados salvos com sucesso";
?>




