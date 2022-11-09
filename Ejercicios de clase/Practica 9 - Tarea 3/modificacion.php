<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles/style.css">
  <title>Document</title>
</head>

<body>
  <div class="contenedor">
    <header onclick="location.href='index.php';" style="cursor: pointer;">
      <h1 id="inicio">Ventas comerciales</h1>
    </header>
    <nav>
      <div>
        <table class="botonesMenu">
          <tr>
            <td class="botonesMenu">
              <form action="index.php" method="post">
                <input class="menu" type="submit" value="Indice">
              </form>
            </td>
            <td class="botonesMenu">
              <form action="consulta.php" method="post">
                <input class="menu" type="submit" value="consulta">
              </form>
            </td>
            <td class="botonesMenu">
              <form action="insercion.php" method="post">
                <input class="menu" type="submit" value="insercion">
              </form>
            </td>
            <td class="botonesMenu">
              <form action="modificacion.php" method="post">
                <input class="menu" type="submit" value="modificacion">
              </form>
            <td class="botonesMenu">
              <form action="eliminacion.php" method="post">
                <input class="menu" type="submit" value="eliminacion">
              </form>
            </td>
          </tr>
        </table>
      </div>
    </nav>
    <h1>Modificando datos<span class="subtitulo"></span></h1>
    <nav>
      <input type="submit" value="Modificar venta" onclick="location.href='modificar/modificar_venta.php';">
      <input type="submit" value="Modificar producto" onclick="location.href='modificar/modificar_producto.php';">
      <input type="submit" value="Modificar comercial" onclick="location.href='modificar/modificar_comercial.php';">
    </nav>
  </div>


</body>

</html>