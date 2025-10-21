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

$mensagem = "Atualizados com sucesso!";

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $cpf = $_POST["cpf"];
    $cep = $_POST["cep"];
    $logradouro = $_POST["endereco"];
    $nmbairro = $_POST["bairro"];
    $nmcidade = $_POST["cidade"];
    $nmendereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $cd_usuario = $_SESSION['id'];

    $sql1 = "UPDATE tb_usuario SET cd_cpf = :cd_cpf WHERE cd_usuario = :cd_usuario";

    $atualizando_dados = $conn->prepare($sql1);
    $atualizando_dados->bindParam(':cd_cpf', $cpf, PDO::PARAM_STR);
    $atualizando_dados->bindParam(':cd_usuario', $cd_usuario, PDO::PARAM_INT);
    $atualizando_dados->execute();

    $sql3 = "UPDATE tb_usuario SET cd_cep = :cd_cep WHERE cd_usuario = :cd_usuario";
    $atualizando_dados2 = $conn->prepare($sql3);
    $atualizando_dados2->bindParam(':cd_cep', $cep, PDO::PARAM_STR);
    $atualizando_dados2->bindParam(':cd_usuario', $cd_usuario, PDO::PARAM_INT);
    $atualizando_dados2->execute();

    $sql6 = "UPDATE tb_usuario SET nm_endereco = :nm_endereco WHERE cd_usuario = :cd_usuario";
    $atualizando_dados3 = $conn->prepare($sql6);
    $atualizando_dados3->bindParam(':nm_endereco', $nmendereco, PDO::PARAM_STR);
    $atualizando_dados3->bindParam(':cd_usuario', $cd_usuario, PDO::PARAM_INT);
    $atualizando_dados3->execute();

    $sqlVerificarCidade = "SELECT cd_cidade FROM tb_cidade WHERE nm_cidade = :nm_cidade";
    $verificar_cidade = $conn->prepare($sqlVerificarCidade);
    $verificar_cidade->bindParam(':nm_cidade', $nmcidade, PDO::PARAM_STR);
    $verificar_cidade->execute();

    $cidade_id = $verificar_cidade->fetchColumn();

    if ($cidade_id) {
        // A cidade já existe, então atualize o nome da cidade na tabela tb_cidade
        $sqlAtualizarCidade = "UPDATE tb_cidade SET nm_cidade = :nm_cidade WHERE cd_cidade = :cd_cidade";
        $atualizar_cidade = $conn->prepare($sqlAtualizarCidade);
        $atualizar_cidade->bindParam(':nm_cidade', $nmcidade, PDO::PARAM_STR);
        $atualizar_cidade->bindParam(':cd_cidade', $cidade_id, PDO::PARAM_INT);
        $atualizar_cidade->execute();
    } else {
        // A cidade não existe, então insira um novo registro na tabela tb_cidade
        $sqlInserirCidade = "INSERT INTO tb_cidade (nm_cidade) VALUES (:nm_cidade)";
        $inserir_cidade = $conn->prepare($sqlInserirCidade);
        $inserir_cidade->bindParam(':nm_cidade', $nmcidade, PDO::PARAM_STR);
        $inserir_cidade->execute();

        $cidade_id = $conn->lastInsertId();
    }


    $sqlVerificar = "SELECT cd_bairro FROM tb_usuario WHERE cd_usuario = :cd_usuario";
    $verificar_bairro = $conn->prepare($sqlVerificar);
    $verificar_bairro->bindParam(':cd_usuario', $cd_usuario, PDO::PARAM_INT);
    $verificar_bairro->execute();

    $bairro_id = $verificar_bairro->fetchColumn();

    if($bairro_id) {
        $sqlAtualizarBairro = "UPDATE tb_bairro SET nm_bairro = :nm_bairro, cd_cidade = :cd_cidade WHERE cd_bairro = :cd_bairro";
        $atualizar_bairro = $conn->prepare($sqlAtualizarBairro);
        $atualizar_bairro->bindParam(':nm_bairro', $nmbairro, PDO::PARAM_STR);
        $atualizar_bairro->bindParam(':cd_cidade', $cidade_id, PDO::PARAM_INT);
        $atualizar_bairro->bindParam(':cd_bairro', $bairro_id, PDO::PARAM_INT);
        $atualizar_bairro->execute();
    } else {
        $sql4 = "INSERT INTO tb_bairro (nm_bairro, cd_cidade) VALUES (:nm_bairro, :cd_cidade)";
        $inserir_bairro = $conn->prepare($sql4);
        $inserir_bairro->bindParam(':nm_bairro', $nmbairro, PDO::PARAM_STR);
        $inserir_bairro->bindParam(':cd_cidade', $cidade_id, PDO::PARAM_STR);
        $inserir_bairro->execute();

        $bairro_id = $conn->lastInsertId();

        $sql5 = "UPDATE tb_usuario SET cd_bairro = :cd_bairro WHERE cd_usuario = :cd_usuario";
        $atualizando_bairro = $conn->prepare($sql5);
        $atualizando_bairro->bindParam(':cd_bairro', $bairro_id, PDO::PARAM_INT);
        $atualizando_bairro->bindParam(':cd_usuario', $cd_usuario, PDO::PARAM_INT);
        $atualizando_bairro->execute();
    }

    if (isset($_FILES['img_perfil']) && $_FILES['img_perfil']['error'] === UPLOAD_ERR_OK) {
        $fileInfo = $_FILES['img_perfil'];
        $mime = getimagesize($fileInfo['tmp_name'])['mime'];
        $allowedMimeTypes = ['image/jpeg', 'image/png'];

        if(!in_array($mime, $allowedMimeTypes)){
            echo "<script>alert('Arquivo inválido')</script>";
        }

        $uploadDir = './img_perfil/';
        $fileName = uniqid('perfil_') . '.' . pathinfo($fileInfo['name'], PATHINFO_EXTENSION);
        $destination = $uploadDir . '/' . $fileName;

        if (!move_uploaded_file($fileInfo['tmp_name'], $destination)) {
            echo "<script>alert('Erro ao mover o arquivo')</script>";
        } else {
            //excluir foto de perfil antiga
            $sqlFotoAntiga = "SELECT img_perfil FROM tb_usuario WHERE cd_usuario = :cd_usuario";
            $stmtFotoAntiga = $conn->prepare($sqlFotoAntiga);
            $stmtFotoAntiga->bindParam(':cd_usuario', $cd_usuario, PDO::PARAM_INT);
            $stmtFotoAntiga->execute();
            $resultFotoAntiga = $stmtFotoAntiga->fetch(PDO::FETCH_ASSOC);

            if($resultFotoAntiga && $resultFotoAntiga['img_perfil']) {
                $fotoAntiga = './img_perfil/' . $resultFotoAntiga['img_perfil'];
                if(file_exists($fotoAntiga)) {
                    unlink($fotoAntiga);
                }
            }

            // atualizar foto do usuário
            $sqlFoto = "UPDATE tb_usuario SET img_perfil = :img_perfil WHERE cd_usuario = :cd_usuario";
            $imgUsuario = $conn->prepare($sqlFoto);
            $imgUsuario->bindParam(':img_perfil', $fileName);
            $imgUsuario->bindParam(':cd_usuario', $cd_usuario, PDO::PARAM_INT);
            $imgUsuario->execute();

            echo "<script>alert('Foto de perfil atualizada com sucesso!')</script>";
        }

    }

    echo '<script>window.location.href = "infoconta.php";</script>';
    exit();
}

$sql2 = "SELECT tb_usuario.*, tb_bairro.nm_bairro, tb_cidade.nm_cidade
FROM tb_usuario 
LEFT JOIN tb_bairro ON tb_usuario.cd_bairro = tb_bairro.cd_bairro
LEFT JOIN tb_cidade ON tb_bairro.cd_cidade = tb_cidade.cd_cidade 
WHERE tb_usuario.cd_usuario = :cd_usuario";
$stmt = $conn->prepare($sql2);
$stmt->bindParam(':cd_usuario', $_SESSION['id'], PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $cpf = $row['cd_cpf'];
    $nome = $row['nm_usuario'];
    $cep = $row['cd_cep'];
    $bairro = $row['nm_bairro'];
    $cidade = $row['nm_cidade'];
    $endereco = $row['nm_endereco'];

    if(!empty($row['img_perfil'])) {
        $fotoPerfil = './img_perfil/' . $row['img_perfil'];
    } else {
        $fotoPerfil = './img_perfil/default-perfil.png';
    }
} else {
    echo '<script>alert('.$mensagem.')</script>';
}

?>

