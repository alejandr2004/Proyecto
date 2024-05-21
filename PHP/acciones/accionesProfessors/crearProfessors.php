<?php
    require_once "../../conexion.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Nom_professor=$_POST['Nom_professor'];
        $Cognom1_professor=$_POST['Cognom1_professor'];
        $Cognom2_professor=$_POST['Cognom2_professor'];
        $Telefon_professor=$_POST['Telefon_professor'];
        $DNI_professor=$_POST['DNI_professor'];
        $Correu_professor=$_POST['Correu_professor'];
        $Sexe_professor=$_POST['Sexe_professor'];
        $dept=$_POST['dept'];
        

        $sql = $conexion->prepare("INSERT INTO professors (Nom_professor, Cognom1_professor, Cognom2_professor, Telefon_professor, DNI_professor, Correu_professor, Sexe_professor, dept) VALUES (:Nom_professor, :Cognom1_professor, :Cognom2_professor, :Telefon_professor, :DNI_professor, :Correu_professor, :Sexe_professor, :dept);");
        
        $sql->execute(
            array(
                'Nom_professor' => $Nom_professor,
                'Cognom1_professor' => $Cognom1_professor,
                'Cognom2_professor' => $Cognom2_professor,
                'Telefon_professor' => $Telefon_professor,
                'DNI_professor' => $DNI_professor,
                'Correu_professor' => $Correu_professor,
                'Sexe_professor' => $Sexe_professor,
                'dept' => $dept,  
            )
            );
        header('Location: ../../professors.php');
    }
    ?>