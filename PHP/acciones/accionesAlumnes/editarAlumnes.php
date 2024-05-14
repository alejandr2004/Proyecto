<?php
    require_once '../../conexion.php';

    if(!isset($_GET['id'])){
        header('location: ../../alumnes.php');
        exit(); 
    } else {
        $id = $_GET['id'];
        $Id_Alumne = isset($_POST['Id_Alumne']) ? $_POST['Id_Alumne'] : '';
        $DNI_Alumne = isset($_POST['DNI_Alumne']) ? $_POST['DNI_Alumne'] : '';
        $Nom_Alumne = isset($_POST['Nom_Alumne']) ? $_POST['Nom_Alumne'] : '';
        $Cognom1_Alumne = isset($_POST['Cognom1_Alumne']) ? $_POST['Cognom1_Alumne'] : '';
        $Cognom2_Alumne = isset($_POST['Cognom2_Alumne']) ? $_POST['Cognom2_Alumne'] : '';
        $Classe = isset($_POST['Classe']) ? $_POST['Classe'] : '';
        

        try {
            $conexion->beginTransaction();
            $editar = "UPDATE alumnes SET Id_Alumne = :Id_Alumne, DNI_Alumne = :DNI_Alumne, Nom_Alumne = :Nom_Alumne, Cognom1_Alumne = :Cognom1_Alumne, Cognom2_Alumne = :Cognom2_Alumne, Classe = :Classe  WHERE Id_Alumne = :id"; 

            $sql = $conexion->prepare($editar);
            $sql->bindParam(":Id_Alumne", $Id_Alumne);
            $sql->bindParam(":DNI_Alumne", $DNI_Alumne);
            $sql->bindParam(":Nom_Alumne", $Nom_Alumne);
            $sql->bindParam(":Cognom1_Alumne", $Cognom1_Alumne);
            $sql->bindParam(":Cognom2_Alumne", $Cognom2_Alumne);
            $sql->bindParam(":Classe", $Classe);
            $sql->bindParam(":id", $id);
            $sql->execute();

            $conexion->commit();
            header('location: ../../alumnes.php');
            exit(); 
        } catch(PDOException $e) {
            $conexion->rollback();
            echo "Error en la carga de datos: " . $e->getMessage();
            exit();
        }
    }
?>
