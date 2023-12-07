<?php
// Página de atualização

// Inclui header
include_once("templates/header.php");
?>

<div class="container">

<!-- Botão voltar -->
<?php include_once("templates/backbtn.html"); ?>
<h1 id="main-title">Editar contato</h1>
<form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
<input type="hidden" name="type" value="edit">

<!-- ID do contato a ser editado -->
<input type="hidden" name="id" value="<?= $contact['id'] ?>">

<!-- Campos do formulário preenchidos com os dados do contato -->
<div class="form-group">
<label for="name">Nome do contato:</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" value="<?= $contact ['name'] ?>" required>
</div>

<div class="form-group">
<label for="phone">Telefone do contato:</label>
<input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone"
value="<?= $contact ['phone'] ?>" required>
</div>

<div class="form-group">
<label for="email">Email:</label>
<textarea type="text" class="form-control" id="email" name="email"
placeholder="Insira o email" rows="3"><?= $contact ['email'] ?></textarea>
</div>

<!-- Botão para atualizar -->
<button type="submit" class="btn btn-primary">Atualizar</button>

</form>
</div>

<?php
// Inclue o footer da página
include_once("templates/footer.php");
?>
