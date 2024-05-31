<?php require ('views/header.php');?>
<link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/personal.css">
<div class="grid-container full margin-top-1">
	<div class="grid-x align-spaced">
		<h2>Nuevo Personal</h2>
	</div>
    <div class="grid-x align-spaced">
		<p class="lead">Se ha Creado Correctamente</p>
	</div>
	<form action="<?php echo constant('URL') ?>personal/create" method="POST" enctype="multipart/form-data" id="personalForm">
	<div class="grid-x grid-margin-x callout">  
        <div class="cell large-6">
            <label for="nombre">
                Nombres:
                <input type="text" id="nombre" name="nombre" value="">
            </label>
        </div>
        <div class="cell large-6">
            <label for="apellidos">
                Apellidos:
                <input type="text" id="apellidos" name="apellidos" value="">
            </label>
        </div>
        <div class="cell large-6">
            <label for="dni">
                DNI:
                <input type="text" id="dni" name="dni" value="">
            </label>
        </div>
        <div class="cell large-6">
            <label for="sexo">
                Sexo:
                <select name="sexo" id="sexo">
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select>
            </label>
        </div>
        <div class="cell large-6">
            <label for="telefono">
                Telefono:
                <input type="text" id="telefono" name="telefono" value="">
            </label>
        </div>
        <div class="cell large-6">
            <label for="fechaNac">
                FechaNac:
                <input type="date" id="fechaNac" name="fechaNac" value="">
            </label>
        </div>
        <div class="cell large-6">
            <label for="email">
                Email:
                <input type="email" id="email" name="email" value="">
            </label>
        </div>
        <div class="cell large-6">
                <label for="foto" class="button">Subir Foto
                    <input type="file" id="foto" name="foto" hidden style="display:none">
                </label>
        </div>
        <div class="cell large-6 ">
            <button class="button success" type="submit">Crear Nuevo</button>
            <a href="<?php echo constant('URL') ?>personal" class="button alert">Volver</a>
        </div>  
	</div>
    </form>
    <form action="<?php echo constant('URL') ?>personal/createLogin" method="POST" enctype="multipart/form-data" id="loginForm">
	<div class="grid-x margin-3 grid-margin-x callout modal-login" id="modal-login">  
        <input type="text" id="idpersonal-nuevo" name="idpersonal" hidden style="display:none;">
        <div class="cell">
            <label for="usuario">
                Nombre de Usuario:
                <input type="text" id="usuario" name="usuario" value="">
            </label>
        </div>
        <div class="cell">
            <label for="password">
                Contraseña:
                <input type="password" id="password" name="password" value="">
            </label>
        </div>
        <div class="cell text-center">
            <button class="button success" type="submit">Crear Login</button>
        </div>  
	</div>
    </form>
</div>
<script src="<?php echo constant('URL')?>public/js/personal.js"></script>
<?php require ('views/footer.php');?>