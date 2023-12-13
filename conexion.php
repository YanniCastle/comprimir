<?php
$cn = mysqli_connect("localhost", "root", "", "productos") or die("Error");//agrege para boton eliminar
$conn = new mysqli("localhost","root","","productos");//agrege de recuperar
//Usaremos libreria PDO
try{
    $base=new PDO('mysql:host=localhost; dbname=productos', 'root', '');

    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET UTF8");

}catch(Exception $e){
    die('Error' . $e->getMessage());//acabe conexion y cual es//
    echo "Linea de error" . $e->getLine();//esto da la linea del error//
}
?>