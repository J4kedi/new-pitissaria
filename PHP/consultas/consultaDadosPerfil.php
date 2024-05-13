<?php
    require_once('../PHP/conexao/connection.php');

    $id = $_SESSION['sessao'];

    $sqlUsuario = "SELECT nome, email, cpf, data_nascimento, celular, username FROM usuarios WHERE id = :id";
    $stmtUsuario = $pdo->prepare($sqlUsuario);
    $stmtUsuario->execute([':id' => $id]);
    $resultUsuario = $stmtUsuario->fetch(PDO::FETCH_ASSOC);

    $sqlEndereco = "SELECT cep, estado, cidade, rua, num_res FROM enderecos WHERE id = :id";
    $stmtEndereco = $pdo->prepare($sqlEndereco);
    $stmtEndereco->execute([':id' => $id]);
    $resultEndereco = $stmtEndereco->fetch(PDO::FETCH_ASSOC);

    // Salvado as consultas, para poder mostrar na página de perfil
    $nome = $resultUsuario['nome'];
    $email = $resultUsuario['email'];
    $cpf = $resultUsuario['cpf'];
    $dataNascimento = $resultUsuario['data_nascimento'];
    $celular = $resultUsuario['celular'];
    $username = $resultUsuario['username'];

    // Consulta para o endereco do usuario, fazer verificacao de quantos enderecos ele tem
    // $result->num_rows > 0, para verificar o numero de linhas retornadsa, para saber quantos enderecos tem

    // SELECT e.cep, e.rua, e.num_res, e.cidade, e.estado FROM usuarios u INNER JOIN usuario_endereco ue ON u.id = ue.usuario_id INNER JOIN enderecos e ON ue.endereco_id = e.i WHERE u.id = 1;
?>