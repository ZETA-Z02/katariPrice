<?php require ('views/header.php'); ?>

<div class="grid-container full margin-1">
	<div class="cell large-3">
		<label for="">Listas</label>
		<select name="servicio" id="lista">
			<option value="cotizaciones">Cotizaciones</option>
			<option value="proyectos">Proyectos</option>
		</select>
	</div>
	<!-- TABLA COTIZACIONES -->
	<t class="grid-x callout grid-margin-x contenido" id="tabla-cotizaciones">
		<div class="cell">
			<h3>Cotizaciones registradas</h3>
		</div>
		<t class="cell">
			<table>
				<thead>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody id="tbody-cotizaciones">
				</tbody>
			</table>
		</t>
	</t>
	<!-- TABLA COTIZACIONES END -->
	<!-- TABLA PROYECTOS -->
	<div class="grid-x callout grid-margin-x contenido" id="tabla-proyectos">
		2
	</div>
	<!-- TABLA PROYECTOS END-->


</div>
<script src="<?php echo constant('URL') ?>public/js/listado.js"></script>
<!-- REDES FORMULARIO END-->
<?php require ('views/footer.php'); ?>