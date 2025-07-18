<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
include __DIR__ . '/controlador/ProductoControl.php';

$listaProductos = $productoRepo->obtenerTodos();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estiloMenu.css">
    <title>Productos</title>
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
            <h2 class="presentacion__contenido__titulo">Lista de productos</h2>
            <div class="presentacion__contenido__cabecera">
                <a class="presentacion__contenido__cabecera__link" href="productoFormulario.php">Nuevo Producto</a>
                <form method="post">
                    <input type="text" name="producto" class="presentacion__contenido__cabecera__buscador"
                        oninput="FiltrarTabla('productos',this.value)" placeholder="Buscar producto" autocomplete="off">
                </form>
            </div>
            <table class="presentacion__contenido__tabla">
                <thead class="presentacion__contenido__tabla__encabezado">
                    <tr class="presentacion__contenido__tabla__encabezado__fila">
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Precio Compra</th>
                        <th>Acciones</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody id="productos" class="presentacion__contenido__tabla__cuerpo">
                    <?php if (count($listaProductos)): foreach ($listaProductos as $p): ?>
                            <tr class="presentacion__contenido__tabla__cuerpo__fila">
                                <td><?= htmlspecialchars($p->nombre) ?></td>
                                <td><?= htmlspecialchars($p->codigo_categoria) ?></td>
                                <td><?= htmlspecialchars($p->stock) ?></td>
                                <td><?= htmlspecialchars($p->precio_unitario) ?></td>
                                <td><?= htmlspecialchars($p->precio_proveedor) ?></td>

                                <td class="presentacion__contenido__tabla__cuerpo__fila__acciones">
                                    <!-- editar -->
                                    <a class="presentacion__contenido__tabla__cuerpo__fila__acciones__añadir"
                                        href="productoFormulario.php?id=<?= $p->id ?>">Editar</a>
                                    <!-- eliminar -->
                                    <a class="presentacion__contenido__tabla__cuerpo__fila__acciones__boton"
                                        href="controlador/ProductoControl.php?accion=eliminar&id=<?= $p->id ?>"
                                        onclick="return confirm('¿Eliminar producto <?= addslashes($p->nombre) ?>?');">Eliminar</a>
                                </td>
                                <td><img class="presentacion__contenido__tabla__cuerpo__fila__imagen" src="images/nombre"></td>
                            </tr>
                        <?php endforeach;
                    else: ?>
                        <tr>
                            <td colspan="8" style="text-align:center;">No hay productos</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
    <script src="js/filtrarTabla.js"></script>
</body>

</html>