<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

<a class="btn btn-outline-primary" href='../../index.php' role='button'>Tornar a inici</a>

<!--deptno dname loc -->


<form method="POST" action="../acciones/crear.php">
        <label>Numero de departamento:</label>
        <input type="text" name="deptno">
        <label>Nombre del departamento:</label>
        <input type="text" name="dname">
        <label>Lugar:</label>
        <input type="text" name="loc">
        <button class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>