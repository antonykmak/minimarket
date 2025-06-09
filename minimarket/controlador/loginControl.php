<?php
session_start();
require_once __DIR__ . '/../dao/usuarioDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $dao = new usuarioDAO();
    $usuario = $dao->obtenerUsuario($username);

    if ($usuario && password_verify($password, $usuario->getPassword())) {
        $_SESSION['user_id'] = $usuario->getId();
        $_SESSION['username'] = $usuario->getUsername();
        header("Location: ../productos.html");
        exit;
    } else {
        echo "Credenciales incorrectas.";
    }
} else {
    echo "Método no permitido.";
}
