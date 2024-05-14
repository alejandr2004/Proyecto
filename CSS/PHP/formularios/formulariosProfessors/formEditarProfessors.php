<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   


<?php
require_once "../../conexion.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql=$conexion->query("SELECT Id_professor, Nom_professor, Cognom1_professor, Cognom2_professor, Telefon_professor, DNI_professor, Correu_professor, Sexe_professor, dept FROM professors WHERE Id_professor = $id;"); /*Esto se cambiará por un select * si quiero editar todos los campos (tener en cuenta que algunos de ellos como el ID son "read-only")*/
    
    $tabla=$sql->fetchAll();

    foreach($tabla as $dades){
        $Id_professor = $dades["Id_professor"];
        $Nom_professor = $dades["Nom_professor"];
        $Cognom1_professor = $dades["Cognom1_professor"];
        $Cognom2_professor = $dades["Cognom2_professor"];
        $Telefon_professor = $dades["Telefon_professor"];
        $DNI_professor = $dades["DNI_professor"];
        $Correu_professor = $dades["Correu_professor"];
        $Sexe_professor = $dades["Sexe_professor"];
        $dept = $dades["dept"];
    }


}

?>

<a class="btn btn-outline-primary" href='../../alumnes.php' role='button'>Tornar a inici</a>

<h1>Editar</h1>
    <form method="POST" action="../../acciones/accionesProfessors/editarProfessors.php?id=<?php echo $id; ?>">
        <label>Id del professor:</label>
        <input type="text" name="Id_professor" class="form-control" value="<?php echo $Id_professor; ?>" readonly>
        <label>Nom del professor:</label>
        <input type="text" name="Nom_professor" class="form-control" value="<?php echo $Nom_professor; ?>">
        <label>Primer Cognom:</label>
        <input type="text" name="Cognom1_professor" class="form-control" value="<?php echo $Cognom1_professor; ?>">
        <label>Segon Cognom:</label>
        <input type="text" name="Cognom2_professor" class="form-control" value="<?php echo $Cognom2_professor; ?>">
        <label>Telèfon del professor:</label>
        <input type="text" name="Telefon_professor" class="form-control" value="<?php echo $Telefon_professor; ?>">
        <label>DNI del professor:</label>
        <input type="text" name="DNI_professor" class="form-control" value="<?php echo $DNI_professor; ?>">
        <label>Correu del professor:</label>
        <input type="text" name="Correu_professor" class="form-control" value="<?php echo $Correu_professor; ?>">
        <label>Sexe del professor:</label>
        <input type="text" name="Sexe_professor" class="form-control" value="<?php echo $Sexe_professor; ?>">
        <label>Departament:</label>
        <input type="text" name="dept" class="form-control" value="<?php echo $dept; ?>">
        <button type="button submit" class="btn btn-primary">Guardar</button>

    </form>

</script>



</body>
</html>