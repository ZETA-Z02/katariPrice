<?php require ('views/header.php'); ?>

<div class="grid-container margin-top-2">
    <h1 class="text-center">Cotizaciones</h1>
    <div class="grid-x grid-margin-x">
        <div class="cell text-center grid-x align-spaced">
            <button class="button">
                Estadistica
            </button>
            <button class="button">
                Software
            </button>
            <button class="button">
                Redes
            </button>
        </div>
        <!-- Formulario Estadistica -->
        <div class="cell">
            <h3>Formulario Estadistica</h3>
            <div class="grid-x grid-margin-x large-up-3">
                <div class="cell">
                    tipo de Servicio
                    <input type="text" value="Estadistica" disabled>
                </div>
                <div class="cell">
                    Dificultad
                    <select name="dificultad" id="dificultad">
                        <option value="pregrado">Pregrado</option>
                        <option value="posgrado">Posgrado</option>
                        <option value="maestria">Maestria</option>
                        <option value="doctorado">Doctorado</option>
                    </select>
                </div>
                <div class="cell">
                    Total
                    <input type="text">
                </div>
            </div>
        </div>
        <!-- Formulario Estadistica END-->
        <!-- Formulario Software-->
        <div class="cell">
            <h3>Formulario Software</h3>
            <div class="grid-x grid-margin-x large-up-3">
                <div class="cell">
                    tipo de Servicio
                    <input type="text" value="Software" disabled>
                </div>
                <div class="cell">
                    Dificultad
                    <select name="dificultad" id="dificultad">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="cell">
                    Total
                    <input type="text">
                </div>
            </div>
        </div>
        <!-- Formulario Software END-->
        <!-- Formulario Redes-->
        <div class="cell">
            <h3>Formulario Redes</h3>
            <div class="grid-x grid-margin-x large-up-3">
                <div class="cell">
                    tipo de Servicio
                    <input type="text" value="Software" disabled>
                </div>
                <div class="cell">
                    Dificultad
                    <select name="dificultad" id="dificultad">
                        <option value="1">10 a 20 puntos</option>
                        <option value="2">20 a 30 puntos</option>
                        <option value="3">30 a 40 puntos</option>
                        <option value="4">40 a 50 puntos</option>
                        <option value="5">50 a 60 puntos</option>
                    </select>
                </div>
                <div class="cell">
                    Total
                    <input type="text">
                </div>
            </div>
        </div>
        <!-- Formulario Redes END-->
        <button class="button">Guardar</button>
    </div>
</div>
<div class="grid-container margin-top-2">
    <h2>Datos del Solicitante</h2>
    <div class="grid-x">
        <select name="persona" id="">
            <option value="">Persona Natural</option>
            <option value="">Personal Juridica</option>
        </select>
    </div>
    <!-- DEPENDIENDO DE LA ELECCION SE MOSTRARA UN FORMULARIO -->
    <div class="cell">
        <h3>Persona Natural</h3>
    </div>
    <div class="grid-x grid-margin-x large-up-4 p-natural">
        <div class="cell">
            Nombre:
            <input type="text">
        </div>
        <div class="cell">
            Apellidos:
            <input type="text">
        </div>
        <div class="cell">
            Telefono:
            <input type="text">
        </div>
        <div class="cell">
            Email:
            <input type="text">
        </div>
        <div class="cell">
            DNI:
            <input type="text">
        </div>
        <div class="cell">
            Sexo:
            <input type="text">
        </div>
        <div class="cell">
            Ciudad:
            <input type="text">
        </div>
        <div class="cell">
            Direccion:
            <input type="text">
        </div>
        <button class="button">Guardar</button>
    </div>
    <!-- ---------------------------------------------- -->
    <div class="cell">
        <h3>Persona Juridica</h3>
    </div>
    <div class="grid-x grid-margin-x large-up-4 p-juridica">
        <div class="cell">
            Razon Social:
            <input type="text">
        </div>
        <div class="cell">
            RUC:
            <input type="text">
        </div>
        <div class="cell">
            Telefono:
            <input type="text">
        </div>
        <div class="cell">
            Email:
            <input type="text">
        </div>
        <div class="cell">
            Direccion:
            <input type="text">
        </div>
        <div class="cell">
            Web:
            <input type="text">
        </div>
        <div class="cell">
            Rubro:
            <input type="text">
        </div>
        <div class="cell">
            Actividad:
            <input type="text">
        </div>
        <div class="cell">
            Representante?
            <input type="checkbox">Si
            <input type="checkbox">NO
        </div>
        <button class="button">Guardar</button>
    </div>
    <!-- REPRESENTANTE SI SE MARCO EL CHECKBOX -->
    <div class="cell">
        <h3>Representante</h3>
    </div>
    <div class="grid-x grid-margin-x large-up-4 p-juridica">
        <div class="cell">
            Nombre:
            <input type="text">
        </div>
        <div class="cell">
            Apellido:
            <input type="text">
        </div>
        <div class="cell">
            Telefono:
            <input type="text">
        </div>
        <div class="cell">
            Email:
            <input type="text">
        </div>
        <div class="cell">
            DNI:
            <input type="text">
        </div>
        <div class="cell">
            Ciudad:
            <input type="text">
        </div>
        <div class="cell">
            Sexo:
            <input type="text">
        </div>
        <button class="button">Guardar</button>
    </div>
    <!-- REPRESENTANTE END -->
</div>

<?php require ('views/footer.php'); ?>