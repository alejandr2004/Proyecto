<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("location: ../../index.php");
    exit(); // Importante para evitar que el código PHP siga ejecutándose
} 
require_once "../../conexion.php";

    if(isset($_GET["id"])){
    $id=$_GET["id"];
        // Consulta SQL para eliminar la escuela de la base de datos
        $sql = "DELETE FROM Alumnes WHERE Id_Alumne = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        // Redireccionar de vuelta a index.php después de eliminar la tabla
        header("Location: ../../alumnes.php");
        exit(); 
    } else {
        echo "Error: No se proporcionó ningún ID para eliminar.";
    }

    ?>
