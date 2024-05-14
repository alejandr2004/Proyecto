<?php
require_once '../../conexion.php';

if (!isset($_GET['id'])) {
    header('location: ../../classe.php');
    exit();
} else {
    $id = $_GET['id'];
    $Id_Classe = isset($_POST['Id_Classe']) ? $_POST['Id_Classe'] : '';
    $Codi_Classe = isset($_POST['Codi_Classe']) ? $_POST['Codi_Classe'] : '';
    $Nom_Classe = isset($_POST['Nom_Classe']) ? $_POST['Nom_Classe'] : '';
    $Tutor = isset($_POST['Tutor']) ? $_POST['Tutor'] : '';

    try {
        $conexion->beginTransaction();
        $editar = "UPDATE classe SET Id_Classe = :Id_Classe, Codi_Classe = :Codi_Classe, Nom_Classe = :Nom_Classe, Tutor = :Tutor WHERE Id_Classe = :id";

        $sql = $conexion->prepare($editar);
        $sql->bindParam(":Id_Classe", $Id_Classe);
        $sql->bindParam(":Codi_Classe", $Codi_Classe);
        $sql->bindParam(":Nom_Classe", $Nom_Classe);
        $sql->bindParam(":Tutor", $Tutor);
        $sql->bindParam(":id", $id);
        $sql->execute();

        $conexion->commit();
        header('location: ../../classe.php');
        exit();
    } catch (PDOException $e) {
        $conexion->rollback();
        echo "Error en la carga de datos: " . $e->getMessage();
        exit();
    }
}
?>
