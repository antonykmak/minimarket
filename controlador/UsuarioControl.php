<?php
if (session_status() === PHP_SESSION_NONE) session_start(); 

require_once __DIR__ . '/../bd/conexion.php';
require_once __DIR__ . '/../dao/UsuarioDAO.php';
require_once __DIR__ . '/../repository/UsuarioRepository.php';
require_once __DIR__ . '/../dto/UsuarioDTO.php';

$usuarioRepo = new UsuarioRepository(new UsuarioDAO($pdo));


if (isset($_GET['query'])) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(
        $usuarioRepo->sugerenciaUsuario(trim($_GET['query']))
    );
    exit;
}

if (isset($_GET['accion'], $_GET['id']) && $_GET['accion'] === 'eliminar') {
    $id = (int) $_GET['id'];
    (new UsuarioDAO($pdo))->eliminarUsuario($id);
    header('Location: /minimarket2025/empleados.php');
    exit;
}

$usuarioDTO = null;
if (!empty($_GET['id'])) {
    $id = (int)$_GET['id'];
    $usuarioDTO = $usuarioRepo->buscarPorId($id);
}