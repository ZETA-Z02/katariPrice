<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo constant('COMPANY'); ?></title>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/foundation/css/foundation.css">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/foundation/css/foundation-float.css">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/foundation/css/foundation-prototype.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="<?php echo constant('URL'); ?>public/foundation/js/jquery.js"></script>
  <script src="<?php echo constant('URL'); ?>public/foundation/js/foundation.js"></script>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login.css">
</head>

<body>
  <div class="grid-container container-login">
    <div class="grid-x margin-3 login-z shadow">
      <div class="cell large-6 info-z">
        <div class="padding-horizontal-2">
          <h1>Katari-Software y Desarrollo</h1>
          <p class="lead">
            Sistema de cotizaciones, este sistema automatiza la cotizacion de Estadistica, Software y Redes.
            Seguimiento de cotizaciones, proyectos y pagos.
            <br />
            Registro de personal, usuarios y clientes.
            <br />
            Seguimiento de proyectos y asignacion de personal.
          </p>
          <a href="" class="button">facebook</a>
          <a href="" class="button alert">Gmail</a>
        </div>
      </div>
      <div class="cell large-6 formulario-z">
        <div class="login">
          <div class="margin-1">
            <h1>Login</h1>
          </div>
          <form action="<?php echo constant('URL'); ?>login/logIn" method="POST">
            <label for="usuario" class="texto-form">Usuario</label>
            <input type="text" name="usuario" id="usuario" value="zeta" required/>
            <label for="password" class="texto-form">Contraseña</label>
            <input type="password" name="password" id="password" value="zeta" required/>
            <input type="submit" value="Ingresar" class="button success" />
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
