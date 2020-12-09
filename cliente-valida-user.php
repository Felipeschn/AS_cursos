<?php require_once 'global.php' ?>

<?php
    try {
        $cliente = new Cliente();

        $username = $_POST['username'];
        $cliente->username = $username;
        
        $senha = $_POST['senha'];
        $cliente->senha = $senha; 

        $cliente->validaUser();

        header('Location: portal.php');
    } catch (Exception $e) {
        header('Location: errors.php');
    }

