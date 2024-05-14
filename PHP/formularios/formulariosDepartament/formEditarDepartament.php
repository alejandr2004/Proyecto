<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
require_once '../../conexion.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql = $conexion->query("SELECT Id_Dept, Codi_Dept, Nom_Dept FROM departament WHERE Id_Dept = $id;");
    $tabla = $sql->fetchAll();

    foreach($tabla as $dades){
        $Id_Dept = $dades["Id_Dept"];
        $Codi_Dept = $dades["Codi_Dept"];
        $Nom_Dept = $dades["Nom_Dept"];
    }
}

?>

<a class="btn btn-outline-primary" href='../../departament.php' role='button'>Tornar a inici</a>

<h1>Editar</h1>
<form method="post" action="../../acciones/accionesDepartament/editarDepartament.php?id=<?php echo $id; ?>">
    <label>ID del departamento:</label>
    <input type="text" name="Id_Dept" class="form-control" value="<?php echo $Id_Dept; ?>" readonly>
    <label>Código del departamento:</label>
    <input type="text" name="Codi_Dept" class="form-control" value="<?php echo $Codi_Dept; ?>">
    <label>Nombre del departamento:</label>
    <input type="text" name="Nom_Dept" class="form-control" value="<?php echo $Nom_Dept; ?>">
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

</body>
</html>
