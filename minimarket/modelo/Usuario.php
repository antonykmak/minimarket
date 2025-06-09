<?php
class UsuarioDTO {
    public $id_usuario;
    public $nombre_completo;
    public $dni;
    public $usuario;
    public $contraseña;
    public $rol;
    public $estado;

    public function __construct($nombre, $dni, $usuario, $contraseña, $rol, $estado) {
        $this->nombre_completo = $nombre;
        $this->dni = $dni;
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        $this->rol = $rol;
        $this->estado = $estado;
    }


}
?>