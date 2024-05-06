<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/form.css">
    <title>cadastro</title>
</head>

<body>
    <?php include('geral/menu.php'); ?>

    <div class="form-container">
        <h1>Cadastre-se</h1>
        <form action="../PHP/forms/cadastro.php" method="post" id="form" class="form">
            <div class="divisao">
                <!-- Nome -->
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required>
                <!-- Username -->
                <label for="username">Username:</label>
                <input type="text" name="username" required>
                <!-- Email -->
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <!-- Senha -->
                <label for="senha">Senha:</label>
                <input type="password" name="senha" required>
                <!-- Confirmar Senha -->
                <label for="confirmar-senha">Confirmar Senha:</label>
                <input type="password" name="confirmar-senha" required>
                <!-- CPF -->
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" required>
            </div>

            <div class="divisao">
                <!-- Telefone -->
                <label for="celular">Celular:</label>
                <input type="number" name="celular" required>
                <!-- CEP -->
                <label for="cep">CEP:</label>
                <input type="number" name="cep" required>
                <!-- Estado -->
                <label for="estado">Estado:</label>
                <input type="text" name="estado" required>
                <!-- Cidade -->
                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" required>
                <!-- Rua -->
                <label for="rua">Rua:</label>
                <input type="text" name="rua" required>
                <!-- Número Residência -->
                <label for="num-res">Número Casa:</label>
                <input type="number" name="num-res" required>
            </div>
            <!-- Botão Enviar -->
            <button type="submit" id="btn-enviar">Cadastrar</button>
        </form>
    </div>
    <?php include('geral/footer.php'); ?>
</body>
</html>