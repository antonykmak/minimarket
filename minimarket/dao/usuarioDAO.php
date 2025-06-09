<?php
require_once __DIR__ . '/../repository/conexion.php';

class UsuarioDAO {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function obtenerUsuario(UsuarioDTO $usuario) {
        $sql = "INSERT INTO usuario (nombre_completo, dni, usuario, contraseña, rol, estado) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $usuario->nombre_completo,
            $usuario->dni,
            $usuario->usuario,
            $usuario->contraseña,
            $usuario->rol,
            $usuario->estado
        ]);
    }

    public function buscarPorUsuario($usuario) {
        $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE usuario = ? AND estado = 1");
        $stmt->execute([$usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>