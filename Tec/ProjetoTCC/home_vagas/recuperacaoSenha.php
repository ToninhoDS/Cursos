<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Recuperação de senha</title>
    <link rel="stylesheet" href="css/recu.css">
    <link rel="stylesheet" href="css/a.css">
</head>
<body>

    <nav class=" teste">
        <a href="login.php"><button><i class="fa-solid fa-arrow-left"></i> Voltar</button></a>
      </nav>
      
    <div class="container" id="container">

        <div class="form-container sign-in-container">
            <form>
                <img src="img/logo.png" alt="" srcset="">
              <h1>Recuperar senha</h1>
              <span>Preencha os campos para recuperar</span>
              
              <input type="email" id="email" name="email"  placeholder="Email"/>

              <a href="https://accounts.google.com/signin/v2/usernamerecovery?continue=https%3A%2F%2Fmail.google.com&dsh=S118283903%3A1680443616246924&flowEntry=AddSession&flowName=GlifWebSignIn&hl=en&service=mail&authuser=0">Esqueceu seu e-mail?</a>
              <button type="submit" class="criarbot" onclick="validateFormEmail()">Continuar</button>
            </form>
          </div>

    </div>
<script src="js/recuperacaoSenha.js"></script>
</body>
</html>