
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = $_FILES['foto'];
    $titulo = $_POST['titulo'];

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
    $upload_directory = 'destino_fotos/';
    
    // Cambiar el nombre del archivo
    $timestamp = time();
    $new_file_name = $timestamp . '_' . $file['name'];
    
    // Subir archivo al servidor con el nuevo nombre
    if (move_uploaded_file($file['tmp_name'], $upload_directory . $new_file_name)) {
        // Cambiar el nombre del archivo si se ha subido correctamente
        // Nuevo nombre (renombrar)
        $old_path = $upload_directory . $new_file_name;
        $new_path = $upload_directory . $titulo.'.'.$file['type']; // Cambia a tu nuevo nombre deseado
        
        if (rename($old_path, $new_path)) {
            echo "¡La imagen se ha cargado y renombrado correctamente!";
        } else {
            echo "Hubo un error al renombrar la imagen.";
        }
    } else {
        echo "Hubo un error al cargar la imagen.";
    }
}
?>
