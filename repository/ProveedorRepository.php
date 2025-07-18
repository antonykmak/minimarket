<?php
require_once __DIR__ . '/../dao/ProveedorDAO.php';
require_once __DIR__ . '/../dto/ProveedorDTO.php';

class ProveedorRepository
{
    private ProveedorDAO $dao;

    public function __construct(ProveedorDAO $dao)
    {
        $this->dao = $dao;
    }

    public function buscarPorNombre(string $nombre): ?ProveedorDTO
    {
        $datos = $this->dao->buscarPorProveedor($nombre);
        if ($datos) {
            return new ProveedorDTO(
                $datos['COD_PROVEE '],
                $datos['NOM_PROVEE'],
                $datos['RUC_PROVEE'],
                (bool)$datos['estado']
            );
        }
        return null;
    }

    public function crear(ProveedorCreacionDTO $proveedor): bool
    {
        return $this->dao->crearProveedor($proveedor);
    }

    public function modificar(ProveedorDTO $proveedor): bool
    {
        return $this->dao->modificarProveedor($proveedor->id, $proveedor);
    }

    public function buscarPorId(String $id): ?ProveedorDTO
    {
        $datos = $this->dao->buscarPorId($id);
        if ($datos) {
            return new ProveedorDTO(
                $datos['COD_PROVEE'],
                $datos['NOM_PROVEE'],
                $datos['RUC_PROVEE'],
                (bool)$datos['estado']
            );
        }
        return null;
    }

    public function obtenerTodos(): array
    {
        $filas = $this->dao->buscarTodos();
        $proveedores = [];
        foreach ($filas as $f) {
            $proveedores[] = new ProveedorDTO(
                $f['COD_PROVEE'],
                $f['NOM_PROVEE'],
                $f['RUC_PROVEE'],
                (bool) $f['estado']
            );
        }
        return $proveedores;
    }

    public function sugerenciaProveedor(string $term): array
    {
        return $this->dao->buscarNombresParciales($term);
    }
}
