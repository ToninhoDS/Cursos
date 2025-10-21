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

if($_SERVER["REQUEST_METHOD"] === "POST") {

$placaCarro = $_POST['placa_carro'];
$modeloCarro = $_POST['modelo_carro'];
$corCarro = $_POST['cor_carro'];

$stmtCor = "SELECT cd_cor FROM tb_cor WHERE nm_cor = :nm_cor";
$verificarCor = $conn->prepare($stmtCor);
$verificarCor->bindParam(':nm_cor', $corCarro);
$verificarCor->execute();
$cdCor = $verificarCor->fetchColumn();

if(!$cdCor) {
    $methodInserirCor = "INSERT INTO tb_cor (nm_cor) VALUES (:nm_cor)";
    $inserirCor = $conn->prepare($methodInserirCor);
    $inserirCor->bindParam(':nm_cor', $corCarro);
    $inserirCor->execute();

    $cdCor = $conn->lastInsertId();
}

$stmtModelo = "SELECT cd_modelo FROM tb_modelo WHERE nm_modelo = :nm_modelo";
$verificarModelo = $conn->prepare($stmtModelo);
$verificarModelo->bindParam(':nm_modelo', $modeloCarro);
$verificarModelo->execute();
$cdModelo = $verificarModelo->fetchColumn();

if(!$cdModelo) {
    $methodInserirModelo = "INSERT INTO tb_modelo (nm_modelo) VALUES (:nm_modelo)";
    $inserirModelo = $conn->prepare($methodInserirModelo);
    $inserirModelo->bindParam(':nm_modelo', $modeloCarro);
    $inserirModelo->execute();

    $cdModelo = $conn->lastInsertId();
}

$stmt = "INSERT INTO tb_veiculo (cd_placa, cd_cor, cd_modelo, cd_usuario) VALUES (:cd_placa, :cd_cor, :cd_modelo, :cd_usuario)";
$inserir_veiculo = $conn->prepare($stmt);
$inserir_veiculo->bindParam(':cd_placa', $placaCarro);
$inserir_veiculo->bindParam(':cd_cor', $cdCor);
$inserir_veiculo->bindParam(':cd_modelo', $cdModelo);
$inserir_veiculo->bindParam(':cd_usuario', $_SESSION['id']);

$inserir_veiculo->execute();

echo '
<script>
alert("Veículo cadastrado!")
window.location.href = "veiculos.php";
</script>';
exit();
}


$sql = "SELECT tb_veiculo.cd_placa, tb_cor.nm_cor, tb_modelo.nm_modelo
FROM tb_veiculo
LEFT JOIN tb_cor ON tb_veiculo.cd_cor = tb_cor.cd_cor
LEFT JOIN tb_modelo ON tb_veiculo.cd_modelo = tb_modelo.cd_modelo
WHERE tb_veiculo.cd_usuario = :cd_usuario";
$informacoesVeiculo = $conn->prepare($sql);
$informacoesVeiculo->bindParam(':cd_usuario', $_SESSION['id']);
$informacoesVeiculo->execute();

if($informacoesVeiculo->rowCount() > 0) {
    $row = $informacoesVeiculo->fetch(PDO::FETCH_ASSOC);

    $placa = $row['cd_placa'];
    $modelo = $row['nm_modelo'];
    $cor = $row['nm_cor'];

}