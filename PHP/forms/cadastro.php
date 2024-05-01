<?php
session_start();
require_once('../conexao/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $rua = $_POST['rua'];
    $num_res = $_POST['num-res'];

    if ($_POST['senha'] !== $_POST['confirmar-senha']) {
        echo "A senha e a confirmação de senha não coincidem.";
        exit;
    }

    // Inserir dados na tabela enderecos
    $sqlEndereco = "INSERT INTO enderecos (cep, rua, num_res, cidade) 
                    VALUES (:cep, :rua, :num_res, :cidade)";
    $stmtEndereco = $pdo->prepare($sqlEndereco);
    $resultadoEndereco = $stmtEndereco->execute([
        ':cep' => $cep,
        ':rua' => $rua,
        ':num_res' => $num_res,
        ':cidade' => $cidade,
    ]);

    if (!$resultadoEndereco) {
        echo "Erro ao cadastrar endereço.";
        exit;
    }

    // Obter o ID do endereço inserido
    $enderecoId = $pdo->lastInsertId();

    // Inserir dados na tabela usuarios
    $sqlUsuario = "INSERT INTO usuarios (nome, email, senha, cpf, celular, endereco_id) 
                   VALUES (:nome, :email, MD5(:senha), :cpf, :celular, :endereco_id)";
    $stmtUsuario = $pdo->prepare($sqlUsuario);
    $resultadoUsuario = $stmtUsuario->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $senha,
        ':cpf' => $cpf,
        ':celular' => $celular,
        ':endereco_id' => $enderecoId, // Vincula o ID do endereço ao usuário
    ]);

    if ($resultadoUsuario) {
        echo "Cadastro realizado com sucesso!";
        $_SESSION['sessao'] = $nome[0];
        header("Location: ../../paginas/perfil.php");
        exit;
    } else {
        echo "Erro ao cadastrar usuário.";
    }
}
?>