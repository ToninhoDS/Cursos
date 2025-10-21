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

    $sqlCliente = "INSERT INTO tb_cliente (cd_email_cliente, cd_senha_cliente, nm_cliente, cd_usuario) VALUES (?, ?, ?, ?)";
    $stmtCliente = $conn->prepare($sqlCliente);

    $stmtCliente->execute([$_SESSION['email'], $_SESSION['senha'], $_SESSION['nome'], $_SESSION['id']]);

    if($stmtCliente->rowCount() > 0) {
        echo "<script>
                   alert('Dados inseridos com sucesso!')
                   window.location.href = 'home-usuario.php';
              </script>";
        exit;
    } else {
        echo "<script>alert('Erro ao inserir dados.')</script>";
    }

?>

