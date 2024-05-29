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
  <div class="grid-container">
    <div class="grid-x margin-3 login-z shadow">
      <div class="cell large-6 callout info-z">
        <div class="padding-horizontal-2">
          <h1>Katari-Software y desarrollo</h1>
          <p class="lead">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi facilis suscipit, voluptates deserunt
            sapiente pariatur hic velit itaque voluptate! Non quod dolorem aperiam nulla neque labore. Blanditiis magni
            sapiente repudiandae?
          </p>
          <a href="" class="button">facebook</a>
          <a href="" class="button alert">Gmail</a>
        </div>
      </div>
      <div class="cell large-6 callout formulario-z">
        <div class="login">
          <div class="margin-1">
            <h2>Login</h2>
          </div>
          <form action="<?php echo constant('URL'); ?>login/logIn" method="POST">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" value="zeta" required/>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" value="zeta" required/>
            <input type="submit" value="Ingresar" class="button success" />
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php require ('views/footer.php');?>