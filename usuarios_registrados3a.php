<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="letraCfondonegro.png">
  <link rel="stylesheet" type="text/css" href="style2.css" />
  <title>menu fotos</title>
</head>

<body>
  <?php
  include 'config.php';
  $id_usuario = 87;

  $consulta_datos = mysqli_query($con, "SELECT * FROM usuarios WHERE id_usuario= '$id_usuario'");
  $datos = mysqli_fetch_array($consulta_datos);
  $id_usuario = $datos['id_usuario'];
  $nombre = $datos['nombre'];
  $email = $datos['email'];
  $telefono = $datos['telefono'];
  /////////////////////////////////////////////

  $consulta = mysqli_query($con, "SELECT * FROM fotos WHERE id_usuarios_pass2= '$id_usuario'");
  $valores = mysqli_fetch_array($consulta);
  $id_foto = $valores['id_foto'];
  $id_usuarios_pass2 = $valores['id_usuarios_pass2'];
  $nombrefoto = $valores['nombrefoto'];
  $rutafoto = $valores['rutafoto'];
  $titulofoto = $valores['titulofoto'];
  $fecha = $valores['fecha'];
  $descripcionfoto = $valores['descripcionfoto'];
  $preciofoto = $valores['preciofoto'];
  $sector = $valores['sector'];
  ?>

  <h1>datos de tabla: usuarios</h1>
  <?php echo $id_usuario; ?><br />
  <?php echo $nombre; ?><br />
  <?php echo $email; ?><br />
  <?php echo $telefono; ?><br />

  <!--/ / / / / /  / / / / / / / / / / / / / / / / / / /-->
  <br>
  <hr width="1000" color="black">
  <br>
  <!--/ / / / / /  / / / / / / / / / / / / / / / / / / /-->
  <h1>Datos de tabla:fotos</h1>
  <div class="row">
    <div class="column">
      <?php echo "id foto: " . $id_foto; ?><br />
      <?php echo "id de usuario: " . $id_usuarios_pass2; ?><br />
      <?php echo "nombre de foto: " . $nombrefoto; ?><br />
      <?php echo "Ruta: " . $rutafoto; ?><br />
      <?php echo "Titulo: " . $titulofoto; ?><br />
      <?php echo "Fecha: " . $fecha; ?><br />
      <?php echo "Descripción: " . $descripcionfoto; ?><br />
      <?php echo "Precio: " . $preciofoto; ?><br />
      <?php echo "Estado: " . $sector; ?><br />

      <img src="<?php echo $rutafoto; ?>" width='150px'>
      <a href="cambiarfoto7.php">cambiar foto</a>
      <br><br>
      <form method="post" action="eliminar_foto.php?id=<?php echo $id_foto; ?>&ruta=<?php echo $rutafoto; ?>">
        <table class="uno">
          <tr>
            <td>
              <button type="submit" name="eliminar_foto">Eliminar foto</button>
            </td>
          </tr>
        </table>
      </form>
    </div>

</body>

</html>