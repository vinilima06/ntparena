 <?php
// Página de Listagem (lista todos os contatos)

   include_once("templates/header.php");
?>
<!-- container-fluid para aplicar á tela inteira, container para uma parte da tela -->
<div class="container-fluid" style="background-color: black;"> 

<!-- Exibe mensagem de cada operação CRUD (se existir) Obs: Note as mensagens de erro e sucesso em config/process.php -->
<?php if(isset($printMmsg) && $printMsg != ''): ?>
<p id="msg"><?= $printMsg ?></p>
<?php endif; ?>

<h1 id="main-title"  class="text-light">Cadastros</h1>

<!-- Exibe tabela se houver contatos -->
<?php if(count($contacts) > 0): ?>
<table class="table" id="contacts-table">
   <thead>
      <tr>
      <th scope="col">n. cadastro</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>0
      <th scope="col">Email</th>
      <th scope="col"></th>
      </tr>
   </thead>
   
   <tbody class="corpo">
      <!-- O código percorre o array de $contacts e imprime os dados de cada um em uma linha da
      tabela, com botões de editar e excluir. -->
      <?php foreach($contacts as $contact): ?>
         <tr class="text-light">
            <td scope="row" class="col-id" class="text-light"><?= $contact["id"] ?></td>
            <td scope="row" class="text-light"><?= $contact["name"] ?></td>
            <td scope="row" class="text-light"><?= $contact["phone"] ?></td>
            <td scope="row" class="text-light"><?= $contact["email"] ?></td>
            <!-- Botões de ação para cada contato (Visualizar, Editar e Excluir)-->
            <td class="actions" >
            <a href="<?= $BASE_URL ?>show.php?id=<?= $contact["id"] ?>"><i class="fas fa-eye
            check-icon"></i></a>
            <a href="<?= $BASE_URL ?>edit.php?id=<?= $contact["id"] ?>"><i class="far fa-edit
            edit-icon"></i></a>
            <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
            <input type="hidden" name="type" value="delete">
            <input type="hidden" name="id" value="<?= $contact["id"] ?>">
            <button type="submit" onclick="confirmDelete()" class="delete-btn"><i class="fas
            fa-times delete-icon"></i></button>
            </form>
            </td>
         </tr>
      <?php endforeach; ?>
   </tbody>
</table>
<?php else: ?>
<!-- Exibe mensagem (Ainda não há contatos na sua agenda) se não tiver contatos -->
<p id="empty-list-text">Ainda não há cadastros, <a href="<?= $BASE_URL ?>create.
php">clique aqui para adicionar</a>.</p>
<?php endif; ?>
</div>
<script>
// Função para confirmar exclusão de contato (No Alert do navegador)
function confirmDelete() {
let confirmDelete = confirm("Tem certeza que deseja excluir este contato?");
if(!confirmDelete) {
event. preventDefault();
}
}
</script>
<?php
// Inclui footer
include_once("templates/footer.php");
?>

,