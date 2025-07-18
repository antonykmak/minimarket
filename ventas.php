<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
include __DIR__ . '/controlador/VentaControl.php';

$listaProductos = $productoRepo->obtenerTodos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estiloMenu.css">
    <title>Ventas</title>
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
            <h2 class="presentacion__contenido__titulo">Productos</h2>
            <div class="presentacion__contenido__cabecera">
                <a class="presentacion__contenido__cabecera__link" href="carrito.html">Carrito de compras</a>
                <form method="post">
                <input type="text" name="productos" class="presentacion__contenido__cabecera__buscador"
                oninput="FiltrarTabla('productos',this.value) "placeholder="Buscar producto" autocomplete="off">
                </form>
            </div>    
            <table class="presentacion__contenido__tabla">
                <thead class="presentacion__contenido__tabla__encabezado">
                    <tr class="presentacion__contenido__tabla__encabezado__fila">
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th>Stock</th>
                        <th>Precio</th>
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
                                <td class="presentacion__contenido__tabla__cuerpo__fila__acciones">
                                    <!-- añadir-->
                                    <a class="presentacion__contenido__tabla__cuerpo__fila__acciones__añadir"
                                        href="carrito.php?id=<?= $p->id ?>">Añadir</a>
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