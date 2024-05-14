<?php

require_once "../../conexion.php";

    if(isset($_GET["id"])){
    $id=$_GET["id"];
        // Consulta SQL para eliminar la escuela de la base de datos
        $sql = "DELETE FROM professors WHERE Id_Professors = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        // Redireccionar de vuelta a index.php después de eliminar la tabla
        header("Location: ../../professors.php");
        exit(); 
    } else {
        echo "Error: No se proporcionó ningún ID para eliminar.";
    }

    ?>