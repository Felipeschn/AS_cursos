<?php

class Cliente
{

    public $idusuario;
    public $username;
    public $senha;
    public $nome;
    public $email;  

    public function __construct($idusuario = false)
    {
        if ($idusuario) {
            $this->idusuario = $idusuario;
            $this->carregar();
        }
    }

    public function listar()
    {
        $query = "SELECT username, senha, nome, email FROM tb_usuarios";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        $query = "SELECT username, nome, email FROM tb_usuarios WHERE idusuario = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {   
            
            $this->username     = $linha["username"];
            $this->nome     = $linha["nome"];
            $this->email = $linha["email"];
        }
    }

    public function inserir()
    {
        $query = "INSERT INTO tb_usuarios (username, senha, nome, email) VALUES ('" . $this->username . "','" . $this->senha . "','" . $this->nome . "','" . $this->email . "')";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function excluir()
    {
        $query = "DELETE FROM tb_usuarios WHERE idusuario = " . $this->idusuario;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    private function cadastraCache(int $id, $manager, $nomeUsuario)
    {      
        $conexao = Conexao::pegarConexao();  
        $conexao->exec("DELETE FROM tb_cache");
        $query = "INSERT INTO tb_cache VALUES ('$manager', $id, '$nomeUsuario')";
        $conexao->exec($query);
    }

    public static function getCache()
    {
        $query = "SELECT * FROM tb_cache";

        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();

        return (object)$lista[0];
    }

    public function validaUser(){
        $query = "SELECT * FROM tb_usuarios WHERE username = '$this->username' AND senha = '$this->senha'";

        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();


        if (!$lista) {
            throw new Exception('Usuário ou senha incorreto');
        }

        $this->cadastraCache($lista[0]['idusuario'], $lista[0]['manager'], $lista[0]['nome']);
    }
    public static function inclui($cursoId)
    {
        $usuarioId = Self::getCache()->userid;
        $query = "SELECT * FROM tb_usuarios WHERE idusuario = $usuarioId";

        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();

        $cursos = json_decode($lista[0]['cursos']);
        $cursos[] = (int)$cursoId;
        $cursos = json_encode($cursos);

        $query = "UPDATE tb_usuarios SET cursos = '$cursos' where idusuario = $usuarioId";

        $conexao->exec($query);
    }

    public static function getCursosUsuarioLogado(){
        $usuarioId = Self::getCache()->userid;
        $query = "SELECT * FROM tb_usuarios WHERE idusuario = $usuarioId";

        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();

        $cursos = json_decode($lista[0]['cursos']);
        
        if (!$cursos) {
            $cursos = [];
        }
        return $cursos;
    }
}