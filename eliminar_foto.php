<?php
include("conexion.php");
if (isset($_POST["eliminar_foto"])) {
  $id = 0;
  $ruta = '';
  $id = $_GET['id'];
  $ruta_imagen= $_GET['ruta'];
  $sql = "DELETE from fotos WHERE id_foto='" . $id . "'";
  $res = mysqli_query($cn, $sql);
  if ($res) {
    unlink($ruta_imagen);
    echo '<script>alert("Eliminado Correctamente"); window.location="mostrar_tabla_fotos.php";</script>';
  }
} else {
  echo "No se pudo eliminar la imagen.";
}

