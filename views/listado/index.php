<?php require('views/header.php'); ?>
<link rel="stylesheet" href="<?php echo constant('URL') ?>public/assets/Assets/css/jpaginate.css">
<div class="grid-container full margin-1">
  <div class="cell large-3">
    <h2 class="text-center">Listado de Cotizaciones y Proyectos</h2>
    <hr>
    <label class="lead" for="lista">Seleccione una lista: </label>
    <select name="servicio" id="lista">
      <option value="cotizaciones">Cotizaciones</option>
      <option value="proyectos">Proyectos</option>
    </select>
  </div>
  <!-- TABLA COTIZACIONES -->
  <div class="grid-x callout grid-margin-x tabla" id="tabla-cotizaciones">
    <h class="cell">
      <h3 class="text-center">Cotizaciones registradas</h3>
      <hr>
    </h>
    <div class="cell grid-x grid-margin-x">
      <div class="cell large-6">
        <label class="lead" for="tipo-persona">Elija el tipo de Persona:</label>
        <select name="tipo-persona" id="tipo-persona">
          <option value="naturales">Naturales</option>
          <option value="juridicas">Juridicas</option>
        </select>
      </div>
      <div class="cell large-6">
      <label class="lead" for="estado">Elija el estado que busca:</label>
        <select name="estado" id="estado">
          <option value="todo">Todo</option>
          <option value="espera">Espera</option>
          <option value="aceptado">Aceptado</option>
          <option value="proyecto">Proyecto</option>
          <option value="cancelado">Rechazado</option>
        </select>
      </div>
    </div>
    <!-- TABLA NATURALES -->
    <div class="cell contenido" id="tabla-naturales">
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>servicio</th>
            <th>Precio</th>
            <th>estado</th>
            <th>Limite</th>
            <th class="text-center" colspan="2">acciones</th>
          </tr>
        </thead>
        <tbody id="tbody-cotizaciones-natural">
        </tbody>
      </table>
      <div id="natural-paginacion"></div>
    </div>
    <!-- TABLA NATURALES END-->
    <!-- TABLA JURIDICAS -->
    <div class="cell contenido" id="tabla-juridicas">
      <table>
        <thead>
          <tr>
            <th>Razon Social</th>
            <th>Telefono</th>
            <th>servicio</th>
            <th>Precio</th>
            <th>estado</th>
            <th>Limite</th>
            <th class="text-center"colspan="2">acciones</th>
          </tr>
        </thead>
        <tbody id="tbody-cotizaciones-juridica">
        </tbody>
      </table>
      <div id="juridica-paginacion"></div>
    </div>
    <!-- TABLA JURIDICAS END-->
  </div>
  <!-- TABLA COTIZACIONES END -->
  <!-- TABLA PROYECTOS -->
  <div class="grid-x callout grid-margin-x tabla" id="tabla-proyectos">
    <div class="cell">
      <h3 class="text-center">Proyectos registrados</h3>
      <hr>
    </div>
    <div class="cell grid-x grid-margin-x">
      <div class="cell large-6">
      <label class="lead" for="tipo-persona-proyect">Elija el tipo de Persona:</label>
        <select name="tipo-persona-proyect" id="tipo-persona-proyect">
          <option value="naturales-proyect">Naturales</option>
          <option value="juridicas-proyect">Juridicas</option>
        </select>
      </div>
      <div class="cell large-6">
      <label class="lead" for="estado-proyect">Elija el estado que busca:</label>
        <select name="estado-proyect" id="estado-proyect">
          <option value="todo">Todo</option>
          <option value="proceso">Proceso</option>
          <option value="entregado">Entregado</option>
          <option value="atrasado">Atrasado</option>
          <option value="cancelado">Cancelado</option>
        </select>
      </div>
    </div>
    <!-- TABLA NATURALES -->
    <div class="cell contenido-proyect" id="tabla-naturales-proyect">
      <table>
        <thead>
          <tr>
            <th>Nombre Proyecto</th>
            <th>Usuario</th>
            <th>servicio</th>
            <th>estado</th>
            <th>pendiente</th>
            <th>Total</th>
            <th>Fecha Entrega</th>
            <th colspan="2">acciones</th>
          </tr>
        </thead>
        <tbody id="tbody-proyectos-natural">
        </tbody>
      </table>
      <div id="proyectos-natural-paginacion"></div>
    </div>
    <!-- TABLA NATURALES END-->
    <!-- TABLA JURIDICAS -->
    <div class="cell contenido-proyect" id="tabla-juridicas-proyect">
      <table>
        <thead>
          <tr>
            <th>Nombre Proyecto</th>
            <th>Empresa</th>
            <th>servicio</th>
            <th>estado</th>
            <th>pendiente</th>
            <th>Total</th>
            <th>Fecha Entrega</th>
            <th>acciones</th>
          </tr>
        </thead>
        <tbody id="tbody-proyectos-juridica">
        </tbody>
      </table>
      <div id="proyectos-juridica-paginacion"></div>
    </div>
    <!-- TABLA JURIDICAS END-->
  </div>
  <!-- TABLA PROYECTOS END-->
</div>
<script src="<?php echo constant('URL') ?>public/js/listado.js"></script>
<!-- REDES FORMULARIO END-->
<?php require('views/footer.php'); ?>
