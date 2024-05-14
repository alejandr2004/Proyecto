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
$tbl_empleat="professors";


try{
$conexion=new PDO("mysql:host=$srv;dbname=$db_name",$usu,$pwd);



}catch(Exception $error){
echo $error;
}


$result=$conexion->query("SELECT * FROM $tbl_empleat;");
$consulta=$result->fetchAll();


echo "<table class='table'>";

echo "<td scope='col'>Id del professor</td>";
echo "<td scope='col'>Nom del professor</td>";
echo "<td scope='col'>Primer Cognom</td>";
echo "<td scope='col'>Segon Cognom</td>";
echo "<td scope='col'>Telefon del professor</td>";
echo "<td scope='col'>DNI del professor</td>";
echo "<td scope='col'>Correu del professor</td>";
echo "<td scope='col'>Sexe del professor</td>";
echo "<td scope='col'>Departament</td>";
echo "<td scope='col'>UPDATE</td>";
echo "<td scope='col'>DELETE</td>";


echo "<a class='btn btn-outline-primary' href='alumnes.php' role='button'>Alumnes</a>";

echo "<a class='btn btn-outline-primary' href='departament.php' role='button'>Departament</a>";

echo "<a class='btn btn-outline-primary' href='classe.php' role='button'>Classe</a>";

echo "<a class='btn btn-outline-primary' href='./formularios/formulariosProfessors/formCrearProfessors.php' role='button'>Crear</a>";

foreach($consulta as $posicion=>$datos){
  
echo "<tr>";
echo "<td scope='col'>" . $datos["Id_professor"] . "</td>";
echo "<td scope='col'>" . $datos["Nom_professor"] . "</td>";
echo "<td scope='col'>" . $datos["Cognom1_professor"] . "</td>";
echo "<td scope='col'>" . $datos["Cognom2_professor"] . "</td>";
echo "<td scope='col'>" . $datos["Telefon_professor"] . "</td>";
echo "<td scope='col'>" . $datos["DNI_professor"] . "</td>";
echo "<td scope='col'>" . $datos["Correu_professor"] . "</td>";
echo "<td scope='col'>" . $datos["Sexe_professor"] . "</td>";
echo "<td scope='col'>" . $datos["dept"] . "</td>";
echo "<td scope='col'><a class='btn btn-primary' href='./formularios/formulariosProfessors/formEditarProfessors.php?id=".$datos['Id_professor']."' role='button'>Editar</a></td> ";
echo "<td scope='col'><a class='btn btn-danger' href='./acciones/accionesProfessors/eliminarProfessors.php?id=".$datos['Id_professor']."' role='button'>Eliminar</a></td>";
echo "</tr>";



}
echo "<table>";



?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

