<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

<a class="btn btn-outline-primary" href='../../departament.php' role='button'>Tornar a inici</a>

<form method="POST" action="../../acciones/accionesDepartament/crearDepartament.php">
    <label>Código del departamento:</label>
    <input type="text" name="Codi_Dept">
    <label>Nombre del departamento:</label>
    <input type="text" name="Nom_Dept">
    <button class="btn btn-primary">Enviar</button>
</form>

</body>
</html>
