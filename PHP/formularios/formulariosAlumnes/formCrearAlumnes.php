<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../../../CSS/crearAlumnos.css">
    <script src="../../../JS/validaciones.js"></script>
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
<header>
    <nav>
        <a href="#"><img src="../../../IMG/login.png" alt="Logo" class="logo"></a>
        <a class="btn btn-outline-primary" href='../../classe.php' role='button'>Tornar a inici</a>
        <div class="auth-buttons">
            <button class="login" onclick="window.location.href='../../index.php'">Cerrar Sesion</button>
        </div>
    </nav>
</header>

<div class="wrapper">
    <div class="title">
        <a>Crear Alumnos</a>
    </div>

    <form class="form" method="POST" action="../../acciones/accionesAlumnes/crearAlumnes.php">
        <input type="text" class="entry name" name="DNI_Alumne" placeholder="DNI de l'alumne" id="DNI_3">
        <p id="error_DNI_3" style="color:red;"></p>
        <input type="text" class="entry email" name="Nom_Alumne" placeholder="Nom de l'alumne" id="texto_17">
        <p id="error_texto_17" style="color:red;"></p>
        <input type="text" class="entry email" name="Cognom1_Alumne" placeholder="Primer Cognom" id="texto_18">
        <p id="error_texto_18" style="color:red;"></p>
        <input type="text" class="entry email" name="Cognom2_Alumne" placeholder="Segon Cognom" id="texto_19">
        <p id="error_texto_19" style="color:red;"></p>
        <label>Classe:</label>
        <select name='Codi_Dept' id='Codi_Dept' class='entry'>
            <?php
            require_once "../../conexion.php";
            $result = $conexion->query("SELECT Id_Classe FROM classe;");
            $departamentos = $result->fetchAll();
            
            foreach ($departamentos as $departamento) {
                echo "<option value='".$departamento['Id_Classe']."'>".$departamento['Id_Classe']."</option>";
            }
            ?>
        </select>
        <p id="error_numero_6" style="color:red;"></p>
        <button type="submit" class="btn btn-primary submit entry">Enviar</button>
    </form>
</div>

<!-- Script de validación -->
<script src="../../../JS/validaciones.js"></script>

</body>
</html>
