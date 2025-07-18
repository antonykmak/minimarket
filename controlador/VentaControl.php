<?php
if (session_status() === PHP_SESSION_NONE) session_start(); 

require_once __DIR__ . '/../bd/conexion.php';
require_once __DIR__ . '/../dao/ProductoDAO.php';
require_once __DIR__ . '/../repository/ProductoRepository.php';

$productoRepo = new ProductoRepository(new ProductoDAO($pdo));


if (isset($_GET['query'])) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(
        $productoRepo->sugerenciaProducto(trim($_GET['query']))
    );
    exit;
}

if (isset($_GET['accion'], $_GET['id']) && $_GET['accion'] === 'eliminar') {
    $id = (int) $_GET['id'];
    (new ProductoDAO($pdo))->eliminarProducto($id);
    header('Location: /minimarket2025/ventas.php');
    exit;
}
