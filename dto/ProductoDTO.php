<?php
class ProductoDTO
{
    public string $id;
    public string $nombre;
    public int $stock;
    public float $precio_unitario;
    public float $precio_proveedor;
    public string $codigo_proveedor;
    public string $codigo_categoria;
    public bool $estado;

    public function __construct(
        string $codigo,
        string $nombre,
        int $stock,
        float $precio_unitario,
        float $precio_proveedor,
        string $codigo_proveedor,
        string $codigo_categoria,
        bool $estado
    ) {
        $this->id = $codigo;
        $this->nombre = $nombre;
        $this->stock = $stock;
        $this->precio_unitario = $precio_unitario;
        $this->precio_proveedor = $precio_proveedor;
        $this->codigo_proveedor = $codigo_proveedor;
        $this->codigo_categoria = $codigo_categoria;
        $this->estado = $estado;
    }
}
