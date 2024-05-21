<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <script src="../../../JS/validaciones.js" defer></script>
</head>
<body>
    <a class="btn btn-outline-primary" href='../../professors.php' role='button'>Tornar a inici</a>
    <form method="POST" action="../../acciones/accionesProfessors/crearProfessors.php">
        <label>Nom del professor:</label>
        <input type="text" name="Nom_professor" id="texto_1">
        <p id="error_texto_1" style="color:red;"></p><br><br>
        
        <label>Primer Cognom:</label>
        <input type="text" name="Cognom1_professor" id="texto_2">
        <p id="error_texto_2" style="color:red;"></p><br><br>
        
        <label>Segon Cognom:</label>
        <input type="text" name="Cognom2_professor" id="texto_3">
        <p id="error_texto_3" style="color:red;"></p><br><br>
        
        <label>Telèfon del professor:</label>
        <input type="text" name="Telefon_professor" id="telefono_1">
        <p id="error_telefono_1" style="color:red;"></p><br><br>
        
        <label>DNI del professor:</label>
        <input type="text" name="DNI_professor" id="DNI_1">
        <p id="error_DNI_1" style="color:red;"></p><br><br>
        
        <label>Correu del professor:</label>
        <input type="text" name="Correu_professor" id="email_1">
        <p id="error_email_1" style="color:red;"></p><br><br>
        
        <label>Sexe del professor:</label>
        <input type="text" name="Sexe_professor" id="texto_4">
        <p id="error_texto_4" style="color:red;"></p><br><br>
        
        <label>Departament:</label>
        <input type="text" name="dept" id="texto_5">
        <p id="error_texto_5" style="color:red;"></p><br><br>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('texto_1').addEventListener('input', () => validarTexto('texto_1', 'error_texto_1'));
            document.getElementById('texto_2').addEventListener('input', () => validarTexto('texto_2', 'error_texto_2'));
            document.getElementById('texto_3').addEventListener('input', () => validarTexto('texto_3', 'error_texto_3'));
            document.getElementById('telefono_1').addEventListener('input', () => validarTelefono('telefono_1', 'error_telefono_1'));
            document.getElementById('DNI_1').addEventListener('input', () => validarDNI('DNI_1', 'error_DNI_1'));
            document.getElementById('email_1').addEventListener('input', () => validarEmail('email_1', 'error_email_1'));
            document.getElementById('texto_4').addEventListener('input', () => validarTexto('texto_4', 'error_texto_4'));
            document.getElementById('texto_5').addEventListener('input', () => validarNumero('texto_5', 'error_texto_5'));
        });
    </script>
</body>
</html>
