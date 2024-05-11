# BASE DE DATOS DOCUMENTACION - KATARI PRICE
## Entidades

### Login
- idlogin **(PK): INT AUTO INCREMENT UNIQUE**
- usuario: **VARCHAR(50)**
- password: **VARCHAR(300)**
- status: **tiny int**

### Pnaturales  
- idnat **(PK): INT AUTO INCREMENT UNIQUE**
- nombres **VARCHAR(50)**
- apellidos **VARCHAR(50)**
- sexo **VARCHAR(50)**
- ciudad **VARCHAR(50)**
- telefono **VARCHAR(50)**
- email **VARCHAR(50)**
- dni **INT**
- ruc **VARCHAR(50)**
- fecCreacion **DATE**
- fecUpdate **DATE**
-------------------------------
- profesion **VARCHAR(50)**
- grado **VARCHAR(50)**
- fecNacimiento **DATE**
- direccion **VARCHAR(50)**
--------------------------------

### Pnaturales_detalle  
- idNatdet **(PK): INT AUTO INCREMENT UNIQUE**
- idnat **(FK): INT**
- profesion **VARCHAR(50)**
- grado **VARCHAR(50)**
- fecNacimiento **DATE**
- direccion **VARCHAR(50)**

### Pjuridicas
- idjur **(PK): INT AUTO INCREMENT UNIQUE**
- razon_social **VARCHAR(100)**
- direccion **VARCHAR(100)**
- telefono **VARCHAR(50)**
- email **VARCHAR(50)**
- pagWeb **VARCHAR(50)**
- ruc **VARCHAR(50)**
- rubro **VARCHAR(50)**
-----------------------
- actividad_economica **VARCHAR(100)**
- idrepre **(FK): INT**
------------------------------

### Pjuridicas_detalle
- idJurdet **(PK): INT AUTO INCREMENT UNIQUE**
- idjur **(FK): INT**
- actividad_economica **VARCHAR(100)**
- idrepre **(FK): INT**

### pjuridicas_representante
- idrepre **(PK): INT AUTO INCREMENT UNIQUE**
- idjur **(FK): INT**
- nombres **VARCHAR(50)**
- apellidos **VARCHAR(50)**
- sexo **VARCHAR(50)**
- ciudad **VARCHAR(50)**
- telefono **VARCHAR(50)**
- email **VARCHAR(50)**
- dni **INT**

** Verlo como cotizacion estadistica, cotizacion redes, todo por separado**

### Serv_estadistica
- idestadistica **(PK): INT AUTO INCREMENT UNIQUE** 
- dificultad -> Pregado, posgrado, maestria, doctorado
- tiempo -> dias para concluir el trabajo
- alcance -> tesis, innovacion, empresarial
- Complejidad del análisis ->1,2,3,4,5
### Serv_software
- idsoftware **(PK): INT AUTO INCREMENT UNIQUE** 
- funcionalidades
- paginas
- nivel de dise;o
- tiempo estimado
- dificultad -> 1,2,3,4,5
- nivel de seguridad
- tipo de software => web, web local, desktop, movil, 
- mantenimiento 

### Serv_redes
- idredes **(PK): INT AUTO INCREMENT UNIQUE** 
- puntos_red
- dias_estimados
- materiales_disponibles
- configuracion_servidor
- servicios_adicionales
- compatibilidad_estandares
- capacitacion_documentacion
- soporte_post_implementacion
- tipo_cable

### Cotizaciones
- idcotizacion **(PK): INT AUTO INCREMENT UNIQUE**
- idcliente **(FK): INT (referencia a Pnaturales.idnat o Pjuridicas.idjur)**
- fecha_cotizacion **DATETIME**
- tipo_servicio **VARCHAR(50) (referencia al tipo de servicio: Estadístico, Software, Redes)**
- estado **VARCHAR(50) (por ejemplo: Pendiente, Aprobada, Rechazada)**
- total **DECIMAL(10,2) (total de la cotización)**
### Cotizaciones_detalle
- idcotdet **(PK): INT AUTO INCREMENT UNIQUE**
- idcotizacion **(FK): INT**
- titulo **disponilbe a cambios**
- descripcion **VARCHAR(255)**
- cantidad **INT**
- precio_unitario **DECIMAL(10,2)**
- subtotal **DECIMAL(10,2)**

### Proyectos
- idproyecto **(PK): INT AUTO INCREMENT UNIQUE**
- idcotizacion **(FK): INT**
- titulo **disponible a cambios**
- tipo_servicio **VARCHAR(50) (referencia al tipo de servicio: Estadístico, Software, Redes)**
- total_pago **DECIMAL(10,2)**
- fecha entrega **DATE**
- fecCreate **DATE**
- fecUpdate **DATETIME** 
### Proyectos_detalle
- idproyeDetalle **(PK): INT AUTO INCREMENT UNIQUE**
- idproyecto **(FK): INT**
- titulo **disponible a cambios**
- descripcion **VARCHAR(50)**
- adelanto **DECIMAL**
- pago_faltante **DECIMAL**
- fecEntrega **DATE**
- estado **VARCHAR(50) (estado del proyecto, por ejemplo: Pendiente, En progreso, Completado)**

### ProyFinalizados
- idproyFinalizado **(PK): INT AUTO INCREMENT UNIQUE**
- idproyecto **(FK): INT**
- fecha_finalizacion **DATE**
- estado **VARCHAR(50) (por ejemplo: Finalizado, Cancelado, etc.)**
- observaciones **VARCHAR(255) (opcional)**
--------------------------------
- titulo **sujeto a cambios**
- descripcion **VARCHAR(255)**
- total_pago **DECIMAL(10,2)**
---------------------------

### ProyFinalizados_detalle
- idproyFinalizado_detalle **(PK): INT AUTO INCREMENT UNIQUE**
- idproyFinalizado **(FK): INT**
- titulo **sujeto a cambios**
- descripcion **VARCHAR(255)**
- total_pago **DECIMAL(10,2)**
### Ingresos
- idingreso **(PK): INT AUTO INCREMENT UNIQUE**
- idproye **(FK): INT**
- titulo **sujeto a cambios**
- descripcion **VARCHAR(255)**
- monto **DECIMAL(10,2)**
- fecha **DATE**
### Gastos
- idgasto **(PK): INT AUTO INCREMENT UNIQUE**
- idproye **(FK): INT**
- titulo **sujeto a cambios**
- descripcion **VARCHAR(255)**
- monto **DECIMAL(10,2)**
- fecha **DATE**