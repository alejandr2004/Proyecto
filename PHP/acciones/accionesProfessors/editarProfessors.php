<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("location: ../../index.php");
    exit(); // Importante para evitar que el código PHP siga ejecutándose
} 

require_once '../../conexion.php';

if (!isset($_POST['id'])) {
    header('location: ../../index.php');
    exit(); 
} else {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $Nom_professor = isset($_POST['Nom_professor']) ? $_POST['Nom_professor'] : '';
    $Cognom1_professor = isset($_POST['Cognom1_professor']) ? $_POST['Cognom1_professor'] : '';
    $Cognom2_professor = isset($_POST['Cognom2_professor']) ? $_POST['Cognom2_professor'] : '';
    $Telefon_professor = isset($_POST['Telefon_professor']) ? $_POST['Telefon_professor'] : '';
    $DNI_professor = isset($_POST['DNI_professor']) ? $_POST['DNI_professor'] : '';
    $Correu_professor = isset($_POST['Correu_professor']) ? $_POST['Correu_professor'] : '';
    $Sexe_professor = isset($_POST['Sexe_professor']) ? $_POST['Sexe_professor'] : '';
    $dept = isset($_POST['dept']) ? $_POST['dept'] : '';

    try {
        $conexion->beginTransaction();
        $editar = "UPDATE professors SET Id_professor = :id, Nom_professor = :Nom_professor, Cognom1_professor = :Cognom1_professor, Cognom2_professor = :Cognom2_professor, Telefon_professor = :Telefon_professor, DNI_professor = :DNI_professor, Correu_professor = :Correu_professor, Sexe_professor = :Sexe_professor, dept = :dept WHERE Id_professor = :id"; 

        $sql = $conexion->prepare($editar);
        $sql->bindParam(":id", $id);
        $sql->bindParam(":Nom_professor", $Nom_professor);
        $sql->bindParam(":Cognom1_professor", $Cognom1_professor);
        $sql->bindParam(":Cognom2_professor", $Cognom2_professor);
        $sql->bindParam(":Telefon_professor", $Telefon_professor);
        $sql->bindParam(":DNI_professor", $DNI_professor);
        $sql->bindParam(":Correu_professor", $Correu_professor);
        $sql->bindParam(":Sexe_professor", $Sexe_professor);
        $sql->bindParam(":dept", $dept);
        $sql->execute();

        $conexion->commit();
        header('location: ../../professors.php');
        exit(); 
    } catch(PDOException $e) {
        $conexion->rollback();
        echo "Error en la carga de datos: " . $e->getMessage();
        exit();
    }
}
?>
