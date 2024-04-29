<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/formulario.css">
    <title>cadastro</title>
</head>
<body>
    <?php include('geral/menu.php');?>

    <main>
        <form action="../PHP/cadastro.php" method="post">
            <!-- Nome -->
            <label for="nome">Nome:</label>
            <input type="text" required>

            <!-- Email -->
            <label for="email">Email:</label>
            <input type="email" required>

            <!-- Senha -->
            <label for="senha">Senha:</label>
            <input type="password" required>

            <!-- Confirmar Senha -->
            <label for="confirmar-senha">Confirmar Senha:</label>
            <input type="password" required>

            <!-- CPF -->
            <label for="cpf">CPF:</label>
            <input type="text" required>

            <!-- Telefone -->
            <label for="telefone">Telefone:</label>
            <input type="number" required>

            <!-- CEP -->
            <label for="cep">CEP:</label>
            <input type="number" required>

            <!-- Botão Enviar -->
            <button type="submit">Enviar</button>
        </form>
    </main>
</body>
</html>