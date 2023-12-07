<!-- Passo 3.1 - Começe a programar construindo o connection.php  -->
<?php

//Define as credenciais de conexão ao banco
$host = "localhost";
$dbname = "login";
$user = "root";
$pass = "";

try {

    //cria uma nova conexão PDO (PHP Data Objects. É uma extensão do PHP que fornece uma interface para acessar diferentes sistemas de banco de dados.)
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    //Ativa o moodo de erros para lançar exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //captura erros na conexão e exibe a mensagem
    $error = $e->getMessage();
    echo "Erro: $error";
}
?>