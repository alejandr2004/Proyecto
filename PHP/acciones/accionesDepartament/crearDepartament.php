<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("location: ../../index.php");
    exit(); // Importante para evitar que el código PHP siga ejecutándose
} 



require_once "../../conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $Codi_Dept = $_POST['Codi_Dept'];
    $Nom_Dept = $_POST['Nom_Dept'];

    $sql = $conexion->prepare("INSERT INTO departament (Codi_Dept, Nom_Dept) VALUES (:Codi_Dept, :Nom_Dept);");
    
    $sql->execute(
        array(
            
            'Codi_Dept' => $Codi_Dept,
            'Nom_Dept' => $Nom_Dept
        )
    );
    header('Location: ../../departament.php');
}
?>
