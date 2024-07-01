<?php require ('views/header.php'); ?>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/dashboard.css">
<div class="grid-container full margin-1">
	<!-- CARDS MOSTRANDO INFO -->
	<div class="grid-x grid-margin-x">
		<div class="cell large-4 callout shadow">
			<div class="cell text-center">
				<!-- darle estilo  -->
				<h1 class="titulo" id="total-cotizaciones">198</h1>
			</div>
			<div class="cell text-center">
				<h3>COTIZACIONES</h3>
			</div>
		</div>
		<div class="cell large-4 callout shadow">
			<div class="cell text-center">
				<!-- darle estilo  -->
				<h1 class="titulo" id="total-proyectos">54</h1>
			</div>
			<div class="cell text-center">
				<h3>PROYECTOS</h3>
			</div>
		</div>
		<div class="cell large-4 callout shadow">
			<div class="cell text-center">
				<!-- darle estilo  -->
				<h1 class="titulo" id="total-recaudado">6.000.000</h1>
			</div>
			<div class="cell text-center">
				<h3>RECAUDADO</h3>
			</div>
		</div>
	</div>
	<!-- CARDS MOSTRANDO INFO END-->
	<!-- MAIN CONTENT -->
	<div class="grid-x grid-margin-x">
		<!-- GRAFICOS -->
		<div class="cell large-9 grid-x grid-margin-x grid-margin-y">
			<div class="cell large-6 medium-12 small-12">
				<div class="cell">
					<h4>Distribución del Estado de las Cotizaciones</h4>
				</div>
				<div class="cell">
					<canvas id="barras"></canvas>
				</div>
			</div>
			<div class="cell large-6 medium-12 small-12">
				<div class="cell">
					<h4>Total de Cotizaciones por Mes</h4>
				</div>
				<div class="cell">
					<canvas id="lineal"></canvas>
				</div>
			</div>
			<div class="cell large-6 medium-12 small-12">
				<div class="cell">
					<h4>GRAFICO POLAR AREA</h4>
				</div>
				<div class="cell">
					<canvas id="area"></canvas>
				</div>
			</div>
			<div class="cell large-6 medium-12 small-12">
				<div class="cell">
					<h4>Proporción de Ventas por Servicio</h4>
				</div>
				<div class="cell">
					<canvas id="pastel"></canvas>
				</div>
			</div>
		</div>
		<!-- GRAFICOS END-->
		<!-- ACCIONES PARA IMPRIMIR -->
		<div class="cell large-3 shadow right-site">
			<div class="cell text-center">
				<h4>Impresiones</h4>
			</div>
			<div class="cell">
				<button class="button large-12">Cotizaciones
				<i class="fa-solid fa-file-pdf"></i>
				</button>
			</div>
			<div class="cell">
				<button class="button large-12">Proyectos
				<i class="fa-solid fa-file-pdf"></i>
				</button>
			</div>
			<div class="cell">
				<button class="button large-12">Resumen Semanal
				<i class="fa-solid fa-circle-info"></i>
				</button>
			</div>
			<div class="cell">
				<button class="button large-12">Resumen Mensual
				<i class="fa-solid fa-info"></i>
				</button>
			</div>
			<div class="cell">
				<button class="button large-12">Resumen Anual
				<i class="fa-solid fa-question"></i>
				</button>
			</div>
			<hr>
			<div class="cell text-center">
				<h4>Mis proyectos:</h4>
			</div>
			<div class="cell" id="mis-proyectos">
				<div class="grid-x align-spaced">
					<p>nombre del proyecto</p><a href=""><i class="fa-solid fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
		<!-- ACCIONES PARA IMPRIMIR END-->
	</div>
	<!-- MAIN CONTENT END-->
</div>
<script src="<?php echo constant('URL') ?>public/js/dashboard.js"></script>
<?php require ('views/footer.php'); ?>