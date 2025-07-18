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
            <h2 class="presentacion__contenido__titulo">Lista de compras</h2>
            <div class="presentacion__contenido__cabecera">
                <input type="text" class="presentacion__contenido__cabecera__buscador" placeholder="Buscar compra">
            </div>    
            <table class="presentacion__contenido__tabla">
                <thead class="presentacion__contenido__tabla__encabezado">
                    <tr class="presentacion__contenido__tabla__encabezado__fila">
                        <th>Producto</th>
                        <th>Proveedor</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody class="presentacion__contenido__tabla__cuerpo">
                    <tr class="presentacion__contenido__tabla__cuerpo__fila">
                        <td>Leche Gloria Azul</td>
                        <td>Gloria SAC</td>
                        <td>12</td>
                        <td>S/ 3.50</td>
                        <td>29/04/25</td>
                        <td class="presentacion__contenido__tabla__cuerpo__fila__acciones">
                            <a class="presentacion__contenido__tabla__cuerpo__fila__acciones__boton" href="comprasDao.html">Editar</a>
                            <a class="presentacion__contenido__tabla__cuerpo__fila__acciones__boton" href="#">Eliminar</a>
                        </td>
                        <td><img class="presentacion__contenido__tabla__cuerpo__fila__imagen" src="images/nombre"></td>
                    </tr>
                    <tr class="presentacion__contenido__tabla__cuerpo__fila">
                        <td>Batimix</td>
                        <td>Gloria SAC</td>
                        <td>12</td>
                        <td>S/ 4.60</td>
                        <td>29/04/25</td>
                        <td class="presentacion__contenido__tabla__cuerpo__fila__acciones">
                            <a class="presentacion__contenido__tabla__cuerpo__fila__acciones__boton" href="comprasDao.html">Editar</a>
                            <a class="presentacion__contenido__tabla__cuerpo__fila__acciones__boton" href="#">Eliminar</a>
                        </td>
                        <td><img class="presentacion__contenido__tabla__cuerpo__fila__imagen" src="images/nombre"></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>