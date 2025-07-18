<?php
require_once __DIR__ . '/../dto/CategoriaDTO.php';

class CategoriaDAO {
    private PDO $conexion;

    public function __construct(PDO $conexion) {
        $this->conexion = $conexion;
    }

    public function crearCategoria(CategoriaDTO $categoria) {
        $sql = "INSERT INTO categoria (NOM_CATEG, estadoC)
                VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $categoria->nombre,
            $categoria->estado ? 1 : 0
        ]);
    }

    public function buscarPorNombre($nombre) {
        $stmt = $this->conexion->prepare("SELECT * FROM categoria WHERE NOM_CATEG = ? AND estado = 1");
        $stmt->execute([$nombre]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM categoria WHERE COD_CATEG = ? AND estado = 1 LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function buscarTodos(): array {
        $sql = "
      SELECT 
        COD_CATEG,
        NOM_CATEG,
        estado
      FROM categoria
      WHERE estado = 1
      ORDER BY NOM_CATEG ASC
    ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}