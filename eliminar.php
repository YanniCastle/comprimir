<?php
include("conexion.php");
//Ejemplo de eliminar imagen tanto guardada como en base de datos
if(isset($_GET))
{
  $id=0;
  $ruta='';
  $id=$_GET['id'];
  $ruta=$_GET['ruta'];
  $sql= "DELETE ruta FROM `usuarios_pass2` WHERE ID='".$id."'" ;
  $res=mysqli_query($cn,$sql);
if($res){
  unlink($ruta);
  echo '<script>alert("Eliminado Correctamente"); window.location="usuarios_registrados3.php";</script>';
}

}
?>
