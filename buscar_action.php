<?php 
require "config.php";
$email = filter_input(INPUT_GET,"email");
$tabela = [];

if($email){
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(":email", $email);
    $sql->execute();
    
    if($sql->rowCount() > 0){
        $tabela = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("location:index.php");
        exit;
    }
}
?>
<link rel="stylesheet" href="style.css">
<div class="container">
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>SENHA</th>
        <th>AÇÃO</th>
    </tr>
    <tr>
        <th><?=$tabela["id"]?></th>
        <th><?=$tabela['nome']?></th>
        <th><?=$tabela['email']?></th>
        <th><?=$tabela['senha']?></th>
        <th>
            <a href="excluir.php?id=<?=$tabela['id']?>">[EXCLUIR]</a><br>
            <a href="editar.php?id=<?=$tabela['id']?>">[EDITAR]</a>
        </th>
    </tr>
    <input type="button" value="Voltar" onclick="window.location.href='index.php'">
</table>
</div>