
<?php
require_once __DIR__ . "/../config/Database.php";

class CategoriaModel {
    private $tabela = "categoria";
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function listar() {
        $query = "SELECT * FROM $this->tabela";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id){
        $query = "SELECT * FROM $this->tabela WHERE id_cat = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }

    public function criar($categoria) {
        $query = "INSERT INTO $this->tabela (nome) VALUES (:nome)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $categoria["nome"]);
        return $stmt->execute();
    }

    public function editar($categoria) {
        $query = "UPDATE $this->tabela SET nome = :nome WHERE id_cat = :id_cat";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_cat", $categoria["id_cat"]);
        $stmt->bindParam(":nome", $categoria["nome"]);
        return $stmt->execute();
    }

    public function excluir($id_cat) {
        $query = "DELETE FROM $this->tabela WHERE id_cat = :id_cat";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_cat', $id_cat, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
        


}
