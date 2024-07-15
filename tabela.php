<?php 
require 'config.php';
?>
<link rel="stylesheet" href="style.css">
<div class="container">
<form action="process.php" method="get">
    <label for="nome">INSIRA O NOME</label> <br>
    <input type="text" name="nome"><br>
    <label for="email">INSIRA O E-MAIL</label> <br>
    <input type="text" name="email"><br>
    <label for="senha">INSIRA A SENHA</label> <br>
    <input type="password" name="senha"><br>

    <input type="submit" value="Adicionar ao Banco">

</form>
</div>