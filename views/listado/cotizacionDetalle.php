<?php require ('views/header.php'); ?>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/listadoCotizacion.css">
<div class="grid-container full margin-1">
    <div class="cell">
        <h2>Detalles de Cotizacion</h2>
    </div>
    <!-- DATOS GENERALES COTIZACION -->
    <div class="cell grid-x grid-margin-x large-up-2">
        <div class="cell">
            <label for="">Servicio</label>
            <input type="text" value="<?php echo @$this->data['tiposervicio']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Precio Real</label>
            <input type="text" value="<?php echo @$this->data['precio']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Cantidad</label>
            <input type="text" value="<?php echo @$this->data['cantidad']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Dias</label>
            <input type="text" value="<?php echo @$this->data['dias']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">estado</label>
            <input type="text" value="<?php echo @$this->data['estado']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Fecha Creacion</label>
            <input type="text" value="<?php echo @$this->data['feCreate']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Caducidad</label>
            <input type="text" value="<?php echo @$this->data['feLimite']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Tipo de costo</label>
            <input type="text" value="<?php echo @$this->data['tipo_costo']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Costo aproximado</label>
            <input type="text" value="<?php echo @$this->data['costo']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Personal Creador</label>
            <input type="text" value="<?php echo @$this->data['personal']; ?>" disabled>
        </div>
        <div class="cell">
            <label for="">Descripcion</label>
            <textarea name="" id="descripcion" disabled><?php echo @$this->data['descripcion']; ?></textarea>
        </div>
        <div class="cell grid-x grid-margin-x">
        <input type="text" id = "idcotizacion" value="<?php echo @$this->data['idcotizacion']; ?>" hidden style="display: none;">
        <input type="text" id = "idservicio" value="<?php echo @$this->data['idservicio']; ?>" disabled hidden style="display: none;">
            <div class="cell large-12">
                <h6>Cambiar de estado: </h6>
            </div>
            <div class="cell large-6">
                <button class="button alert" id="cancelar">Cotizacion Cancelada</button>
            </div>
            <div class="cell large-6">
                <button class="button" id="aceptar">Cotizacion Aceptada</button>
            </div>
            <?php if($this->data['estado']!=='cancelado' && $this->data2['total']==0){?>
                <div class="cell">
                    <button class="large-12 button success" id="show-modal">Pasar a Proyecto</button>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- DATOS GENERALES COTIZACION END-->
<!-- DATOS DEL SOLICITANTE->DEPENDIENDO DEL TIPO DE SOLICITANTE -->
    <?php if ($this->data['nombres']) { ?>
        <!-- DATOS PERSONA NATURAL -->
        <div class="cell">
            <h3>Datos del Cliente Solicitante</h3>
            <input type="text" id="idnatural" value="<?php echo @$this->data['idnatural']; ?>" disabled hidden style="display: none;">
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
            <input type="text" id="idjuridica" value="<?php echo @$this->data['idjuridica']; ?>" disabled hidden style="display: none;">
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
<!-- DATOS DEL SOLICITANTE->DEPENDIENDO DEL TIPO DE SOLICITANTE END-->
<!-- MODAL PARA PASAR DE COTIZACION A PROYECTO -->
<div class="grid-x grid-margin-x callout modal-proyecto" id="modal-proyecto">
    <form class="grid-x grid-margin-x" action="<?php echo constant('URL');?>listado/postProyecto" method="POST" id="form-proyecto">
    <div class="cell large-12 text-center">
        <h3>Pasar a Proyecto</h3>
    </div>
    <div class="cell">
        <label for="">Nombre Proyecto:</label>
        <input type="text" name="nomProyecto" value="" id="proyecto">
    </div>
    <div class="cell large-6">
        <label for="">Total de Actividades:</label>
        <input type="text" name="totalActividades" value="" id="total-actividades">
    </div>
    <div class="cell large-6">
        <label for="">Fecha de Entrega:</label>
        <input type="date" name="fechaEntrega" value="" id="fecha-entrega">
    </div>
    <div class="cell large-6">
        <label for="">Total:</label>
        <input type="text" name="total" value="" id="total-proyecto">
    </div>
    <div class="cell large-6">
        <label for="">Adelanto:</label>
        <input type="text" name="monto" value="" id="total-proyecto">
    </div>
    <div class="cell">
        <label for="">Descripcion:</label>
        <textarea name="descripcion" id="descripcion-proyecto"></textarea>
    </div>
    <div class="cell grid-x align-spaced">
        <button class="button" id="postProyecto">Pasar</button>
        <label class="button warning" id="cerrar">Cerrar</label>
    </div>
    </form>
</div>
<!-- MODAL PARA PASAR DE COTIZACION A PROYECTO END-->
    <script src="<?php echo constant('URL'); ?>public/js/listadoCotizacion.js"></script>
</div>

<?php require ('views/footer.php'); ?>