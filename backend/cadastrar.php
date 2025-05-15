<?php
// Conectar ao banco de dados
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'meusite';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografar a senha
    $celular = $_POST['celular']; // Novo campo celular

    // Verificar se o email já está cadastrado
    $sqlVerificarEmail = "SELECT * FROM usuarios WHERE email = ?";
    $stmtVerificarEmail = $conn->prepare($sqlVerificarEmail);
    $stmtVerificarEmail->bind_param("s", $email);
    $stmtVerificarEmail->execute();
    $result = $stmtVerificarEmail->get_result();

    if ($result->num_rows > 0) {
        // Email já cadastrado, redirecionar com erro
        header("Location: /cadastro.html?erro=email"); // Certifique-se de usar o caminho correto para a página de cadastro
        exit();
    }

    // Preparar a consulta SQL
    $sql = "INSERT INTO usuarios (nome, email, senha, celular) VALUES (?, ?, ?, ?)";

    // Preparar a declaração
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $email, $senha, $celular);

    // Executar a consulta
    if ($stmt->execute()) {
        // Redirecionar para a página de login após o cadastro
        header("Location: /login.html"); // Altere o caminho para a página de login
        exit();
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    // Fechar a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>
