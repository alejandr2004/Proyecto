<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <script src="../../../JS/validaciones.js" defer></script>
    <link rel="stylesheet" href="../../../CSS/crearClase.css">
</head>
<body>

<a class="btn btn-outline-primary" href='../../classe.php' role='button'>Tornar a inici</a>

<form method="POST" action="../../acciones/accionesClasse/crearClasse.php">
    <label>Código de la clase:</label>
    <input type="text" name="Codi_Classe" id="numero_4">
    <p id="error_numero_4" style="color:red;"></p><br><br>
    
    <label>Nombre de la clase:</label>
    <input type="text" name="Nom_Classe" id="texto_13">
    <p id="error_texto_13" style="color:red;"></p><br><br>
    
    <label>Tutor:</label>
    <input type="text" name="Tutor" id="texto_14">
    <p id="error_texto_14" style="color:red;"></p><br><br>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('numero_4').addEventListener('input', () => validarNumero('numero_4', 'error_numero_4'));
        document.getElementById('texto_13').addEventListener('input', () => validarTexto('texto_13', 'error_texto_13'));
        document.getElementById('texto_14').addEventListener('input', () => validarTexto('texto_14', 'error_texto_14'));
    });
</script>

</body>
</html>
