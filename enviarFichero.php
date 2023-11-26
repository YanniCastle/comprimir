<?php
foreach ($_FILES["fichero"] as $clave => $valor) {
   echo ("Propiedad: $clave ---- Valor: $valor<br />");
}