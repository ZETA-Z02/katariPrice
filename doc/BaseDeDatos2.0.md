# BASE DE DATOS 2.0 COTIZACIONES

## ENTIDADES - TABLAS

### ENTIDAD PERSONA NATURAL

- idpnatural -> identificador unico de la persona natural
- nombre -> nombre de la persona
- apellidos -> apellido de la persona
- sexo -> sexo de la persona, masculino-femenino
- ciudad -> ciudad de la persona
- telefono -> telefono de la persona
- email -> email de la persona
- dni -> dni de la persona
- direccion -> direccion de la persona
- feCreate -> fecha de creacio del registro
- feUpdate -> fecha de la actualiacion del registro

### ENTIDAD PERSONA JURIDICA

- idpjuridica -> identificador unico de la persona juridica
- razonsocial -> nombre de la empresa, razon social
- telefono -> telefono de la empresa
- email -> email de la empresa
- web -> web de la empresa
- ruc -> ruc de la empresa
- rubro -> tipo de empresa a que se dedica
- direccion -> direccion de la empresa
- feCreate -> fecha de creacion del registro
- feUpdate ->  fecha de actualiazcion del registro

### ENTIDAD PERSONAL

- idpersonal -> identificador del personal de la empresa
- nombre -> nombre del personal de la empresa
- apellidos -> apellido del personal de la empresa
- dni -> dni del personal de la empresa
- sexo -> sexo del personal de la empresa
- telefono -> telefono del personal de la empresa
- fechaNac -> fecha de nacimiento del personal de la empresa
- email -> email del personal de la empresa
- direccion -> direccion del personal de la empresa
- foto -> foto del personal de la empresa
- feCreate -> fecha de la creacion del registro
- feUpdate -> fecha de la actualizacion del registro

### ENTIDAD LENGUAJE

- idlenguaje -> identificador unico del lenguaje
- lenguaje -> lenguaje 
- precio -> precio por el lenguaje

### ENTIDAD DIFICULTAD -> esta tabla no se debe eliminar ni un registro

- iddificultad -> identificador unico y a la vez el nivel de dificultad
- factor -> porcentaje a aumentar por nivel de dificultad

### ENTIDAD TIPO APLICACION

- idaplicacion -> identificador tipo de aplicacion
- aplicacion -> titulo de la aplicacion
- precio -> precio de la aplicacion
- descripcion -> descripcion de la aplicacion

### ENTIDAD TIPO SERVICIO

- idtiposervicio -> identificador unico del tipo de servicio
- tiposervicio -> tipo de servicio, estadistica-software-redes

### ENTIDAD COSTOS

- idcosto -> identificador unico del costo 
- idtiposervicio -> identificador foraneo del tipo de servicio 
- descripcion -> descripcion del servicio 
- precio -> costo del servicio

### ENTIDAD CALCULADORA SOFTWARE

- idcoSoftware -> identificador unico del calculo
- nomProyecto -> nombre del proyecto-> del software
- descripcion -> descripcion general del proyecto
- iddificultad -> identificador foraneo->dificultad del proyecto-> 1-2-3-4-5
- idlenguaje -> identificador forane-> lenguaje seleccionado
- idtipoAplicacion -> identificador forane-> costo segun tipo de aplicacion
- costoServicio -> suma de lenguaje, tipo de aplicacion y aumento por porcentaje segun dificultad
- duracionsemanas -> numero de semanas-> sprins a realizar
- costoXmantenimiento -> puede ser en blanco y con valor si desea mantenimiento
- tipoMantenimiento -> puede ser en blanco y registrar el tipo de mantenimiento
- opciones -> con servidor, host, sin servidor -> checkbox
- subtotal -> suma de todo 
- igv -> igv del estado peruano
- total -> subtotal + igv
- feCreacion -> fecha de la creacion del registro

### ENTIDAD COTIZACIONES

- idcotizacion -> identificador unico de la tabla
- idpnatural -> identificador foraneo  de la tabla personaNatural
- idpjuridica -> identificar foraneo de la tabla personaJuridica
- idtiposervicio -> identificador foraneo de la tabla tipoServicio
- idcosto -> aun por decidir 
- idpersonal -> identificador foraneo del creador de la cotizacion
- dias -> dias de duracion aprox. del proyecto
- precio -> precio estimado referencia
- cantidad -> cantidad del servicio (predeterminado 1)
- descripcion -> descripcion en TEXT de la cotizacion
- feCreacion -> fecha de la creacion de la cotizacion
- feLimite -> limite de duracion de la cotizacion
- estado -> INT 1,2,3,4-> espera, aceptado, cancelado, proyecto
- redesDetalles -> excel de redes con todos los detalles
- idcalcSoftware -> id de la tabla calculos software

### ENTIDAD PROYECTOS -> el proyecto en si

