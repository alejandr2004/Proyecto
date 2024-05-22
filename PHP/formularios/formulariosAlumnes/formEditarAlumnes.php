<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
    <link rel="stylesheet" href="../../../CSS/editarAlumnos.css">
    <script src="../../../JS/validaciones.js"></script>
</head>
<body>
<?php
require_once '../../conexion.php';

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

<a class="btn btn-outline-primary" href='../../alumnes.php' role='button'>Tornar a inici</a>

<h1>Editar Alumno</h1>

<form method="post" action="../../acciones/accionesAlumnes/editarAlumnes.php?id=<?php echo $id; ?>">
    <label>ID de l'alumno:</label>
    <input type="text" name="Id_Alumne" class="form-control" value="<?php echo $Id_Alumne; ?>" readonly>
    <label>DNI del alumno:</label>
    <input type="text" name="DNI_Alumne" class="form-control" value="<?php echo $DNI_Alumne; ?>" id="DNI_4">
    <p id="error_DNI_4" style="color:red;"></p><br><br>
    <label>Nombre del alumno:</label>
    <input type="text" name="Nom_Alumne" class="form-control" value="<?php echo $Nom_Alumne; ?>" id="texto_19">
    <p id="error_texto_19" style="color:red;"></p><br><br>
    <label>Primer Apellido:</label>
    <input type="text" name="Cognom1_Alumne" class="form-control" value="<?php echo $Cognom1_Alumne; ?>" id="texto_20">
    <p id="error_texto_20" style="color:red;"></p><br><br>
    <label>Segundo Apellido:</label>
    <input type="text" name="Cognom2_Alumne" class="form-control" value="<?php echo $Cognom2_Alumne; ?>" id="texto_21">
    <p id="error_texto_21" style="color:red;"></p><br><br>
    <label>Clase:</label>
    <input type="text" name="Classe" class="form-control" value="<?php echo $Classe; ?>" id="numero_8">
    <p id="error_numero_8" style="color:red;"></p><br><br>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<!-- Script de validación -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('DNI_4').addEventListener('input', () => validarDNI('DNI_4', 'error_DNI_4'));
        document.getElementById('texto_19').addEventListener('input', () => validarTexto('texto_19', 'error_texto_19'));
        document.getElementById('texto_20').addEventListener('input', () => validarTexto('texto_20', 'error_texto_20'));
        document.getElementById('texto_21').addEventListener('input', () => validarTexto('texto_21', 'error_texto_21'));
        document.getElementById('numero_8').addEventListener('input', () => validarNumero('numero_8', 'error_numero_8'));
    });
</script>

</body>
</html>
