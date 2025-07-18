<?php
if (session_status() === PHP_SESSION_NONE) session_start(); 

require_once __DIR__ . '/../bd/conexion.php';
require_once __DIR__ . '/../dao/ProveedorDAO.php';
require_once __DIR__ . '/../repository/ProveedorRepository.php';

$proveedorRepo = new ProveedorRepository(new ProveedorDAO($pdo));


if (isset($_GET['query'])) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(
        $proveedorRepo->sugerenciaProveedor(trim($_GET['query']))
    );
    exit;
}

if (isset($_GET['accion'], $_GET['id']) && $_GET['accion'] === 'eliminar') {
    $id = $_GET['id'];
    (new ProveedorDAO($pdo))->eliminarProveedor($id);
    header('Location: /minimarket2025/proveedores.php');
    exit;
}

$proveedorDTO = null;
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $proveedorDTO = $proveedorRepo->buscarPorId($id);
}



