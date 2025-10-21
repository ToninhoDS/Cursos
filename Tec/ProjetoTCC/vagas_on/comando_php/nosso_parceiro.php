<?php

// session_start(); // Iniciar a sessão

// Limpara o buffer de redirecionamento
ob_start();

include_once "crud_php/conexao_cadastro.php";

// Incluir o arquivo que possui as configurações
include_once '../adm/config/config.php';

// Incluir o arquivo com a conexão com banco de dados
include_once '../adm/lib/conexao.php';

?>

<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- DE CIMA E VALIDO -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/vagas_park/home_vagas/css/nosso_parceir2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/logotipoSglas.ico"/>
    <title>VAGASPARK</title>
</head>
<body>

          <!-- iNICIAR FORMULARIO E O LOGIN -->
    <?php
  
?>
    

    <?php
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Acessa o IF quando o usuário clicou no botão "Acessar" do formulário
if (!empty($dados['SendLogin'])) {
    //var_dump($dados);

        $email = $dados['usuario'];
                // Prepara a consulta SQL
                $stmt = $conn->prepare("SELECT COUNT(*) FROM tb_gerente WHERE nm_email = :email");
                
                // Executa a consulta
                $stmt->execute(array(':email' => $email));
                
                // Obtém o resultado da contagem
                $count = $stmt->fetchColumn();
                
                if (!$count > 0) { // caso seja funcionario ira usar essa estrutura

                      $nm_empresa = 'Empresa Vagas Park, São Vicente';
                      $func_Relat_Ativ = "$email";
                      $gerente_Relat_Ativ = null;
                      $nm_descricao_acao ='Ação LOGIN Funcionario';
                      $cargo = 'Funcionario';
                      $acao_Relatorio_Atividade ='Funcionario fez LOGIN';
                      $nm_origem ='Tela de LOGIN Sistema';
                      $img_icon ='visaosem.png';
                          $acao_Relatorio_Atividade = 'LOGIN';
                                    //Registro do Sistema 'tabela Ocuta' 
                      $registro_de_sistema = "INSERT INTO tb_registro_de_sistema (nm_nome_acao, nm_descricao_acao, nm_origem, nm_funcionario, nm_empresa, dt_hora, dt_data, img_icon, nm_gerente, nm_cargo )

                      VALUES (:nm_nome_acao, :nm_descricao_acao, :nm_origem, :nm_funcionario, :nm_empresa, :dt_hora, :dt_data, :img_icon, :nm_gerente, :nm_cargo )";
                      $cadastrar_registro_de_sistema = $conn->prepare($registro_de_sistema);
                      $cadastrar_registro_de_sistema->bindParam(':nm_nome_acao',  $acao_Relatorio_Atividade);
                      $cadastrar_registro_de_sistema->bindParam(':nm_descricao_acao', $nm_descricao_acao);
                      $cadastrar_registro_de_sistema->bindParam(':nm_origem', $nm_origem);
                      $cadastrar_registro_de_sistema->bindParam(':nm_funcionario', $func_Relat_Ativ);
                      $cadastrar_registro_de_sistema->bindParam(':nm_empresa', $nm_empresa);
                      $cadastrar_registro_de_sistema->bindParam(':dt_hora', $horasRelatorio);
                      $cadastrar_registro_de_sistema->bindParam(':dt_data', $dataRelatorio);
                      $cadastrar_registro_de_sistema->bindParam(':img_icon', $img_icon);
                      $cadastrar_registro_de_sistema->bindParam(':nm_gerente', $gerente_Relat_Ativ);
                      $cadastrar_registro_de_sistema->bindParam(':nm_cargo', $cargo);
                      $cadastrar_registro_de_sistema->execute();               
                         //fim   

                        // QUERY para recuperar o usuário do banco de dados
                        $query_usuario = "SELECT cd_funcionario, nm_nome, cd_email_funcionario, cd_senha_funcionario, img_imagem, nm_cargo, cargo_privilegio, cd_telefone 
                        FROM tb_funcionario
                        WHERE cd_email_funcionario =:nm_email
                        LIMIT 1";

            
                    $result_funcionario = $conn->prepare($query_usuario);
                    $result_funcionario->bindParam(':nm_email', $dados['usuario']);
                    $result_funcionario->execute();

                    if (($result_funcionario) and ($result_funcionario->rowCount() != 0)) {
                    $row_funcionario = $result_funcionario->fetch(PDO::FETCH_ASSOC);
                    if (password_verify($dados['senha'], $row_funcionario['cd_senha_funcionario'])) {
                    $header = [
                        'alg' => 'HS256',
                        'typ' => 'JWT'
                        ];
                    $header = json_encode($header);
                    $header = base64_encode($header);
                    $duracao = time() + (7 * 24 * 60 * 60);
                    $payload = [
                        'exp' => $duracao,
                        'cd_gerente' => $row_funcionario['cd_funcionario'],
                        'nm_gerente' => $row_funcionario['nm_nome'],
                        'cd_telefone' => $row_funcionario['cd_telefone'],
                        'nm_cargo' => $row_funcionario['nm_cargo'],
                        'cargo_privilegio' => $row_funcionario['cargo_privilegio'],
                        'nm_email' => $row_funcionario['cd_email_funcionario'],
                        'cd_img' => $row_funcionario['img_imagem']
                    ];
                    $payload = json_encode($payload);
                    $payload = base64_encode($payload);
                    $chave = "DGBU85S46H9M5W4X6OD7";
                    $signature = hash_hmac('sha256', "$header.$payload", $chave, true);
                    $signature = base64_encode($signature);
                    setcookie('token', "$header.$payload.$signature", (time() + (7 * 24 * 60 * 60)));
                    header("Location:vagas_park.php");
                    } else {

                    $_SESSION['msg'] = "<p style='color: #f00;'>Erro:' Usuário' ou senha inválida!</p>";
                    }
                    } else {
                    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário ou 'senha' inválida!</p>";
                    }

// caso esse email seja do gerente usarar essa estrutura para logar os dados dele

                } else { 
    // QUERY para recuperar o usuário do banco de dados

    $nm_empresa = 'Empresa Vagas Park, São Vicente';
    $func_Relat_Ativ = null;
    $gerente_Relat_Ativ = "$email";
    $nm_descricao_acao ='Ação LOGIN Gerente';
    $cargo = 'Gerente';
    $acao_Relatorio_Atividade ='Gerente fez LOGIN';
    $nm_origem ='Tela de LOGIN Sistema';
    $img_icon ='visaosem.png';
        $acao_Relatorio_Atividade = 'LOGIN';
                  //Registro do Sistema 'tabela Ocuta' 
    $registro_de_sistema = "INSERT INTO tb_registro_de_sistema (nm_nome_acao, nm_descricao_acao, nm_origem, nm_funcionario, nm_empresa, dt_hora, dt_data, img_icon, nm_gerente, nm_cargo )

    VALUES (:nm_nome_acao, :nm_descricao_acao, :nm_origem, :nm_funcionario, :nm_empresa, :dt_hora, :dt_data, :img_icon, :nm_gerente, :nm_cargo )";
    $cadastrar_registro_de_sistema = $conn->prepare($registro_de_sistema);
    $cadastrar_registro_de_sistema->bindParam(':nm_nome_acao',  $acao_Relatorio_Atividade);
    $cadastrar_registro_de_sistema->bindParam(':nm_descricao_acao', $nm_descricao_acao);
    $cadastrar_registro_de_sistema->bindParam(':nm_origem', $nm_origem);
    $cadastrar_registro_de_sistema->bindParam(':nm_funcionario', $func_Relat_Ativ);
    $cadastrar_registro_de_sistema->bindParam(':nm_empresa', $nm_empresa);
    $cadastrar_registro_de_sistema->bindParam(':dt_hora', $horasRelatorio);
    $cadastrar_registro_de_sistema->bindParam(':dt_data', $dataRelatorio);
    $cadastrar_registro_de_sistema->bindParam(':img_icon', $img_icon);
    $cadastrar_registro_de_sistema->bindParam(':nm_gerente', $gerente_Relat_Ativ);
    $cadastrar_registro_de_sistema->bindParam(':nm_cargo', $cargo);
    $cadastrar_registro_de_sistema->execute();               
       //fim   


    $query_usuario = "SELECT cd_gerente, nm_gerente, nm_email, nm_senha, cd_img, nm_cargo, cargo_privilegio, cd_telefone
                FROM tb_gerente
                WHERE nm_email =:nm_email
                LIMIT 1";
   
    // Preparar a QUERY
    $result_usuario = $conn->prepare($query_usuario);
    // Substitui o link ":usuario" pelo valor que vem do formulário
    $result_usuario->bindParam(':nm_email', $dados['usuario']);
    // Executar a QUERY
    $result_usuario->execute();

    // Acessa o IF quando encontrou usuário no banco de dados
    if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
        // Ler o resultado retornado do banco de dados
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        //var_dump($row_usuario);

        // Verificar se a senha digitada pelo usuário no formulário é igual a senha salva no banco de dados
        // if (password_verify($dados['senha'], $row_usuario['senha_usuario'])) {
        if (password_verify($dados['senha'], $row_usuario['nm_senha'])) {
            // O JWT é divido em três partes separadas por ponto ".": um header, um payload e uma signature

            // Header indica o tipo do token "JWT", e o algoritmo utilizado "HS256"
            $header = [
                'alg' => 'HS256',
                'typ' => 'JWT'
                ];
            //var_dump($header);

            // Converter o array em objeto
            $header = json_encode($header);
            //var_dump($header);

            // Codificar dados em base64
            $header = base64_encode($header);

            // Imprimir o header
            //var_dump($header);

            // O payload é o corpo do JWT, recebe as informações que precisa armazenar
            // iss - O domínio da aplicação que gera o token
            // aud - Define o domínio que pode usar o token
            // exp - Data de vencimento do token
            // 7 days; 24 hours; 60 mins; 60secs
            $duracao = time() + (7 * 24 * 60 * 60);
            // 5 segundos
            // $duracao = time() + (5);

             $payload = [
                'exp' => $duracao,
                'cd_gerente' => $row_usuario['cd_gerente'],
                'nm_gerente' => $row_usuario['nm_gerente'],
                'cd_telefone' => $row_usuario['cd_telefone'],
                'nm_cargo' => $row_usuario['nm_cargo'],
                'cargo_privilegio' => $row_usuario['cargo_privilegio'],
                'nm_email' => $row_usuario['nm_email'],
                'cd_img' => $row_usuario['cd_img']

                // 'exp' => $duracao,
                // 'id' => $row_usuario['id'],
                // 'nome' => $row_usuario['nome'],
                // 'email' => $row_usuario['email']
            ];

            // Converter o array em objeto
            $payload = json_encode($payload);
            //var_dump($payload);

            // Codificar dados em base64
            $payload = base64_encode($payload);

            // Imprimir o payload
            //var_dump($payload);

            // O signature é a assinatura. 
            // Chave secreta e única
            $chave = "DGBU85S46H9M5W4X6OD7";
            
            // Pegar o header e o payload e codificar com o algoritmo sha256, junto com a chave
            // Gera um valor de hash com chave usando o método HMAC
            $signature = hash_hmac('sha256', "$header.$payload", $chave, true);

            // Codificar dados em base64
            $signature = base64_encode($signature);

            // Imprimir o signature
            //var_dump($signature);

            // Imprimir o token
            //echo "Token: $header.$payload.$signature <br>";

            // Salvar o token em cookies
            // Cria o cookie com duração 7 dias
            setcookie('token', "$header.$payload.$signature", (time() + (7 * 24 * 60 * 60)));

            // Redirecionar o usuário para página dashboard
        //header("Location: dashboard.php");
           header("Location:vagas_park.php");
            //header("Location:/vagas_park/comando_php/adm.php");
        } else {
            // Criar a mensagem de erro e atribuir para variável global "msg"
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro:' Usuário' ou senha inválida!</p>";
        }
    } else {
        // Criar a mensagem de erro e atribuir para variável global "msg"
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário ou 'senha' inválida!</p>";
    }
}
}
?>

    <!-- Início do formulário de login -->
 
