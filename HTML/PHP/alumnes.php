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
$db_name="JS_escola";
$tbl_empleat="alumnes";


try{
$conexion=new PDO("mysql:host=$srv;dbname=$db_name",$usu,$pwd);



}catch(Exception $error){
echo $error;
}


$result=$conexion->query("SELECT * FROM $tbl_empleat;");
$consulta=$result->fetchAll();


echo "<table class='table'>";

echo "<td scope='col'>Id de l'alumne</td>";
echo "<td scope='col'>DNI de l'alumne</td>";
echo "<td scope='col'>Nom de l'alumne</td>";
echo "<td scope='col'>Primer Cognom</td>";
echo "<td scope='col'>Segon cognom</td>";
echo "<td scope='col'>Clase</td>";
//echo "<td scope='col'>Última actualización</td>";
echo "<td scope='col'>UPDATE</td>";
echo "<td scope='col'>DELETE</td>";


 
echo "<a class='btn btn-outline-primary' href='professors.php' role='button'>Professors</a>";

echo "<a class='btn btn-outline-primary' href='./formularios/formulariosAlumnes/formCrearAlumnes.php' role='button'>Crear</a>";

foreach($consulta as $posicion=>$datos){
  
echo "<tr>";
echo "<td scope='col'>" . $datos["Id_Alumne"] . "</td>";
echo "<td scope='col'>" . $datos["DNI_Alumne"] . "</td>";
echo "<td scope='col'>" . $datos["Nom_Alumne"] . "</td>";
echo "<td scope='col'>" . $datos["Cognom1_Alumne"] . "</td>";
echo "<td scope='col'>" . $datos["Cognom2_Alumne"] . "</td>";
echo "<td scope='col'>" . $datos["Classe"] . "</td>";
//echo "<td scope='col'>" . $datos["last_upload"] . "</td>";
echo "<td scope='col'><a class='btn btn-primary' href='./formularios/formulariosAlumnes/formEditarAlumnes.php?id=".$datos['Id_Alumne']."' role='button'>Editar</a></td> ";
echo "<td scope='col'><a class='btn btn-danger' href='./acciones/accionesAlumnes/eliminarAlumnes.php?id=".$datos['Id_Alumne']."' role='button'>Eliminar</a></td>";
echo "</tr>";



}
echo "<table>";



?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

