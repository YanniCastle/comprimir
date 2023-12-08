<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = $_FILES['foto'];
    //$type =$_FILES['foto']['type'];
    $titulo = $_POST['titulo'];
    // Comprobación del tipo de archivo, tamaño, etc.
    // (como se mencionó en el ejemplo anterior)
    
    // Ruta para guardar la imagen
    $upload_directory = 'carpeta_destino/';
    
    // Cambiar el nombre del archivo
    $timestamp = time();
    $new_file_name = $timestamp . '_' . $file['name'];
    
    // Subir archivo al servidor con el nuevo nombre
    if (move_uploaded_file($file['tmp_name'], $upload_directory . $new_file_name)) {
        // Cambiar el nombre del archivo si se ha subido correctamente
        // Nuevo nombre (renombrar)
        $old_path = $upload_directory . $new_file_name;
        $new_path = $upload_directory . $titulo.'.jpg'; // Cambia a tu nuevo nombre deseado
                                         //'nuevo_nombre.jpg'
        if (rename($old_path, $new_path)) {
          //echo "$new_file_name".'<br/>';//me da el nombre en el tiempo actual
            echo "¡La imagen se ha cargado y renombrado correctamente!";
        } else {
            echo "Hubo un error al renombrar la imagen.";
        }
    } else {
        echo "Hubo un error al cargar la imagen.";
    }
}
?>
