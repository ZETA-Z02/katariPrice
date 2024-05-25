<?php require ('views/header.php'); ?>

<div class="grid-container full margin-1">
    <div class="cell">
        <h2>Detalles de Cotizacion</h2>
    </div>
    <!-- DATOS GENERALES COTIZACION -->
    <div class="cell grid-x grid-margin-x large-up-2">
        <div class="cell">
            <label for="">Servicio</label>
            <input type="text" value="<?php echo @$this->data['tiposervicio']; ?>">
        </div>
        <div class="cell">
            <label for="">Precio Real</label>
            <input type="text" value="<?php echo @$this->data['precio']; ?>">
        </div>
        <div class="cell">
            <label for="">Cantidad</label>
            <input type="text" value="<?php echo @$this->data['cantidad']; ?>">
        </div>
        <div class="cell">
            <label for="">Dias</label>
            <input type="text" value="<?php echo @$this->data['dias']; ?>">
        </div>
        <div class="cell">
            <label for="">estado</label>
            <input type="text" value="<?php echo @$this->data['estado']; ?>">
        </div>
        <div class="cell">
            <label for="">Fecha Creacion</label>
            <input type="text" value="<?php echo @$this->data['feCreate']; ?>">
        </div>
        <div class="cell">
            <label for="">Caducidad</label>
            <input type="text" value="<?php echo @$this->data['feLimite']; ?>">
        </div>
        <div class="cell">
            <label for="">Tipo de costo</label>
            <input type="text" value="<?php echo @$this->data['tipo_costo']; ?>">
        </div>
        <div class="cell">
            <label for="">Costo aproximado</label>
            <input type="text" value="<?php echo @$this->data['costo']; ?>">
        </div>
        <div class="cell">
            <label for="">Personal Creador</label>
            <input type="text" value="<?php echo @$this->data['personal']; ?>">
        </div>
        <div class="cell">
            <label for="">Descripcion</label>
            <textarea name="" id=""><?php echo @$this->data['descripcion']; ?></textarea>
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

<?php require ('views/footer.php'); ?>
<!-- <?php
// if(@$this->data['nombres']){
//     echo "es natural";
//     }else{
//         echo "es juridica".$this->data['razonsocial'];
//         }; ?> -->