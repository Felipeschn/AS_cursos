<?php require_once "global.php" ?>

<?php
    try {
    $codigo = $_GET['codigo'];
    $curso = new Curso($codigo);

    $curso->excluir();

    header('Location: cursos.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }