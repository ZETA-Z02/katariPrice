<?php require ('views/header.php'); ?>
<link rel="stylesheet" href="<?php echo constant('URL') . 'public/css/listadoProyecto.css' ?>">
<div class="grid-container full margin-1">
    <div class="cell">
        <h2>Detalles del Proyecto</h2>
    </div>
    <!-- DATOS GENERALES COTIZACION -->
    <div class="cell grid-x grid-margin-x large-up-2">
        <div class="cell">
            <label for="">Nombre Proyecto</label>
            <input type="text" value="<?php echo @$this->data['nomproyecto']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Servicio</label>
            <input type="text" value="<?php echo @$this->data['tiposervicio']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Estado</label>
            <input type="text" value="<?php echo @$this->data['estado']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Pendiente Pago</label>
            <input type="text" value="<?php echo @$this->data['pendientepago']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Total</label>
            <input type="text" value="<?php echo @$this->data['total']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Total Actividades</label>
            <input type="text" id="totalactividades" value="<?php echo @$this->data['totalactividades']; ?>">
        </div>
        <div class="cell">
            <label for="">Fecha Entrega</label>
            <input type="date" id="feEntrega" value="<?php echo @$this->data['feEntrega']; ?>">
        </div>
        <div class="cell">
            <label for="">Creacion del Proyecto</label>
            <input type="text" value="<?php echo @$this->data['feCreate']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Descripcion</label>
            <textarea name="" id="descripcion"><?php echo @$this->data['descripcion']; ?></textarea>
        </div>
        <div class="cell">
            <div class="cell">
                <label for="">Personal Creador</label>
                <input type="text" value="<?php echo @$this->data['personal']; ?>" disabled>
            </div>
            <div class="cell">
                <h5>Acciones de estado:</h5>
                <input type="text" id="idproyecto" value="<?php echo @$this->data['idproyecto']; ?>" disabled hidden style="display: none;">
            </div>
            <div class="cell grid-x align-spaced">
                <button class="button success" id="entregado">Proyecto Entregado</button>
                <button class="button secondary" id="atrasado">Proyecto Atrasado</button>
                <button class="button alert" id="cancelado">Proyecto Cancelado</button>
            </div>
            <div class="cell grid-x grid-margin-x">
                <button class="cell button large-7">Imprimir</button>
                <button class="cell button warning large-5" id="editar">editar</button>
                <button class="cell button warning large-5" id="actualizar">Actualizar</button>
            </div>
        </div>
    </div>
    <!-- DATOS GENERALES COTIZACION END-->
    <?php if ($this->data['nombres']) { ?>
        <!-- DATOS PERSONA NATURAL -->
        <div class="cell">
            <h3>Datos del Cliente Solicitante</h3>
        </div>
        <div class="cell grid-x grid-margin-x large-up-2">
            <div class="cell">
                <label for="">Nombres</label>
                <input type="text" value="<?php echo @$this->data['nombres']; ?>" disabled>
            </div>
            <div class="cell">
                <label for="">dni</label>
                <input type="text" value="<?php echo @$this->data['dni']; ?>" disabled>
            </div>
            <div class="cell">
                <label for="">Telefono</label>
                <input type="text" value="<?php echo @$this->data['telefono']; ?>" disabled>
            </div>
            <div class="cell">
                <label for="">Email</label>
                <input type="text" value="<?php echo @$this->data['email']; ?>" disabled>
            </div>
            <div class="cell">
                <label for="">Direccion</label>
                <input type="text" value="<?php echo @$this->data['direccion']; ?>" disabled>
            </div>
            <div class="cell">
                <label for="">Ciudad</label>
                <input type="text" value="<?php echo @$this->data['ciudad']; ?>" disabled>
            </div>
        </div>
    <?php } else { ?>
        <!-- DATOS PERSONA NATURAL END-->
        <!-- DATOS PERSONA JURIDICA -->
        <div class="cell">
            <h3>Datos de la Empresa solicitante</h3>
        </div>
        <div class="cell grid-x grid-margin-x large-up-2">
            <div class="cell">
                <label for="">Razon Social</label>
                <input type="text" value="<?php echo @$this->data['razonsocial']; ?>" disabled>
            </div>
            <div class="cell">
                <label for="">RUC</label>
                <input type="text" value="<?php echo @$this->data['ruc']; ?>" disabled>
            </div>
            <div class="cell">
                <label for="">Telefono</label>
                <input type="text" value="<?php echo @$this->data['telefono']; ?>" disabled>
            </div>
            <div class="cell">
                <label for="">Email</label>
                <input type="text" value="<?php echo @$this->data['email']; ?>" disabled>
            </div>
            <div class="cell">
                <label for="">Direccion</label>
                <input type="text" value="<?php echo @$this->data['direccion']; ?>" disabled>
            </div>
            <div class="cell">
                <label for="">Rubro</label>
                <input type="text" value="<?php echo @$this->data['rubro']; ?>" disabled>
            </div>
        </div>
    <?php } ?>
    <!-- DATOS PERSONA JURIDICA END-->
</div>
<script src="<?php echo constant('URL') ?>public/js/listadoProyecto.js"></script>
<?php require ('views/footer.php'); ?>