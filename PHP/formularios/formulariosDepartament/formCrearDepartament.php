<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <script src="../../../JS/validaciones.js" defer></script>
    <link rel="stylesheet" href="../../../CSS/crearDepartament.css">
</head>
<body class="contactBody">

<a class="btn btn-outline-primary" href='../../departament.php' role='button'>Tornar a inici</a>

<div class="form">
    <form method="POST" action="../../acciones/accionesDepartament/crearDepartament.php">
        <input class="entry name" type="text" name="Codi_Dept" placeholder="Codigo del departamento:" id="numero_2">
        <p class="error" id="error_numero_2"></p><br><br>
        
        <input class="entry email" type="text" name="Nom_Dept" placeholder="Nombre del departamento:" id="texto_11">
        <p class="error" id="error_texto_11"></p><br><br>
        
        <button type="submit" class="btn submit">Enviar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('numero_2').addEventListener('input', () => validarNumero('numero_2', 'error_numero_2'));
        document.getElementById('texto_11').addEventListener('input', () => validarTexto('texto_11', 'error_texto_11'));
    });
</script>

</body>
</html>


