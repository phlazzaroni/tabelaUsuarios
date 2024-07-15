<?php 
require 'config.php';

$id = filter_input(INPUT_GET,'id');

if($id){

    $sql = $pdo->prepare('SELECT * FROM usuarios WHERE id= :id');
    $sql->bindValue(":id", $id);
    $sql->execute();
    $sql->rowCount();

    if($sql->rowCount() > 0){
        $sql = $pdo->prepare("DELETE FROM usuarios WHERE id= :id");
        $sql->bindValue(":id", $id);
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