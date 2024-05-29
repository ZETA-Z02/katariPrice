<?php require ('views/header.php'); ?>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pagos.css">
<div class="grid-container full margin-1">
    <div class="grid-x">
        <div class="cell">
            <h2>Pagos del Proyecto: <?php echo $this->data['nomproyecto'];?></h2>
        </div>
        <div class="cell grid-x grid-margin-x">
            <div class="cell large-9">
                <p class="lead callout">Nombre del Proyecto: <?php echo $this->data['nomproyecto'] ?></p>
            </div>
            <div class="cell large-3 lead callout">
                <input type="text" id="idproyecto" value="<?php echo $this->data['idproyecto'] ?>" disabled>
                <input type="text" id="idpago" value="<?php echo $this->data['idpago'] ?>" hidden style="display:none;">
            </div>
            <div class="cell large-9">
                <p class="lead callout">Del Cliente: <?php echo $this->data['nombres'] ?></p>
            </div>
            <div class="cell large-3">
                <p class="lead callout">Telefono: <?php echo $this->data['telefono'] ?></p>
            </div>
        </div>
        <div class="cell grid-x align-spaced">
            <p class="lead callout shadow">Total: s/.<?php echo $this->data['total'] ?></p>
            <button class="button warning" id="registrar-pago">Registrar Pago</button>
        </div>
    </div>
    <!-- TABLA DE REGISTROS DE PAGOS->PAGOS-DETALLES --------------------------------------- -->
    <div class="grid-x margin-horizontal-3">
        <div class="cell text-center">
            <hr>
            <h4>Detalles de los Pagos</h4>
        </div>
        <div class="cell grid-x">
            <table>
                <thead>
                    <tr>
                        <th>Num</th>
                        <th>Concepto</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody id="tabla-pago">
                    <tr>
                        <td>1</td>
                        <td>Pago de Servicio</td>
                        <td>23-05-2024</td>
                        <td class="text-right">s/.300</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="cell grid-x align-justify">
            <div class="">
                <p class="lead callout shadow">Estado: <?php echo $this->data['estado'] ?></p>
            </div>
            <div class="grid-x">
                <div class="cell grid-x align-justify callout">
                    Total de Pagos: <p id="total-pagos">000.00</p>
                </div>
                <div class="cell grid-x align-justify callout">
                    Deuda: <p id="deuda">000.00</p>
                </div>
                <div class="cell grid-x align-justify callout">
                    Total: <p id="total">000.00</p>
                </div>
            </div>
        </div>
    </div>
    <!-- TABLA DE REGISTROS DE PAGOS->PAGOS-DETALLES END------------------------------------ -->

    <!-- REGISTRAR NUEVO PAGO MODAL ******************************************************** -->
    <div class="grid-x callout grid-margin-x modal" id="pago-modal">
        <div class="cell">
            <h3 class="text-center">Registrar Nuevo Pago</h3>
        </div>
        <div class="cell grid-x align-center text-center">
            <span class="cell">
                <label for="">Concepto</label>
                <input type="text" id="concepto">
            </span>
            <span class="cell">
                <label for="">Monto</label>
                <input type="text" id="monto">
            </span>
        </div>
        <div class="cell grid-x align-spaced">
            <button class="button success" id="guardar-pago">GUARDAR</button>
            <button class="button secondary">IMPRIMIR BOLETA</button>
            <button class="button alert" id="cancelar-pago">CANCELAR</button>
        </div>
    </div>
    <!-- REGISTRAR NUEVO PAGO MODAL END *****************************************************-->
</div>
<script src="<?php echo constant('URL'); ?>public/js/pagos.js"></script>
<?php require ('views/footer.php'); ?>