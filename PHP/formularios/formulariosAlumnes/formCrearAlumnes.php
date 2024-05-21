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
    <link rel="stylesheet" href="../../../CSS/crearAlumnos.css"> <!-- Asegúrate de enlazar correctamente tu archivo CSS -->
    <script src="../../../JS/validacionformCrearAlumnes.js"></script>
</head>
<body class="contactBody">

<a class="btn btn-outline-primary" href='../../alumnes.php' role='button'>Tornar a inici</a>

<div class="wrapper">
    <div class="title">
        <a>Crear Alumnos</a>
    </div>

    <form class="form" method="POST" action="../../acciones/accionesAlumnes/crearAlumnes.php">
        <input type="text" class="entry name" name="DNI_Alumne" placeholder="DNI de l'alumne" onmouseleave="validarDNI()">
        <p id="error_DNI_3"></p>
        <input type="text" class="entry email" name="Nom_Alumne" placeholder="Nom de l'alumne" onmouseleave="validarTexto()">
        <p id="error_texto_16"></p>
        <input type="text" class="entry email" name="Cognom1_Alumne" placeholder="Primer Cognom" onmouseleave="validarTexto()">
        <p id="error_texto_17"></p>
        <input type="text" class="entry email" name="Cognom2_Alumne" placeholder="Segon Cognom" onmouseleave="validarTexto()">
        <p id="error_texto_18"></p>
        <input type="text" class="entry message" name="Classe" placeholder="Classe" onmouseleave="validarNumero()">
        <p id="error_numero_7"></p>
    </form>
    <button class="btn btn-primary submit entry">Enviar</button>
</div>
</body>
</html>
