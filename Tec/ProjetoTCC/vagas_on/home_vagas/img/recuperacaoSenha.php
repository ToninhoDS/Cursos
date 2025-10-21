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
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>