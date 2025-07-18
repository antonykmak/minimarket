<?php
require_once __DIR__ . '/../dao/CategoriaDAO.php';
require_once __DIR__ . '/../dto/CategoriaDTO.php';

class CategoriaRepository
{
    private CategoriaDAO $dao;

    public function __construct(CategoriaDAO $dao)
    {
        $this->dao = $dao;
    }

    public function crear(CategoriaDTO $categoria): bool
    {
        return $this->dao->crearCategoria($categoria);
    }

    public function buscarPorNombre(string $nombre): ?CategoriaDTO
    {
        $datos = $this->dao->buscarPorNombre($nombre);
        if ($datos) {
            return new CategoriaDTO(
                $datos['COD_CATEG'],
                $datos['NOM_CATEG'],
                (bool)$datos['estado']
            );
        }
        return null;
    }

    public function buscarPorId(String $id): ?CategoriaDTO
    {
        $datos = $this->dao->buscarPorId($id);
        if ($datos) {
            return new CategoriaDTO(
                $datos['COD_CATEG'],
                $datos['NOM_CATEG'],
                (bool)$datos['estado']
            );
        }
        return null;
    }

    public function obtenerTodos(): array
    {
        return $this->dao->buscarTodos();
    }
}

