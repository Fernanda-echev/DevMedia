<?php

require_once __DIR__ . '/CategoriaModel.php';

class ArtigoModel {
    private $categoriaModel;
    private $tabela = "artigo";
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function listar() {
        $query = "SELECT artigo.*, categoria.nome as nome_categoria FROM artigo JOIN categoria ON artigo.id_cat = categoria.id_cat;";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    

    
    }

    public function buscarPorId($id_artigo) {
        $query = "SELECT * FROM $this->tabela WHERE id_artigo = :id_artigo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_artigo', $id_artigo, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function criar($artigo) {
        var_dump($artigo);

        $query = "INSERT INTO $this->tabela (titulo, conteudo, id_cat) VALUES (:titulo, :conteudo, :id_cat)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":titulo", $artigo["titulo"]);
        $stmt->bindParam(":conteudo", $artigo["conteudo"]);
        $stmt->bindParam(":id_cat", $artigo["id_cat"]);
        return $stmt->execute();
    }

    
    public function editar($artigo) {
        $query = "UPDATE $this->tabela SET titulo = :titulo, conteudo = :conteudo, id_cat = :id_cat WHERE id_artigo = :id_artigo";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":titulo", $artigo["titulo"]);
        $stmt->bindParam(":conteudo", $artigo["conteudo"]);
        $stmt->bindParam(":id_cat", $artigo["id_cat"]);
        $stmt->bindParam(":id_artigo", $artigo["id_artigo"]);
    
        return $stmt->execute();
    }
        
        

    public function excluir($id_artigo) {
        $query = "DELETE FROM $this->tabela WHERE id_artigo = :id_artigo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_artigo', $id_artigo, PDO::PARAM_INT);
        return $stmt->execute();
    }
    

    private function popularArtigosComartigo($artigos) {
        $artigos = $this->artigoModel->artigos;
        $artigosPopulados = [];

        foreach ($this->artigoModel->artigos as $artigo) {
            foreach ($artigos as $artigo) {
                if ($artigo['id_artigo'] == $artigo['id_cat']) {
                    $artigo['artigo'] = $artigo;
                    array_push($artigosPopulados, $artigo);
                }
            }
        }

        return $artigosPopulados;
    }

}