- idproyecto -> identificador unico del proyecto
- nomProyecto -> nombre o titulo del proyecto
- idpNatural -> identificador foraneo si es una persona natural sino es 0
- idpJuridica -> identificador foraneo si es una persona juridica sino es 0
- estado -> activo-inactivo-finalizado-pendiente
- idtipoServicio -> identificador foraneo del tipo de servicio 100-200-300
- totalActividades -> total de actividades para el proyecto
- descripcion -> descripcion del proyecto
- pendientepago -> cuanto falta por pagar
- total -> total con igv del pago 
- feEntrega -> fecha de entrega del proyecto
- feCreacion -> fecha de creacion del proyecto
- feUpdate -> fecha de actualizacion del proyecto
- idpersonal -> el que creo el proyecto

### ENTIDAD PROYECTO PERSONAL EMPRESA
-> para crear el pdf informe

- idproyectoPersonal -> identificador unico del proyecto
- idproyecto -> identificador foraneo del proyecto al cual se va hacer el seguimiento
- idpersonal -> identificador foraneo del personal asignado en el proyecto
- asunto -> asunto del documento->pdf
- descripcion -> descripcion del informe pdf
- fecha -> fecha del informe pdf
- iniciales -> iniciales del personal

### ENTIDAD PROYECTO AVANCES

- idavance -> identificador unico del avance
- idproyecto -> identificador foraneo del proyecto
- idpersonal -> identificador foraneo del personal
- reporte -> cantidad de reportes enviados en el dia
- fecha -> fecha actual del envio del formulario 
- porcentaje -> porcentaje avanzado

### ENTIDAD PAGODESCRIPCION -> descripcion del pago del proyecto

- idpago -> identificador unico del pago
- idproyecto -> identificador foraneo del proyecto
- nomProyecto -> nombre del proyecto 
- idnatural -> identificador foraneo si es una persona natural sino es 0
- idjuridica -> identificador foraneo si es una persona juridica sino es 0
- monto(subtotal) -> precio del servicio sin igv
- monto -?> monto que pago hasta ahora
- fecha -> fecha de inicio del proyecto
- saldo -> saldo pendiente, monto que todavia le falta pagar
- igv -> igv, impuestos del estado peruano
- total -> monto total igv + monto

### ENTIDAD PAGO DETALLE 

- idpagoDetalle -> identificador unico del pago detallado
- idpago -> identificador foraneo, a que pago y proyecto hace referencia este pago
- monto -> monto que se pago 
- concepto -> concepto de pago(adelanto, pago , cancelado)
- fechahora -> fecha y hora de este pago

### ENTIDAD GASTOSADICIONALES -> GASTOS IMPREVISTOS O ADICIONALES A UN PROYECTO

- idgasto -> identificador unico del gasto 
- idproyecto -> identificador foraneo del proyecto que se relaciona
- descripcion -> descripcion del gasto
- cantidad -> cantidad del gasto 
- monto -> monto gastado 
- feCreacion -> fecha del gasto o creacion del registor

### ENTIDAD LOGIN

- idlogin -> identificador unico del login
- idpersonal -> identificador foraneo del personal 
- usuario -> nombre de usuairo
- password -> password del usuario
- estado -> status-> activo-inactivo

############################################################################

## FUNCIONALIDADES

### TABLA COTIZACIONES
1. Create
2. Read
    2.1. General-> todo
    2.2. Cotizaciones pendientes
3. Update
4. Delete
5. Generar pdf
    5.1. cotizacion pdf
    5.2. calculos software
6. Generar excel si es de redes
7. Calcular total

### TABLA NATURAL
1. Create
2. Read
3. Update
4. Reactivar
### TABLA JURIDICA
1. Create
2. Read
3. Update
4. Reactivar
### TABLA CALCSOFTWARE
1. Create
2. Read
3. Update
4. Reactivar
### TABLA TIPOSERVICIO
1. Create
2. Read 
3. Update
4. PDF
### TABLA COSTOS
1. Create
2. Read 
3. Update
4. PDF
### TABLA TIPOAPLICACION
1. Create
2. Read 
3. Update
4. Delete
4. PDF
### TABLA LENGUAJE
1. Create
2. Read
3. Update
4. Delete
4. PDF
### TABLA DIFICULTAD 
1. Create
2. Read
3. Update
### TABLA PAGO
1. Create
2. Read
3. Update
### TABLA PAGODETALLE
1. Create
2. Read
3. Update
4. PDF-> todos detalles
### TABLA PERSONAL
1. Create
2. Read 
3. Update
4. Delete
### TABLA PROYECTO
1. Create
2. Read
3. Update
4. PDF
### TABLA PROYECTOINFORMES
1. Create
2. Read
4. PDF
### TABLA PROYECTOAVANCES 
1. Create
2. Read
3. Upd
4. PDF
### TABLA GASTOS
1. Create
2. Read
3. Update
4. Delete

### TABLA LOGIN
1. Create
2. Read
3. Update
4. Delete


























 