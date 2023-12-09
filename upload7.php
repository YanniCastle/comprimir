<?php
include 'cone2.php';
if (isset($_POST["email"])) {/*Datos para foto*/
$email = $_POST['email'];
$articulo = $_POST['campo_titulo'];//articulo
$descripcion = $_POST['campo_descripcion']; //Descripcion
$precio = $_POST['campo_precio']; //Precio
$directorio_destino = "ficherosSubidos";//lugar donde se guardara
$img_file = $_FILES["image"]["name"]; //Nombre del archivo
$destino = $directorio_destino . '/' .  $img_file;
mysqli_query($con, "UPDATE fotos SET nombrefoto = '$img_file', rutafoto = '$destino', titulofoto = '$articulo', descripcionfoto = '$descripcion', preciofoto = '$precio' WHERE USUARIOS= '$email' OR MAIL= '$email'");             
function compressImage($source, $destination, $quality) { 
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
    imagejpeg($image, $destination, $quality); 
    return $destination; 
} 
$uploadPath = "ficherosSubidos/";
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){
    if ($_FILES["image"]["size"] <= 5120000) {

    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // File info 
        $fileName = basename($_FILES["image"]["name"]); 
        $imageUploadPath = $uploadPath . $fileName; 
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
        // Permitimos solo unas extensiones
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Image temp source 
            $imageTemp = $_FILES["image"]["tmp_name"];
            // Comprimos el fichero/*                             
            $compressedImage = compressImage($imageTemp, $imageUploadPath, 12);

            if($compressedImage){
echo '<script>alert("Se ha subido satisfactoriamente."); window.location="usuarios_registrados3.php";</script>';
            }else{ 
                $statusMsg = "La compresion de la imagen ha fallado"; 
            } 
        }else{ 
            $statusMsg = 'Lo sentimos, solo se permiten imágenes con estas extensiones: JPG, JPEG, PNG, & GIF.'; 
        } 
    }else{ 
        $statusMsg = 'Por favor, selecciona una imagen.'; 
    } 

    }/*fin de tamaño */
    else {
        echo "Demasiado grande la imagen";
    }
} 
}/*fin de email post *//*Fin para datos de foto */
 
?>
