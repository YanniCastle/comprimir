<?php
$cn = mysqli_connect("localhost", "root", "", "pruebas") or die("Error");//agrege para boton eliminar
$conn = new mysqli("localhost","root","","pruebas");//agrege de recuperar
//Usaremos libreria PDO
try{
    $base=new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');
               /*Para poder ver los errores y tipos */             
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET UTF8");

}catch(Exception $e){
    die('Error' . $e->getMessage());//acabe conexion y cual es//
    echo "Linea de error" . $e->getLine();//esto da la linea del error//
}
?>