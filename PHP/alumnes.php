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

$tbl_empleat = "alumnes";
// Consulta general, Consulta sin filtro, es decir, lo que se ve al entrar a alumnes.php
$query = "SELECT a.Id_alumne, a.DNI_Alumne, a.Nom_Alumne, a.Cognom1_Alumne, a.Cognom2_Alumne, c.Nom_Classe 
    FROM alumnes a 
    INNER JOIN classe c 
    ON a.Classe = c.Id_Classe";

// Consulta para contar el número de filas
$countQuery = "SELECT COUNT(*) as total FROM alumnes a INNER JOIN classe c ON a.Classe = c.Id_Classe";

// si se usa la barra buscadora, se guarda en la variable 'busqueda' el texto buscado,
// y le añadimos a la variable 'query' la condicion que ha entrado por la barra buscadora
if (isset($_POST['buscar'])) {
    $busqueda = $_POST['busqueda'];
    $query .= " WHERE a.DNI_Alumne LIKE :busqueda
        OR a.Id_alumne LIKE :busqueda
        OR a.Nom_Alumne LIKE :busqueda
        OR a.Cognom1_Alumne LIKE :busqueda
        OR a.Cognom2_Alumne LIKE :busqueda
        OR c.Nom_Classe LIKE :busqueda";
    $countQuery .= " WHERE a.DNI_Alumne LIKE :busqueda
        OR a.Id_alumne LIKE :busqueda
        OR a.Nom_Alumne LIKE :busqueda
        OR a.Cognom1_Alumne LIKE :busqueda
        OR a.Cognom2_Alumne LIKE :busqueda
        OR c.Nom_Classe LIKE :busqueda";
}

// si se da click en los botones se ordena de la A-Z la columna que seleccionas
// solo se tiene que poner la condicion de ordenar de A-Z dependiendo del boton que se de click
if (isset($_POST['filtre_id'])) {
    $query .= " ORDER BY a.Id_alumne ASC";
} elseif (isset($_POST['filtre_DNI_Alumne'])) {
    $query .= " ORDER BY a.DNI_Alumne ASC";
} elseif (isset($_POST['filtre_Nom_Alumne'])) {
    $query .= " ORDER BY a.Nom_Alumne ASC";
} elseif (isset($_POST['filtre_cognom1_alumne'])) {
    $query .= " ORDER BY a.Cognom1_Alumne ASC";
} elseif (isset($_POST['filtre_cognom2_alumne'])) {
    $query .= " ORDER BY a.Cognom2_Alumne ASC";
} elseif (isset($_POST['filtre_classe_alumne'])) {
    $query .= " ORDER BY c.Nom_Classe ASC";
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
        <a class="btn btn-outline-primary me-2" href="professors.php" role="button">Professors</a>
        <a class="btn btn-outline-primary me-2" href="departament.php" role="button">Departament</a>
        <a class="btn btn-outline-primary me-2" href="classe.php" role="button">Classe</a>
        <a class="btn btn-outline-primary" href="./formularios/formulariosAlumnes/formCrearAlumnes.php" role="button">Crear</a>
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

    <!-- Titulos de las columnas, que filtran -->
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
                // Imprimir los datos en la tabla
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

