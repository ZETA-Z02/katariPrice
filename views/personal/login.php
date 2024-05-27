<?php require ('views/header.php'); ?>
<div class="grid-container full margin-top-1">
	<div class="grid-x align-spaced">
		<h2>Detalles del Login</h2>
	</div>
	<form action="<?php echo constant('URL') ?>personal/updateLogin" method="POST" enctype="multipart/form-data" id="login-update" class="cell grid-x align-center text-center">
		<div class="grid-x grid-margin-x callout" style="width: 50%">
			<input type="text" id="idpersonal-nuevo" name="idpersonal" value="<?php echo $this->data['idpersonal']?>" hidden style="display:none;">
			<div class="cell">
				<label for="usuario">
					Nuevo Nombre de Usuario:
					<input type="text" id="usuario" name="usuario" value="<?php echo $this->data['usuario']?>">
				</label>
			</div>
			<div class="cell">
				<label for="password">
					Nueva Contraseña:
					<input type="password" id="password" name="password" value="<?php echo $this->data['password']?>">
				</label>
			</div>
			<div class="cell">
				<label for="password">
					Estado:
					<select name="estado" id="estado">
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</label>
			</div>
			<div class="cell text-center">
				<button class="button success" type="submit">Actualizar Login</button>
			</div>
			<a href="<?php echo constant('URL') ?>personal" class="button alert">Volver</a>
		</div>
	</form>
	
</div>
<script src="<?php echo constant('URL') ?>public/js/personal.js"></script>
<?php require ('views/footer.php'); ?>