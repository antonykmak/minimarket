<?php
class ProveedorDTO{
    public string $id;
    public string $nombre;
    public string $ruc;
    public bool $estado;

    public function __construct(
        string $id,
        string $nombre,
        string $ruc,
        bool $estado
    ) {
        $this->id= $id;
        $this->nombre = $nombre;
        $this->ruc = $ruc;
        $this->estado = $estado;
    }
}
?>
