<?php
require_once __DIR__ . '/../dto/ProveedorCreacionDTO.php';
require_once __DIR__ . '/../dto/ProveedorDTO.php';

class ProveedorDAO
{
    private PDO $conexion;

    public function __construct(PDO $conexion)
    {
        $this->conexion = $conexion;
    }

    public function crearProveedor(ProveedorCreacionDTO $proveedor)
    {
        $sql = "INSERT INTO proveedor (NOM_PROVEE, RUC_PROVEE, estado)
                VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $proveedor->nombre,
            $proveedor->ruc,
            $proveedor->estado ? 1 : 0
        ]);
    }

    public function buscarPorProveedor($nombre)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM proveedor WHERE codigo_proveedor = ?");
        $stmt->execute([$nombre]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function buscarPorId(String $id): ?array
    {
        $stmt = $this->conexion->prepare("SELECT * FROM proveedor WHERE COD_PROVEE = ? AND estado = 1 LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function buscarTodos(): array
    {
        $sql = "
      SELECT 
        COD_PROVEE,
        NOM_PROVEE,
        RUC_PROVEE,
        estado
      FROM proveedor
      WHERE estado = 1
      ORDER BY NOM_PROVEE ASC
    ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificarProveedor($id, ProveedorDTO $proveedor)
    {
        $sql = "UPDATE proveedor 
                SET NOM_PROVEE = ?, RUC_PROVEE = ?, estado = ?
                WHERE COD_PROVEE = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $proveedor->nombre,
            $proveedor->ruc,
            $proveedor->estado ? 1 : 0,
            $id
        ]);
    }

    public function eliminarProveedor(String $id)
    {
        $sql = "UPDATE proveedor SET estado = 0 WHERE COD_PROVEE = ? AND estado = 1;";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function buscarNombresParciales(string $busqueda): array
    {
        $sql = "
            SELECT NOM_PROVEE
              FROM proveedor
             WHERE 
               estado = 1
               AND NOM_PROVEE LIKE ?
             LIMIT 10
        ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(["%{$busqueda}%"]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
