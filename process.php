<?php 
require 'config.php';

$nome = filter_input(INPUT_GET,'nome');
$email = filter_input(INPUT_GET,'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_GET,'senha');

if($nome && $senha && $email){
    $sql = $pdo->prepare('SELECT * FROM usuarios WHERE email= :email');
    $sql->bindValue(":email", $email);
    $sql->execute();
    $sql->rowCount();

    if($sql->rowCount() === 0){
        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        header('location:index.php');
        exit;
    }else{
        header('location:index.php');
        exit;
    }
}else{
    header('location:index.php');
    exit;
}