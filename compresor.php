<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $file = $_FILES['image'];

  // Comprobación del tipo de archivo
  $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
  if (!in_array($file['type'], $allowed_types)) {
    echo "Solo se permiten archivos de imagen (JPEG, PNG, GIF)";
    exit;
  }

  // Comprobación del tamaño del archivo (en bytes)
  $max_size = 5 * 1024 * 1024; // 5 MB
  if ($file['size'] > $max_size) {
    echo "El archivo es demasiado grande. El tamaño máximo permitido es de 5 MB.";
    exit;
  }

  // Ruta para guardar la imagen
  $upload_directory = 'carpeta_destino/';

  // Cambiar el nombre del archivo
  $timestamp = time();
  $file_name = $timestamp . '_' . $file['name'];

  // Subir archivo al servidor
  if (move_uploaded_file($file['tmp_name'], $upload_directory . $file_name)) {
    echo "¡La imagen se ha cargado correctamente!";


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


    // Ruta subida
    $uploadPath = "carpeta_destino/";

    // Si el fichero se ha enviado
    $status = $statusMsg = '';
    if (isset($_POST["submit"])) {
      if ($_FILES["image"]["size"] <= 5120000) {
        $status = 'error';
        if (!empty($_FILES["image"]["name"])) {
          // File info
          $titulo = $_POST['titulo']; //Agrege para cambio de nombre 

          ///////////////////////////////////////

          $fileName = basename($_FILES["image"]["name"]); //PENDIENTE
          //$fileName
          $imageUploadPath = $uploadPath . $titulo . '.jpg'; //Agrege id para cambio de nombre 
          $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);

          // Permitimos solo unas extensiones
          $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
          if (in_array($fileType, $allowTypes)) {
            // Image temp source 
            $imageTemp = $_FILES["image"]["tmp_name"];

            // Comprimos el fichero
            $compressedImage = compressImage($imageTemp, $imageUploadPath, 12);

            if ($compressedImage) {
              $status = 'success';
              //$statusMsg = "La imagen se ha subido satisfactoriamente."; 
              echo '<script>alert("Se ha subido satisfactoriamente."); window.location="comprimir.html";</script>';
            }
          }
        }
        }
        // Aquí puedes realizar la compresión, redimensionamiento, etc.
        // Por ejemplo, usando la librería GD de PHP o ImageMagick
        // Código para comprimir/redimensionar la imagen...
      } 
    }
      else {
        echo "Hubo un error al cargar la imagen.";
      }
    }   