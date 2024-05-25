<?php require ('views/header.php'); ?>

<div class="grid-container full margin-1">
    <div class="cell">
        <h2>Detalles del Proyecto</h2>
    </div>
    <!-- DATOS GENERALES COTIZACION -->
    <div class="cell grid-x grid-margin-x large-up-2">
        <div class="cell">
            <label for="">Nombre Proyecto</label>
            <input type="text" value="<?php echo @$this->data['nomproyecto']; ?>">
        </div>
        <div class="cell">
            <label for="">Servicio</label>
            <input type="text" value="<?php echo @$this->data['tiposervicio']; ?>">
        </div>
        <div class="cell">
            <label for="">Estado</label>
            <input type="text" value="<?php echo @$this->data['estado']; ?>">
        </div>
        <div class="cell">
            <label for="">Pendiente Pago</label>
            <input type="text" value="<?php echo @$this->data['pendientepago']; ?>">
        </div>
        <div class="cell">
            <label for="">Total</label>
            <input type="text" value="<?php echo @$this->data['total']; ?>">
        </div>
        <div class="cell">
            <label for="">Total Actividades</label>
            <input type="text" value="<?php echo @$this->data['totalactividades']; ?>">
        </div>
        <div class="cell">
            <label for="">Fecha Entrega</label>
            <input type="text" value="<?php echo @$this->data['feEntrega']; ?>">
        </div>
        <div class="cell">
            <label for="">Creacion del Proyecto</label>
            <input type="text" value="<?php echo @$this->data['feCreate']; ?>">
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

    <?php if ($this->data['nombres']) { ?><?php
class LoginModel extends Model{

    function __construct()
    {
        parent::__construct();
    }
    public function validar($usuario,$password){
        $sql = "SELECT l.*,p.* FROM login l
        join personal p
        on l.idpersonal=p.idpersonal
        WHERE usuario = '$usuario' AND password = '$password';";
        $res = $this->conn->ConsultaArray($sql);
        return $res;
    }
    
    
}



?>
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