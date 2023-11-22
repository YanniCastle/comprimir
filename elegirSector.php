<?php
$sector=$_POST['sector'];//Agrege asi funciona bien
$sectores=array("Electricistas", "Fontaneros", "Transportistas", "Aseguradores");
echo ("La opción elegida es: $sector <br />");
echo ("La profesión correspondiente es: $sectores[$sector].");
?>