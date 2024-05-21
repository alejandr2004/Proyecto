<?php
require_once "../../conexion.php";
    if(isset($_GET["id"])){
    $id=$_GET["id"];
        // Consulta SQL para eliminar la escuela de la base de datos
        $sql_actualizar_classe = "UPDATE classe SET tutor = NULL WHERE Tutor = :Id_professor";
        $stmt_actualizar_classe = $conexion->prepare($sql_actualizar_classe);
        $stmt_actualizar_classe->bindParam(":Id_professor", $id);
        $stmt_actualizar_classe->execute();
        $sql = "DELETE FROM professors WHERE Id_Professor = :id";
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