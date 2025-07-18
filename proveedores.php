<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
include __DIR__ . '/controlador/ProveedorControl.php';

$listaProveedores = $proveedorRepo->obtenerTodos();
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
            <h2 class="presentacion__contenido__titulo">Lista de proveedores</h2>
            <div class="presentacion__contenido__cabecera">
                <a class="presentacion__contenido__cabecera__link" href="proveedorFormulario.php">Nuevo Proveedor</a>
                <form method="post">
                    <input type="text" name="proveedor" class="presentacion__contenido__cabecera__buscador"
                        oninput="FiltrarTabla('proveedores',this.value)" placeholder="Buscar proveedor" autocomplete="off">
                </form>
            </div>
            <table class="presentacion__contenido__tabla">
                <thead class="presentacion__contenido__tabla__encabezado">
                    <tr class="presentacion__contenido__tabla__encabezado__fila">
                        <th>Nombre</th>
                        <th>Ruc</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="proveedores" class="presentacion__contenido__tabla__cuerpo">
                    <?php if (count($listaProveedores)): foreach ($listaProveedores as $p): ?>
                            <tr class="presentacion__contenido__tabla__cuerpo__fila">
                                <td><?= htmlspecialchars($p->nombre) ?></td>
                                <td><?= htmlspecialchars($p->ruc) ?></td>
                                <td class="presentacion__contenido__tabla__cuerpo__fila__acciones">
                                    <!-- editar -->
                                    <a class="presentacion__contenido__tabla__cuerpo__fila__acciones__boton"
                                        href="proveedorFormulario.php?id=<?= $p->id ?>">Editar</a>
                                    <!-- eliminar -->
                                    <a class="presentacion__contenido__tabla__cuerpo__fila__acciones__boton"
                                        href="controlador/ProveedorControl.php?accion=eliminar&id=<?= $p->id ?>"
                                        onclick="return confirm('¿Eliminar proveedor <?= addslashes($p->nombre) ?>?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach;
                    else: ?>
                        <tr>
                            <td colspan="8" style="text-align:center;">No hay proveedores</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
    <script src="js/filtrarTabla.js"></script>
</body>

</html>