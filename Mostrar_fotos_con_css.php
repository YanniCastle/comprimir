<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>mostrar_fotos_con_css</title>
  <link rel="shortcut icon" href="letraCfondonegro.png">
  <link rel="stylesheet" href="mostrar_fotos_con_css.css" />
</head>

<body>
  <h1>Mostrar_fotos_con_css</h1>
  <hr>
  <?php
  $miconexion = mysqli_connect("localhost", "root", "", "productos");
  
  if (!$miconexion) {                
    echo "La conexión ha fallado: " . mysqli_connect_error();
    exit();
  }
  
  $id = 87;/*ID DE USUARIO*/                                           
  $miconsulta = "SELECT * FROM fotos ORDER BY FECHA DESC ";

  if ($resultado = mysqli_query($miconexion, $miconsulta)) 
  {
    while ($registro = mysqli_fetch_assoc($resultado)) 
    {
      $rutafoto =     $registro['rutafoto'];
      $titulofoto = $registro['titulofoto'];
      $descripcionfoto = $registro['descripcionfoto'];
      $preciofoto = $registro['preciofoto'];

      if ($rutafoto != "") 
      {
      echo "<a href='proximamente.php'><div class='column'><img src='  " .$rutafoto. "  ' /></div></a>";  
    }

      echo "<h1>" .$titulofoto. "</h1>";

      echo "<div class='description'>" .$descripcionfoto. "></div>";

      echo  "<h2>$" .$preciofoto. " pesos MX</h2>";

      echo "<hr>";
    }
  }
  ?>

</body>
</html>