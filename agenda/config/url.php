<!-- Passo 3.3 - Começe a programar construindo o url.php  -->
<?php

//Define a variável $BASE_URL com a URL base do site atual construída dinamicamente a partir de informações do $_SERVER.

$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/';