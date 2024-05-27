<?php require ('views/header.php'); ?>
<div class="grid-container full margin-1">
    <div class="grid-x align-spaced">
        <h2>Detalles Personal: <?php echo @$this->data['nombre'] ?></h2>
    </div>
    <form action="<?php echo constant('URL') ?>personal/updatePersonal" method="POST" enctype="multipart/form-data"
        id="update-personal">
        <div class="grid-x grid-margin-x grid-margin-y callout">
            <div class="cell large-12 grid-x text-center callout">
                <div class="cell">
                    <img src="<?php echo @$this->data['foto']; ?>" alt="<?php echo @$this->data['nombre'] ?>">
                    <input type="text" id="fotoActual" name="fotoActual" value="<?php echo @$this->data['foto']; ?>"
                        hidden style="display:none">
                </div>
                <div class="cell">
                    <label for="foto" class="button success">Subir Nueva Foto
                        <input type="file" id="foto" name="foto" hidden style="display:none">
                    </label>
                </div>
                <input type="text" name="idpersonal" value="<?php echo @$this->data['idpersonal']; ?>"
                    id="idpersonal-update" hidden style="display:none">
                <input type="text" name="verificarPersonal" value="updatePersonal" id="update-personal" hidden
                    style="display:none">
            </div>
            <div class="cell large-6">
                <label for="nombre">
                    Nombres:
                    <input type="text" id="nombre" name="nombre" value="<?php echo @$this->data['nombre']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="apellidos">
                    Apellidos:
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo @$this->data['apellidos']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="dni">
                    DNI:
                    <input type="text" id="dni" name="dni" value="<?php echo @$this->data['dni']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="sexo">
                    Sexo:
                    <input type="text" id="sexo" name="sexo" value="<?php echo @$this->data['sexo']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="telefono">
                    Telefono:
                    <input type="text" id="telefono" name="telefono" value="<?php echo @$this->data['telefono']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="fechaNac">
                    FechaNac:
                    <input type="date" id="fechaNac" name="fechaNac" value="<?php echo @$this->data['fechaNac']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="email">
                    Email:
                    <input type="text" id="email" name="email" value="<?php echo @$this->data['email']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="feCreate">
                    Fecha de creacion:
                    <input type="text" id="feCreate" name="feCreate" value="<?php echo @$this->data['feCreate']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="feUpdate">
                    Fecha De Actualizacion:
                    <input type="text" id="feUpdate" name="feUpdate" value="<?php echo @$this->data['feUpdate']; ?>">
                </label>
            </div>
            <div class="cell large-6 text-center">
                <button class="button success">Actualizar</button>
            </div>
        </div>
    </form>
    <button class="button warning" id="editar">Habilitar Edicion</button>
    <a href="<?php echo constant('URL') ?>personal" class="button alert">Volver</a>
</div>
<script>
    $("input").prop("disabled", true);
    $("#editar").click(function () {
        $("input").prop("disabled", false);
    });
</script>
<script src="<?php echo constant('URL') ?>public/js/personal.js"></script>
<?php require ('views/footer.php'); ?>