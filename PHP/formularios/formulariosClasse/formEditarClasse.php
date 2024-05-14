<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Clase</title>
</head>
<body>

<a class="btn btn-outline-primary" href='../../classe.php' role='button'>Volver al inicio</a>

<?php
require_once '../../conexion.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql = $conexion->query("SELECT Id_Classe, Codi_Classe, Nom_Classe, Tutor FROM classe WHERE Id_Classe = $id;");
    $datosClase = $sql->fetchAll();

    foreach($datosClase as $clase){
        $Id_Classe = $clase["Id_Classe"];
        $Codi_Classe = $clase["Codi_Classe"];
        $Nom_Classe = $clase["Nom_Classe"];
        $Tutor = $clase["Tutor"];
    }
}
?>

<h1>Editar Clase</h1>
<form method="post" action="../../acciones/accionesClasse/editarClasse.php?id=<?php echo $id; ?>">
    <label>ID de la clase:</label>
    <input type="text" name="Id_Classe" class="form-control" value="<?php echo $Id_Classe; ?>" readonly>
    <label>Código de la clase:</label>
    <input type="text" name="Codi_Classe" class="form-control" value="<?php echo $Codi_Classe; ?>">
    <label>Nombre de la clase:</label>
    <input type="text" name="Nom_Classe" class="form-control" value="<?php echo $Nom_Classe; ?>">
    <label>Tutor:</label>
    <input type="text" name="Tutor" class="form-control" value="<?php echo $Tutor; ?>">
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

</body>
</html>
