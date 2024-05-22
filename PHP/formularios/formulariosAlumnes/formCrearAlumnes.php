<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="../../../CSS/estilos.css" rel="stylesheet">
    <script src="../../../JS/validacionformCrearAlumnes.js"></script>
</head>
<body>

<a class="btn btn-outline-primary" href='../../alumnes.php' role='button'>Tornar a inici</a>


<form method="POST" action= "../../acciones/accionesAlumnes/crearAlumnes.php">
        <label>DNI de l'alumne:</label>
        <input type="text" name="DNI_Alumne" onmouseleave="validarDNI()" id="DNI_Alumne">
        <p id="error_DNI"></p><br><br>
        <label>Nom de l'alumne:</label>
        <input type="text" name="Nom_Alumne" onmouseleave="validarTexto()">
        <p id="error_texto"></p><br><br>
        <label>Primer Cognom:</label>
        <input type="text" name="Cognom1_Alumne" onmouseleave="validarTexto()">
        <p id="error_texto"></p><br><br>
        <label>Segon Cognom:</label>
        <input type="text" name="Cognom2_Alumne" onmouseleave="validarTexto()">
        <p id="error_texto"></p><br><br>
        <label>Classe:</label>
        <input type="text" name="Classe" onmouseleave="validarNumero()">
        <p id="error_numero"></p><br><br>
        <button class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>
-->
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

<a class="btn btn-outline-primary" href='../../alumnes.php' role='button'>Tornar a inici</a>

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
        <input type="text" class="entry message" name="Classe" placeholder="Classe" id="numero_6">
        <p id="error_numero_6" style="color:red;"></p>
    
    <button type="submit" class="btn btn-primary submit entry">Enviar</button>
    </form>
</div>

<!-- Script de validación -->



<script src="../../../JS/validaciones.js"></script>

</body>
</html>
