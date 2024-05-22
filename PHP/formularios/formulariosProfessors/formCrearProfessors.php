<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <script src="../../../JS/validaciones.js" defer></script>
    <link rel="stylesheet" href="../../../CSS/crearProfesores.css">
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
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario del Profesor</title>
    <link rel="stylesheet" href="styles.css">
    <script src="../../../JS/validaciones.js" defer></script>
    <link rel="stylesheet" href="../../../CSS/crearProfesores.css">
</head>
<body class="contactBody">
    <div class="wrapper">
        <a class="btn btn-outline-primary" href='../../professors.php' role='button'>Tornar a inici</a>
        <form method="POST" action="../../acciones/accionesProfessors/crearProfessors.php" class="form">
            <div class="title">Crear Professors</div>
            <input type="text" name="DNI_professor" placeholder="DNI del professor" id="DNI_professor" class="entry name">
            <p id="error_DNI_professor" class="error"></p><br><br>
            <input type="text" name="Nom_professor"  placeholder="Nom del professor" id="Nom_professor" class="entry name">
            <p id="error_Nom_professor" class="error"></p><br><br>
            <input type="text" name="Cognom1_professor" placeholder="Primer Cognom" id="Cognom1_professor" class="entry name">
            <p id="error_Cognom1_professor" class="error"></p><br><br>
            <input type="text" name="Cognom2_professor" placeholder="Segon Cognom" id="Cognom2_professor" class="entry name">
            <p id="error_Cognom2_professor" class="error"></p><br><br>
            <input type="text" name="Telefon_professor" placeholder="Telèfon del professor" id="Telefon_professor" class="entry name">
            <p id="error_Telefon_professor" class="error"></p><br><br>
            <input type="text" name="Correu_professor" placeholder="Correu del professor" id="Correu_professor" class="entry email">
            <p id="error_Correu_professor" class="error"></p><br><br>
            <input type="text" name="Sexe_professor" placeholder="Sexe del professor" id="Sexe_professor" class="entry name">
            <p id="error_Sexe_professor" class="error"></p><br><br>
            
            <select name="Codi_Dept" id="numero_2">
            <?php
            $result = $conexion->query("SELECT Id_Dept, Codi_Dept FROM departament;");
            $departamentos = $result->fetchAll();
            
            foreach ($departamentos as $departamento) {
                echo "<option value='{$departamento['Codi_Dept']}'>{$departamento['Codi_Dept']}</option>";
            }
            
            
            ?>
            <p id="error_dept" class="error"></p><br><br>
             
            <button type="submit" class="btn btn-primary submit">Enviar</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('DNI_professor').addEventListener('input', () => validarDNI('DNI_professor', 'error_DNI_professor'));
            document.getElementById('Nom_professor').addEventListener('input', () => validarTexto('Nom_professor', 'error_Nom_professor'));
            document.getElementById('Cognom1_professor').addEventListener('input', () => validarTexto('Cognom1_professor', 'error_Cognom1_professor'));
            document.getElementById('Cognom2_professor').addEventListener('input', () => validarTexto('Cognom2_professor', 'error_Cognom2_professor'));
            document.getElementById('Telefon_professor').addEventListener('input', () => validarTelefono('Telefon_professor', 'error_Telefon_professor'));
            document.getElementById('Correu_professor').addEventListener('input', () => validarEmail('Correu_professor', 'error_Correu_professor'));
            document.getElementById('Sexe_professor').addEventListener('input', () => validarTexto('Sexe_professor', 'error_Sexe_professor'));
            document.getElementById('dept').addEventListener('input', () => validarTexto('dept', 'error_dept'));
        });
    </script>
</body>
</html>


