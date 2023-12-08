<!-- Passo 6 - Começe a programar construindo o show.php  --><!-- Passo 6 - Começe a programar construindo o show.php  -->
<?php
// Incluir header
include_once("templates/header.php");
?>
<!-- Página de Visualização (Ao se clicar na ação visualizar em cada contato individual) -->
<div class="container" id="view-contact-container">
<!-- Incluir botão de voltar —-->
<?php include_once("templates/backbtn.html"); ?>
<h1 id="main-title"><?= $contact["name"] ?></h1>
<p class="bold">Telefone:</p>
<p elass="form-control"><?= $contact["phone"] ?></p>
<p class="bold">Email:</p>
<p elass="form-control"><?= $contact["email"] ?></p>
</div>
<?php
// Incluir footer
include_once("templates/footer.php");
?>