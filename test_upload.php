<?php
// File upload path 
$uploadPath = "uploads/";

$statusMsg = '';
$status = 'danger';

// If file upload form is submitted 
if (isset($_POST["submit"])) {
  // Check whether user inputs are empty 
  if (!empty($_FILES["image"]["name"])) {
    // File info 
    $titulo = $_POST['titulo'];
    $fileName = basename($_FILES["image"]["name"]);
    $imageUploadPath = $uploadPath.$fileName;
    $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);

    // Allow certain file formats 
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
      // Image temp source and size 
      $imageTemp = $_FILES["image"]["tmp_name"];
      // $imageSize = convert_filesize($_FILES["image"]["size"]);

      // Compress size and upload image 
      $compressedImage = compressImage($imageTemp, $imageUploadPath, 12);

      if ($compressedImage) {
        //$compressedImageSize = filesize($compressedImage);
        //$compressedImageSize = convert_filesize($compressedImageSize);

        $status = 'success';
        $statusMsg = "Image compressed successfully.";
      } else {
        $statusMsg = "Image compress failed!";
      }
    } else {
      $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
  } else {
    $statusMsg = 'Please select an image file to upload.';
  }
}