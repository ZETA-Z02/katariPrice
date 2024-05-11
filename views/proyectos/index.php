<?php require ('views/header.php'); ?>
<div class="grid-container fluid">
    <div class="grid-x">
        <div class="cell text-center">
            <h1>Proyectos en Curso</h1>
        </div>
        <div class="cell search">
            <input type="text" placeholder="Buscar...">
        </div>
    </div>
    <div class="grid-x">
        <div class="cell">
            <h3>Tabla de Proyectos</h3>
        </div>
        <div class="cell">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Nombre o Razon Social</th>
                        <th>DNI o RUC</th>
                        <th>Servicio</th>
                        <th>F.Creacion</th>
                        <th>F.Entrega</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Detalle</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Proyecto Antares</td>
                        <td>Antares</td>
                        <td>342554323</td>
                        <td>Estadistica</td>
                        <td>06/05/24</td>
                        <td>15/07/24</td>
                        <td>s/.5000</td>
                        <td>
                            <select name="estado" id="" value="Entregado">
                                <option value="">Entregado</option>
                                <option value="">Proceso</option>
                                <option value="">Cancelado</option>
                                <option value="">Atrasado</option>
                            </select>
                        </td>
                        <td><a href="<?php echo constant('URL')?>proyectos/detalle">icon Edit</a></td>
                        <td>icon delete</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Proyecto Espinar</td>
                        <td>Espinar</td>
                        <td>72432123</td>
                        <td>Redes</td>
                        <td>07/06/23</td>
                        <td>07/07/23</td>
                        <td>s/.2000</td>
                        <td>Proceso</td>
                        <td>icon edit</td>
                        <td>icon delete</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Proyecto tesis</td>
                        <td>Julio Cesar</td>
                        <td>634532345</td>
                        <td>Estadistica</td>
                        <td>15/05/24</td>
                        <td>15/06/24</td>
                        <td>s/.1500</td>
                        <td>Cancelado</td>
                        <td>icon edit</td>
                        <td>icon delete</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php require ('views/footer.php'); ?>