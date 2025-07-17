<?php
require_once __DIR__ . '/../dto/UsuarioCreacionDTO.php';
require_once __DIR__ . '/../dto/UsuarioDTO.php';

class UsuarioDAO {
    private PDO $conexion;

    public function __construct(PDO $conexion) {
        $this->conexion = $conexion;
    }

    public function crearUsuario(UsuarioCreacionDTO $usuario) {
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

    public function buscarPorUsuario($usuario) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuario WHERE usuario = ? AND estado = 1");
        $stmt->execute([$usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function existeUsuario(string $usuario): bool {
    $sql = "SELECT 1 
              FROM usuario 
             WHERE usuario = ? 
             LIMIT 1";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([$usuario]);
    return (bool) $stmt->fetchColumn();
    }

    public function modificarUsuario($id, UsuarioDTO $usuario) {
        $sql = "UPDATE usuario 
                SET nombre_completo = ?, dni = ?, usuario = ?, contrasena = ?, rol = ?, estadoP = ?
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
}
?>