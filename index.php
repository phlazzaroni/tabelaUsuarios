<link rel="stylesheet" href="style.css">
<div class="container">
<?php 
require "config.php";

$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");

if( $sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>
<a href="tabela.php">ADICIONAR ELEMENTOS</a>
<a href="buscar.php">BUSCAR ELEMENTO</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>SENHA</th>
        <th>AÇÃO</th>
    </tr>
<!-- ADICIONAR FUNçÂO DE VER SÒ UM VALOR -->
    <?php foreach( $lista as $usuario ): ?>
        <tr>
            <th><?=$usuario['id'];?></th>
            <th><?=$usuario['nome'];?></th>
            <th><?=$usuario['email'];?></th>
            <th><?=$usuario['senha'];?></th>
            <th>
                <a href="excluir.php?id=<?=$usuario['id']?>">[EXCLUIR]</a><br>
                <a href="editar.php?id=<?=$usuario['id']?>">[EDITAR]</a>
            </th>
        </tr>
    <?php endforeach; ?>
</table>
</div>

