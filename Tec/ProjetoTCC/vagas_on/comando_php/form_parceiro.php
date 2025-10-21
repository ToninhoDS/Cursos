<?php

// session_start(); // Iniciar a sessão

// Limpara o buffer de redirecionamento
ob_start();

// Incluir o arquivo que possui as configurações
include_once '../adm/config/config.php';

// Incluir o arquivo com a conexão com banco de dados
include_once '../adm/lib/conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/logotipoSglas.ico"/>
    <title>VAGASPARK</title>
</head>
<body>
    
</body>
</html>
<?php
    // Receber os dados do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);    
    $teste_img = 'antonio-mayda.png';
    // Acessa o IF quando o usuário clicar no botão cadastrar
    if(!empty($dados['SendCadUser'])){
        //var_dump($dados);
        if($dados['senha'] == $dados['senha_confirme']){

           
            $email = $dados['email'];
                // Prepara a consulta SQL
                $stmt = $conn->prepare("SELECT COUNT(*) FROM tb_gerente WHERE nm_email = :email");
                
                // Executa a consulta
                $stmt->execute(array(':email' => $email));
                
                // Obtém o resultado da contagem
                $count = $stmt->fetchColumn();
                
                if ($count > 0) {
                    $_SESSION['msg'] = "<h3 style='color: #f00;'>O email existe no banco de dados.</h3>";
                } else {
                    
                        // Criar a QUERY para cadastrar no banco de dados
        // $query_usuario = "INSERT INTO usuarios (nome, email, usuario, senha_usuario) VALUES (:nome, :email, :usuario, :senha)";
        $query_usuario = "INSERT INTO tb_gerente (nm_gerente, nm_email, nm_senha, cd_telefone, cd_img) VALUES (:gerente, :email, :senha, :telefone, :img)";

        // Preparar a QUERY
        $cad_usuario = $conn->prepare($query_usuario);
        
      
        $cad_usuario->bindParam(':gerente', $dados['nome']);
        $cad_usuario->bindParam(':email', $dados['email']);
        $cad_usuario->bindParam(':telefone', $dados['telefone']);
         $cad_usuario->bindParam(':img', $teste_img);
        
        // Criptografar a senha
        $senha_criptografada = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $cad_usuario->bindParam(':senha', $senha_criptografada);

        // Executar a QUERY
        $cad_usuario->execute();

        // Acessa o IF quando cadastrar o registro no banco de dados
        if($cad_usuario->rowCount()){
            // Criar a mensagem e atribuir para variável global
            $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!<br><br><strong>Você será direcionado pagina de Login</strong></p>";

            // Redirecionar o usuário para a página de login
            header("refresh: 2; ../comando_php/nosso_parceiro.php");
        }else{
            echo "<p style='color: #f00;'>Erro: Usuário não cadastrado </p>";
        }

                    //fim da verificação
                }
            
              

        
        }else{
            $_SESSION['msg'] ="<p style='color: #f00;'>Erro: Senha não são iguais!</p>";
        }
        
}

    ?>





<!DOCTYPE html>
<html lang="br-pt">
  <head>
        <title>Formulário Vagas Park</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <link href="../comando_php/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css_dash/form_parceiro.css"> 
</head>
<body>

<div class="caixa">

  <div class="ti-img">
  <div><img src="../home_vagas/img/Logo_simples.png" alt="" srcset=""></div>
    <div><a href="/vagas_park/index.php"><h1 class="title">VAGASPARK</h1></a></div>
    </div>
        <form class="form-container" method="POST" action="">

<?php
    if (isset($_SESSION['msg'])) {  
?>
    <span id=""><?php  echo $_SESSION['msg'];?></span>
<?php
    unset($_SESSION['msg']);
}
?>
<?php //manter os dados se errar a senha
            $nome = "";
            if (isset($dados['nome'])) {
                $nome = $dados['nome'];
            }
            $telefone = "";
            if (isset($dados['telefone'])) {
                $telefone = $dados['telefone'];
            }
            $email = "";
            if (isset($dados['email'])) {
                $email = $dados['email'];
            }
