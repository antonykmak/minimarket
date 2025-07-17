<?php
require_once __DIR__ . '/../bd/conexion.php';
require_once __DIR__ . '/../dao/usuarioDAO.php';
require_once __DIR__ . '/../dto/UsuarioCreacionDTO.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $dni = trim($_POST['dni']);
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);
    $rol = trim($_POST['rol']);


    // Validación de contraseña segura
    if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{12,}$/', $contrasena)) {
        echo "<script>alert('La contraseña debe tener al menos 12 caracteres, una mayúscula, un número y un carácter especial.'); window.history.back();</script>";
        exit;
    }

    // Hashear la contraseña
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Crear DTO de usuario
    $nuevoUsuario = new UsuarioCreacionDTO($nombre, $dni, $usuario, $hash, $rol, true);

    // Insertar en la BD
    $dao = new UsuarioDAO($pdo);

    if ($dao->existeUsuario($usuario)) {
        echo "<script>alert('El usuario ya existe'); window.history.back();</script>";
        exit;
    }

    $resultado = $dao->crearUsuario($nuevoUsuario);

    if ($resultado) {
        echo "<script>alert('Usuario registrado correctamente'); window.location.href = '/../menu.php';</script>";
    } else {
        echo "<script>alert('Error al registrar usuario'); window.history.back();</script>";
    }
}