<!doctype html>
<html class="no-js" lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Katari Price</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="<?php echo constant('URL') . 'public/img/favicon.ico' ?>">
  <!-- FOUNDATION CSS-PRINCIPAL Y NECESARIO -->
  <link rel="stylesheet" href="<?php echo constant('URL') . 'public/foundation/css/foundation.css' ?>">
  <!-- FOUNDATION FLOAT -->
  <link rel="stylesheet" href="<?php echo constant('URL') . 'public/foundation/css/foundation-float.css' ?>">
  <!-- Foundation prototipe-algunas interesantes opciones a utilizar-->
  <link rel="stylesheet" href="<?php echo constant('URL') . 'public/foundation/css/foundation-prototype.css' ?>">
  <!-- CHARTJS-GRAFICOS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
  <!-- ICONOS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  
  <!-- JQUERY-->
  <script src="<?php echo constant('URL') . 'public/foundation/js/jquery.js' ?>"></script>
</head>
<body>
<div class="top-bar">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text">Katari Price</li>
      <li class="has-submenu">
        <a href="<?php echo constant('URL')?>cotizaciones">Cotizaciones</a>
        <ul class="submenu menu vertical" data-submenu>
          <li><a href="#0">One</a></li>
          <li><a href="#0">Two</a></li>
          <li><a href="#0">Three</a></li>
        </ul>
      </li>
      <li><a href="<?php echo constant('URL')?>proyectos">Proyectos</a></li>
      <li><a href="#0">Three</a></li>
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu">
      <li><input type="search" placeholder="Search"></li>
      <li><button type="button" class="button">Salir</button></li>
    </ul>
  </div>
</div>
