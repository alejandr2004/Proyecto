<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   


<?php


if(isset($_GET['id'])){

    require_once "../../conexion.php";


    $id = $_GET['id'];
    
    $sql=$conexion->query("SELECT deptno, dname, loc FROM dept WHERE deptno = $id;"); /*Esto se cambiará por un select * si quiero editar todos los campos (tener en cuenta que algunos de ellos como el ID son "read-only")*/
    
    $tabla=$sql->fetchAll();

    foreach($tabla as $dades){
        $deptno = $dades["deptno"];
        $dname = $dades["dname"];
        $loc = $dades["loc"];
    }


}

?>

<a class="btn btn-outline-primary" href='../../dept.php' role='button'>Tornar a inici</a>

<h1>Editar</h1>
    <form method="POST" action="../../acciones/accionesDept/editarDept.php">
        <label>empno:</label>
        <input type="text" name="id" class="form-control" value="<?php echo $id; ?>" readonly>
        <label>ename:</label>
        <input type="text" name="dname" class="form-control" value="<?php echo $dname; ?>">
        <label>job:</label>
        <input type="text" name="loc" class="form-control" value="<?php echo $loc; ?>">
        <button type="button submit" class="btn btn-primary">Guardar</button>

    </form>

</script>



</body>
</html>