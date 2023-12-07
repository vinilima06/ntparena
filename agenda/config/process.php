<?php

// Inicia a sessão
session_start();

// Inclui arquivos de conexão ao banco e funcionalidades
include_once("connection.php");
include_once("url.php");

// Recebe dados do formulário via POST
$data = $_POST;

// ___________________________________________________________________________

// MODIFICAÇÕES NO BANCO (CRUD - CREATE, READ, UPDATE, DELETE)
if(!empty($data)) {

  // Criar contato (CREATE)
  if($data["type"] === "create") {

    $name = $data["name"];
    $phone = $data["phone"]; 
    $email= $data["email"];

    // Query de inserção com placeholders
    $query = "INSERT INTO cadastro (name, phone, email) VALUES (:name, :phone, :email)";
    
    // Prepara a query
    $stmt = $conn->prepare($query);  

    // Substitui placeholders

    // bindParam() é um método do objeto PDO Statement que associa uma variável PHP a um placeholder na query SQL preparada anteriormente.

    // No exemplo, a query contém o placeholder :name. Esta linha faz o bind da variável PHP $name para esse placeholder.

    // Quando a query for executada, o PDO irá substituir :name pelo valor atual de $name de forma segura, evitando SQL injection.
    $stmt->bindParam(":name", $name);

    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":email", $email);

    try {
      // Executa a query
      $stmt->execute();

      // Mensagem de sucesso
      $_SESSION["msg"] = "Contato criado com sucesso!";
      
    } catch(PDOException $e) {
      // Captura erros
      $error = $e->getMessage();
      echo "Erro: $error";
    }

  //___________________________________________________________ 

  // Código para atualizar (UPDATE)
  } else if($data["type"] === "edit") {

      $name = $data["name"];
      $phone = $data["phone"];
      $email = $data["email"];
      $id = $data["id"];

      // Query de atualização
      $query = "UPDATE cadastro 
                SET name = :name, phone = :phone, email = :email
                WHERE id = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":phone", $phone);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":id", $id);

      try {

        $stmt->execute();
        $_SESSION["msg"] = "Contato atualizado com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    //___________________________________________________________ 

    // Código para deletar (DELETE)
    } else if($data["type"] === "delete") {

      $id = $data["id"];

      // Query de remoção
      $query = "DELETE FROM cadastro WHERE id = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":id", $id);
      
      try {

        $stmt->execute();
        $_SESSION["msg"] = "Contato removido com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    }

    //___________________________________________________________ 

    // Redireciona para página inicial (HOME)
    header("Location:" . $BASE_URL . "../index.php");

  // SELEÇÃO DE DADOS
  } else {
    
    $id;

    // Código para selecionar um contato
    if(!empty($_GET)) {
      $id = $_GET["id"];
    }

    // Retorna o dado de um contato
    if(!empty($id)) {

      // Query de seleção
      $query = "SELECT * FROM cadastro WHERE id = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":id", $id);

      $stmt->execute();

      $contact = $stmt->fetch();

    } else {

      // Retorna todos os contatos
      $contacts = [];

      // Query de seleção de todos os contatos
      $query = "SELECT * FROM cadastro";

      $stmt = $conn->prepare($query);

      $stmt->execute();
      
      $contacts = $stmt->fetchAll();

    }

  }

  // FECHAR CONEXÃO
  $conn = null;

  