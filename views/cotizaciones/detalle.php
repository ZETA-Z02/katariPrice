<?php require ('views/header.php'); ?>
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell grid-x large-up-2 align-justify">
            <h1>Detalle de la Cotizacion -> 1</h1>
            <button class="button alert">Editar</button>
        </div>
        <div class="cell">
            <div class="grid-x large-up-4 grid-margin-x">
                <div class="cell">
                    Cotizador:
                    <input type="text" value="jesus" disabled>
                </div>
                <div class="cell">
                    Servicio:
                    <input type="text" value="Estadistica">
                </div>
                <div class="cell">
                    fecha
                    <input type="text">
                </div>
                <div class="cell">
                    Total:
                    <input type="text">
                </div>
                <div class="cell">
                    Estado:
                    <input type="text">
                </div>
                <div class="cell">
                    Descripcion:
                    <input type="text">
                </div>
                <div class="cell">
                    Cantidad:
                    <input type="text">
                </div>
                <div class="cell">
                    Precio
                    <input type="text">
                </div>
                <div class="cell">
                    subtotal
                    <input type="text">
                </div>
            </div>
        </div>
    </div>
    <div class="grid-x">
        <h3>Datos del Cotizador</h3>
        <div class="cell pNatural">
            <div class="grid-x">
                <h5>Persona Natural: </h5>
            </div>
            <div class="grid-x large-up-4 grid-margin-x">
                <div class="cell">
                    Nombre:
                    <input type="text" value="jesus" disabled>
                </div>
                <div class="cell">
                    Apellido:
                    <input type="text" value="Estadistica">
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
                    Telefono:
                    <input type="text">
                </div>
                <div class="cell">
                    Ciudad:
                    <input type="text">
                </div>
                <div class="cell">
                    Email:
                    <input type="text">
                </div>
                <div class="cell">
                    Direccion
                    <input type="text">
                </div>
            </div>
        </div>
        <div class="cell pJuridica">
            <div class="grid-x">
                <h5>Persona Jutidica: </h5>
            </div>
            <div class="grid-x large-up-4 grid-margin-x">
                <div class="cell">
                    Razon Social:
                    <input type="text" value="SAC" disabled>
                </div>
                <div class="cell">
                    RUC:
                    <input type="text" value="Estadistica">
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
            </div>
        </div>
    </div>
</div>
<?php require ('views/footer.php'); ?>