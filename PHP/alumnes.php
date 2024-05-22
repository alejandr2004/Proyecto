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
<div class="mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Buscar...">
</div>
<script src="../JS/barraBuscadora.js"></script>

<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("location: index.php");
    exit(); // Importante para evitar que el código PHP siga ejecutándose
}

$usu = "root";
$pwd = "Alex_5963";
$srv = "localhost";
$db_name = "JS_escola";
$tbl_empleat = "alumnes";
// Conexion de la BD
try {
    $conexion = new PDO("mysql:host=$srv;dbname=$db_name", $usu, $pwd);
} catch (Exception $error) {
    echo $error;
}
// Filtrados de los titulos, filtro basico de A-Z
if (isset($_POST['filtre_id'])) {
    $result = $conexion->query("SELECT a.Id_alumne, a.DNI_Alumne, a.Nom_Alumne, a.Cognom1_Alumne, a.Cognom2_Alumne, a.Classe, c.Nom_Classe 
        FROM alumnes a 
        INNER JOIN classe c 
        ON a.Classe = c.Id_Classe
        ORDER BY a.Id_alumne ASC;");
} elseif (isset($_POST['filtre_DNI_Alumne'])) {
    $result = $conexion->query("SELECT a.Id_alumne, a.DNI_Alumne, a.Nom_Alumne, a.Cognom1_Alumne, a.Cognom2_Alumne, a.Classe, c.Nom_Classe 
        FROM alumnes a 
        INNER JOIN classe c 
        ON a.Classe = c.Id_Classe
        ORDER BY a.DNI_Alumne ASC;");
} elseif (isset($_POST['filtre_Nom_Alumne'])) {
    $result = $conexion->query("SELECT a.Id_alumne, a.DNI_Alumne, a.Nom_Alumne, a.Cognom1_Alumne, a.Cognom2_Alumne, a.Classe, c.Nom_Classe 
        FROM alumnes a 
        INNER JOIN classe c 
        ON a.Classe = c.Id_Classe
        ORDER BY a.Nom_Alumne ASC;");
} elseif (isset($_POST['filtre_cognom1_alumne'])) {
    $result = $conexion->query("SELECT a.Id_alumne, a.DNI_Alumne, a.Nom_Alumne, a.Cognom1_Alumne, a.Cognom2_Alumne, a.Classe, c.Nom_Classe 
        FROM alumnes a 
        INNER JOIN classe c 
        ON a.Classe = c.Id_Classe
        ORDER BY a.Cognom1_Alumne ASC;");
} elseif (isset($_POST['filtre_cognom2_alumne'])) {
    $result = $conexion->query("SELECT a.Id_alumne, a.DNI_Alumne, a.Nom_Alumne, a.Cognom1_Alumne, a.Cognom2_Alumne, a.Classe, c.Nom_Classe 
        FROM alumnes a 
        INNER JOIN classe c 
        ON a.Classe = c.Id_Classe
        ORDER BY a.Cognom2_Alumne ASC;");
} elseif (isset($_POST['filtre_classe_alumne'])) {
    $result = $conexion->query("SELECT a.Id_alumne, a.DNI_Alumne, a.Nom_Alumne, a.Cognom1_Alumne, a.Cognom2_Alumne, a.Classe, c.Nom_Classe 
        FROM alumnes a 
        INNER JOIN classe c 
        ON a.Classe = c.Id_Classe
        ORDER BY c.Nom_Classe ASC;");
} else {
    // Si no hay filtro seleccionado, mostrar la tabla normal
    $result = $conexion->query("SELECT a.Id_alumne, a.DNI_Alumne, a.Nom_Alumne, a.Cognom1_Alumne, a.Cognom2_Alumne, a.Classe, c.Nom_Classe 
        FROM alumnes a 
        INNER JOIN classe c 
        ON a.Classe = c.Id_Classe;");
}
$consulta = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Botones de las tablas -->
<div class="container mt-4">
    <div class="mb-3">
        <a class="btn btn-outline-primary me-2" href="professors.php" role="button">Professors</a>
        <a class="btn btn-outline-primary me-2" href="departament.php" role="button">Departament</a>
        <a class="btn btn-outline-primary me-2" href="classe.php" role="button">Classe</a>
        <a class="btn btn-outline-primary" href="./formularios/formulariosAlumnes/formCrearAlumnes.php" role="button">Crear</a>
    </div>
    <!-- Titulos de las columnas, Que filtran -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_id" value="Id Alumne" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_DNI_Alumne" value="DNI de l'Alumne" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_Nom_Alumne" value="Nom de l'Alumne" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_cognom1_alumne" value="Primer Cognom" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_cognom2_alumne" value="Segon Cognom" class="btn btn-link p-0 m-0 align-baseline">
</form>
</th>
<th scope="col">
<form method="post" class="d-inline">
<input type="submit" name="filtre_classe_alumne" value="Classe" class="btn btn-link p-0 m-0 align-baseline">
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
                 echo "<td scope='col'>" . $datos["Id_alumne"] . "</td>";
                 echo "<td scope='col'>" . $datos["DNI_Alumne"] . "</td>";
                 echo "<td scope='col'>" . $datos["Nom_Alumne"] . "</td>";
                 echo "<td scope='col'>" . $datos["Cognom1_Alumne"] . "</td>";
                 echo "<td scope='col'>" . $datos["Cognom2_Alumne"] . "</td>";
                 echo "<td scope='col'>" . $datos["Nom_Classe"] . "</td>";
                 echo "<td scope='col'>
                         <a class='btn btn-primary btn-sm me-1' href='./formularios/formulariosAlumnes/formEditarAlumnes.php?id=" . $datos['Id_alumne'] . "' role='button'>Editar</a>
                         <a class='btn btn-danger btn-sm' href='./acciones/accionesAlumnes/eliminarAlumnes.php?id=" . $datos['Id_alumne'] . "' role='button'>Eliminar</a>
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