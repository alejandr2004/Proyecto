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
$tbl_classe = "classe";
// Conexion de la BD
try {
    $conexion = new PDO("mysql:host=$srv;dbname=$db_name", $usu, $pwd);
} catch (Exception $error) {
    echo $error;
}

// Filtrados de los titulos, filtro basico de A-Z
if (isset($_POST['filtre_id'])) {
    $result = $conexion->query("SELECT c.Id_Classe, c.Codi_Classe, c.Nom_Classe, p.Nom_Professor
    FROM $tbl_classe c
    INNER JOIN Professors p
    ORDER BY c.Id_Classe ASC
    WHERE p.Id_Professor = c.Tutor
    ;");
} elseif (isset($_POST['filtre_Codi_Classe'])) {
    $result = $conexion->query("SELECT c.Id_Classe, c.Codi_Classe, c.Nom_Classe, p.Nom_Professor
    FROM $tbl_classe c
    INNER JOIN Professors p
    ORDER BY c.Codi_Classe ASC
    ;");
} elseif (isset($_POST['filtre_Nom_Classe'])) {
    $result = $conexion->query("SELECT c.Id_Classe, c.Codi_Classe, c.Nom_Classe, p.Nom_Professor
    FROM $tbl_classe c
    INNER JOIN Professors p
    ORDER BY c.Nom_Classe ASC
    ;");
} elseif (isset($_POST['filtre_Tutor_Classe'])) {
    $result = $conexion->query("SELECT c.Id_Classe, c.Codi_Classe, c.Nom_Classe, p.Nom_Professor
    FROM $tbl_classe c
    INNER JOIN Professors p
    ORDER BY p.Nom_Professor ASC
    ;");
} else {
    // Si no hay filtro seleccionado, mostrar la tabla normal 
    $result = $conexion->query("SELECT c.Id_Classe, c.Codi_Classe, c.Nom_Classe, p.Nom_Professor
    FROM $tbl_classe c
    INNER JOIN Professors p
    WHERE p.Id_Professor = c.Tutor
    ;");
}
$consulta = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Botones de las tablas -->
<div class="container mt-4">
    <div class="mb-3">
        <a class="btn btn-outline-primary me-2" href="professors.php" role="button">Professors</a>
        <a class="btn btn-outline-primary me-2" href="alumnes.php" role="button">Alumnes</a>
        <a class="btn btn-outline-primary me-2" href="departament.php" role="button">Departament</a>
        <a class="btn btn-outline-primary" href="./formularios/formulariosClasse/formCrearClasse.php" role="button">Crear</a>
        <a class="btn btn-outline-primary" href="index.php" role="button">Cerrar Sesion</a>
    </div>
    <!-- Titulos de las columnas, Que filtran -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_id" value="Id Classe" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_Codi_Classe" value="Codi Classe" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_Nom_Classe" value="Nom de la classe" class="btn btn-link p-0 m-0 align-baseline">
                        </form>
                    </th>
                    <th scope="col">
                        <form method="post" class="d-inline">
                            <input type="submit" name="filtre_Tutor" value="Nom del Tutor" class="btn btn-link p-0 m-0 align-baseline">
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
                    echo "<td scope='col'>" . $datos["Id_Classe"] . "</td>";
                    echo "<td scope='col'>" . $datos["Codi_Classe"] . "</td>";
                    echo "<td scope='col'>" . $datos["Nom_Classe"] . "</td>";
                    echo "<td scope='col'>" . $datos["Nom_Professor"] . "</td>";
                    echo "<td scope='col'>
                            <a class='btn btn-primary btn-sm me-1' href='./formularios/formulariosClasse/formEditarClasse.php?id=" . $datos['Id_Classe'] . "' role='button'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='./acciones/accionesClasse/eliminarClasse.php?id=" . $datos['Id_Classe'] . "' role='button'>Eliminar</a>
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

