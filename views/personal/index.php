<?php require('views/header.php'); ?>
<!-- <script language="JavaScript" type="text/javascript" src="<?php echo constant('URL') ?>public/assets/Assets/js/jquery1.4.2.js"></script> -->
<link rel="stylesheet" href="<?php echo constant('URL') ?>public/assets/Assets/css/jpaginate.css">
<div class="grid-container full margin-top-1">
  <div class="grid-x align-spaced">
    <h2>Personal</h2>
    <a class="button success" href="<?php echo constant('URL') ?>personal/nuevo">Nuevo</a>
  </div>
  <div class="grid-x text-center">
    <table>
      <thead>
        <tr>
          <th class="text-center">Foto</th>
          <th class="text-center">Nombres</th>
          <th class="text-center">Telefono</th>
          <th class="text-center">Email</th>
          <th class="text-center" colspan="3">Acciones</th>
        </tr>
      </thead>
      <tbody id="personal-data">
        <tr>
          <td>foto</td>
          <td>Juan</td>
          <td>987654321</td>
          <td>juan@gmail.com</td>
          <td>Detalles</td>
          <td>Login</td>
          <td>Eliminar</td>
        </tr>
      </tbody>
    </table>
    <div id="personal-paginador"></div>
  </div>
</div>

<script src="<?php echo constant('URL') ?>public/js/personal.js"></script>
<?php require('views/footer.php'); ?>
