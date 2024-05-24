  <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>
    <script src="../../../JS/validaciones.js" defer></script>
    <link rel="stylesheet" href="../../../CSS/editarProfesores.css">
</head>
<body>

<?php


session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("location: ../../index.php");
    exit(); // Importante para evitar que el código PHP siga ejecutándose
} 




require_once "../../conexion.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql = $conexion->query("SELECT Id_professor, Nom_professor, Cognom1_professor, Cognom2_professor, Telefon_professor, DNI_professor, Correu_professor, Sexe_professor, dept FROM professors WHERE Id_professor = $id;");
    
    $tabla = $sql->fetchAll();

    if ($tabla) {
        foreach($tabla as $dades){
            $Id_professor = $dades["Id_professor"];
            $Nom_professor = $dades["Nom_professor"];
            $Cognom1_professor = $dades["Cognom1_professor"];
            $Cognom2_professor = $dades["Cognom2_professor"];
            $Telefon_professor = $dades["Telefon_professor"];
            $DNI_professor = $dades["DNI_professor"];
            $Correu_professor = $dades["Correu_professor"];
            $Sexe_professor = $dades["Sexe_professor"];
            $dept = $dades["dept"];
        }
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
        <a>Editar Profesores</a>
    </div>
    <form method="POST" action="../../acciones/accionesProfessors/editarProfessors.php">
        <input type="text" name="id" class="form-control" value="<?php echo htmlspecialchars($id); ?>" readonly>
        
        <input type="text" name="Nom_professor" class="form-control" value="<?php echo htmlspecialchars($Nom_professor); ?>" id="texto_6">
        <p id="error_texto_6" style="color:red;"></p>
        
        <input type="text" name="Cognom1_professor" class="form-control" value="<?php echo htmlspecialchars($Cognom1_professor); ?>" id="texto_7">
        <p id="error_texto_7" style="color:red;"></p>
        
        <input type="text" name="Cognom2_professor" class="form-control" value="<?php echo htmlspecialchars($Cognom2_professor); ?>" id="texto_8">
        <p id="error_texto_8" style="color:red;"></p>
        
        <input type="text" name="Telefon_professor" class="form-control" value="<?php echo htmlspecialchars($Telefon_professor); ?>" id="telefono_2">
        <p id="error_telefono_2" style="color:red;"></p>
        
        <input type="text" name="DNI_professor" class="form-control" value="<?php echo htmlspecialchars($DNI_professor); ?>" id="DNI_2">
        <p id="error_DNI_2" style="color:red;"></p>
        
        <input type="email" name="Correu_professor" class="form-control" value="<?php echo htmlspecialchars($Correu_professor); ?>" id="texto_9">
        <p id="error_texto_9" style="color:red;"></p>
        
        <input type="text" name="Sexe_professor" class="form-control" value="<?php echo htmlspecialchars($Sexe_professor); ?>" id="texto_10">
        <p id="error_texto_10" style="color:red;"></p>
        
        <select name="dept" id="dept" class="form-control">
            <?php
            $result = $conexion->query("SELECT Id_Dept, Codi_Dept FROM departament;");
            $departamentos = $result->fetchAll();
            
            foreach ($departamentos as $departamento) {
                $selected = ($departamento['Codi_Dept'] == $dept) ? "selected" : "";
                echo "<option value='".$departamento['Codi_Dept']."' $selected>".$departamento['Codi_Dept']."</option>";
            }
            ?>
        </select>
        <p id="error_numero_1" style="color:red;"></p><br><br>
        
        <button type="submit" class="btn btn-primary">Guardar</button>  
    </form>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('texto_6').addEventListener('input', () => validarTexto('texto_6', 'error_texto_6'));
    document.getElementById('texto_7').addEventListener('input', () => validarTexto('texto_7', 'error_texto_7'));
    document.getElementById('texto_8').addEventListener('input', () => validarTexto('texto_8', 'error_texto_8'));
    document.getElementById('telefono_2').addEventListener('input', () => validarTelefono('telefono_2', 'error_telefono_2'));
    document.getElementById('DNI_2').addEventListener('input', () => validarDNI('DNI_2', 'error_DNI_2'));
    document.getElementById('texto_9').addEventListener('input', () => validarEmail('texto_9', 'error_texto_9'));
    document.getElementById('texto_10').addEventListener('input', () => validarTexto('texto_10', 'error_texto_10'));
    document.getElementById('numero_2').addEventListener('input', () => validarNumero('numero_2', 'error_numero_1'));
});
</script>

</body>
</html>
