<?php require ('views/header.php'); ?>
<link rel="stylesheet" href="<?php constant('URL') ?>public/css/calculadora.css" />
<div class="grid-container full margin-1">
    <div class="grid-x">
        <div class="cell text-center">
            <h2>Calculadora de Costos De Software</h2>
        </div>
        <span class="cell grid-x text-right">
            <label for="" class="large-2 lead">Nombre Proyecto : </label>
            <input class="large-10" type="text">
        </span>
        <div class="cell grid-x text-right">
            <label for="" class="lead large-2">Descripcion : </label>
            <span class="large-10">
                <textarea name="" id="miTextareaCalc"></textarea>
            </span>
        </div>
        <div class="cell grid-x large-up-2 grid-margin-x text-right grid-margin-y">
            <span class="cell grid-x">
                <label for="" class="large-4 lead">Dificultad : </label>
                <select class="large-8" name="" id="dificultad"></select>
            </span>
            <span class="cell grid-x">
                <label for="" class="large-4 lead">Sprints : </label>
                <input class="large-8" type="text">
            </span>
            <span class="cell grid-x">
                <label for="" class="large-4 lead">Lenguaje : </label>
                <select class="large-8" name="" id="lenguaje"></select>
            </span>
            <span class="cell grid-x">
                <label for="" class="large-4 lead">Tipo Aplicacion : </label>
                <select class="large-8" name="" id="aplicacion"></select>
            </span>
            <span class="cell grid-x">
                <label for="" class="large-4 lead">Costo Servicio : </label>
                <input class="large-8" type="text">
            </span>
            <span class="cell grid-x">
                <label for="" class="large-4 lead">Duracion : </label>
                <input class="large-8" type="text">
            </span>
            <span class="cell grid-x">
                <label for="" class="large-4 lead">Costo Por Mantenimiento : </label>
                <input class="large-8" type="text">
            </span>
            <span class="cell grid-x">
                <label for="" class="large-4 lead">Tiempo Mantenimiento : </label>
                <input class="large-8" type="text">
            </span>
            <span class="cell grid-x">
                <label for="" class="large-4 lead">Con Servidor : </label>
                <input class="large-8" type="checkbox" id="conservidor">
            </span>
            <span class="cell grid-x">
                <label for="" class="large-4 lead">Sin Servidor : </label>
                <input class="large-8" type="checkbox" id="sinservidor">
            </span>
        </div>
        <div class="cell">
            <hr>
        </div>
        <div class="cell grid-x calcular">
            <div class="cell large-12 callout" id="costo-total">
                <span class="grid-x align-center grid-margin-x">
                    <h4>Costo Total : </h4>
                    <p class="cell lead callout text-center"> s/. 0.00</p>
                </span>
            </div>
            <div class="cell large-12">
                <button class="button success large-12" id="calcular">Calcular</button>
            </div>
        </div>
    </div>
    <script src="<?php echo constant('URL')?>public/js/calculadora.js"></script>
</div>
<?php require ('views/footer.php'); ?>