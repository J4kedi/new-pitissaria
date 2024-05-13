<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/form.css">
    <title>perfil</title>
</head>
<body>
    <?php include('geral/menu.php');?>
    
    <?php 
        require_once("../php/sessao/verificaUsuario.php");
        verificaUsuario();
    ?>
        

    <div class="form-container">
        <?php 
            echo "<h2>Olá, ". $_SESSION['primeiro_nome'] ."!</h2>";
        ?>

        <form action="../PHP/forms/perfil.php" class="form" id="form" method="POST">
            <div class="divisao">
                <!-- Nome -->
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required>
                <!-- Username -->
                <label for="username">Username:</label>
                <input class="desativado" type="text" name="username" disabled>
                <!-- Email -->
                <label for="email">Email:</label>
                <input class="desativado" type="email" name="email" disabled>
                <!-- CPF -->
                <label for="cpf">CPF:</label>
                <input class="desativado" type="text" name="cpf" disabled>
                <!-- Celular -->
                <label for="celular">Celular:</label>
                <input type="text" name="celular" required>
                <!-- Data de Nascimento -->
                <label for="data-nascimento">Data de Nascimento:</label>
                <input type="date" name="data-nascimento" required>
            </div>

            <div class="divisao">
                <!-- CEP -->
                <label for="cep">CEP:</label>
                <input type="text" name="cep" required>
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
            <button type="submit" id="btn-enviar">Salvar</button>
        </form>
    </div>
    
    <?php include('geral/footer.php');?>
</body>
</html>