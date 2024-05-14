<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

<a class="btn btn-outline-primary" href='../../classe.php' role='button'>Tornar a inici</a>

<form method="POST" action="../../acciones/accionesClasse/crearClasse.php">
    <label>Código de la clase:</label>
    <input type="text" name="Codi_Classe">
    <label>Nombre de la clase:</label>
    <input type="text" name="Nom_Classe">
    <label>Tutor:</label>
    <input type="text" name="Tutor">
    <button class="btn btn-primary">Enviar</button>
</form>

</body>
</html>
