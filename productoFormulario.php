<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

include __DIR__ . '/controlador/ProductoControl.php';
require_once __DIR__ . '/dao/CategoriaDAO.php';
require_once __DIR__ . '/repository/CategoriaRepository.php';
require_once __DIR__ . '/dao/ProveedorDAO.php';
require_once __DIR__ . '/repository/ProveedorRepository.php';

$categoriaRepo = new CategoriaRepository(new CategoriaDAO($pdo));
$proveedorRepo = new ProveedorRepository(new ProveedorDAO($pdo));

/** @var ProductoDTO|null $productoDTO */
$productoDTO = $productoDTO ?? null;
$isEdit     = $productoDTO !== null;
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
                <?= $isEdit ? 'Editar Producto' : 'Nuevo Producto' ?>
            </h2>
            <form
                action="controlador/ProductoRegistro.php"
                method="post"
                class="presentacion__contenido__card__form"
                enctype="multipart/form-data">
                <?php if ($isEdit): ?>
                    <input type="hidden" name="id" value="<?= $productoDTO->id ?>" readonly>
                <?php endif; ?>
                <table class="presentacion__contenido__card__tabla">
                    <tr>
                        <th colspan="2"><img src="images/producto"></th>
                    </tr>
                    <tr>
                        <th colspan="2"><input class="presentacion__contenido__input"
                                type="file" accept="image/*"></th>
                    </tr>
                    <tr class="presentacion__contenido__card__tabla__fila">
                        <th><label>Producto:</label></th>
                        <td>
                            <input
                                type="text"
                                name="nombre"
                                required
                                value="<?= $isEdit
                                            ? htmlspecialchars($productoDTO->nombre ?? '')
                                            : '' ?>">
                        </td>
                    </tr>
                    <tr class="presentacion__contenido__card__tabla__fila">
                        <th><label>Categoría:</label></th>
                        <td>
                            <select name="codigo_categoria" required>
                                <?php foreach ($categoriaRepo->obtenerTodos() as $cat): ?>
                                    <option
                                        value="<?= $cat['COD_CATEG'] ?>"
                                        <?= $isEdit && 
                                        $cat['COD_CATEG'] === $productoDTO->codigo_categoria ?
                                         'selected' : '' ?>>
                                        <?= htmlspecialchars($cat['NOM_CATEG']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr class="presentacion__contenido__card__tabla__fila">
                        <th><label>Proveedor:</label></th>
                        <td>
                            <select name="codigo_proveedor" required>
                                <?php foreach ($proveedorRepo->obtenerTodos() as $p): ?>
                                    <option
                                        value="<?= $p->id ?>"
                                        <?= $isEdit && $p->id === $productoDTO->codigo_proveedor
                                            ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($p->nombre ?? '') ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr class="presentacion__contenido__card__tabla__fila">
                        <th><label>Stock:</label></th>
                        <td>
                            <input
                                type="number"
                                name="stock"
                                required
                                value="<?= $isEdit
                                            ? htmlspecialchars($productoDTO->stock ?? '')
                                            : '0' ?>">
                        </td>
                    </tr>
                    <tr class="presentacion__contenido__card__tabla__fila">
                        <th><label>Precio venta:</label></th>
                        <td>
                            <input
                                type="text"
                                name="precio_unitario"
                                required
                                value="<?= $isEdit
                                            ? htmlspecialchars($productoDTO->precio_unitario ?? '')
                                            : '' ?>">
                        </td>
                    </tr>
                    <tr class="presentacion__contenido__card__tabla__fila">
                        <th><label>Precio compra:</label></th>
                        <td>
                            <input
                                type="text"
                                name="precio_proveedor"
                                required
                                value="<?= $isEdit
                                            ? htmlspecialchars($productoDTO->precio_proveedor ?? '')
                                            : '' ?>">
                        </td>
                    </tr>
                    <tr class="presentacion__contenido__card__tabla__fila">
                        <td colspan="2" class="presentacion__contenido__card__tabla__fila__a">
                            <button type="submit" 
                            class="presentacion__contenido__card__tabla__fila__boton">
                                <?= $isEdit ? 'Actualizar' : 'Registrar' ?>
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
        </section>
    </main>
</body>

</html>