?> 
                <h1 class="form-group">Cadastro de Teste</h1>
                <div class="name">
                    <input type="text"  name="nome" placeholder="Nome" required class="pai-input" value="<?php echo $nome; ?>"/>
                    <input type="tel"  name="telefone" placeholder="Telefone" required class="pai-input" value="<?php echo $telefone; ?>"/>
                </div>
                    <input type="email" name="email" placeholder="Email" required class="pai-input" value="<?php echo $email; ?>"/>
                    <input type="password" name="senha"  placeholder="Password" required class="pai-input"/>
                    <input type="password" name="senha_confirme" placeholder="Confirm Password" required class="pai-input"/>
                <div class="terms">
                    <input name="checkbox" type="checkbox" required oninvalid="this.setCustomValidity('Precisa Aceitar os Termos')" oninput="setCustomValidity('')"/> Eu, aceito<a data-toggle="modal" data-target="#myModal">
				Termos de uso
			</a>
                    <!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">Termo de Uso</h4>
						</div>
						<div class="modal-body">
							<p>A sua privacidade é importante para nós. É política do VagasPark respeitar a sua privacidade em relação a qualquer informação sua que possamos coletar no site VagasPark, e outros sites que possuímos e operamos.

Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço. 

<p>Fazemo-lo por meios justos e legais, com o seu conhecimento e consentimento. Também informamos por que estamos coletando e como será usado.

Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando armazenamos dados, protegemos dentro de meios comercialmente aceitáveis ​​para evitar perdas e roubos, bem como acesso, divulgação, cópia, uso ou modificação não autorizados.

Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando exigido por lei.</p> 
<p>O nosso site pode ter links para sites externos que não são operados por nós. Esteja ciente de que não temos controle sobre o conteúdo e práticas desses sites e não podemos aceitar responsabilidade por suas respectivas políticas de privacidade.

Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não possamos fornecer alguns dos serviços desejados.</p>
<p>O uso continuado de nosso site será considerado como aceitação de nossas práticas em torno de privacidade e informações pessoais. Se você tiver alguma dúvida sobre como lidamos com dados do usuário e informações pessoais, entre em contato conosco.

Compromisso do Usuário
O usuário se compromete a fazer uso adequado dos conteúdos e da informação que o VagasPark oferece no site e com caráter enunciativo, mas não limitativo:</p>
<p>A) Não se envolver em atividades que sejam ilegais ou contrárias à boa fé a à ordem pública;</p>
<p>B) Não difundir propaganda ou conteúdo de natureza racista, xenofóbica, ou casas de apostas online, jogos de sorte e azar, qualquer tipo de pornografia ilegal, de apologia ao terrorismo ou contra os direitos humanos;</p>
<p>C) Não causar danos aos sistemas físicos (hardwares) e lógicos (softwares) do VagasPark, de seus fornecedores ou terceiros, para introduzir ou disseminar vírus informáticos ou quaisquer outros sistemas de hardware ou software que sejam capazes de causar danos anteriormente mencionados.
Mais informações</p>
<p>Esperemos que esteja esclarecido e, como mencionado anteriormente, se houver algo que você não tem certeza se precisa ou não, geralmente é mais seguro deixar os cookies ativados, caso interaja com um dos recursos que você usa em nosso site.</p>
<p>Esta política é efetiva a partir de May/2023..</p>

						</div>				  
					</div>
				</div>
			</div>		
		
		
                </div>
                <input type="submit" name="SendCadUser" value="Registrar agora" class="criarbot">
                <a href="nosso_parceiro.php"><button type="button" name="SendCadUser" class="ghost ">Cancelar</button></a>
               
        </form>      
    </div>
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
  </body>
</html> 
   

