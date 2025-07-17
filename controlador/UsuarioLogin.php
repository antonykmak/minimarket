<?php
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../bd/conexion.php';
    require_once __DIR__ . '/../dao/UsuarioDAO.php';
    require_once __DIR__ . '/../repository/UsuarioRepository.php';
    require_once __DIR__ . '/../dto/UsuarioDTO.php';

    $usuario = $_POST['usu'];
    $contrasena = $_POST['clave'];

    $usuarioDAO = new UsuarioDAO($pdo);
    $usuarioRepo = new UsuarioRepository($usuarioDAO);

    $usuarioDTO = $usuarioRepo->buscarPorNombre($usuario);

    if ($usuarioDTO && password_verify($contrasena, $usuarioDTO->contrasena)) {
        session_start();
        $_SESSION['usuario'] = $usuarioDTO->usuario;
        header("Location: /minimarket2025/menu.php");
        exit;
    } else {
        $mensaje     = 'Usuario o contraseña incorrectos';
        $error = "<script>
                      window.addEventListener('DOMContentLoaded',()=>{
                        alert(" . json_encode($mensaje) . ");
                      });
                    </script>";
        return;
    }
}
