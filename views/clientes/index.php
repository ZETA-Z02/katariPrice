<?php require ('views/header.php'); ?>

<div class="grid-container">
    <button style="background-color: red; border-radius:20px;" class="button" id="natural-boton">Mostrar Persona
        Natural</button>
    <button class="button" id="juridica-boton">Mostrar Persona Jurídica</button>


    <!-- Inicio de la tabla de persona natural    -->

    <div id="natural-modal">
        <h2>Personas Naturales</h2>
        <input type="text" id="natural-search" placeholder="Buscar por nombre, DNI, etc.">
        <button class="button" id="natural-search-btn">Buscar</button>
        <table id="tabla-natural">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nombre</th>
                    <th>dni</th>
                    <th>ciudad</th>
                    <th>select</th>

                </tr>
            </thead>
            <tbody id="tasks">
                <!-- Los datos de personas naturales se insertarán aquí -->
            </tbody>
        </table>
    </div>
    <!-- Fin de la tabla de persona natural    -->

    <!-- Inicio de la tabla de persona juridica    -->
    <div id="juridica-modal">
        <h2>Personas Jurídicas</h2>
        <input type="text" id="juridica-search" placeholder="Buscar por razón social, RUC, etc.">
        <button class="button" id="juridica-search-btn">Buscar</button>
        <table id="tabla-juridica">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Razon social</th>
                    <th>RUC</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>RUBRO</th>
                    <th>WEB</th>


                </tr>
            </thead>
            <tbody id="task-juridica">
                <!-- Los datos de personas jurídicas se insertarán aquí -->
            </tbody>
        </table>
    </div>
    <!-- Fin de la tabla de persona juridica    -->



    <!-- Inicio del formulario de persona natural para el momento de editar   -->
    <div class="contenido-clientes" id="formulario-edicion">
        <h3>EDITAR A UN CLIENTE</h3>
        <form id="task-form">
            <input type="hidden" id="taskId">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-6 cell">
                        <label>Nombre
                            <input type="text" id="nombre">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>Apellidos
                            <input type="text" id="apellidos">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>DNI
                            <input type="text" id="dni">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>Sexo
                            <input type="text" id="sexo">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>Ciudad
                            <input type="text" id="ciudad">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>Teléfono
                            <input type="text" id="telefono">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>Email
                            <input type="text" id="email">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>Dirección
                            <input type="text" id="direccion">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>Fecha de Creación
                            <input type="text" id="feCreate">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>Fecha de Actualización
                            <input type="text" id="feUpdate">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <button class="button success" type="submit" id="guardar-boton">Guardar</button>
                        <button class="alert button" type="button" id="cerrar-boton">Cerrar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Fin del formulario de persona natural para el momento de editar   -->




    <script src="<?php echo constant('URL'); ?>public/js/clientes.js"></script>

</div>

<?php require ('views/footer.php'); ?>