<?php
$host = 'localhost';
$bdname = 'JS_escola';
$usuario = 'root';
$contraseña = 'Alex_5963';
try{
    $conexion = new PDO("mysql:host=$host; dbname=$bdname" , $usuario, $contraseña);
    //echo "Conexión correcta";
} catch(PDOException $e){
    echo "El error es:".$e->getMessage();
}
?>
