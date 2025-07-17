<?php 
session_start();
$error = '';

include __DIR__ . '/controlador/UsuarioLogin.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estiloLogin.css">
    <title>Login</title>
    <?= $error ?>
</head>
<body>
    <main class="login">
        <h2>Minimarket Camvels</h2>
        <form id="login" action="" method="post">
            <input type="text" name="usu" placeholder="Usuario" id="usuario" required>
            <input type="password" name="clave" placeholder="Contraseña" id="pass" required>
            <button type="submit">Iniciar sesion</button>
        </form>
    </main>
</body>
</html>