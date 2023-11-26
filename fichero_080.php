<?php
//agrege name para dejar nombre default  page:142
//$nombre_archivo=$_FILES["fichero"]["name"];
$archivoRecibido=$_FILES["fichero"]["tmp_name"];
//$destino="ficherosSubidos/$nombre_archivo";
$destino="ficherosSubidos/fotoDelUsuario.jpg";
move_uploaded_file($archivoRecibido, $destino);
echo ("Fichero grabado");
?>