<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

include __DIR__ . '/controlador/UsuarioControl.php';

/** @var UsuarioDTO|null $usuarioDTO */
$usuarioDTO = $usuarioDTO ?? null;
$isEdit     = $usuarioDTO !== null;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estiloMenu.css">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <h1 class="header__titulo">CAMVELS</h1>
    </header>
    <main class="presentacion">
        <section class="presentacion__menu">
            <div class="presentacion__menu__paginas">
                <a class="presentacion__menu__paginas__link" href="productos.php">Productos</a>
                <a class="presentacion__menu__paginas__link" href="ventas.php">Ventas</a>
                <a class="presentacion__menu__paginas__link" href="compras.php">Compras</a>
                <a class="presentacion__menu__paginas__link" href="empleados.php">Empleados</a>
                <a class="presentacion__menu__paginas__link" href="proveedores.php">Proveedores</a>
                <a class="presentacion__menu__paginas__link" href="reportes.php">Reportes</a>
            </div>
        </section>
        <section class="presentacion__contenido">
            <h2 class="presentacion__contenido__titulo">
                <?= $isEdit ? 'Editar Empleado' : 'Nuevo Empleado' ?>
            </h2>
            <div class="presentacion__contenido__card">
                <form action="controlador/UsuarioRegistro.php" method="post"
                    class="presentacion__contenido__card__form" enctype="multipart/form-data">
                    <?php if ($isEdit): ?>
                        <input
                            type="hidden"
                            name="id"
                            value="<?= htmlspecialchars($usuarioDTO->id) ?>">
                    <?php endif; ?>

                    <table class="presentacion__contenido__card__tabla">
                        <tr>
                            <th colspan="2"><img src="images/empleado"></th>
                        </tr>
                        <tr>
                            <th colspan="2"><input name="foto_empleado" class="presentacion__contenido__input"
                                    type="file" accept="image/*"></th>
                        </tr>
                        <tr class="presentacion__contenido__card__tabla__fila">
                            <th><label>Nombre:</label></th>
                            <td><input
                                    type="text"
                                    name="nombre"
                                    required
                                    value="<?= $isEdit
                                                ? htmlspecialchars($usuarioDTO->nombre ?? '')
                                                : '' ?>">
                            </td>
                        </tr>
                        <tr class="presentacion__contenido__card__tabla__fila">
                            <th><label>DNI:</label></th>
                            <td><input
                                    type="text"
                                    name="dni"
                                    required
                                    value="<?= $isEdit
                                                ? htmlspecialchars($usuarioDTO->dni ?? '')
                                                : '' ?>">
                            </td>
                        </tr>
                        <tr class="presentacion__contenido__card__tabla__fila">
                            <th><label>rol:</label></th>
                            <td>
                                <select name="rol" required>
                                    <option value="admin" <?= $isEdit
                                                                && $usuarioDTO->rol === 'admin' ? 'selected' : '' ?>>Administrador</option>
                                    <option value="vendedor" <?= $isEdit
                                                                    && $usuarioDTO->rol === 'vendedor' ? 'selected' : '' ?>>Vendedor</option>
                                </select>
                            </td>
                        </tr>


                        <tr class="presentacion__contenido__card__tabla__fila">
                            <th><label>usuario:</label></th>
                            <td><input
                                    type="text"
                                    name="usuario"
                                    required
                                    value="<?= $isEdit
                                                ? htmlspecialchars($usuarioDTO->usuario ?? '')
                                                : '' ?>">
                            </td>
                        </tr>

                        <tr class="presentacion__contenido__card__tabla__fila">
                            <th><label>Contraseña:</label></th>
                            <td>
                                <input
                                    type="password"
                                    name="contrasena"
                                    <?= $isEdit ? '' : 'required' ?>>
                            </td>
                        </tr>
                        <tr class="presentacion__contenido__card__tabla__fila">
                            <th><label>Confirmar contraseña:</label></th>
                            <td>
                                <input
                                    type="password"
                                    name="confirmar_contrasena"
                                    <?= $isEdit ? '' : 'required' ?>>
                            </td>
                        </tr>
                        <tr class="presentacion__contenido__card__tabla__fila">
                            <th colspan="2" class="presentacion__contenido__card__tabla__fila__a">
                                <button type="submit"
                                    class="presentacion__contenido__card__tabla__fila__boton">
                                    <?= $isEdit ? 'Actualizar' : 'Registrar' ?>
                                </button>
                            </th>
                        </tr>
                    </table>
                </form>
            </div>
        </section>
    </main>
</body>

</html>