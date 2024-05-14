<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

<a class="btn btn-outline-primary" href='../index.php' role='button'>Tornar a inici</a>

<!--ename job	hiredate	sal	deptno	comm -->


<form method="POST" action= "../../acciones/crear.php">
        <label>Numero del empleado:</label>
        <input type="text" name="empno">
        <label>Nombre del empleado:</label>
        <input type="text" name="ename">
        <label>Cargo del empleado:</label>
        <input type="text" name="job">
        <label>Fecha de contratación:</label>
        <input type="date" name="hiredate">
        <label>Salario del empleado:</label>
        <input type="number" name="sal">
        <label>Número de departamento:</label>
        <input type="text" name="deptno">
        <label>Comisión:</label>
        <input type="number" name="comm">
        <button class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>