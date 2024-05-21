<?php
    require_once "../../conexion.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Id_Alumne=$_POST['Id_Alumne'];
        $DNI_Alumne=$_POST['DNI_Alumne'];
        $Nom_Alumne=$_POST['Nom_Alumne'];
        $Cognom1_Alumne=$_POST['Cognom1_Alumne'];
        $Cognom2_Alumne=$_POST['Cognom2_Alumne'];
        $Classe=$_POST['Classe'];
        

        $sql = $conexion->prepare("INSERT INTO alumnes (Id_Alumne ,DNI_Alumne, Nom_Alumne, Cognom1_Alumne, Cognom2_Alumne, Classe) VALUES (:Id_Alumne ,:DNI_Alumne, :Nom_Alumne, :Cognom1_Alumne, :Cognom2_Alumne, :Classe);");
        
        $sql->execute(
            array(
                'Id_Alumne' => $Id_Alumne,
                'DNI_Alumne' => $DNI_Alumne,
                'Nom_Alumne' => $Nom_Alumne,
                'Cognom1_Alumne' => $Cognom1_Alumne,
                'Cognom2_Alumne' => $Cognom2_Alumne,
                'Classe' => $Classe,
            )
            );
        header('Location: ../../alumnes.php');
    }
    ?>