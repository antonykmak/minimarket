<?php
class UsuarioDTO
{
    public int $id;
    public string $nombre;
    public string $dni;
    public string $usuario;
    public string $contrasena;
    public string $rol;
    public bool $estado;

    public function __construct(int $id, string $nombre, string $dni, string $usuario, string $contrasena, string $rol, bool $estado)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->rol = $rol;
        $this->estado = $estado;
    }
}
