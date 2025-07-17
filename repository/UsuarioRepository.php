<?php
require_once __DIR__ . '/../dao/UsuarioDAO.php';
require_once __DIR__ . '/../dto/UsuarioDTO.php';

class UsuarioRepository {
    private UsuarioDAO $dao;

    public function __construct(UsuarioDAO $dao) {
        $this->dao = $dao;
    }

    public function buscarPorNombre(string $nombre): ?UsuarioDTO {
        $datos = $this->dao->buscarPorUsuario($nombre);
        if ($datos) {
            return new UsuarioDTO(
                (int)$datos['id_usuario'],
                $datos['nombre_completo'],
                $datos['dni'],
                $datos['usuario'],
                $datos['contrasena'],
                $datos['rol'],
                (bool)$datos['estado']
            );
        }
        return null;
    }
}
?>