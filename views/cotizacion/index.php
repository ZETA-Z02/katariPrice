<?php require ('views/header.php'); ?>
<link rel="stylesheet" href="<?php echo constant('URL') . 'public/css/cotizacion.css' ?>">
<div class="grid-container margin-top-1">
	<!-- BOTONES NATURAL Y JURIDICA-POP UPS -->
	<div class="grid-x large-up-2 text-center">
		<div class="cell">
			<button class="button warning" id="natural-btn">Persona Natural</button>
		</div>
		<div class="cell">
			<button class="button alert" id="juridica-btn">Persona Juridica</button>
		</div>
	</div>
	<!-- BOTONES NATURAL Y JURIDICA-POP UPS -->
	<!-- FORMULARIO PRINCIPAL-->
	<div class="grid-x callout grid-margin-x">
		<!-- DATOS PERSONA NATURAL -  SE MUETRA CUANDO SE PRESIONA EL BOTON PERSONA NATURAL -->
		<div class="cell large-12" id="datos-natural">
			<h4>Personal Natural:</h4>
			<div class="grid-x callout grid-margin-x">
				<input type="text" id="idnatural" hidden style="display:none;">
				<div class="cell large-4">
					<label for="">Nombre:</label>
					<input type="text" id="nombres">
				</div>
				<div class="cell large-4">
					<label for="">dni:</label>
					<input type="text" id="dni">
				</div>
				<div class="cell large-4">
					<label for="">telefono:</label>
					<input type="text" id="telefono">
				</div>
				<div class="cell large-4">
					<label for="">Email:</label>
					<input type="text" id="email">
				</div>
				<div class="cell large-4">
					<label for="">direccion:</label>
					<input type="text" id="direccion">
				</div>
				<div class="cell large-4">
					<label for="">Ciudad:</label>
					<input type="text" id="ciudad">
				</div>
			</div>
		</div>
		<!-- DATOS PERSONA NATURAL END ------------------------------------------------------->
		<!-- DATOS 	PERSONA JURIDICA -  SE MUETRA CUANDO SE PRESIONA EL BOTON PERSONA JURIDICA -->
		<div class="cell large-12" id="datos-juridica">
			<h4>Personal Juridica:</h4>
			<div class="grid-x callout grid-margin-x">
				<input type="text" id="idjuridica" hidden style="display:none;">
				<div class="cell large-4">
					<label for="">Razon Social:</label>
					<input type="text" id="razonsocial">
				</div>
				<div class="cell large-4">
					<label for="">Ruc:</label>
					<input type="text" id="ruc">
				</div>
				<div class="cell large-4">
					<label for="">Telefono:</label>
					<input type="text" id="telefono-juridica">
				</div>
				<div class="cell large-4">
					<label for="">Email:</label>
					<input type="text" id="email-juridica">
				</div>
				<div class="cell large-4">
					<label for="">Rubro:</label>
					<input type="text" id="rubro">
				</div>
				<div class="cell large-4">
					<label for="">Web:</label>
					<input type="text" id="web">
				</div>
			</div>
		</div>
		<!-- DATOS PERSONA JURIDICA END ------------------------------------------------------->
		<div class="cell large-3">
			<label for="">Servicio</label>
			<select name="servicio" id="servicio">
				<option value="estadistica">estadistica</option>
				<option value="software">software</option>
				<option value="redes">redes</option>
			</select>
		</div>
		<div class="cell large-3 contenido" id="contenido-estadistica">
			<label for="dias">Nivel</label>
			<select name="nivel" id="nivel">
				<option value="pregrado">pregrado</option>
				<option value="postgrado">postgrado</option>
				<option value="maestria">maestria</option>
				<option value="doctorado">doctorado</option>
			</select>
		</div>
		<div class="cell large-3">
			<label for="dias">Dias</label>
			<input type="text">
		</div>
		<div class="cell large-3">
			<label for="dias">Precio</label>
			<input type="text">
		</div>
		<div class="cell large-3">
			<label for="dias">Cantidad</label>
			<input type="text">
		</div>
		<div class="cell large-6">
			<label for="dias">Descripcion</label>
			<textarea name="" id="miTextarea"></textarea>
		</div>
		<div class="cell large-3">
			<label for="dias">Excel</label>
			<input type="file">
		</div>
		<button class="button success large-12" id="guardar-todo">Guardar</button>
	</div>
	<!-- FORMULARIO END-->
	<!-- SOFTWARE FORMULARIO -->
	<div class="grid-x callout grid-margin-x contenido" id="contenido-software">
		<div class="cell text-center">
			<h3>Calculadora de Costos De Software</h3>
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
				<button class="button success large-12" id="calcular">Calcular Y Guardar</button>
			</div>
		</div>
	</div>
	<!-- SOFTWARE FORMULARIO END -->
	<!-- REDES FORMULARIO -->
	<div class="grid-x callout grid-margin-x contenido" id="contenido-redes">
		<div class="cell text-center">
			<h3>Costes De Redes-EXCEL</h3>
		</div>
		<div class="cell grid-x large-up-2 grid-margin-x text-right grid-margin-y">
			<span class="cell grid-x">
				<label for="" class="large-4 lead">Tipo Cable : </label>
				<select class="large-8" name="" id="dificultad"></select>
			</span>
			<span class="cell grid-x">
				<label for="" class="large-4 lead">Coste por Punto : </label>
				<input class="large-8" type="text" value="25.50">
			</span>
			<span class="cell grid-x">
				<label for="" class="large-4 lead">Numero Puntos : </label>
				<input class="large-8" type="text">
			</span>
			<span class="cell grid-x">
				<label for="" class="large-4 lead">Metros Cable : </label>
				<input class="large-8" type="text">
			</span>
			<span class="cell grid-x">
				<label for="" class="large-4 lead">Conector RJ45 Hembra : </label>
				<input class="large-8" type="text">
			</span>
			<span class="cell grid-x">
				<label for="" class="large-4 lead">Conector RJ45 Macho : </label>
				<input class="large-8" type="text">
			</span>
			<span class="cell grid-x">
				<label for="" class="large-4 lead">Canaletas : </label>
				<input class="large-8" type="text">
			</span>
			<span class="cell grid-x">
				<label for="" class="large-4 lead">Costo Subtotal : </label>
				<input class="large-8" type="text">
			</span>
			<span class="cell grid-x">
				<label for="" class="large-4 lead">20x15x15 : </label>
				<input class="large-8" type="text">
			</span>
			<span class="cell grid-x">
				<label for="" class="large-4 lead">60x20x15 : </label>
				<input class="large-8" type="text">
			</span>
		</div>
		<div class="cell large-12">
			<button class="button large-12">guardar e imprimir</button>
		</div>

	</div>
	<!-- REDES FORMULARIO END-->
	<!-- MODAL NATURAL -->
	<div class="grid-x callout grid-margin-x modal" id="natural-modal">
		<div class="cell large-4">
			<label for="" class="labeles">nombre:</label>
			<input type="text" id="natural-nombre">
		</div>
		<div class="cell large-4">
			<label for="" class="labeles">dni:</label>
			<input type="text" id="natural-dni">
		</div>
		<div class="cell large-2">
			<button class="button">Buscar</button>
		</div>
		<div class="cell large-2">
			<button class="button success" id="natural-new-btn">Nuevo</button>
		</div>
		<div class="cell large-12">
			<table>
				<thead>
					<tr>
						<th>nombres</th>
						<th>dni</th>
						<th>ciudad</th>
						<th>opciones</th>
					</tr>
				</thead>
				<tbody id="datos-natural-table">
					<tr>
						<td>Lorem.</td>
						<td>Lorem, ipsum.</td>
						<td>Lorem, ipsum.</td>
						<td>Seleccionar</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- MODAL NATURAL END -->
	<!-- MODAL JURIDICA -->
	<div class="grid-x callout grid-margin-x modal" id="juridica-modal">
		<div class="cell large-4">
			<label for="" class="labeles">Razon Social:</label>
			<input type="text" id="juridica-razonsocial">
		</div>
		<div class="cell large-4">
			<label for="" class="labeles">Ruc:</label>
			<input type="text" id="juridica-ruc">
		</div>
		<div class="cell large-2">
			<button class="button">Buscar</button>
		</div>
		<div class="cell large-2">
			<button class="button success" id="juridica-new-btn">Nuevo</button>
		</div>
		<div class="cell large-12">
			<table>
				<thead>
					<tr>
						<th>Razon Social</th>
						<th>RUC</th>
						<th>Telefono</th>
						<th>opciones</th>
					</tr>
				</thead>
				<tbody id="datos-juridica-table">
					<tr>
						<td>Lorem.</td>
						<td>Lorem, ipsum.</td>
						<td>Lorem, ipsum.</td>
						<td>Seleccionar</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- MODAL JURIDICA END -->
	<!-- MODAL FORMULARIO NATURAL -->
	<div class="grid-x callout modal-form" id="natural-form">
		<form action="" class="grid-x grid-margin-x" id="natural-modal-form">
			<div class="cell large-12 text-center">
				<h4>Ingrese datos de la persona Natural</h4>
			</div>
			<label for="" class="cell large-3">
				Nombre:
				<input type="text" name="nombre">
			</label>
			<label for="" class="cell large-3">
				Apellidos:
				<input type="text" name="apellidos">
			</label>
			<label for="" class="cell large-3">
				DNI:
				<input type="text" name="dni">
			</label>
			<label for="" class="cell large-3">
				Sexo:
				<select name="sexo" id="sexo">
					<option value="masculino">Masculino</option>
					<option value="femenino">Femenino</option>
				</select>
			</label>
			<label for="" class="cell large-3">
				Ciudad:
				<input type="text" name="ciudad">
			</label>
			<label for="" class="cell large-3">
				Telefono:
				<input type="text" name="telefono">
			</label>
			<label for="" class="cell large-3">
				Email:
				<input type="text" name="email">
			</label>
			<label for="" class="cell large-3">
				Direccion:
				<input type="text" name="direccion">
			</label>
			<div class="cell large-12 text-center">
				<button class="button success" type="submit">Guardar</button>
			</div>
		</form>
		<button class="button alert" id="cancelar-natural-btn">Cerrar</button>
	</div>
	<!-- MODAL FORMULARIO NATURAL END-->
	<!-- MODAL FORMULARIO JURIDICO -->
	<div class="grid-x callout modal-form" id="juridica-form">
		<form action="" class="grid-x grid-margin-x" id="juridica-modal-form">
			<div class="cell large-12 text-center">
				<h4>Ingrese datos de la persona Juridico</h4>
			</div>
			<label for="" class="cell large-3">
				Razon Social:
				<input type="text" name="razonsocial">
			</label>
			<label for="" class="cell large-3">
				Telefono:
				<input type="text" name="telefono">
			</label>
			<label for="" class="cell large-3">
				Email:
				<input type="text" name="email">
			</label>
			<label for="" class="cell large-3">
				Web:
				<input type="text" name="web">
			</label>
			<label for="" class="cell large-3">
				RUC:
				<input type="text" name="ruc">
			</label>
			<label for="" class="cell large-3">
				Rubro:
				<input type="text" name="rubro">
			</label>
			<label for="" class="cell large-3">
				Direccion:
				<input type="text" name="direccion">
			</label>
			<div class="cell large-12 text-center">
				<button class="button" type="submit">guardar</button>
			</div>
		</form>
		<button class="button alert" id="cancelar-juridica-btn">Cerrar</button>
	</div>
	<!-- MODAL FORMULARIO JURIDICO END-->
</div>
<script src="<?php echo constant('URL') . 'public/js/cotizacion.js' ?>"></script>
<?php require ('views/footer.php'); ?>