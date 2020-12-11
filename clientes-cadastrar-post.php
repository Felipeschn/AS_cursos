<?php
    require_once 'global.php';

    try {
        $cliente = new Cliente();
        $username = $_POST['username'];
        $senha = $_POST['senha'];
        $nome = $_POST['nome'];
        $endereco = $_POST['email'];       

        $cliente->username = $username;
        $cliente->senha = $senha;
        $cliente->nome = $nome;
        $cliente->email = $email;        

        $cliente->inserir();

        header('Location: portal.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }