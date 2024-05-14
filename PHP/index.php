
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuelas</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-center">
                  <img src="../IMG/login.png" style="width: 185px;" alt="logo">
                  <h2 class="mt-1 mb-5 pb-1">Iniciar sesión como Administrador</h2>
                </div>
                <form method="post" class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                  <div data-mdb-input-init class="form-outline mb-4">
                    <object type="image/svg+xml" data="../IMG/user-solid.svg" width="15" height="15"></object>
                    <label class="form-label" for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control"
                      placeholder="Usuario Administrador" required />
                  </div>
                  <div data-mdb-input-init class="form-outline mb-4">
                    <object type="image/svg+xml" data="../IMG/lock-solid.svg" width="15" height="15"></object>
                    <label class="form-label" for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control"
                      placeholder="Contraseña Administrador" required />
                  </div>
                  <div class="text-center pt-1 mb-5 pb-1">
                    <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Iniciar sesión</button>
                    <p id="texto_error_login"></p>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Jesuïtes Educació</h4>
                <p class="small mb-0">Les nostres escoles són espais d’innovació en educació. Impulsem la formació continuada de l’equip docent i desenvolupem una proposta educativa global: tant acadèmica com personal. Ajudem l’alumnat a adquirir competències per interactuar amb un món multicultural en evolució. Des de les escoles de la xarxa, traslladem a l’alumnat el valor de transformar-se un mateix per transformar el món.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
    function validacion() {
        let usuario_js = document.getElementById("usuario").value;
        let contraseña_js = document.getElementById("password").value;
        let texto_error = document.getElementById("texto_error_login");

        if (usuario_js.length === 0 && contraseña_js.length === 0) {
            texto_error.innerHTML = "Introduce los datos en el formulario";
            return false; // Evitar que se envíe el formulario
        } else if (usuario_js !== "root" || contraseña_js !== "QAZqaz123") {
            texto_error.innerHTML = "Usuario o contraseña incorrectos";
            return false; // Evitar que se envíe el formulario
        }
        return true; // Permitir el envío del formulario
    }
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["password"];

    if ($usuario == "root" && $contraseña == "QAZqaz123") {
        header("location:./alumnes.php");
        exit(); // Importante para evitar que el código PHP siga ejecutándose
    } else {
        echo "<p class='text-danger'>Usuario o contraseña incorrectos</p>";
    }
}
?>

</body>
</html>


