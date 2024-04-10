<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Mostrar fotos</title>
  <link rel="shortcut icon" href="letraCfondonegro.png">
  <link rel="stylesheet" href="style2a.css" />
</head>

<body>
  <h1>visualización de fotos</h1>
  <?php
  //session_start();
  //if (!isset($_SESSION["usuario"])) {
  // header("Location:login.php");
  //}
  //echo "<br/><h2>Usuario: " . $_SESSION["usuario"] . "<br></h2>";
  ?>

  <hr>
  <?php
  $miconexion = mysqli_connect("localhost", "root", "", "productos");
  /*Comprobar conexion*/
  if (!$miconexion) {                /*mysqli_error()*/
    echo "La conexión ha fallado: " . mysqli_connect_error();/*¿falta algo?*/
    exit();
  }
  //include 'config.php';
  //$login = $_SESSION['usuario'];
  //$consulta = mysqli_query($con, "SELECT * FROM usuarios_pass2 WHERE USUARIOS= '$login' OR MAIL= '$login'");
  //$valores = mysqli_fetch_array($consulta);
  //$id = $valores['ID'];/*Agrego para tabla fotos */
  $id = 87;                                              //WHERE id_usuarios_pass2='" . $id . "' 
  $miconsulta = "SELECT * FROM fotos ORDER BY FECHA DESC ";

  if ($resultado = mysqli_query($miconexion, $miconsulta)) {
    while ($registro = mysqli_fetch_assoc($resultado)) {
      $id_foto = $registro['id_foto'];
      $rutafoto = $registro['rutafoto'];
      $titulofoto = $registro['titulofoto'];
      $preciofoto = $registro['preciofoto'];
      $descripcionfoto = $registro['descripcionfoto'];
      echo "<h2>" . $registro['titulofoto'] . "</h2>";
      echo "<h3>" . $registro['sector'] . "</h3>";
      echo "<h4>" . $registro['fecha'] . "</h4>";
      if ($registro['nombrefoto'] != "") {
        echo "<img src='" . $rutafoto . "' width='150px'/>";
      }
      echo "<div style='width:200px'><h5>" . $registro['descripcionfoto'] . "</h5></div>";
      echo  " <h6>Precio : $" . $registro['preciofoto'] . " pesos MX</h6>";
  ?>

  <form method="post"
    action="cambiarfoto1.php?id=<?php echo $id_foto; ?>&ruta=<?php echo $rutafoto; ?>&titulo=<?php echo $titulofoto; ?>&descripcionfoto=<?php echo $descripcionfoto; ?>&preciofoto=<?php echo $preciofoto; ?>">
    <table>
      <button type="submit" name="cambiar_foto">Cambiar foto</button>
    </table>
  </form>

  <form method="post" action="eliminar_foto.php?id=<?php echo $id_foto; ?>&ruta=<?php echo $rutafoto; ?>">
    <table>
      <button type="submit" name="eliminar_foto">Eliminar foto</button>
    </table>
  </form>
</body>
<?php
      echo "<hr/><hr/>";/*Linea divisoria para capturas*/
    }
  }
?>

</html>