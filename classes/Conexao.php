<?php

class Conexao
{
    public static function pegarConexao()
    {
        $conexao = new PDO(DB_DRIVE . ':dbname=' . DB_HOSTNAME . ';host=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    }
}

