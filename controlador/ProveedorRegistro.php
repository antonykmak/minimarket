<?php
session_start();
require_once __DIR__ . '/../bd/conexion.php';
require_once __DIR__ . '/../dao/ProveedorDAO.php';
require_once __DIR__ . '/../repository/ProveedorRepository.php';
require_once __DIR__ . '/../dto/ProveedorDTO.php';
require_once __DIR__ . '/../dto/ProveedorCreacionDTO.php';

$proveedorRepo = new ProveedorRepository(new ProveedorDAO($pdo));

$id   = $_POST['id'] ?? null;
$dto  = $id
      ? new ProveedorDTO($id, $_POST['nombre'], $_POST['ruc'], true)
      : new ProveedorCreacionDTO($_POST['nombre'], $_POST['ruc'], true);
if ($id) {
    $ok = $proveedorRepo->modificar($dto);
} else {
    $ok = $proveedorRepo->crear($dto);  
}

header('Location: /minimarket2025/proveedores.php');
exit;



