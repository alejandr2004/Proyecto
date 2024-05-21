<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <script src="../../../JS/validaciones.js" defer></script>
</head>
<body>

<a class="btn btn-outline-primary" href='../../departament.php' role='button'>Tornar a inici</a>

<form method="POST" action="../../acciones/accionesDepartament/crearDepartament.php">
    <label>Código del departamento:</label>
    <input type="text" name="Codi_Dept" id="numero_2">
    <p id="error_numero_2" style="color:red;"></p><br><br>
    
    <label>Nombre del departamento:</label>
    <input type="text" name="Nom_Dept" id="texto_11">
    <p id="error_texto_11" style="color:red;"></p><br><br>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('numero_2').addEventListener('input', () => validarNumero('numero_2', 'error_numero_2'));
        document.getElementById('texto_11').addEventListener('input', () => validarTexto('texto_11', 'error_texto_11'));
    });
</script>

</body>
</html>

