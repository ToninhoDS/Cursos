<?php
session_start();


// Recupera os valores da sessão
$nome = $_SESSION["nome"];

// Retorna os valores como um objeto JSON
$response = array(
  "nome" => $nome
);

header("Content-Type: application/json");
echo json_encode($response);
?>
