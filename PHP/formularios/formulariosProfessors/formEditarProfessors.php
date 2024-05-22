  <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>
    <script src="../../../JS/validaciones.js" defer></script>
</head>
<body>

<?php
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

<a class="btn btn-outline-primary" href="../../professors.php" role='button'>Tornar a inici</a>

<h1>Editar</h1>
<form method="POST" action="../../acciones/accionesProfessors/editarProfessors.php">
    <label>Id del professor:</label>
    <input type="text" name="id" class="form-control" value="<?php echo htmlspecialchars($id); ?>" readonly>
    
    <label>Nom del professor:</label>
    <input type="text" name="Nom_professor" class="form-control" value="<?php echo htmlspecialchars($Nom_professor); ?>" id="texto_6">
    <p id="error_texto_6" style="color:red;"></p><br><br>
    
    <label>Primer Cognom:</label>
    <input type="text" name="Cognom1_professor" class="form-control" value="<?php echo htmlspecialchars($Cognom1_professor); ?>" id="texto_7">
    <p id="error_texto_7" style="color:red;"></p><br><br>
    
    <label>Segon Cognom:</label>
    <input type="text" name="Cognom2_professor" class="form-control" value="<?php echo htmlspecialchars($Cognom2_professor); ?>" id="texto_8">
    <p id="error_texto_8" style="color:red;"></p><br><br>
    
    <label>Telèfon del professor:</label>
    <input type="text" name="Telefon_professor" class="form-control" value="<?php echo htmlspecialchars($Telefon_professor); ?>" id="telefono_2">
    <p id="error_telefono_2" style="color:red;"></p><br><br>
    
    <label>DNI del professor:</label>
    <input type="text" name="DNI_professor" class="form-control" value="<?php echo htmlspecialchars($DNI_professor); ?>" id="DNI_2">
    <p id="error_DNI_2" style="color:red;"></p><br><br>
    
    <label>Correu del professor:</label>
    <input type="email" name="Correu_professor" class="form-control" value="<?php echo htmlspecialchars($Correu_professor); ?>" id="texto_9">
    <p id="error_texto_9" style="color:red;"></p><br><br>
    
    <label>Sexe del professor:</label>
    <input type="text" name="Sexe_professor" class="form-control" value="<?php echo htmlspecialchars($Sexe_professor); ?>" id="texto_10">
    <p id="error_texto_10" style="color:red;"></p><br><br>
    
    <label>Departament:</label>
    <select name="Codi_Dept" id="numero_2" class="form-control">
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
