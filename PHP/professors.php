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
$tbl_professors="professors";
// Conexion de la BD
try{
$conexion=new PDO("mysql:host=$srv;dbname=$db_name",$usu,$pwd);
}catch(Exception $error){
echo $error;
}
// Filtrados de los titulos, filtro basico de A-Z
if (isset($_POST['filtre_id'])) {
    $result = $conexion->query("SELECT * FROM $tbl_professors ORDER BY Id_professor ASC;");
} elseif (isset($_POST['filtre_Nom_Professor'])) {
    $result = $conexion->query("SELECT * FROM $tbl_professors ORDER BY Nom_professor ASC;");
} elseif (isset($_POST['filtre_cognom1_professor'])) {
    $result = $conexion->query("SELECT * FROM $tbl_professors ORDER BY Cognom1_professor ASC;");
} elseif (isset($_POST['filtre_cognom2_professor'])) {
    $result = $conexion->query("SELECT * FROM $tbl_professors ORDER BY Cognom2_professor ASC;");
} elseif (isset($_POST['filtre_telefon_professor'])) {
    $result = $conexion->query("SELECT * FROM $tbl_professors ORDER BY Telefon_professor ASC;");
} elseif (isset($_POST['filtre_DNI_professor'])) {
    $result = $conexion->query("SELECT * FROM $tbl_professors ORDER BY DNI_professor ASC;");
} elseif (isset($_POST['filtre_correu_professor'])) {
    $result = $conexion->query("SELECT * FROM $tbl_professors ORDER BY Correu_professor ASC;");
} elseif (isset($_POST['filtre_sexe_professor'])) {
    $result = $conexion->query("SELECT * FROM $tbl_professors ORDER BY Sexe_professor ASC;");
} elseif (isset($_POST['filtre_departament_professor'])) {
    $result = $conexion->query("SELECT * FROM $tbl_professors ORDER BY dept ASC;");
} else {
    // Si no hay filtro seleccionado, mostrar la tabla normal
    $result = $conexion->query("SELECT * FROM $tbl_professors;");
}
$consulta = $result->fetchAll();
?>
<!-- Botones de las tablas -->
<div class="container mt-4">
    <div class="mb-3">
        <a class="btn btn-outline-primary me-2" href="alumnes.php" role="button">Alumnes</a>
        <a class="btn btn-outline-primary me-2" href="departament.php" role="button">Departament</a>
        <a class="btn btn-outline-primary me-2" href="classe.php" role="button">Classe</a>
        <a class="btn btn-outline-primary" href="./formularios/formulariosProfessors/formCrearProfessors.php" role="button">Crear</a>
    </div>
<!-- Titulos de las columnas, Que filtran -->
<div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_id" value="Id Professor" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_Nom_Professor" value="Nom del Professor" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_cognom1_professor" value="Primer Cognom" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_cognom2_professor" value="Segon Cognom" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_telefon_professor" value="Telèfon" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_DNI_professor" value="DNI del Professor" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_correu_professor" value="Correu Electrònic" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_sexe_professor" value="Sexe" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_departament_professor" value="Departament" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">Modificacions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Imprimimos los datos en la tabla
                foreach ($consulta as $posicion => $datos) {
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
                    echo "<td scope='col'>
                            <a class='btn btn-primary btn-sm me-1' href='./formularios/formulariosProfessors/formEditarProfessors.php?id=" . $datos['Id_professor'] . "' role='button'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='./acciones/accionesProfessors/eliminarProfessors.php?id=" . $datos['Id_professor'] . "' role='button'>Eliminar</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>