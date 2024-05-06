<?php
    session_start();
    require_once('../conexao/connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST['email-username'];
        $senha = $_POST['senha'];
    
        $sql = "SELECT id, nome, tipo_usuario, (CASE WHEN email IS NOT NULL THEN email ELSE username END) AS email_usuario, senha
            FROM usuarios
            WHERE (email = '$login' OR username = '$login')
            AND senha = '$senha'";     

        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Login bem-sucedido! Bem-vindo, " . $row["nome"] . "!";

                header("Location: ../../paginas/index.php");
            }
        }
    }

?>