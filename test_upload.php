<?php
function compressImage($source, $destination, $quality)
{
  // Obtenemos la información de la imagen
  $imgInfo = getimagesize($source);
  $mime = $imgInfo['mime'];

  // Creamos una imagen
  switch ($mime) {
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
 
// File upload path 
$uploadPath = "uploads/";

// If file upload form is submitted 
if (isset($_POST["submit"])) {
  // Check whether user inputs are empty 
  if (!empty($_FILES["image"]["name"])) {
    // File info 
    $titulo = $_POST['titulo'];
    $fileName = basename($_FILES["image"]["name"]);
    $imageUploadPath = $uploadPath.$titulo.'_'.$fileName;
    $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);

    // Allow certain file formats 
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
      // Image temp source and size 
      $imageTemp = $_FILES["image"]["tmp_name"];

      // Compress size and upload image 
      $compressedImage = compressImage($imageTemp, $imageUploadPath, 12);

      if ($compressedImage) {

        echo '<script>alert("Se ha subido satisfactoriamente."); window.location="test_comprime.html";</script>';
      } else {
        echo  "Image compress failed!";
      }
    } else {
      echo 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
  } else {
    echo 'Please select an image file to upload.';
  }
}