<div class="caixa">
  <div class="ti-img">
    <div><a href="/vagas_park/index.php" style="text-decoration-line: none;"><img src="../home_vagas/img/Logo_simples.png" alt="" srcset=""></a></div>
      <div></div>
    </div>
      <div class="container">
        <div class="row">
          <div class="col-md-4 login-sec">
            <form method="POST" action="">
            <?php
            $usuario = "";
            if (isset($dados['usuario'])) {
                $usuario = $dados['usuario'];
            }?>
          <div class="form-group">
            <h1>Entrar</h1>
              <?php
              if (isset($_SESSION['msg'])) {?>
              <span id=""><?php  echo $_SESSION['msg'];?></span>
              <?php
              // Destruir a variável globar "msg"
              unset($_SESSION['msg']);
              }?>
            <input type="email" name="usuario" placeholder="Digite o usuário" value="<?php echo $usuario; ?>" class="pai-input">
          </div>
          <?php
          $senha = "";
          if (isset($dados['senha'])) {
          $senha = $dados['senha'];
          }?> 
          <div class="form-group">
            <input type="password" name="senha" placeholder="Digite a senha" value="<?php echo $senha; ?>" class="pai-input">
          </div>
          <div  class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input action">
              <small style="margin:0px;">Lembrar meu Email</small>
            </label><br>
          <button type="submit" name="SendLogin" value="Acessar" class="criarbot" >Acessar a Conta</button><br> 
          <a href="/vagas_park/recuperacaoSenha.php" target="_blank">Esqueceu sua senha?</a><br>
          </form>
          <a href="/vagas_park/comando_php/cadastrar_parceiro.php"> 
          <button type="button" class="ghost custom-btn btn-11" id="signUp" class="criarbot">Cadastrar</button>
          </a>
        </div>
      </div>
     
      <!-- fim -->

      <!-- teste -->
      <div class="col-md-8 banner-sec">
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <!-- <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
   
  </div> -->
  <div style="color:white" class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="/vagas_park/home_vagas/img/parceiros04.jpg" class="d-block w-100 img-corrossel" alt="...">
      <div style="color:white" class="carousel-caption d-none d-md-block banner-text">
        <h1>Vagas Park</h1>
        <h5>Comece hoje modernizar o seu estacionamento</h5>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="/vagas_park/home_vagas/img/parceiros01.jpg" class="d-block w-100 img-corrossel" alt="...">
      <div style="color:white" class="carousel-caption d-none d-md-block banner-text">
        <h1 class="carrossel_titulo">Visibilidade</h1>
        <h5 class="carrossel_parag">Seja encontrado pelos clientes e aumente a demanda de vagas</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/vagas_park/home_vagas/img/parceiros02.jpg" class="d-block w-100 img-corrossel" alt="...">
      <div style="color:white" class="carousel-caption d-none d-md-block banner-text">
        <h1>Divercidade</h1>
        <h5>Disponibilize vagas para diferentes tipos de veiculos</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/vagas_park/home_vagas/img/parceiros03.jpg" class="d-block w-100 img-corrossel" alt="...">
      <div style="color:white" class="carousel-caption d-none d-md-block banner-text">
        <h1>Segurança</h1>
        <h5>De segurança e ganhe confiabilidade</h5>
      </div>
    </div>
    
  </div>
      <button style="display:none"class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button style="display:none" class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

      <script src='https://code.jquery.com/jquery-3.4.1.min.js'></>
      <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>
      <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js'></script>
      <script src="/vagas_park/home_vagas/js/script.js"></script>
      <script src="/vagas_park/home_vagas/js/scriptt.js"></script>                                                                                                       
      <script src="/vagas_park/home_vagas/js/selection.js"></script>
      <script src="/vagas_park/home_vagas/js/faq.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="/vagas_park/home_vagas/js/nosso_parceiro.js"></script>
      

</html>