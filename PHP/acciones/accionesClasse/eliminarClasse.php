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
        // Actualiza el campo Id_Profesor en la tabla de alumnos estableciéndolo en NULL
        $sql_update = "UPDATE alumnes SET Classe = NULL WHERE Classe = :id";
        $stmt_update = $conexion->prepare($sql_update);
        $stmt_update->bindParam(':id', $id);
        $stmt_update->execute();
        
        
        
        
        
        // Consulta SQL para eliminar el registro de la base de datos
        $sql = "DELETE FROM classe WHERE Id_Classe = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        // Redireccionar de vuelta a classe.php después de eliminar el registro
        header("Location: ../../classe.php");
        exit(); 
    } catch(PDOException $e) {
        echo "Error al intentar eliminar el registro: " . $e->getMessage();
        exit();
    }
} else {
    echo "Error: No se proporcionó ningún ID para eliminar.";
}
?>
