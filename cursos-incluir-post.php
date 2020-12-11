<?php require_once "global.php" ?>

<?php
    try {
        $codigo = $_GET['codigo'];
        Cliente::inclui($codigo);

        header('Location: cursos.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }