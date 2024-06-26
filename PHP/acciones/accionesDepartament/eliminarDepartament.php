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
    $id = $_GET["id"];

    try {
        // Consulta SQL para eliminar el departamento de la base de datos
        $sql = "DELETE FROM departament WHERE Id_Dept = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        // Redireccionar de vuelta a departament.php después de eliminar el registro
        header("Location: ../../departament.php");
        exit(); 
    } catch(PDOException $e) {
        echo "Error al intentar eliminar el registro: " . $e->getMessage();
        exit();
    }
} else {
    echo "Error: No se proporcionó ningún ID para eliminar.";
}
?>
