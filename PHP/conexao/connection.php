<?php
// Configurações do banco de dados
$host = "localhost"; // Endereço do servidor MySQL
$port = "3306"; // Porta padrão do MySQL
$dbname = "pitissaria"; // Nome do banco de dados
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados

// Configurações adicionais de segurança
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Tratar erros como exceções
    PDO::ATTR_EMULATE_PREPARES   => false, // Desabilitar emulação de preparação de consultas
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Modo padrão de retorno de dados
];

// Tentar realizar a conexão com o banco de dados
try {
    // Criar uma instância da classe PDO para conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password, $options);
    
    // Sucesso! Agora você pode realizar consultas SQL usando a variável $pdo
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    // Em caso de erro na conexão, exibir a mensagem de erro
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>
