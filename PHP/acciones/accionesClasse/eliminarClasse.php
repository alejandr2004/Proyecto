<?php
require_once "../../conexion.php";

if(isset($_GET["id"])){
    $id = $_GET["id"];

    try {
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
