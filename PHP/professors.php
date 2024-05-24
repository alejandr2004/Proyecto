<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/estilo.css">
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

require "conexion.php";

$tbl_professors="professors";
// Consulta general, Consulta sin filtro, es decir, lo que se ve al entrar a alumnes.php
$query = "SELECT p.Id_Professor, p.Nom_Professor, p.Cognom1_Professor, p.Cognom2_Professor, p.Telefon_Professor, p.DNI_Professor, p.Correu_Professor, p.Sexe_Professor, d.Nom_Dept
FROM Professors p
INNER JOIN Departament d
ON p.dept = d.Codi_Dept";

// Consulta para contar el número de filas
$countQuery = "SELECT COUNT(*) as total FROM Professors p INNER JOIN Departament d ON p.dept = d.Codi_Dept";

// si se usa la barra buscadora, se guarda en la variable 'busqueda' el texto buscado,
// y le añadimos a la variable 'query' la condicion que ha entrado por la barra buscadora
if (isset($_POST['buscar'])) {
    $busqueda = $_POST['busqueda'];
    $query .= " WHERE p.Id_Professor LIKE :busqueda
        OR p.Nom_Professor LIKE :busqueda
        OR p.Cognom1_Professor LIKE :busqueda
        OR p.Cognom2_Professor LIKE :busqueda
        OR p.DNI_Professor LIKE :busqueda
        OR p.Correu_Professor LIKE :busqueda
        OR p.Sexe_Professor LIKE :busqueda
        OR d.Nom_Dept LIKE :busqueda
        OR p.Telefon_Professor LIKE :busqueda";
    $countQuery .= " WHERE p.Id_Professor LIKE :busqueda
    OR p.Nom_Professor LIKE :busqueda
    OR p.Cognom1_Professor LIKE :busqueda
    OR p.Cognom2_Professor LIKE :busqueda
    OR p.DNI_Professor LIKE :busqueda
    OR p.Correu_Professor LIKE :busqueda
    OR p.Sexe_Professor LIKE :busqueda
    OR d.Nom_Dept LIKE :busqueda
    OR p.Telefon_Professor LIKE :busqueda";
}
// si se da click en los botones se ordena de la A-Z la columna que seleccionas
// solo se tiene que poner la condicion de ordenar de A-Z dependiendo del boton que se de click
if (isset($_POST['filtre_id'])) {
    $query .= " ORDER BY p.Id_professor ASC";
} elseif (isset($_POST['filtre_Nom_Professor'])) {
    $query .= " ORDER BY p.Nom_professor ASC";
} elseif (isset($_POST['filtre_cognom1_professor'])) {
    $query .= " ORDER BY p.Cognom1_professor ASC";
} elseif (isset($_POST['filtre_cognom2_professor'])) {
    $query .= " ORDER BY p.Cognom2_Professor ASC";
} elseif (isset($_POST['filtre_telefon_professor'])) {
    $query .= " ORDER BY p.Telefon_Professor ASC";
} elseif (isset($_POST['filtre_DNI_professor'])) {
    $query .= " ORDER BY p.DNI_professor ASC";
} elseif (isset($_POST['filtre_correu_professor'])) {
    $query .= " ORDER BY c.Correu_Professor ASC";
} elseif (isset($_POST['filtre_sexe_professor'])) {
    $query .= " ORDER BY p.Sexe_Professor ASC";
} elseif (isset($_POST['filtre_departament_professor'])) {
    $query .= " ORDER BY d.Nom_Dept ASC";
}

// si se ha enviado el form de la busqueda se ejecuta la consulta PERO CAMBIANDO LA PALABRA 'BUSQUEDA' POR %BUSQUEDA% 
// se hace para evitar errores en la asignacion de la consulta en la variable, y porque sin los %% no funcionaria la consulta
if (isset($_POST['buscar'])) {
    $statement = $conexion->prepare($query);
    $statement->execute(['busqueda' => "%$busqueda%"]);
    
    $countStatement = $conexion->prepare($countQuery);
    $countStatement->execute(['busqueda' => "%$busqueda%"]);
    $rowCount = $countStatement->fetch(PDO::FETCH_ASSOC)['total'];
} else {
    $statement = $conexion->query($query);
    $rowCount = $conexion->query($countQuery)->fetch(PDO::FETCH_ASSOC)['total'];
}

$consulta = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Botones de las tablas -->
<div class="container mt-4">
    <div class="mb-3">
        <a class="btn btn-outline-primary me-2" href="alumnes.php" role="button">Alumnes</a>
        <a class="btn btn-outline-primary me-2" href="departament.php" role="button">Departament</a>
        <a class="btn btn-outline-primary me-2" href="classe.php" role="button">Classe</a>
        <a class="btn btn-outline-primary" href="./formularios/formulariosProfessors/formCrearProfessors.php" role="button">Crear</a>
        <a class="btn btn-outline-primary" href='index.php?tick="1"' role="button">Cerrar Sesion</a>
    </div>

    <!-- Formulario de búsqueda -->
    <form method="post" class="mb-3">
        <div class="input-group">
            <input type="text" name="busqueda" class="form-control" placeholder="Buscar...">
            <button class="btn btn-outline-secondary" type="submit" name="buscar">Buscar</button>
        </div>
    </form>

    <!-- Mostrar número de resultados -->
    <div class="mb-3">
        <strong>Resultados de la búsqueda: <?php echo $rowCount; ?></strong>
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
                    echo "<td scope='col'>" . $datos["Id_Professor"] . "</td>";
                    echo "<td scope='col'>" . $datos["Nom_Professor"] . "</td>";
                    echo "<td scope='col'>" . $datos["Cognom1_Professor"] . "</td>";
                    echo "<td scope='col'>" . $datos["Cognom2_Professor"] . "</td>";
                    echo "<td scope='col'>" . $datos["Telefon_Professor"] . "</td>";
                    echo "<td scope='col'>" . $datos["DNI_Professor"] . "</td>";
                    echo "<td scope='col'>" . $datos["Correu_Professor"] . "</td>";
                    echo "<td scope='col'>" . $datos["Sexe_Professor"] . "</td>";
                    echo "<td scope='col'>" . $datos["Nom_Dept"] . "</td>";
                    echo "<td scope='col'>
                        <a class='btn btn-primary btn-sm me-1' href='./formularios/formulariosProfessors/formEditarProfessors.php?id=" . $datos['Id_Professor'] . "' role='button'>Editar</a>
                        <a class='btn btn-danger btn-sm' href='./acciones/accionesProfessors/eliminarProfessors.php?id=" . $datos['Id_Professor'] . "' role='button'>Eliminar</a>
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
