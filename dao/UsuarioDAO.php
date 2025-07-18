<?php
require_once __DIR__ . '/../dto/UsuarioCreacionDTO.php';
require_once __DIR__ . '/../dto/UsuarioDTO.php';

class UsuarioDAO
{
    private PDO $conexion;

    public function __construct(PDO $conexion)
    {
        $this->conexion = $conexion;
    }

    public function crearUsuario(UsuarioCreacionDTO $usuario)
    {
        $sql = "INSERT INTO usuario (nombre_completo, dni, usuario, contrasena, rol, estado) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $usuario->nombre,
            $usuario->dni,
            $usuario->usuario,
            $usuario->contrasena,
            $usuario->rol,
            $usuario->estado ? 1 : 0
        ]);
    }

    public function buscarTodos(): array
    {
        $sql = "
      SELECT 
        id_usuario,
        nombre_completo,
        dni,
        usuario,
        contrasena,
        rol,
        estado
      FROM usuario
      WHERE estado = 1
      ORDER BY nombre_completo
    ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorUsuario($usuario)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM usuario WHERE usuario = ? AND estado = 1");
        $stmt->execute([$usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorId(int $id): ?array
    {
        $stmt = $this->conexion->prepare("SELECT * FROM usuario WHERE id_usuario = ? AND estado = 1");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    public function existeUsuario(string $usuario): bool
    {
        $sql = "SELECT 1 
              FROM usuario 
             WHERE usuario = ? 
             LIMIT 1";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$usuario]);
        return (bool) $stmt->fetchColumn();
    }

    public function modificarUsuario(int $id, UsuarioDTO $usuario)
    {
        $sql = "UPDATE usuario 
                SET nombre_completo = ?, dni = ?, usuario = ?, contrasena = ?, rol = ?, estado = ?
                WHERE id_usuario = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $usuario->nombre,
            $usuario->dni,
            $usuario->usuario,
            $usuario->contrasena,
            $usuario->rol,
            $usuario->estado ? 1 : 0,
            $id
        ]);
    }

    public function eliminarUsuario(int $id):bool
    {
        $sql = "UPDATE usuario SET estado = 0 WHERE id_usuario = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function buscarNombresParciales(string $busqueda): array
    {
        $sql = "
            SELECT nombre_completo
              FROM usuario
             WHERE 
               estado = 1
               AND nombre_completo LIKE ?
             LIMIT 10
        ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(["%{$busqueda}%"]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
