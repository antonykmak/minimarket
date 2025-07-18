<?php
require_once __DIR__ . '/../dao/ProductoDAO.php';
require_once __DIR__ . '/../dto/ProductoDTO.php';

class ProductoRepository
{
    private ProductoDAO $dao;

    public function __construct(ProductoDAO $dao)
    {
        $this->dao = $dao;
    }

    public function crear(ProductoCreacionDTO $producto): bool
    {
        return $this->dao->crearProducto($producto);
    }

    public function buscarPorId(String $id): ?ProductoDTO
    {
        $datos = $this->dao->buscarPorId($id);
        if ($datos) {
            return new ProductoDTO(
                $datos['COD_PROD'],
                $datos['NOM_PROD'],
                (int)$datos['STOCK_PROD'],
                (float)$datos['PreU_PROD'],
                (float)$datos['PrePro_PROD'],
                $datos['COD_PROVEE'],
                $datos['COD_CATEG'],
                (bool)$datos['estadoP']
            );
        }
        return null;
    }
    public function buscarPorNombre(string $nombre): ?ProductoDTO
    {
        $datos = $this->dao->buscarPorProducto($nombre);
        if ($datos) {
            return new ProductoDTO(
                $datos['COD_PROD'],
                $datos['NOM_PROD'],
                $datos['STOCK_PROD'],
                $datos['PreU_PROD'],
                $datos['PrePro_PROD'],
                $datos['COD_PROVEE'],
                $datos['COD_CATEG'],
                (bool)$datos['estadoP']
            );
        }
        return null;
    }

    public function obtenerTodos(): array
    {
        $filas = $this->dao->buscarTodos();
        $productos = [];
        foreach ($filas as $f) {
            $productos[] = new ProductoDTO(
                $f['COD_PROD'],
                $f['NOM_PROD'],
                $f['STOCK_PROD'],
                $f['PreU_PROD'],
                $f['PrePro_PROD'],
                $f['COD_PROVEE'],
                $f['COD_CATEG'],
                (bool) $f['estadoP']
            );
        }
        return $productos;
    }

    public function modificar(String $id, ProductoDTO $producto): bool
    {
        return $this->dao->modificarProducto($id, $producto);
    }

    public function sugerenciaProducto(string $term): array
    {
        return $this->dao->buscarNombresParciales($term);
    }
}
