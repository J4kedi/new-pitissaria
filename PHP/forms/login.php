<?php
session_start();
require_once('../conexao/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailUsername = $_POST['email-username'];
    $senha = $_POST['senha'];

    $senhaHash = md5($senha);

    $regexEmail = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/i"; // Expressão regular para validar email

    $isEmail = preg_match($regexEmail, $emailUsername);

    if ($isEmail) {
        $sql = "SELECT email, senha, tipo_usuario, id, nome FROM usuarios WHERE email = :emailUsername";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':emailUsername' => $emailUsername]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $sql = "SELECT username, senha, tipo_usuario, id, nome FROM usuarios WHERE username = :emailUsername";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':emailUsername' => $emailUsername]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if ($result['senha'] == $senhaHash && ($result['email'] == $emailUsername || $result['username'] == $emailUsername)) {
        $nomeSeparado = explode(' ', $result['nome']);
        $_SESSION['sessao'] = $result['id'];
        $_SESSION['nome'] = $result['nome'];
        $_SESSION['primeiro_nome'] = $nomeSeparado[0];
        $_SESSION['tipo_usuario'] = $result['tipo_usuario'];

        header("Location: ../../paginas/perfil.php"); // Redireciona para a página de perfil
        exit;
    } 

    header("location: ../../paginas/login.php");    
    exit;
}
?>