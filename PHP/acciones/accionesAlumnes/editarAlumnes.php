<?php
    session_start(); // Iniciar la sesión

    // Verificar si el usuario ha iniciado sesión
    if (!isset($_SESSION["usuario"])) {
        // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
        header("location: ../../index.php");
        exit(); // Importante para evitar que el código PHP siga ejecutándose
    } 
    
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
        $Classe = isset($_POST['Classe']) ? $_POST['Classe'] : '';//Consulta del nombre asociado a esta clase

       
        try {
            $conexion->beginTransaction();
            $sql0=$conexion->query("SELECT Id_Classe FROM classe WHERE Nom_Classe = '$Classe'"); 
            $array=$sql0->fetch();
            $clase=$array[0];
            //var_dump($clase);

            $editar = "UPDATE alumnes SET Id_Alumne = ?, DNI_Alumne = ?, Nom_Alumne = ?, Cognom1_Alumne = ?, Cognom2_Alumne = ?, Classe = ?  WHERE Id_Alumne = ?"; 

            $sql = $conexion->prepare($editar);
            $sql->bindParam(1, $Id_Alumne);
            $sql->bindParam(2, $DNI_Alumne);
            $sql->bindParam(3, $Nom_Alumne);
            $sql->bindParam(4, $Cognom1_Alumne);
            $sql->bindParam(5, $Cognom2_Alumne);
            $sql->bindParam(6, $clase);
            $sql->bindParam(7, $id);
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
