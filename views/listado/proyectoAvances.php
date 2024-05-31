<?php require ('views/header.php'); ?>
<link rel="stylesheet" href="<?php echo constant('URL') . 'public/css/proyectoAvances.css' ?>">
<div class="grid-container full margin-1">
    <div class="grid-x grid-margin-x">
        <div class="cell">
            <h2>Registros de Avances</h2>
            <input type="text" id="idproyecto" value="<?php echo $this->data['idproyecto']; ?>" style="display:none">
        </div>
        <div class="cell large-2 callout">
            <p class="lead">Nº <?php echo $this->data['idproyecto']; ?></p>
        </div>
        <div class="cell large-10 callout">
            <p class="lead">Proyecto: <?php echo $this->data['nomproyecto']; ?></p>
        </div>
        <div class="cell grid-x align-spaced">
            <div class="callout shadow">
                <p class="lead">Total: <?php echo $this->data['totalactividades']; ?></p>
            </div>
            <div class="callout shadow">
                <p class="lead">Avance: <?php echo number_format($this->data2['porcentaje'], 2);
?>%</p>
            </div>
            <div class="callout shadow">
                <p class="lead">Fecha de entrega: <?php echo $this->data['feEntrega']; ?></p>
            </div>
        </div>
    </div>
    <hr>
    <div class="grid-x margin-horizontal-3">
        <div class="cell text-center">
            <h4>Participantes y Entregables</h4>
        </div>
        <div class="cell">
            <table>
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Personal</th>
                        <th>Total Reportes</th>
                        <th>Informe</th>
                    </tr>
                </thead>
                <tbody id="tabla-participantes">
                    <tr>
                        <td>1</td>
                        <td>Elmer</td>
                        <td>5</td>
                        <th>Subir</th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="cell grid-x align-spaced">
            <div class="" id="">
                <div class="grid-x">
                    <div class="cell">
                        <h4>Nuevo Participante en el proyecto</h4>
                    </div>
                    <div class="cell">
                        <select name="personal" id="personal">
                            <option value="2"></option>
                        </select>
                    </div>
                    <div class="cell">
                        <button class="button" id="agregar">Agregar</button>
                    </div>
                </div>
            </div>
            <!-- <p class="lead" style="display:flex;">TOTAL DE REPORTES: <input type="text" id="total-reportes"></p> -->
        </div>
    </div>
    <div class="grid-x callout shadow modal-informe" id="modal-informe">
        <div class="cell">
            <h3>Subir Informe</h3>
        </div>
        <div class="cell">
            <label for="">
                Asunto:
                <input type="text" id="asunto">
            </label>
            <label for="">
                Iniciales:
                <input type="text" id="iniciales">
            </label>
            <label for="">
                Descripcion:
                <textarea name="" id="descripcion"></textarea>
            </label>
        </div>
        <div class="cell text-center">
            <button class="button success" id="subir-informe">SUBIR</button>
        </div>
    </div>
</div>
<script src="<?php echo constant('URL'); ?>public/js/listadoAvances.js"></script>
<?php require ('views/footer.php'); ?>