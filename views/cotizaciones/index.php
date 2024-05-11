<?php require ('views/header.php'); ?>
<div class="grid-container fluid">
    <div class="grid-x">
        <div class="cell text-center">
            <h1>Cotizaciones en Curso</h1>
        </div>
        <div class="cell search">
            <input type="text" placeholder="Buscar...">
        </div>
    </div>
    <div class="grid-x">
        <div class="cell">
            <h3>Tabla de Cotizaciones</h3>
        </div>
        <div class="cell">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre o Razon Social</th>
                        <th>DNI o RUC</th>
                        <th>Servicio</th>
                        <th>F.Creacion</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Caducidad</th>
                        <th>Detalle</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Jesus Andre</td>
                        <td>74831232</td>
                        <td>Estadistica</td>
                        <td>06/05/24</td>
                        <td>s/.1000</td>
                        <td>
                            <select name="estado" id="" value="Espera">
                                <option value="">Espera</option>
                                <option value="">Aceptado</option>
                                <option value="">Proyecto</option>
                                <option value="">Cancelado</option>
                            </select>
                        </td>
                        <td>21/05/24</td>
                        <td><a href="<?php echo constant('URL')?>cotizaciones/detalle">icon Edit</a></td>
                        <td>icon delete</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Carlos Efra</td>
                        <td>72432123</td>
                        <td>Redes</td>
                        <td>07/05/24</td>
                        <td>s/.2000</td>
                        <td>Aceptado</td>
                        <td>22/05/24</td>
                        <td>icon edit</td>
                        <td>icon delete</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>empresa 'Nombre'</td>
                        <td>342554323</td>
                        <td>Software</td>
                        <td>01/05/24</td>
                        <td>s/.3000</td>
                        <td>Cancelado</td>
                        <td>16/05/24</td>
                        <td>icon edit</td>
                        <td>icon delete</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Alfreso Saul</td>
                        <td>634532345</td>
                        <td>Estadistica</td>
                        <td>03/05/24</td>
                        <td>s/.1500</td>
                        <td>Proyecto</td>
                        <td>19/05/24</td>
                        <td>icon edit</td>
                        <td>icon delete</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php require ('views/footer.php'); ?>