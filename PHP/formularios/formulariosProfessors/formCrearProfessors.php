
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
<?php

session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("location: ../../index.php");
    exit(); // Importante para evitar que el código PHP siga ejecutándose
} 

?>
    <div class="wrapper">
    <header>
        <nav>
            <a href="#"><img src="../../../IMG/login.png" alt="Logo" class="logo"></a>
            <a class="btn btn-outline-primary" href='../../professors.php' role='button'>Tornar a inici</a>
            <div class="auth-buttons">
                <button class="login" onclick="window.location.href='../../index.php?tick=1'">Cerrar Sesion</button>
            </div>
        </nav>
    </header>
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
            
            <label>Departament:</label>
            <select name='dept' id='dept' class='entry'>
                <?php
                require_once "../../conexion.php";
                $result = $conexion->query("SELECT Id_Dept, Codi_Dept FROM departament;");
                $departamentos = $result->fetchAll();

                foreach ($departamentos as $departamento) {
                    echo "<option value='".$departamento['Codi_Dept']."'>".$departamento['Codi_Dept']."</option>";
                }
                ?>
            </select>
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
            document.getElementById('Codi_Dept').addEventListener('input', () => validarNumero('Codi_Dept', 'error_dept'));
        });
    </script>
</body>
</html>
