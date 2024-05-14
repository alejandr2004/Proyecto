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
    
    $sql=$conexion->query("SELECT Id_Alumne, DNI_Alumne,  Nom_Alumne, Cognom1_Alumne , Cognom2_Alumne, Classe FROM alumnes WHERE Id_Alumne = $id;"); /*Esto se cambiará por un select * si quiero editar todos los campos (tener en cuenta que algunos de ellos como el ID son "read-only")*/
    
    $tabla=$sql->fetchAll();

    foreach($tabla as $dades){
        $Id_Alumne = $dades["Id_Alumne"];
        $DNI_Alumne = $dades["DNI_Alumne"];
        $Nom_Alumne = $dades["Nom_Alumne"];
        $Cognom1_Alumne = $dades["Cognom1_Alumne"];
        $Cognom2_Alumne = $dades["Cognom2_Alumne"];
        $Classe = $dades["Classe"];
    }


}

?>


<a class="btn btn-outline-primary" href='../../alumnes.php' role='button'>Tornar a inici</a>

<h1>Editar</h1>
<form method="post" action="../../acciones/accionesAlumnes/editarAlumnes.php?id=<?php echo $id; ?>">
    <label>Id de l'alumne:</label>
    <input type="text" name="Id_Alumne" class="form-control" value="<?php echo $Id_Alumne; ?>" readonly>
    <label>DNI de l'alumne:</label>
    <input type="text" name="DNI_Alumne" class="form-control" value="<?php echo $DNI_Alumne; ?>">
    <label>Nom de l'alumne:</label>
    <input type="text" name="Nom_Alumne" class="form-control" value="<?php echo $Nom_Alumne; ?>">
    <label>Primer Cognom:</label>
    <input type="text" name="Cognom1_Alumne" class="form-control" value="<?php echo $Cognom1_Alumne; ?>">
    <label>Segon Cognom:</label>
    <input type="text" name="Cognom2_Alumne" class="form-control" value="<?php echo $Cognom2_Alumne; ?>">
    <label>Classe:</label>
    <input type="text" name="Classe" class="form-control" value="<?php echo $Classe; ?>">
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

</body>
</html>