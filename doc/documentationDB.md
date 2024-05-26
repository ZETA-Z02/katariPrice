# BASE DE DATOS SQL
## TABLAS SQL
### NOMBRES DE TABLAS

#### perNatural

- idnatural **(PK): INT AUTO INCREMENT UNIQUE**
- nombre **VARCHAR(50)**
- apellidos **VARCHAR(50)**
- dni **INT**
- sexo **VARCHAR(10)**
- ciudad **VARCHAR(50)**
- telefono **VARCHAR(15)**
- email **VARCHAR(100)**
- direccion **VARCHAR(100)**
- feCreacion **DATE CURRENT_TIMESTAMP**
- feUpdate **DATE**

#### perJuridica
- idjuridica **(PK): INT AUTO INCREMENT UNIQUE**
- razonsocial **VARCHAR(200)**
- telefono **VARCHAR(15)**
- email **VARCHAR(100)**
- web **VARCHAR(100)**
- ruc **INT**
- rubro **VARCHAR(200)**
- direccion **VARCHAR(100)**
- feCreacion **DATE CURRENT_TIMESTAMP**
- feUpdate **DATE**
#### personal
- idpersonal **(PK): INT AUTO INCREMENT UNIQUE**
- nombre **VARCHAR(100)**
- apellidos **VARCHAR(100)**
- dni **INT**
- sexo **VARCHAR(15)**
- telefono **VARCHAR(15)**
- fechaNac **DATE**
- email **VARCHAR(100)**
- direccion **VARCHAR(200)**
- foto **VARCHAR(200)**
- feCreate **DATE CURRENT_TIMESTAMP**
- feUpdate **DATE**
#### lenguajes
- idlenguaje **(PK): INT AUTO INCREMENT UNIQUE**
- lenguaje **VARCHAR(50)**
- precio **DOUBLE**
#### nivelDificultad
- iddificultad **(PK): INT AUTO INCREMENT UNIQUE**
- factor **DOUBLE**
#### tipoAplicacion
- idaplicacion **(PK): INT AUTO INCREMENT UNIQUE**
- aplicacion **VARCHAR(100)**
- precio **DOUBLE**
- descripcion **TEXT**
#### tipoServicio
- idtiposervicio **(PK): INT AUTO INCREMENT UNIQUE**
- tiposervicio **VARCHAR(100)**
#### costos
- idcostos **(PK): INT AUTO INCREMENT UNIQUE**
- idtiposervicio **(FK): INT**
- descripcion **TEXT**
- precio **DOUBLE**
#### calcSoftware
- idcalcsoftware **(PK): INT AUTO INCREMENT UNIQUE**
- nomProyecto **VARCHAR(200)**
- descripcion **TEXT**
- iddificultad **(FK): INT**
- idlenguaje **(FK): INT**
- idtipoAplicacion **(FK): INT**
- costoServicio **DOUBLE**
- duracionsemanas **INT**
- costomantenimiento **DOUBLE NULL** 
- tipomantenimiento **VARCHAR(100) NULL**
- opciones **VARCHAR(50)**
- subtotal **DOUBLE NOT NULL**
- igv **DOUBLE NOT NULL**
- total **DOUBLE NOT NULL**
- feCreacion **DATE CURRENT_TIMESTAMP**
- idpersonal **(FK): INT**
#### cotizaciones
- idcotizacion **(PK): INT AUTO INCREMENT UNIQUE**
- idpNatural **(FK): INT**
- idpJuridica **(FK): INT**
- idtiposervicio **(FK): INT**
- idcosto **(FK): INT**
- idpersonal **(FK): INT**
- dias **INT**
- precio **DOUBLE**
- cantidad **INT**
- descripcion **TEXT**
- estado **INT**
- feCreacion **DATE CURRENT_TIMESTAMP**
- feLimite **DATE**
- redesDetalles **VARCHAR(200)**
- idcalcSoftware **(FK): INT**
#### proyectos
- idproyecto **(PK): INT AUTO INCREMENT UNIQUE**
- nomProyecto **VARCHAR(100)**
- idnatural **(FK): INT**
- idjuridica **(FK): INT**
- estado **VARCHAR(15)**
- idtiposervicio **(FK): INT**
- totalactividades **INT**
- descripcion **TEXT**
- pendientepago **DOUBLE**
- total **DOUBLE**
- feEntrega **DATE**
- feCreacion **DATE CURRENT_TIMESTAMP**
- feUpdate **DATE**
- idpersonal **(FK): INT**
#### proyectoinformes
- idproyinforme **(PK): INT AUTO INCREMENT UNIQUE**
- idproyecto **(FK): INT**
- idpersonal **(FK): INT**
- asunto **VARCHAR(100)**
- descripcion **TEXT**
- fecha -> **DATE**
- iniciales **VARCHAR(10)**
#### proyectoavances
- idavance **(PK): INT AUTO INCREMENT UNIQUE**
- idproyecto **(FK): INT**
- idpersonal **(FK): INT**
- reporte **INT**
- fecha **DATE**
- porcentaje **DOUBLE**
#### pagos
- idpago **(PK): INT AUTO INCREMENT UNIQUE**
- idproyecto **(FK): INT**
- nomProyecto **VARCHAR(100)**
- idnatural **(FK): INT**
- idjuridica **(FK): INT**
- monto **DOUBLE**
- fecha **DATE CURRENT_TIMESTAMP**
- saldo **DOUBLE**
- igv **DOUBLE**
- total **DOUBLE**
#### pagoDetalles
- idpagodetalle **(PK): INT AUTO INCREMENT UNIQUE**
- idpago **(FK): INT**
- monto **DOUBLE**
- concepto **VARCHAR(10)**
- fhora **DATE CURRENT_TIMESTAMP**
#### gastos
- idgasto **(PK): INT AUTO INCREMENT UNIQUE**
- idproyecto **(FK): INT**
- descripcion **TEXT***
- cantidad **INT**
- monto **DOUBLE**
- feCreacion **DATE CURRENT_TIMESTAMP**
#### login
- idlogin **(PK): INT AUTO INCREMENT UNIQUE**
- idpersonal **(FK): INT**
- usuario **VARCHAR(50)**
- password **VARCHAR(300)**
- estado **VARCHAR(15)**

