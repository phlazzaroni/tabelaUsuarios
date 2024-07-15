<?php 
require "config.php";

$nome = filter_input(INPUT_GET,'nome');
$email = filter_input(INPUT_GET,'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_GET,'senha');
$id = filter_input(INPUT_GET,'id');

if($nome && $senha && $email){
    $sql = $pdo->prepare("UPDATE usuarios SET nome=:nome, email=:email, senha=:senha WHERE id=:id ");
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":senha", $senha);
    $sql->bindValue(":id", $id);
    $sql->execute();

    header('location:index.php');
    exit;
}else{
    header('location:index.php');
    exit;
}
