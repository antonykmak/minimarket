<?php
if (session_status() === PHP_SESSION_NONE) session_start(); 

require_once __DIR__ . '/../bd/conexion.php';
require_once __DIR__ . '/../dao/ProductoDAO.php';  
require_once __DIR__ . '/../repository/ProductoRepository.php';

$productoRepo = new ProductoRepository(new ProductoDAO($pdo));

// Autocompletado
if (isset($_GET['query'])) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(
        $productoRepo->sugerenciaProducto(trim($_GET['query']))
    );
    exit;
}

// Eliminar producto
if (isset($_GET['accion'], $_GET['id']) && $_GET['accion'] === 'eliminar') {
    $id = $_GET['id'];
    (new ProductoDAO($pdo))->eliminarProducto($id);
    header('Location: /minimarket2025/productos.php');
    exit;
}

// Buscar producto por ID
$productoDTO = null;
if (isset($_GET['id'])) {
    $productoDTO = $productoRepo->buscarPorId($_GET['id']);
}

// Editar producto
$productoDTO = null;
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $productoDTO = $productoRepo->buscarPorId($id);
}
