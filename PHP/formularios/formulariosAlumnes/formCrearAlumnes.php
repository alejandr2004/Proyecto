<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

<a class="btn btn-outline-primary" href='../../alumnes.php' role='button'>Tornar a inici</a>




<form method="POST" action= "../../acciones/accionesAlumnes/crearAlumnes.php">
        <label>DNI de l'alumne:</label>
        <input type="text" name="DNI_Alumne">
        <label>Nom de l'alumne:</label>
        <input type="text" name="Nom_Alumne">
        <label>Primer Cognom:</label>
        <input type="text" name="Cognom1_Alumne">
        <label>Segon Cognom:</label>
        <input type="text" name="Cognom2_Alumne">
        <label>Classe:</label>
        <input type="text" name="Classe">
        <button class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>