<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="get">
<label>Usuario:</label>
<input type="text" name="usuario" id="usuario" onmouseleave="validacion()">
<label>Contraseña:</label>
<input type="text" name="password" id="password" onmouseleave="validacion()">
<button>Enviar</button>
</form>


<p id="texto_error_login"></p>




<script>


function validacion(){

let usuario_js=document.getElementById("usuario").value
let contraseña_js=document.getElementById("password").value
let texto_error=document.getElementById("texto_error_login")



if(usuario_js.length == 0 && contraseña_js.length == 0 ){

texto_error.innerHTML="Introduce los datos en el formulario"

}else if(usuario_js!="root" && contraseña_js != "QAZqaz123"){

texto_error.innerHTML="Usuario y contraseña incorrectos"


}else if(contraseña_js!="QAZqaz123"){


texto_error.innerHTML="Contraseña incorrecta"


}else if(usuario_js!="root"){


texto_error.innerHTML="Usuario incorrecto"


}

}

</script>

<?php

if(isset($_GET["usuario"]) && isset($_GET["password"])){



$usuario=$_GET["usuario"];

$contraseña=$_GET["password"];





    if($usuario=="root" && $contraseña=="QAZqaz123"){

    header("location:index.php");

    }else{

    echo "Usuario o contraseña incorrectos";


    }




}

?>











</body>
</html>