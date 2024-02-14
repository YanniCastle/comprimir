<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>mostrar_fotos_con_css</title>
  <link rel="shortcut icon" href="letraCfondonegro.png">
<!--<link rel="stylesheet" type="text/css" href="mostrar_fotos_con_css_a.css" />-->
  <link rel="stylesheet" type="text/css" href="style_fotos.css"/>
</head>

<body>
  <h1>Mostrar_fotos_con_css</h1>
  <hr>
  <?php
  include ('conexion.php');

  if (!$miconexion) {
    echo "La conexión ha fallado: " . mysqli_connect_error();
    exit();
  }

  $id = 87;/*ID DE USUARIO*/
  $miconsulta = "SELECT * FROM fotos ORDER BY FECHA DESC ";

  if ($resultado = mysqli_query($miconexion, $miconsulta)) {
    while ($registro = mysqli_fetch_assoc($resultado)) {
      $rutafoto =     $registro['rutafoto'];
      $titulofoto = $registro['titulofoto'];
      $descripcionfoto = $registro['descripcionfoto'];
      $preciofoto = $registro['preciofoto'];

      if ($rutafoto != "") {
        echo "<div class='row'>
               <div class='column'>
                <a href='proximamente.php'>
                <img alt='photo' src='  " . $rutafoto . "  ' /></a>";
      }

      echo "<h1>" .$titulofoto. "</h1>";

      echo "<div class='description'>" .$descripcionfoto. "</div>";
                                              /*PENDIENTE EL div de row */
      echo  "<h2>$" .$preciofoto. " pesos MX</h2>";

      echo "<hr/><hr/><hr/>   </div></div>";
    }
  }
  ?>

</body>

</html>