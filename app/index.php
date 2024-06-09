<?php
#var_dump($_SERVER);

// Configurações do banco de dados
$host = 'bancodedados';
$dbname = 'meupp';
$username = 'charles';
$password = 'rootadm*';

try {
    // Cria a conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Configura o modo de erro do PDO para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Conexão realizada com sucesso!";
} catch (PDOException $e) {
    // Captura qualquer erro e exibe a mensagem
    echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
}