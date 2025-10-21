<?php

session_start(); // Iniciar a sessão

// Deletar o cookie
setcookie('token');

// Criar a mensagem de sucesso e atribuir para variável global
$_SESSION['msg'] = "<p style='color: green;'>Deslogado com sucesso!</p>";

// Redireciona o o usuário para o arquivo vagas_park.php
header("Location: /dashboard_tcc/comando_php/login_parceiro.php");
