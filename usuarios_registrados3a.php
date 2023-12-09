<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  $id_usuarios_pass2 = $valores['id_usuarios_pass2'];
  $nombrefoto = $valores['nombrefoto'];
  $rutafoto = $valores['rutafoto'];
  $titulofoto = $valores['titulofoto'];
  $fecha = $valores['fecha'];
  $descripcionfoto = $valores['descripcionfoto'];
  $preciofoto = $valores['preciofoto'];
  ?>

  <h1>datos de publicación</h1>
  <?php echo $id_usuario; ?><br />
  <?php echo $nombre; ?><br />
  <?php echo $email; ?><br />
  <?php echo $telefono; ?><br />

  <!--/ / / / / /  / / / / / / / / / / / / / / / / / / /-->
  <br>
  <hr width="1000" color="black">
  <br>
  <!--/ / / / / /  / / / / / / / / / / / / / / / / / / /-->

  <div class="row">
    <div class="column">
      <?php echo $id_usuarios_pass2; ?><br />
      <?php echo $nombrefoto; ?><br />
      <?php echo $rutafoto; ?><br />
      <?php echo $titulofoto; ?><br />
      <?php echo $fecha; ?><br />
      <?php echo $descripcionfoto; ?><br />
      <?php echo $preciofoto; ?><br />

      <img src="<?php echo $rutafoto; ?>" width='150px'>
      <a href="cambiarfoto7.php">foto</a>
      <br><br>
      <form method="post" action="eliminar_imagenb1.php?id=<?php echo $id_usuarios_pass2; ?>&ruta=<?php echo $rutafoto; ?>">
        <table><button type="submit" name="eliminar_imagen">Eliminar foto</button></table>
      </form>
    </div>

</body>

</html>