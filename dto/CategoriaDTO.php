<?php
class CategoriaDTO{
    public string $id;
    public string $nombre;
    public bool $estado;

    public function __construct(
        string $id,
        string $nombre,
        bool $estado = true
    ) {
        $this->id= $id;
        $this->nombre = $nombre;
        $this->estado = $estado;
    }
}
?>
