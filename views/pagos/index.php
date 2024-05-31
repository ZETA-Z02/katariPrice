<?php require ('views/header.php');?>

<div class="grid-container full margin-top-1">
	<div class="grid-x">
		<h2>REGISTRO DE PAGOS POR PROYECTO</h2>
	</div>
	<div class="grid-x">
		<div class="cell">
			<h3>Tabla de Pagos</h3>
		</div>
		<div class="cel">
			<table>
				<thead>
					<tr>
						<th>Nº</th>
						<th>Proyecto</th>
						<th>Cliente</th>
						<th>Estado</th>
						<th>Creacion</th>
						<th>Deuda</th>
						<th>Total</th>
						<th>telefono</th>
						<th>Detalles</th>
					</tr>
				</thead>
				<tbody id="pagos">
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script src="<?php echo constant('URL') ?>public/js/vistaPagos.js"></script>
<?php require ('views/footer.php');?>