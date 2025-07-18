<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
include __DIR__ . '/controlador/ProveedorControl.php';

/** @var ProveedorDTO|null $proveedorDTO */
$proveedorDTO = $proveedorDTO ?? null;
$isEdit = $proveedorDTO !== null;
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
                <a class="presentacion__menu__paginas__link" href="productos.php" >Productos</a>
                <a class="presentacion__menu__paginas__link" href="ventas.php">Ventas</a>
                <a class="presentacion__menu__paginas__link" href="compras.php">Compras</a>
                <a class="presentacion__menu__paginas__link" href="empleados.php">Empleados</a>
                <a class="presentacion__menu__paginas__link" href="proveedores.php">Proveedores</a>
                <a class="presentacion__menu__paginas__link" href="reportes.php">Reportes</a>
            </div>
        </section>
        <section class="presentacion__contenido">
            <h2 class="presentacion__contenido__titulo">
                <?= $isEdit ? 'Editar Proveedor' : 'Nuevo Proveedor' ?>
            </h2>
            <div class="presentacion__contenido__card">
                <form action="controlador/ProveedorRegistro.php" method="post"
                      class="presentacion__contenido__card__form">
                    <?php if ($isEdit): ?>
                        <input type="hidden" name="id" value="<?= htmlspecialchars($proveedorDTO->id) ?>">
                    <?php endif; ?>

                    <table class="presentacion__contenido__card__tabla">
                        <tr class="presentacion__contenido__card__tabla__fila">
                            <th><label>Nombre:</label></th>
                            <td><input name="nombre" class="presentacion__contenido__input"
                                       type="text" value="<?= htmlspecialchars($proveedorDTO->nombre ?? '') ?>"
                                       required></td>
                        </tr>
                        <tr class="presentacion__contenido__card__tabla__fila">
                            <th><label>RUC:</label></th>
                            <td><input name="ruc" class="presentacion__contenido__input"
                                       type="text" value="<?= htmlspecialchars($proveedorDTO->ruc ?? '') ?>"
                                       required></td>
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
        </section>
    </main>
</body>
</html>