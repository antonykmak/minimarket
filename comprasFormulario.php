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
            <h2 class="presentacion__menu__titulo">MENU</h2>
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
            <h2 class="presentacion__contenido__titulo">Compras</h2>
            <div class="presentacion__contenido__card">
                <table class="presentacion__contenido__card__tabla">
                <tr class="presentacion__contenido__card__tabla__fila">
                    <th>Proveedor:</th>
                    <td><select name="pago" class="presentacion__contenido__card__tabla__fila__select">
                            <option value="efectivo">Gloria SAC</option>
                            <option value="yape">Backus</option>
                        </select>
                    </td>
                </tr>
                <tr class="presentacion__contenido__card__tabla__fila">
                    <th>Producto:</th>
                    <td><select name="pago" class="presentacion__contenido__card__tabla__fila__select">
                            <option value="efectivo">Leche Gloria Azul</option>
                            <option value="yape">Batimix</option>
                        </select>
                    </td>
                </tr>
                <tr class="presentacion__contenido__card__tabla__fila">
                    <th>Cantidad:</th>
                    <td><input type="text" value="10"></td>
                </tr>
                <tr class="presentacion__contenido__card__tabla__fila">
                    <th>Precio de compra:</th>
                    <td><input type="text" value="2.80"></td>
                </tr>
                <tr class="presentacion__contenido__card__tabla__fila">
                    <td class="presentacion__contenido__card__tabla__fila__a" colspan="2">
                        <button class="presentacion__contenido__card__tabla__fila__boton">Enviar</button>
                    </td>
                </tr>
                </table>
            </div>
        </section>
    </main>
</body>
</html>