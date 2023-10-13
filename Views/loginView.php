<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kronos │ LogIn</title>
    <link rel="manifest" href="manifest.json">
</head>
<body>
<header>
    <a href='./?pag=inicio'><button>Inicio</button></a>
    <a href='./?pag=conozcanos'><button>Conozcanos</button></a>
    <a href='./?pag=login'><button>LogIn</button></a>
</header>
  <div class="login">
  <img id="img_logo_login" src="/../Media/img/config/logo.png">
    <div class="form">
      <form id="formulario" action='./?pag=login/validarLogin' method="POST">
          <input type="text" name="Usuario" placeholder="Usuario">
          <input type="password" name="Contrasena" placeholder="Contraseña">
          <div id="button_container_login">
            <input type="submit" value="Ingresar" class="submit">
          </div>
      </form>
      <a href='./?pag=cliente/validarCambiarContrasena'><h4>Olvidó su contraseña</h4></a>
    </div>
  </div>
</body>
</html>

