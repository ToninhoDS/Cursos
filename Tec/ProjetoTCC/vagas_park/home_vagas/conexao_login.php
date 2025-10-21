<?php
session_start();

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

$email = $_POST["email"];
$senha = $_POST["senha"];

$mensagem2 = "Logado com sucesso";
$mensagemError = "Erro ao logar";
$mensagemCampo ="Todos os campos devem ser preenchidos";

//Selecinando as informações do Banco para logar

$sql = "SELECT * FROM tb_usuario WHERE cd_email_usuario = :email AND cd_senha_usuario = :senha";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $_SESSION['nome'] = $row['nm_usuario'];
    $_SESSION['id'] = $row['cd_usuario'];
    echo "<script>window.location.href = './home-usuario.php';</script>";
    exit();
} else{ 
    echo "<script>window.location.href = './login.php';</script>";
}

$conn = null;

?>




