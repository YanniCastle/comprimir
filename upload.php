﻿<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);    # Para mostrar los errores
/*Diferente forma de conexion a base de datos */
$miconexion = mysqli_connect("localhost", "root", "", "productos");
/*Comprobar conexion*/
if (!$miconexion) {                /*mysqli_error()*/
  echo "La conexión ha fallado: " . mysqli_connect_error();/*¿falta algo?*/
  exit();
}

/* 
 * Función personalizada para comprimir y 
 * subir una imagen mediante PHP
 */ 
function compressImage($source, $destination, $quality) { 
    // Obtenemos la información de la imagen
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    // Creamos una imagen
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    // Guardamos la imagen
    imagejpeg($image, $destination, $quality); 
     
    // Devolvemos la imagen comprimida
    return $destination; 
} 
 
 
// Ruta subida
$uploadPath = "uploads/"; 
 
if(isset($_POST["submit"])){ 

    var_dump($_FILES["image"]);//información relacionada con el archivo
    
    if ($_FILES["image"]["size"] <= 5120000){
   
    if(!empty($_FILES["image"]["name"])) { 
        // File info
        $titulo=$_POST['titulo'];//Agrege para cambio de nombre 

        ///////////////////////////////////////

        $fileName = basename($_FILES["image"]["name"]); //PENDIENTE
                                              //$fileName
        $imageUploadPath = $uploadPath.$titulo.'_'.$fileName;//Agrege id para cambio de nombre 
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
         
        // Permitimos solo unas extensiones
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Image temp source 
            $imageTemp = $_FILES["image"]["tmp_name"]; 
             
            // Comprimos el fichero
            $compressedImage = compressImage($imageTemp, $imageUploadPath, 12); 
             
            if($compressedImage){ 
echo '<script>alert("Se ha subido satisfactoriamente."); window.location="comprimir.html";</script>';

            }else{ 
                echo "La compresion de la imagen ha fallado"; 
            } 
        }else{ 
            echo 'Lo sentimos, solo se permiten imágenes con estas extensiones: JPG, JPEG, PNG, & GIF.'; 
        } 
    }else{ 
        echo 'Por favor, selecciona una imagen.'; 
    } 
     }/*fin de size */ 
     else {
        echo "Demasiado grande la imagen";
     }

 ///////Acomodar Variables/////////////////////////////////
/*Aqui se debe de ordenar toda la informacion como en la nueva tabla y nombres de varibles */

$rutafoto = $uploadPath.$titulo.'_'.$fileName;
$eltitulo = $_POST['titulo'];
$fecha = date("Y-m-d H:i:s");
$descripcionfoto = $_POST['area_comentarios'];
$preciofoto = $_POST['campo_precio'];
$id_usuarios_pass2 = 87;
//$nombrefoto=$_FILES["image"]["name"];
$nombrefoto = $titulo . '_' . $fileName;

    $sector = $_POST['sector']; //Agrege, asi funciona bien
    $sectores = array("Nuevo", "Semi nuevo", "De segunda mano", "Usado");

$miconsulta = "INSERT INTO fotos (id_usuarios_pass2, nombrefoto, rutafoto, titulofoto, fecha, descripcionfoto, preciofoto, sector) VALUES 

('" . $id_usuarios_pass2 . "' , '" . $nombrefoto . "', '" . $rutafoto . "','" . $eltitulo . "' , '" . $fecha . "' , '" . $descripcionfoto . "' , '" . $preciofoto . "' , '" . $sectores[$sector] . "')";
//Super cuidado en comillas sencillas y dobles y puntos para concatenar//
$resultado = mysqli_query($miconexion, $miconsulta);
/*Cerramos conexion*/
mysqli_close($miconexion);
echo "<br/>Se ha agregado el comentario con exito. <br/><br/>";



}//fin del submit 
 

<<<<<<< HEAD


 
=======
>>>>>>> 37064760ab4138b8bad7ce9c4c3a508f510ab133
?>