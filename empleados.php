<?php
session_start();
if (!isset($_SESSION['usuario']))
    header("Location:login.php");

include __DIR__ . '/controlador/UsuarioControl.php';

$listaUsuarios = $usuarioRepo->obtenerTodos();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estiloMenu.css">
    <title>Empleados</title>
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
            <h2 class="presentacion__contenido__titulo">Lista de empleados</h2>
            <div class="presentacion__contenido__cabecera">
                <a class="presentacion__contenido__cabecera__link" href="empleadoFormulario.php">Nuevo Empleado</a>
                <form method="post">
                    <input type="text" name="usuario" class="presentacion__contenido__cabecera__buscador"
                        placeholder="Buscar empleado" oninput="FiltrarTabla('usuarios',this.value)" autocomplete="off">
                </form>
            </div>
            <table class="presentacion__contenido__tabla">
                <thead class="presentacion__contenido__tabla__encabezado">
                    <tr class="presentacion__contenido__tabla__encabezado__fila">
                        <th>Nombre</th>
                        <th>Dni</th>
                        <th>Rol</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody id="usuarios" class="presentacion__contenido__tabla__cuerpo">
                    <?php if (count($listaUsuarios) > 0): ?>
                        <?php foreach ($listaUsuarios as $usr): ?>
                            <tr class="presentacion__contenido__tabla__cuerpo__fila">
                                <td><?= htmlspecialchars($usr->nombre) ?></td>
                                <td><?= htmlspecialchars($usr->dni) ?></td>
                                <td><?= htmlspecialchars($usr->rol) ?></td>
                                <td><?= htmlspecialchars($usr->usuario) ?></td>
                                <td class="presentacion__contenido__tabla__cuerpo__fila__acciones">
                                    <a
                                        class="presentacion__contenido__tabla__cuerpo__fila__acciones__añadir"
                                        href="empleadoFormulario.php?id=<?= $usr->id ?>">Editar</a>
                                    <a
                                        class="presentacion__contenido__tabla__cuerpo__fila__acciones__boton"
                                        href="controlador/UsuarioControl.php?accion=eliminar&id=<?= $usr->id ?>"
                                        onclick="return confirm('¿Eliminar a <?= addslashes($usr->nombre) ?>?');">Eliminar</a>
                                </td>
                                <td>
                                    <img
                                        class="presentacion__contenido__tabla__cuerpo__fila__imagen"
                                        src="images/<?= urlencode($usr->usuario) ?>"
                                        alt="">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align:center; color:#666;">
                                No hay usuarios para mostrar.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
    <script src="js/filtrarTabla.js"></script>
</body>
</html>