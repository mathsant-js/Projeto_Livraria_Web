<?php

    // criação da classe PHP Conexao
    class Conexao {
        // declaração de variáveis privadas relacionadas à conexão com banco de dados: host, usuário, senha, banco de dados, e uma variável conexao que será utilizada em outro momento
        private $host = "localhost";
        private $usuario = "root";
        private $senha = "";
        private $banco = "db_livraria";
        private $conexao;

        // método construtor da classe; seu nome é padrão
        public function __construct() {
            // atribui à variável conexao um objeto mysqli, recebendo as variáveis anteriormente criadas como argumentos/parâmetros
            $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

            // condicional para mostrar uma mensagem de erro caso a conexão falhe
            if ($this->conexao->connect_error) {
                die("Falha na conexão: " . $this->conexao->connect_error);
            }
        }

        // função getConexao, para retornar a variável conexao quando chamado em outra classe/arquivo
        public function getConexao() {
            return $this->conexao;
        }

    }
?>