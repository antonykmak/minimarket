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
            <h2 class="presentacion__contenido__titulo">Lista de productos</h2>
            <table class="presentacion__contenido__tabla">
                <thead class="presentacion__contenido__tabla__encabezado">
                    <tr class="presentacion__contenido__tabla__encabezado__fila">
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>SubTotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="presentacion__contenido__tabla__cuerpo">
                    <tr class="presentacion__contenido__tabla__cuerpo__fila">
                        <td>Leche Gloria Azul</td>
                        <td>2</td>
                        <td>S/ 3.50</td>
                        <td>S/ 7.00</td>
                        <td class="presentacion__contenido__tabla__cuerpo__fila__acciones">
                            <a class="presentacion__contenido__tabla__cuerpo__fila__acciones__boton"
                                href="#">Eliminar</a>
                        </td>
                    </tr>
                    <tr class="presentacion__contenido__tabla__cuerpo__fila">
                        <td>Batimix</td>
                        <td>1</td>
                        <td>S/ 4.60</td>
                        <td>S/ 4.60</td>
                        <td class="presentacion__contenido__tabla__cuerpo__fila__acciones">
                            <a class="presentacion__contenido__tabla__cuerpo__fila__acciones__boton"
                                href="#">Eliminar</a>
                        </td>
                    </tr>
                    <tr class="presentacion__contenido__tabla__cuerpo__fila__total">
                        <th colspan="3">TOTAL</th>
                        <td>S/ 11.60</td>
                    </tr>
                    <tr>
                        <td class="presentacion__contenido__tabla__cuerpo__boton" colspan="5"><a class="presentacion__contenido__tabla__cuerpo__fila__boton__a" href="boleta.html">Cobrar</a></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </section>
    </main>
</body>

</html>