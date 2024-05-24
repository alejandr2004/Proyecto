<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
    <link rel="stylesheet" href="../../../CSS/editarForms.css">
    <script src="../../../JS/validaciones.js"></script>
</head>
<body class="contactBody">
<?php
require_once '../../conexion.php';



session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("location: ../../index.php");
    exit(); // Importante para evitar que el código PHP siga ejecutándose
} 


if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql=$conexion->query("SELECT Id_Alumne, DNI_Alumne,  Nom_Alumne, Cognom1_Alumne , Cognom2_Alumne, Classe FROM alumnes WHERE Id_Alumne = $id;"); 
    
    $tabla=$sql->fetchAll();

    foreach($tabla as $dades){
        $Id_Alumne = $dades["Id_Alumne"];
        $DNI_Alumne = $dades["DNI_Alumne"];
        $Nom_Alumne = $dades["Nom_Alumne"];
        $Cognom1_Alumne = $dades["Cognom1_Alumne"];
        $Cognom2_Alumne = $dades["Cognom2_Alumne"];
        $Classe = $dades["Classe"];
    }
}
?>
<header>
    <nav>
        <a href="#"><img src="../../../IMG/login.png" alt="Logo" class="logo"></a>
        <a class="btn-outline-primary boton" href='../../alumnes.php' role='button'>Tornar a inici</a>
        <div class="auth-buttons">
            <button class="login" onclick="window.location.href='../../index.php?tick=1'">Cerrar Sesion</button>
        </div>
    </nav>
</header>

<div class="wrapper">
    <div class="title">
        <a>Editar Alumnos</a>
    </div>

    <form method="post" action="../../acciones/accionesAlumnes/editarAlumnes.php?id=<?php echo $id; ?>">
        <input type="text" name="Id_Alumne" class="form-control" value="<?php echo $Id_Alumne; ?>" readonly>
        <input type="text" name="DNI_Alumne" class="form-control" value="<?php echo $DNI_Alumne; ?>" id="DNI_4">
        <p id="error_DNI_4" style="color:red;"></p>
        <input type="text" name="Nom_Alumne" class="form-control" value="<?php echo $Nom_Alumne; ?>" id="texto_19">
        <p id="error_texto_19" style="color:red;"></p>
        <input type="text" name="Cognom1_Alumne" class="form-control" value="<?php echo $Cognom1_Alumne; ?>" id="texto_20">
        <p id="error_texto_20" style="color:red;"></p>
        <input type="text" name="Cognom2_Alumne" class="form-control" value="<?php echo $Cognom2_Alumne; ?>" id="texto_21">
        <p id="error_texto_21" style="color:red;"></p>
        <select name='Classe' id='Classe' class='entry'>
        <?php
                    require_once "../../conexion.php";
                    $result = $conexion->query("SELECT Nom_Classe FROM classe;");
                    $departamentos = $result->fetchAll();
                    //var_dump($departamentos);
                    foreach ($departamentos as $departamento) {
                        echo "<option value='".$departamento['Nom_Classe']."'>".$departamento['Nom_Classe']."</option>";
                    }
                    ?>
    </select>
    <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<!-- Script de validación -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('DNI_4').addEventListener('input', () => validarDNI('DNI_4', 'error_DNI_4'));
        document.getElementById('texto_19').addEventListener('input', () => validarTexto('texto_19', 'error_texto_19'));
        document.getElementById('texto_20').addEventListener('input', () => validarTexto('texto_20', 'error_texto_20'));
        document.getElementById('texto_21').addEventListener('input', () => validarTexto('texto_21', 'error_texto_21'));
    });
</script>

</body>
</html>
