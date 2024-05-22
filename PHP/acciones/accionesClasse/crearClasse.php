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
    
    $Codi_Classe = $_POST['Codi_Classe'];
    $Nom_Classe = $_POST['Nom_Classe'];
    $Tutor = $_POST['Tutor'];

    $sql = $conexion->prepare("INSERT INTO classe (Codi_Classe, Nom_Classe, Tutor) VALUES (:Codi_Classe, :Nom_Classe, :Tutor);");
    
    $sql->execute(
        array(
            'Codi_Classe' => $Codi_Classe,
            'Nom_Classe' => $Nom_Classe,
            'Tutor' => $Tutor
        )
    );
    header('Location: ../../classe.php');
}
?>
