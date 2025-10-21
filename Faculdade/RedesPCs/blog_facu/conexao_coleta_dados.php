<?php
// Configuração do banco de dados
$host = "sql10.freesqldatabase.com"; // Substitua pelo IP ou domínio, se necessário
$username = "sql10757671"; // Nome de usuário do banco
$password = "GpV8bDt6i4"; // Senha do banco
$dbname = "sql10757671"; // Nome do banco

// Conexão com o banco
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Recebe os dados enviados pelo JavaScript
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    // Extrai as informações
    $ip_address = $_SERVER['REMOTE_ADDR']; // Captura o IP do visitante
    $usuario_id = isset($data['usuario_id']) ? $data['usuario_id'] : null;
    $data_acesso = date("Y-m-d");
    $hora_acesso = date("H:i:s");
    $tempo_permanencia = isset($data['tempo_permanencia']) ? $data['tempo_permanencia'] : null;
    $dispositivo = isset($data['dispositivo']) ? $data['dispositivo'] : 'Desconhecido';
    $navegador = isset($data['navegador']) ? $data['navegador'] : $_SERVER['HTTP_USER_AGENT'];
    $sistema_operacional = isset($data['sistema_operacional']) ? $data['sistema_operacional'] : 'Desconhecido';

    // Insere os dados no banco
    $stmt = $conn->prepare("INSERT INTO acesso_site (usuario_id, ip_address, data_acesso, hora_acesso, tempo_permanencia, dispositivo, navegador, sistema_operacional) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssisss", $usuario_id, $ip_address, $data_acesso, $hora_acesso, $tempo_permanencia, $dispositivo, $navegador, $sistema_operacional);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Dados registrados com sucesso."]);
    } else {
        echo json_encode(["success" => false, "message" => "Erro ao registrar dados: " . $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
?>

