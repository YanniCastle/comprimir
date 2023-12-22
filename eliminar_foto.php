<?php
include("conexion.php");
if (isset($_POST["eliminar_foto"])) {
  $default = "carpeta_destino/sin_imagen.jpg";
  $sin_nombre = null;
  $sin_titulo = null;
  $sin_descripcion = null;
  $sin_precio = null;
  $id = 0;//FUNCIONA BIEN,limpia campos de BD y elimina archivo almacenado y carga imagen default//
  $ruta = '';
  $id = $_GET['id'];
  $ruta_imagen= $_GET['ruta'];
  $sql = "UPDATE fotos SET rutafoto ='$default', nombrefoto='$sin_nombre', titulofoto='$sin_titulo', descripcionfoto='$sin_descripcion', preciofoto='$sin_precio' WHERE id_usuarios_pass2='" . $id . "'";
  $res = mysqli_query($cn, $sql);
  if ($res) {
    unlink($ruta_imagen);
    echo '<script>alert("Eliminado Correctamente"); window.location="mostrar_tabla_fotos.php";</script>';
  }
} else {
  echo "No se pudo eliminar la imagen.";
}

