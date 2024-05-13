<?php
    session_start();

    require_once('../conexao/connection.php');

    $id = $_SESSION['sessao'];

    $sql = "SELECT nome, email, cpf, endereco_id, data_nascimento, celular, username FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>