<?php
require_once '../../conexion.php';

if (!isset($_GET['id'])) {
    header('location: ../../departament.php');
    exit();
} else {
    $id = $_GET['id'];
    $Id_Dept = isset($_POST['Id_Dept']) ? $_POST['Id_Dept'] : '';
    $Codi_Dept = isset($_POST['Codi_Dept']) ? $_POST['Codi_Dept'] : '';
    $Nom_Dept = isset($_POST['Nom_Dept']) ? $_POST['Nom_Dept'] : '';

    try {
        $conexion->beginTransaction();
        $editar = "UPDATE departament SET Id_Dept = :Id_Dept, Codi_Dept = :Codi_Dept, Nom_Dept = :Nom_Dept WHERE Id_Dept = :id";

        $sql = $conexion->prepare($editar);
        $sql->bindParam(":Id_Dept", $Id_Dept);
        $sql->bindParam(":Codi_Dept", $Codi_Dept);
        $sql->bindParam(":Nom_Dept", $Nom_Dept);
        $sql->bindParam(":id", $id);
        $sql->execute();

        $conexion->commit();
        header('location: ../../departament.php');
        exit();
    } catch (PDOException $e) {
        $conexion->rollback();
        echo "Error en la carga de datos: " . $e->getMessage();
        exit();
    }
}
?>
