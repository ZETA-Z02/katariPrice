<?php require ('views/header.php'); ?>
<link rel="stylesheet" href="<?php constant('URL') ?>public/css/calculadora.css" />
<div class="grid-container full margin-1">
    	<!-- SOFTWARE FORMULARIO -->
	<div class="grid-x callout grid-margin-x shadow" id="">
		<div class="cell grid-x align-spaced text-center">
			<h3>Calculadora de Costos De Software</h3>
		</div>
		<span class="cell grid-x text-right">
			<label for="nombre-proyecto" class="large-2 lead">Nombre Proyecto : </label>
			<input class="large-10" type="text" id="nombre-proyecto">
		</span>
		<div class="cell grid-x text-right">
			<label for="miTextareaCalc" class="lead large-2">Descripcion : </label>
			<span class="large-10">
				<textarea name="" id="miTextareaCalc"></textarea>
			</span>
		</div>
		<div class="cell grid-x large-up-2 grid-margin-x text-right grid-margin-y">
			<span class="cell grid-x">
				<label for="dificultad" class="large-4 lead">Dificultad : </label>
				<select class="large-8" name="" id="dificultad"></select>
			</span>
			<span class="cell grid-x">
				<label for="sprints" class="large-4 lead">Sprints : </label>
				<input class="large-8" type="text" id="sprints">
			</span>
			<span class="cell grid-x">
				<label for="lenguaje" class="large-4 lead">Lenguaje : </label>
				<select class="large-8" name="" id="lenguaje"></select>
			</span>
			<span class="cell grid-x">
				<label for="aplicacion" class="large-4 lead">Tipo Aplicacion : </label>
				<select class="large-8" name="" id="aplicacion"></select>
			</span>
			<span class="cell grid-x">
				<label for="servicio-software" class="large-4 lead">Tipo Servicio : </label>
				<select class="large-8" name="servicio-software" id="servicio-software"></select>
			</span>
			<span class="cell grid-x">
				<label for="duracion" class="large-4 lead">Duracion Semanas : </label>
				<input class="large-8" type="text" placeholder="SEMANAS" id="duracion" disabled>
			</span>
			<span class="cell grid-x">
				<label for="cost-mantenimiento" class="large-4 lead">Costo Por Mantenimiento : </label>
				<input class="large-8" type="text" id="cost-mantenimiento">
			</span>
			<span class="cell grid-x">
				<label for="tiempo-mantenimiento" class="large-4 lead">T. Mantenimiento Meses: </label>
				<input class="large-8" type="text" id="tiempo-mantenimiento">
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
					<h4>Costo Total con IGV: </h4>
					<p class="cell lead callout text-center" id="mostrar-total"> s/. 0.00</p>
					<input type="text" id="total-software" hidden style="display:none;">
					<input type="text" id="subtotal-software" hidden style="display:none;">
					<input type="text" id="igv-software" hidden style="display:none;">
				</span>
			</div>
			<div class="cell large-12">
				<button class="button success large-12" id="calcular">Calcular</button>
			</div>
		</div>
	</div>
	<!-- SOFTWARE FORMULARIO END -->
    <script src="<?php echo constant('URL')?>public/js/calculadora.js"></script>
</div>
<?php require ('views/footer.php'); ?>