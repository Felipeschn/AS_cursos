<?php

class Curso
{

    public $codigo;
    public $nome;

    public function __construct($codigo = false)
    {
        if ($codigo) {
            $this->codigo = $codigo;
            $this->carregar();
        }
    }

    public function listar()
    {
        $query = "SELECT codigo, nome FROM cursos";                        
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function cursosDoUsuario($cursosIds)
    {
        if (!$cursosIds) {
            return [];
        }
        $cursosIds = implode(', ', $cursosIds);
        $query = "SELECT codigo, nome FROM cursos WHERE codigo IN ($cursosIds)";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function getProduto()
    {
        $obj= array(
            'codigo' => $this->codigo,     
            'nome'   => $this->nome,     
        );
        return json_encode($obj);
    }

    public function carregar()
    {        
        $query = "  SELECT 
                        codigo,
                        nome
                    FROM 
                        cursos 
                    WHERE
                        codigo = ". $this->codigo;                      
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {            
            $this->codigo      = $linha['codigo'];
            $this->nome    = $linha['nome'];           
        }
    }

    public function inserir()
    {
        $query = "INSERT INTO cursos (nome) VALUES ('" . $this->nome . "')";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function excluir()
    {
        $query = "DELETE FROM cursos WHERE codigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }
}