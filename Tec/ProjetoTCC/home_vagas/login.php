<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/ca.css">
    <link rel="stylesheet" href="css/a.css">
    
    
    <title>Home</title>
</head>

  

<body>
  
  <nav class=" teste">
    <a href="index.php"><button><i class="fa-solid fa-arrow-left"></i> Voltar</button></a>
  </nav>
    
  
<div class="caixa">

  <div class="ti-img">
  <div><img src="img/logo.png" alt="" srcset=""></div>
    <div><h1 class="title">VAGASPARK</h1></div>
    

    </div>
    <div class="container" id="container">
      <div class="form-container sign-up-container">   

        <form method="POST" action="banco.php">
          <h1>Crie sua conta</h1> 
          <span id="teste">Preencha os campos para se registrar</span>
         
          <input type="email" id="email" name="email"  placeholder="Email" />
          <input type="password" id="senha" name="senha" placeholder="Senha" />
          <input type="text" id="cpf" name="cpf" placeholder="CPF/CNPJ" />
          <input type="text" id="placa" name="placa" placeholder="Placa do veiculo" />
         <button type="submit" onclick="validarCPF(),validateFormEmail(), validateFormSenha()" id="criarbtn" class="criarbot">Criar</button>
        </form>
        <?php if (isset($_SESSION["inserido_com_sucesso"]) && $_SESSION["inserido_com_sucesso"]): ?>
		<h1>Dados cadastrados com sucesso!</h1>
	<?php else: ?>
		<h1>Ocorreu um erro ao cadastrar os dados.</h1>
	<?php endif; ?>

	<?php
	
	unset($_SESSION["inserido_com_sucesso"]);
	?>
      </div>
      <div class="form-container sign-in-container">
        <form>
          <h1>Entrar</h1>
          <span>Preencha os campos para entrar</span>
          
          <input type="email" placeholder="Email" />
          <input type="password" placeholder="Senha" />
          <a href="recuperacaoSenha.php" target="_blank">Esqueceu sua senha?</a>
          <button type="button" class="criarbot" onclick="validateFormEmail(), validateFormSenha()">Entrar</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Que bom que você voltou!</h1>
            <p>Para se manter conectado conosco, faça o login com suas informações pessoais</p>
            <button class="ghost" id="signIn" class="criarbot">Entrar</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Vamos ser amigos!</h1>
            <p>Preencha com os seus dados e comece a viajar conosco!</p>
            <button class="ghost" id="signUp" class="criarbot">Cadastrar</button>
          </div>
        </div>
      </div>
    </div>

</div>
    
  
    <script src="js/CadastroLogin.js"></script>
</body>
</html>