## RELACIONES
### persona natural
1. La tabla *persona natural* tiene una relacion de uno a muchos **(1:M)** con la tabla *cotizaciones* por que una persona natural puede tener muchas cotizaciones pero una cotizacion solo puede ser de una persona natural
2. La tabla *persona natural* tiene una relacion de uno a muchos **(1:M)** con la tabla *pagos* por que una persona natural puede tener muchos pagos pero un pago solo puede ser de una persona natural
3. La tabla *persona natural* tiene una relacion de uno a muchos **(1:M)** con la tabla *proyectos* por que una persona natural puede tener muchos proyectos pero un proyecto solo puede ser de una persona natural
### persona juridica 
1. La tabla *persona juridica* tiene una relacion de uno a muchos **(1:M)** con la tabla *cotizaciones* por que una persona juridica puede tener muchas cotizaciones pero una cotizacion solo puede ser de una persona juridica
2. La tabla *persona juridica* tiene una relacion de uno a muchos **(1:M)** con la tabla *pagos* por que una persona juridica puede tener muchos pagos pero un pago solo puede ser de una persona juridica
3. La tabla *persona juridica* tiene una relacion de uno a muchos **(1:M)** con la tabla *proyectos* por que una persona juridica puede tener muchos proyectos pero un proyecto solo puede ser de una persona juridica
### personal
1. La tabla *personal* tiene una relacion de uno a muchos **(1:M)** con la tabla *cotizaciones* por que un personal puede hacer muchas cotizaciones pero una cotizacion solo puede ser creado por un personal
2. La tabla *personal* tiene una relacion de uno a muchos **(1:M)** con la tabla *proyectos* por que un personal puede hacer muchos proyectos pero un proyecto solo puede ser creado por un personal
3. La tabla *personal* tiene una relacion de uno a muchos **(1:M)** con la tabla *proyectoinformes* por que un personal puede hacer muchos proyectoinformes pero un proyectoinforme solo puede ser creado por un personal
4. La tabla *personal* tiene una relacion de uno a muchos **(1:M)** con la tabla *proyectoavances* por que un personal puede hacer muchos proyectosAvances(reportes) pero un proyectosAvance(reporte) solo puede ser creado por un personal
5. La tabla *personal* tiene una relacion de uno a uno **(1:1)** con la tabla *login* por que un personal puede tener un solo login y un login solo puede ser de un personal
### lenguaje
1. La tabla *lenguaje* tiene una relacion de uno a muchos **(1:M)** con la tabla *calculadorasoftware* por que un lenguaje puede ser de muchos calculossoftware, pero cada calculo solo puede tener un solo lenguaje
### dificultad
1. La tabla *dificultad* tiene una relacion de uno a muchos **(1:M)** con la tabla *calculadorasoftware* por que una dificultad puede estar muchos calculossoftware, pero cada calculo solo puede tener una sola dificultad
### tipoaplicacion
1. La tabla *tipoaplicacion* tiene una relacion de uno a muchos **(1:M)** con la tabla *calculadorasoftware* por que un tipo de apliacion puede estar muchos calculossoftware, pero cada calculo solo puede tener un solo tipo de aplicacion
### tiposervicio
1. La tabla *tiposervicio* tiene una relacion de uno a muchos **(1:M)** con la tabla *costos* por que un tiposervicio puede estar en muchos costos, pero un costo solo puede tener un solo tiposervicio
2. La tabla *tiposervicio* tiene una relacion de uno a muchos **(1:M)** con la tabla *cotizaciones* por que un tiposervicio puede estar en muchas cotizaciones, pero una cotizaciones solo puede tener un solo tiposervicio
3. La tabla *tiposervicio* tiene una relacion de uno a muchos **(1:M)** con la tabla *proyectos* por que un tiposervicio puede estar en muchos proyecto, pero un proyecto solo puede tener un solo tiposervicio
### costos
1. La tabla *costos* tiene una relacion de uno a muchos **(1:M)** con la tabla *cotizaciones* por que un costo puede estar muchos cotizaciones, pero una cotizacion solo puede tener un solo costo
### calculadorasoftware
1. La tabla *calculadorasoftware* tiene una relacion de uno a uno **(1:1)** con la tabla *cotizaciones* por que un calculosoftware solo puede tener una cotizacion, pero una cotizacion solo puede tener un solo calculosoftware
### pagodescripcion
1. La tabla *pago* tiene una relacion de uno a muchos **(1:M)** con la tabla *pagodetalle* por que un pago puede tener varios pagodetalles, pero un pagodetalle solo puede pertenecer a un pago.
### proyectos
1. La tabla *proyectos* tiene una relacion de uno a muchos **(1:M)** con la tabla *proyectoinforme* por que un proyecto puede tener muchos proyectosinformes, pero un proyectoinforme solo puede pertenecer a un proyecto.
2. La tabla *proyectos* tiene una relacion de uno a muchos **(1:M)** con la tabla *proyectoavances* por que un proyecto puede tener muchos proyectosavances, pero un proyectoavances solo puede pertenecer a un proyecto.
3. La tabla *proyectos* tiene una relacion de uno a uno **(1:1)** con la tabla *pago* por que un proyecto solo puede tener un pagodescripcion, pero un pagodescripcion solo puede pertenecer a un proyecto.
4. La tabla *proyectos* tiene una relacion de uno a mucho **(1:M)** con la tabla *gastos* por que un proyecto puede tener muchos gastos, pero un gasto solo puede pertenecer a un proyecto
