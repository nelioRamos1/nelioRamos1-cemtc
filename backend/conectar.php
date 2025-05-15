<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "meusite"; // esse nome deve ser exatamente o nome do banco que você criou

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
