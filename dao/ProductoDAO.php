<?php
require_once __DIR__ . '/../dto/ProductoCreacionDTO.php';
require_once __DIR__ . '/../dto/ProductoDTO.php';

class ProductoDAO {
    private PDO $conexion;

    public function __construct(PDO $conexion) {
        $this->conexion = $conexion;
    }

    public function crearProducto(ProductoCreacionDTO $producto) {
        $sql = "INSERT INTO producto (NOM_PROD, STOCK_PROD, PreU_PROD, PrePro_PROD, COD_PROVEE, COD_CATEG, estadoP)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $producto->nombre,
            $producto->stock,
            $producto->precio_unitario,
            $producto->precio_proveedor,
            $producto->codigo_proveedor,
            $producto->codigo_categoria,
            $producto->estado ? 1 : 0 
        ]);
    }

    public function buscarPorProducto($nombre) {
        $stmt = $this->conexion->prepare("SELECT * FROM producto WHERE NOM_PROD = ? AND estadoP = 1");
        $stmt->execute([$nombre]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM producto WHERE COD_PROD = ? AND estadoP = 1 LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function buscarTodos(): array
    {
        $sql = "
      SELECT 
        COD_PROD,
        NOM_PROD,
        STOCK_PROD,
        PreU_PROD,
        PrePro_PROD,
        COD_PROVEE,
        COD_CATEG,
        estadoP
      FROM producto
      WHERE estadoP = 1
      ORDER BY NOM_PROD ASC
    ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificarProducto($id, ProductoDTO $producto) {
        $sql = "UPDATE producto 
                SET NOM_PROD = ?, STOCK_PROD = ?, PreU_PROD = ?, PrePro_PROD = ?, COD_PROVEE = ?, COD_CATEG = ?, estadoP = ?
                WHERE COD_PROD = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $producto->nombre,
            $producto->stock,
            $producto->precio_unitario,
            $producto->precio_proveedor,
            $producto->codigo_proveedor,
            $producto->codigo_categoria,
            $producto->estado,
            $id
        ]);
    }

    public function eliminarProducto(String $id) {
        $sql = "UPDATE producto SET estadoP = 0 WHERE COD_PROD = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id]);
    }
    public function buscarNombresParciales(string $busqueda): array
    {
        $sql = "
            SELECT NOM_PROD
              FROM producto
             WHERE 
               estadoP = 1
               AND NOM_PROD LIKE ?
             LIMIT 10
        ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(["%{$busqueda}%"]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
?>