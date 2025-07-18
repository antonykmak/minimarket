<?php
require_once __DIR__ . '/../bd/conexion.php';
require_once __DIR__ . '/../dao/UsuarioDAO.php';
require_once __DIR__ . '/../repository/UsuarioRepository.php';
require_once __DIR__ . '/../dto/UsuarioDTO.php';
require_once __DIR__ . '/../dto/UsuarioCreacionDTO.php';

$repo = new UsuarioRepository(new UsuarioDAO($pdo));

$id        = $_POST['id'] ?? null;
$nombre    = trim($_POST['nombre'] ?? '');
$dni       = trim($_POST['dni'] ?? '');
$user = trim($_POST['usuario'] ?? '');
$rol       = trim($_POST['rol'] ?? '');
$contrasena = trim($_POST['contrasena'] ?? '');
$confirmar  = trim($_POST['confirmar_contrasena'] ?? '');

if (!empty($id) && $contrasena === '') {
    $hash = null;
} else {
    if ($contrasena !== $confirmar) {
        echo "<script>
                alert('Las contraseñas no coinciden');
                window.history.back();
              </script>";
        exit;
    }
    if (!preg_match(
        '/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{12,}$/',
        $contrasena
    )) {
        echo "<script>
                alert('La contraseña debe tener al menos 12 caracteres, una mayúscula, un número y un carácter especial.');
                window.history.back();
              </script>";
        exit;
    }
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);
}

if ($id) {
    if ($hash === null) {
        $oldDTO = $repo->buscarPorId((int)$id);
        if (!$oldDTO) {
            die('Usuario no encontrado');
        }
        $hash = $oldDTO->contrasena;
    }

    $dto = new UsuarioDTO(
        (int)$id,
        $nombre,
        $dni,
        $user,
        $hash,
        $rol,
        true
    );
    $ok = $repo->modificar($dto);
} else {
    $dto = new UsuarioCreacionDTO(
        $nombre,
        $dni,
        $user,
        $hash,
        $rol,
        true
    );
    $ok = $repo->crear($dto);
}

if ($ok) {
    echo "<script>
            alert('Usuario " . ($id ? 'actualizado' : 'registrado') . " correctamente');
            window.location.href = '/minimarket2025/empleados.php';
          </script>";
} else {
    echo "<script>
            alert('Error al " . ($id ? 'actualizar' : 'registrar') . " el usuario');
            window.history.back();
          </script>";
}
