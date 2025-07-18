<?php
class ProveedorCreacionDTO{
    public string $nombre;
    public string $ruc;
    public bool $estado;

    public function __construct(
        string $nombre,
        string $ruc,
        bool $estado
    ) {
        $this->nombre = $nombre;
        $this->ruc = $ruc;
        $this->estado = $estado;
    }
}
?>
