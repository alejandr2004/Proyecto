<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Clase</title>
    <script src="../../../JS/validaciones.js" defer></script>
</head>
<body>

<a class="btn btn-outline-primary" href='../../classe.php' role='button'>Volver al inicio</a>

<?php
require_once '../../conexion.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql = $conexion->query("SELECT Id_Classe, Codi_Classe, Nom_Classe, Tutor FROM classe WHERE Id_Classe = $id;");
    $datosClase = $sql->fetchAll();

    foreach($datosClase as $clase){
        $Id_Classe = $clase["Id_Classe"];
        $Codi_Classe = $clase["Codi_Classe"];
        $Nom_Classe = $clase["Nom_Classe"];
        $Tutor = $clase["Tutor"];
    }
}
?>

<h1>Editar Clase</h1>
<form method="post" action="../../acciones/accionesClasse/editarClasse.php?id=<?php echo $id; ?>">
    <label>ID de la clase:</label>
    <input type="text" name="Id_Classe" class="form-control" value="<?php echo $Id_Classe; ?>" readonly>
    <label>Código de la clase:</label>
    <input type="text" name="Codi_Classe" class="form-control" value="<?php echo $Codi_Classe; ?>" id="numero_5">
    <p id="error_numero_5" style="color:red;"></p><br><br>
    <label>Nombre de la clase:</label>
    <input type="text" name="Nom_Classe" class="form-control" value="<?php echo $Nom_Classe; ?>" id="texto_15">
    <p id="error_texto_15" style="color:red;"></p><br><br>
    <label>Tutor:</label>
    <select name='Codi_Dept' id='Codi_Dept' class='entry'>
                <?php
                require_once "../../conexion.php";
                $result = $conexion->query("SELECT Id_Professor FROM professors;");
                $departamentos = $result->fetchAll();

                foreach ($departamentos as $departamento) {
                    echo "<option value='".$departamento['Id_Professor']."'>".$departamento['Id_Professor']."</option>";
                }
                ?>
            </select>
    <p id="error_texto_16" style="color:red;"></p><br><br>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('numero_5').addEventListener('input', () => validarNumero('numero_5', 'error_numero_5'));
        document.getElementById('texto_15').addEventListener('input', () => validarTexto('texto_15', 'error_texto_15'));
        document.getElementById('texto_16').addEventListener('input', () => validarTexto('texto_16', 'error_texto_16'));
    });
</script>

</body>
</html>
