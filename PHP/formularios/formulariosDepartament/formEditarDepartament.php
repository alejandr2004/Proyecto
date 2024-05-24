<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Departamento</title>
    <script src="../../../JS/validaciones.js" defer></script>
    <link rel="stylesheet" href="../../../CSS/editarForms.css">
</head>
<body>

<?php



session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("location: ../../index.php");
    exit(); // Importante para evitar que el código PHP siga ejecutándose
} 


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
<header>
    <nav>
        <a href="#"><img src="../../../IMG/login.png" alt="Logo" class="logo"></a>
        <a class="btn-outline-primary boton" href='../../alumnes.php' role='button'>Tornar a inici</a>
        <div class="auth-buttons">
            <button class="login" onclick="window.location.href='../../index.php?tick=1'">Cerrar Sesion</button>
        </div>
    </nav>
</header>

<div class="wrapper">
    <div class="title">
        <a>Editar Departament</a>
    </div>
    <form method="post" action="../../acciones/accionesDepartament/editarDepartament.php?id=<?php echo $id; ?>">
        <input type="text" name="Id_Dept" class="form-control" value="<?php echo $Id_Dept; ?>" readonly>
        
        <input type="text" name="Codi_Dept" class="form-control" value="<?php echo $Codi_Dept; ?>" id="codigo_dept">
        <p id="error_codigo_dept" style="color:red;"></p><br><br>
        
        <input type="text" name="Nom_Dept" class="form-control" value="<?php echo $Nom_Dept; ?>" id="nombre_dept">
        <p id="error_nombre_dept" style="color:red;"></p><br><br>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('codigo_dept').addEventListener('input', () => validarNumero('codigo_dept', 'error_codigo_dept'));
        document.getElementById('nombre_dept').addEventListener('input', () => validarTexto('nombre_dept', 'error_nombre_dept'));
    });
</script>

</body>
</html>
