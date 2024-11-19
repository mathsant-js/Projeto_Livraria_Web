<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/autor.php';

class AutorController {
    private $autor;

    public function __construct() {
        $this->autor = new Autor();
        
        if ($_GET['acao'] ?? null) {
            if($_GET['acao'] == 'inserir') {
                $this->inserir();
                header('Location: ../views/tblAutor.php?acao=semacao');
            } else if($_GET['acao'] == 'atualizar') {
                $this->atualizar($_POST['codigo']);
                header('Location: ../views/tblAutor.php?acao=semacao');
            } else if($_GET['acao'] == 'excluir') {
                $this->excluir($_POST['codigo']);
                header('Location: ..views/tblAutor.php?acao=semacao');
            }
        }
    }

    public function inserir() {
        $this->autor->setNomeAutor($_POST['nome']);
        $this->autor->setBiografiaAutor($_POST['biografia']);
        $this->autor->setDatanascAutor($_POST['datanasc']);
        $this->autor->setDatafaleAutor($_POST['datafale']);
        $this->autor->setNacionalidadeAutor($_POST['nacionalidade']);

        $this->autor->inserir();
    }

    public function listar(){
        return $this->autor->listar();
    }

    public function exibirDescricaoAjax() {
        if (!isset($_POST['cod_autor']) || empty($_POST['cod_autor'])) {
            echo json_encode(['error' => 'ID não fornecido']);
            return;
        }
    
        $id = $_POST['cod_autor'];
        $descricao = $this->autor->buscarPorId($id);
    
        if ($descricao) {
            echo json_encode($descricao); // Retorna os dados em formato JSON
        } else {
            echo json_encode(['error' => 'Autor não encontrado']);
        }
    }

    public function buscarPorId($codAutor){
        return $this->autor->buscarPorId($codAutor);
    }

    public function atualizar($codAutor){
        $this->autor->setCodAutor($codAutor);
        $this->autor->setNomeAutor($_POST['nome']);
        $this->autor->setBiografiaAutor($_POST['biografia']);
        $this->autor->setDatanascAutor($_POST['datanasc']);
        $this->autor->setDatafaleAutor($_POST['datafale']);
        $this->autor->setNacionalidadeAutor($_POST['nacionalidade']);

        $this->autor->atualizar($codAutor);
    }

    public function excluir($codAutor) {
        $this->autor->excluir($codAutor);
    }
}

new AutorController();

?>