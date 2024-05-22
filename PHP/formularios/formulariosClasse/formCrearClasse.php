<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <script src="../../../JS/validaciones.js" defer></script>
    <link rel="stylesheet" href="../../../CSS/crearClase.css">
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
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Características</a></li>
            <li><a href="#">Precios</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Acerca</a></li>
        </ul>
        <div class="auth-buttons">
            <button class="login" onclick="window.location.href='../../index.php'">Cerrar Sesion</button>
        </div>
    </nav>
</header>

<a class="btn btn-outline-primary" href='../../classe.php' role='button'>Tornar a inici</a>

<div class="form">
    <form method="POST" action="../../acciones/accionesClasse/crearClasse.php">
    <div class="title">Crear Classe</div>
        <input class="entry name" type="text" name="Codi_Classe" placeholder="Código de la clase:" id="numero_4">
        <p class="error" id="error_numero_4"></p><br><br>
        
        <input class="entry email" type="text" name="Nom_Classe" placeholder="Nombre de la clase:" id="texto_13">
        <p class="error" id="error_texto_13"></p><br><br>
        <label>ID del professor:</label>
        <select name='Codi_Dept' id='Codi_Dept' class='entry select'>
                <?php
                require_once "../../conexion.php";
                $result = $conexion->query("SELECT Id_Professor FROM professors;");
                $departamentos = $result->fetchAll();

                foreach ($departamentos as $departamento) {
                    echo "<option value='".$departamento['Id_Professor']."'>".$departamento['Id_Professor']."</option>";
                }
                ?>
            </select>
        <p class="error" id="error_texto_14"></p><br><br>
        
        <button type="submit" class="btn submit">Enviar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('numero_4').addEventListener('input', () => validarNumero('numero_4', 'error_numero_4'));
        document.getElementById('texto_13').addEventListener('input', () => validarTexto('texto_13', 'error_texto_13'));
        document.getElementById('texto_14').addEventListener('input', () => validarTexto('texto_14', 'error_texto_14'));
    });
</script>

</body>
</html>

