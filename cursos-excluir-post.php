<?php require_once "global.php" ?>

<?php
    try {
    $codigo = $_GET['codigo'];
    $curso = new Curso($codigo);

    $curso->excluir();

    header('Location: portal.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }