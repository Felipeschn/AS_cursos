<?php require_once 'global.php' ?>

<?php
    try {
        $curso = new Curso();

        $nome = $_POST['nome'];
        $curso->nome = $nome; 

        $curso->inserir();

        header('Location: cursos.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }

