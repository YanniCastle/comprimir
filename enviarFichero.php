<?php
//if($_FILES["fichero"]["size"] <= 5120000)
//{
   foreach($_FILES["fichero"] as $clave => $valor)
   {
    echo("Propiedad: $clave ---- Valor: $valor<br />");
   }
//} 

//else { echo ("El fichero es muy grande"); }
?> 