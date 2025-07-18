<?php
session_start();
require_once __DIR__ . '/../bd/conexion.php';
require_once __DIR__ . '/../dao/ProductoDAO.php';
require_once __DIR__ . '/../repository/ProductoRepository.php';
require_once __DIR__ . '/../dto/ProductoDTO.php';
require_once __DIR__ . '/../dto/ProductoCreacionDTO.php';

$repo = new ProductoRepository(new ProductoDAO($pdo));

$id   = $_POST['id'] ?? null;
$dto  = $id
      ? new ProductoDTO($id, $_POST['nombre'], (int)$_POST['stock'], (float)$_POST['precio_unitario'],
                        (float)$_POST['precio_proveedor'], $_POST['codigo_proveedor'],
                        $_POST['codigo_categoria'], true)
      : new ProductoCreacionDTO($_POST['nombre'], (int)$_POST['stock'], (float)$_POST['precio_unitario'],
                                (float)$_POST['precio_proveedor'], $_POST['codigo_proveedor'],
                                $_POST['codigo_categoria'], true);

if ($id) {
    $ok = $repo->modificar($id, $dto);
} else {
    $ok = $repo->crear($dto);
}

header('Location: /minimarket2025/productos.php');
exit;