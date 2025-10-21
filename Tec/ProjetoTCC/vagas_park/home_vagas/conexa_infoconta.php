 <!-- Conexão para pegar as inforamações do cadastro do usuário  -->


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

$tbUsuario =  "SELECT nm_usuario, cd_email_usuario FROM tb_usuario";
$result = $conn->query($tbUsuario);
$row = $result->fetch(PDO::FETCH_ASSOC);
$nomeUsuario = $row['nm_usuario'];
$emailUsuario = $row['cd_email_usuario'];


