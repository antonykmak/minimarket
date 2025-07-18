<?php
require_once __DIR__ . '/../dao/UsuarioDAO.php';
require_once __DIR__ . '/../dto/UsuarioDTO.php';

class UsuarioRepository
{
    private UsuarioDAO $dao;

    public function __construct(UsuarioDAO $dao)
    {
        $this->dao = $dao;
    }

    public function buscarPorNombre(string $nombre): ?UsuarioDTO
    {
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

    public function crear(UsuarioCreacionDTO $usuario): bool
    {
        return $this->dao->crearUsuario($usuario);
    }

    public function modificar(UsuarioDTO $usuario): bool
    {
        return $this->dao->modificarUsuario($usuario->id, $usuario);
    }

    public function obtenerTodos(): array
    {
        $filas = $this->dao->buscarTodos();
        $usuarios = [];
        foreach ($filas as $f) {
            $usuarios[] = new UsuarioDTO(
                (int)   $f['id_usuario'],
                $f['nombre_completo'],
                $f['dni'],
                $f['usuario'],
                $f['contrasena'],
                $f['rol'],
                (bool)  $f['estado']
            );
        }
        return $usuarios;
    }

    public function buscarPorId(int $id): ?UsuarioDTO
    {
        $datos = $this->dao->buscarPorId($id);
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
    public function sugerenciaUsuario(string $term): array
    {
        return $this->dao->buscarNombresParciales($term);
    }
}
