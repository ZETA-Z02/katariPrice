<?php require('views/header.php'); ?>

<div class="grid-container">
    <div class="grid-x align-spaced">
        <h2>Detalles Persona Jurídica: <?php echo @$this->data['razonsocial'] ?></h2>
    </div>
    <form action="<?php echo constant('URL') ?>clientes/updateJuridica" method="POST" id="update-juridica">
        <div class="grid-x grid-margin-x callout">
            <div class="cell large-6">
                <label for="razonsocial">
                    Razon Social:
                    <input type="text" id="razonsocial" name="razonsocial" value="<?php echo @$this->data['razonsocial']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="rubro">
                    Rubro:
                    <input type="text" id="rubro" name="rubro" value="<?php echo @$this->data['rubro']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="ruc">
                    RUC:
                    <input type="text" id="ruc" name="ruc" value="<?php echo @$this->data['ruc']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="telefono">
                    Telefono:
                    <input type="text" id="telefono" name="telefono" value="<?php echo @$this->data['telefono']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="email">
                    Email:
                    <input type="text" id="email" name="email" value="<?php echo @$this->data['email']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="web">
                    Web:
                    <input type="text" id="web" name="web" value="<?php echo @$this->data['web']; ?>">
                </label>
            </div>
            <div class="cell large-6">
                <label for="direccion">
                    direccion:
                    <input type="text" id="direccion" name="direccion" value="<?php echo @$this->data['direccion']; ?>">
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
            <input type="text" id="idjuridica" name="idjuridica" value="<?php echo @$this->data['idjuridica']; ?>" hidden style="display: none;">
                <button class="button success" type="submit">Actualizar</button>
            </div> 
        </div>
    </form>
    <button class="button warning" id="editar">Habilitar Edicion</button>
    <a href="<?php echo constant('URL') ?>clientes" class="button alert">Volver</a>
</div>
<script src="<?php echo constant('URL'); ?>public/js/clientes.js"></script>
<script>
    $("input").prop("disabled", true);
    $("#editar").click(function () {
        $("input").prop("disabled", false);
    });
</script>
<?php require('views/footer.php'); ?>
