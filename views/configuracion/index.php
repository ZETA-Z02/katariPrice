<?php require ('views/header.php'); ?>
<!-- <link rel="stylesheet" href="<?php constant('URL') ?>public/css/configuracion.css" /> -->
<link rel="stylesheet" href="<?php echo constant('URL') ?>public/assets/Assets/css/jpaginate.css">
<div class="grid-container full margin-1">
    <div class="grid-x large-up-2 medium-up-1">
        <div class="cell callout">
            <div class="grid-x align-justify">
                <h4>Costos</h4>
                <button class="button success">Agregar</button>
            </div>
            <div class="cell">
                <table class="stack">
                    <thead>
                        <tr>
                            <th>Servicio</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th colspan="2" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-costos">
                        <tr>
                            <td>Estadistica</td>
                            <td>tesis</td>
                            <td>200</td>
                            <td><button class="button warning">Editar</button></td>
                            <td><button class="button alert">Eliminar</button></td>
                        </tr>
                    </tbody>
                </table>
                <div id="costos-paginacion"></div>
            </div>
            <div class="cell" id="form-costos">

            </div>
        </div>
        <div class="cell callout">
            <div class="grid-x align-justify">
                <h4>Tipos De Aplicaciones</h4>
                <button class="button success">Agregar</button>
            </div>
            <div class="cell">
                <table class="stack">
                    <thead>
                        <tr>
                            <th>Aplicacion</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th colspan="2" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-aplicaciones">
                        <tr>
                            <td>Escritorio</td>
                            <td>240</td>
                            <td>aplicacion de escritorio con c#</td>
                            <td><button class="button warning">Editar</button></td>
                            <td><button class="button alert">Eliminar</button></td>
                        </tr>
                    </tbody>
                </table>
                <div id="aplicaciones-paginacion"></div>
            </div>
            <div class="cell" id="form-costos">

            </div>
        </div>
        <div class="cell callout">
            <div class="grid-x align-justify">
                <h4>Tipo De Servicios</h4>
                <button class="button success">Agregar</button>
            </div>
            <div class="cell">
                <table class="stack">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Servicio</th>
                            <th colspan="2" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-servicios">
                        <tr>
                            <td>100</td>
                            <td>Estadistica</td>
                            <td><button class="button warning">Editar</button></td>
                            <td><button class="button alert">Eliminar</button></td>
                        </tr>
                    </tbody>
                </table>
                <div id="servicios-paginacion"></div>
            </div>
            <div class="cell" id="form-costos">

            </div>
        </div>
        <div class="cell callout">
            <div class="grid-x align-justify">
                <h4>Lenguaje de Programacion</h4>
                <button class="button success">Agregar</button>
            </div>
            <div class="cell">
                <table class="stack">
                    <thead>
                        <tr>
                            <th>Lenguaje</th>
                            <th>Precio</th>
                            <th colspan="2" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-lenguajes">
                        <tr>
                            <td>Java</td>
                            <td>12</td>
                            <td><button class="button warning">Editar</button></td>
                            <td><button class="button alert">Eliminar</button></td>
                        </tr>
                    </tbody>
                </table>
                <div id="lenguajes-paginacion"></div>
            </div>
            <div class="cell" id="form-costos">

            </div>
        </div>
        <div class="cell callout">
            <div class="grid-x align-justify">
                <h4>Dificultad en %</h4>
                <button class="button success">Agregar</button>
            </div>
            <div class="cell">
                <table class="stack">
                    <thead>
                        <tr>
                            <th>Factor</th>
                            <th>Porcentaje</th>
                            <th colspan="2" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-dificultad">
                        <tr>
                            <td>0.1</td>
                            <td>10%</td>
                            <td><button class="button warning">Editar</button></td>
                            <td><button class="button alert">Eliminar</button></td>
                        </tr>
                    </tbody>
                </table>
                <div id="dificultad-paginacion"></div>
            </div>
            <div class="cell" id="form-costos">

            </div>
        </div>
    </div>
</div>
<script src="<?php echo constant('URL') . 'public/js/configuracion.js' ?>"></script>
<?php require ('views/footer.php'); ?>