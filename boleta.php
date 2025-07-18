<!DOCTYPE html>
<html lang="en">

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
            <h2 class="presentacion__contenido__titulo">Boleta</h2>
            <div class="presentacion__contenido__card">
                <table class="presentacion__contenido__card__tabla">
                <tr class="presentacion__contenido__card__tabla__fila">
                    <th colspan="2">
                        <h3>Total a pagar</h3>
                        <h2>S/ 20.70</h2>
                    </th>
                </tr>
                <tr class="presentacion__contenido__card__tabla__fila">
                    <th>Forma de pago:</th>
                    <td><select name="pago" class="presentacion__contenido__card__tabla__fila__select">
                            <option value="efectivo">Efectivo</option>
                            <option value="yape">Yape</option>
                        </select>
                    </td>
                </tr>
                <tr class="presentacion__contenido__card__tabla__fila">
                    <th>Paga con:</th>
                    <td><input type="text" value="S/ 50.00"></td>
                </tr>
                <tr class="presentacion__contenido__card__tabla__fila">
                    <th>Vuelto:</th>
                    <td><input type="text" value="S/ 29.30"></td>
                </tr>
                <tr class="presentacion__contenido__card__tabla__fila">
                    <th>Nombre:</th>
                    <td><input type="text" value="Juan Perez"></td>
                </tr>
                <tr class="presentacion__contenido__card__tabla__fila">
                    <th>DNI:</th>
                    <td><input type="text" value="78641545"></td>
                </tr>
                <tr class="presentacion__contenido__card__tabla__fila">
                    <td class="presentacion__contenido__card__tabla__fila__a" colspan="2">
                        <button class="presentacion__contenido__card__tabla__fila__boton">Emitir boleta</button>
                    </td>
                </tr>
                </table>
            </div>
        </section>
    </main>
</body>

</html>