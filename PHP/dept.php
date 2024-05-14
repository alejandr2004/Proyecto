<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="estilos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
  




<?php



$usu="root";
$pwd="Alex_5963";
$srv="localhost";
$db_name="empresa";
$tbl_empleat="dept";


try{
$conexion=new PDO("mysql:host=$srv;dbname=$db_name",$usu,$pwd);



}catch(Exception $error){
echo $error;
}


$result=$conexion->query("SELECT * FROM $tbl_empleat;");
$consulta=$result->fetchAll();


echo "<table class='table'>";

echo "<td scope='col'>detpno</td>";
echo "<td scope='col'>dname</td>";
echo "<td scope='col'>loc</td>";
echo "<td scope='col'>UPDATE</td>";
echo "<td scope='col'>DELETE</td>";

echo "<a class='btn btn-outline-primary' href='index.php' role='button'>emp</a>";

echo "<a class='btn btn-outline-primary' href='./formularios/formulariosDept/formCrearDept.php' role='button'>Crear</a>";

foreach($consulta as $posicion=>$datos){
  
echo "<tr>";
echo "<td scope='col'>" . $datos["deptno"] . "</td>";
echo "<td scope='col'>" . $datos["dname"] . "</td>";
echo "<td scope='col'>" . $datos["loc"] . "</td>";
echo "<td scope='col'><a class='btn btn-primary' href='./formularios/formulariosDept/formEditarDept.php?id=".$datos['deptno']."' role='button'>Editar</a></td> ";
echo "<td scope='col'><a class='btn btn-danger' href='./acciones/accionesDept/eliminarDept.php?id=".$datos['deptno']."' role='button'>Eliminar</a></td>";
echo "</tr>";



}
echo "<table>";



?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

