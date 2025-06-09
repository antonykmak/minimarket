<?php
require_once __DIR__ . '/../dao/UsuarioDAO.php';

class UsuarioRepository {
    private $usuarioDAO;

    public function __construct($dao) {
        $this->usuarioDAO = $dao;
    }

    public function registrarUsuario($dto) {
        $dto->contraseña = password_hash($dto->contraseña, PASSWORD_DEFAULT);
        return $this->usuarioDAO->guardar($dto);
    }

    public function validarLogin($usuario, $password) {
        $datos = $this->usuarioDAO->buscarPorUsuario($usuario);
        if ($datos && password_verify($password, $datos['contraseña'])) {
            return $datos;
        }
        return null;
    }
}
?>