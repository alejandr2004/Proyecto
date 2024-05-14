<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

<a class="btn btn-outline-primary" href='../../professors.php' role='button'>Tornar a inici</a>




<form method="POST" action="../../acciones/accionesProfessors/crearProfessors.php">
        <label>Nom del professor:</label>
        <input type="text" name="Nom_professor">
        <label>Primer Cognom:</label>
        <input type="text" name="Cognom1_professor">
        <label>Segon Cognom:</label>
        <input type="text" name="Cognom2_professor">
        <label>Telèfon del professor:</label>
        <input type="text" name="Telefon_professor">
        <label>DNI del professor:</label>
        <input type="text" name="DNI_professor">
        <label>Correu del professor:</label>
        <input type="text" name="Correu_professor">
        <label>Sexe del professor:</label>
        <input type="text" name="Sexe_professor">
        <label>Departament:</label>
        <input type="text" name="dept">
        <button class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>