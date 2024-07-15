<link rel="stylesheet" href="style.css">
<div class="container">
<?php 
require "config.php";

$info = [];
$id = filter_input(INPUT_GET,"id");

if($id){
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id= :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $info = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("location:index.php");
        exit;
    }
}
?>
<h2>EDITAR</h2>
<form action="editar_action.php" method="get">
    <input type="hidden" name="id" value="<?=$info["id"]?>">
    <label for="nome">INSIRA O NOME</label> <br>
    <input type="text" name="nome" value="<?=$info['nome']?>"><br>
    <label for="email">INSIRA O E-MAIL</label> <br>
    <input type="text" name="email" value="<?=$info['email']?>"><br>
    <label for="senha">INSIRA A SENHA</label> <br>
    <input type="password" name="senha" value="<?=$info['senha']?>"><br>

    <input type="submit" value="Editar">

</form>
</div>