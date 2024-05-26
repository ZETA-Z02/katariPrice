CREATE DATABASE katari;
USE katari;
CREATE TABLE `pernatural` (
  `idnatural` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `apellidos` VARCHAR(50) NOT NULL,
  `dni` INT NOT NULL,
  `sexo` VARCHAR(15) NOT NULL,
  `ciudad` VARCHAR(50) NOT NULL,
  `telefono` VARCHAR(15) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `direccion` VARCHAR(100) NULL,
  `feCreate` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `feUpdate` DATE DEFAULT NULL,
  PRIMARY KEY (`idnatural`)
  );
CREATE TABLE `perjuridica` (
  `idjuridica` INT NOT NULL AUTO_INCREMENT,
  `razonsocial` VARCHAR(200) NOT NULL,
  `telefono` VARCHAR(15) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `web` VARCHAR(100) NULL,
  `ruc` INT NOT NULL,
  `rubro` VARCHAR(50) NOT NULL,
  `direccion` VARCHAR(100) NULL,
  `feCreate` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `feUpdate` DATE DEFAULT NULL,
  PRIMARY KEY (`idjuridica`)
  );
CREATE TABLE `personal` (
  `idpersonal` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `dni` INT NOT NULL,
  `sexo` VARCHAR(15) NOT NULL,
  `telefono` VARCHAR(15) NOT NULL,
  `fechaNac` DATE NULL,
  `email` VARCHAR(100) NOT NULL,
  `foto` VARCHAR(200) NULL,
  `feCreate` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `feUpdate` DATE DEFAULT NULL,
  PRIMARY KEY (`idpersonal`)
  );
CREATE TABLE `lenguajes` (
  `idlenguaje` INT NOT NULL AUTO_INCREMENT,
  `lenguaje` VARCHAR(50) NOT NULL,
  `precio` DOUBLE NOT NULL,
  PRIMARY KEY (`idlenguaje`)
  );
CREATE TABLE `dificultad` (
  `iddificultad` INT NOT NULL AUTO_INCREMENT,
  `factor` DOUBLE NOT NULL,
  PRIMARY KEY (`iddificultad`)
  );
CREATE TABLE `tipo_aplicacion` (
  `idaplicacion` INT NOT NULL AUTO_INCREMENT,
  `aplicacion` VARCHAR(100) NOT NULL,
  `precio` DOUBLE NOT NULL,
  `descripcion` TEXT NOT NULL,
  PRIMARY KEY (`idaplicacion`)
  );
CREATE TABLE `tipo_servicio` (
  `idservicio` INT NOT NULL AUTO_INCREMENT,
  `tiposervicio` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idservicio`)
  );
CREATE TABLE `costos` (
  `idcosto` INT NOT NULL AUTO_INCREMENT,
  `idservicio` INT NOT NULL,
  `descripcion` TEXT NOT NULL,
  `precio` DOUBLE NOT NULL,
  PRIMARY KEY (`idcosto`),
  FOREIGN KEY (idservicio) REFERENCES tipo_servicio(idservicio)
  );
CREATE TABLE `calc_software` (
  `idcalcsoftware` INT NOT NULL AUTO_INCREMENT,
  `nomproyecto` VARCHAR(22) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `iddificultad` INT NOT NULL,
  `idlenguaje` INT NULL,
  `idaplicacion` INT NOT NULL,
  `costoservicio` DOUBLE NOT NULL,
  `duracionsemanas` INT NULL,
  `costomantenimiento` DOUBLE NULL,
  `tipomantenimiento` VARCHAR(100) NULL,
  `opciones` VARCHAR(50),
  `subtotal` DOUBLE NOT NULL,
  `igv` DOUBLE NOT NULL,
  `total` DOUBLE NOT NULL,
  `feCreate` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `idpersonal` INT NOT NULL,
  PRIMARY KEY (`idcalcsoftware`),
  FOREIGN KEY (iddificultad) REFERENCES dificultad(iddificultad),
  FOREIGN KEY (idlenguaje) REFERENCES lenguajes(idlenguaje),
  FOREIGN KEY (idaplicacion) REFERENCES tipo_aplicacion(idaplicacion),
  FOREIGN KEY (idpersonal) REFERENCES personal(idpersonal)
  );
CREATE TABLE `cotizaciones` (
  `idcotizacion` INT NOT NULL AUTO_INCREMENT,
  `idnatural` INT NULL,
  `idjuridica` INT NULL,
  `idservicio` INT NOT NULL,
  `idcosto` INT NOT NULL,
  `idpersonal` INT NOT NULL,
  `dias` INT NOT NULL,
  `precio` DOUBLE NOT NULL,
  `cantidad` INT NOT NULL,
  `descripcion` TEXT NOT NULL,
  `estado` VARCHAR(15) NOT NULL,
  `feCreate` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `feLimite` DATE NOT NULL,
  `redesDetalles` VARCHAR(200) NULL,
  `idcalcsoftware` INT NULL,
  PRIMARY KEY (`idcotizacion`),
  FOREIGN KEY (idnatural) REFERENCES pernatural(idnatural),
  FOREIGN KEY (idjuridica) REFERENCES perjuridica(idjuridica),
  FOREIGN KEY (idservicio) REFERENCES tipo_servicio(idservicio),
  FOREIGN KEY (idcosto) REFERENCES costos(idcosto),
  FOREIGN KEY (idpersonal) REFERENCES personal(idpersonal),
  FOREIGN KEY (idcalcsoftware) REFERENCES calc_software(idcalcsoftware)
  );
CREATE TABLE `proyectos` (
  `idproyecto` INT NOT NULL AUTO_INCREMENT,
  `nomproyecto` VARCHAR(100) NOT NULL,
  `idnatural` INT NULL,
  `idjuridica` INT NULL,
  `estado` VARCHAR(15),
  `idservicio` INT NOT NULL,
  `totalactividades` INT NOT NULL,
  `descripcion` TEXT NOT NULL,
  `pendientepago` DOUBLE NOT NULL,
  `total` DOUBLE NOT NULL,
  `feEntrega` DATE NOT NULL,
  `feCreate` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `feUpdate` DATE NOT NULL,
  `idpersonal` INT NOT NULL,
  PRIMARY KEY (`idproyecto`),
  FOREIGN KEY (idnatural) REFERENCES pernatural(idnatural),
  FOREIGN KEY (idjuridica) REFERENCES perjuridica(idjuridica),
  FOREIGN KEY (idservicio) REFERENCES tipo_servicio(idservicio),
  FOREIGN KEY (idpersonal) REFERENCES personal(idpersonal)
  );
CREATE TABLE `proyectoinformes` (
  `idproyinforme` INT NOT NULL AUTO_INCREMENT,
  `idproyecto` INT NOT NULL,
  `idpersonal` INT NOT NULL,
  `asunto` VARCHAR(100) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `fecha` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `iniciales` VARCHAR(10) NULL,
  PRIMARY KEY (`idproyinforme`),
  FOREIGN KEY (idproyecto) REFERENCES proyectos(idproyecto),
  FOREIGN KEY (idpersonal) REFERENCES personal(idpersonal)
  );
CREATE TABLE `proyectoavances` (
  `idavance` INT NOT NULL AUTO_INCREMENT,
  `idproyecto` INT NOT NULL,
  `idpersonal` INT NOT NULL,
  `reportes` INT NOT NULL,
  `fecha` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `porcentaje` DOUBLE NOT NULL,
  PRIMARY KEY (`idavance`),
  FOREIGN KEY (idproyecto) REFERENCES proyectos(idproyecto),
  FOREIGN KEY (idpersonal) REFERENCES personal(idpersonal)
  );  
CREATE TABLE `pagos` (
  `idpago` INT NOT NULL AUTO_INCREMENT,
  `idproyecto` INT NOT NULL,
  `nomproyecto` VARCHAR(100) NOT NULL,
  `idnatural` INT NULL,
  `idjuridica` INT NULL,
  `monto` DOUBLE NOT NULL,
  `fecha` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `saldo` DOUBLE NOT NULL,
  `igv` DOUBLE NOT NULL,
  `total` DOUBLE NOT NULL,
  PRIMARY KEY (`idpago`),
  FOREIGN KEY (idproyecto) REFERENCES proyectos(idproyecto),
  FOREIGN KEY (idnatural) REFERENCES pernatural(idnatural),
  FOREIGN KEY (idjuridica) REFERENCES perjuridica(idjuridica)
  );  
CREATE TABLE `pago_detalles` (
  `idpagodetalle` INT NOT NULL AUTO_INCREMENT,
  `idpago` INT NOT NULL,
  `monto` DOUBLE NOT NULL,
  `concepto` VARCHAR(10) NOT NULL,
  `fecha` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpagodetalle`),
  FOREIGN KEY (idpago) REFERENCES pagos(idpago)
  );  
CREATE TABLE `gastos` (
  `idgasto` INT NOT NULL AUTO_INCREMENT,
  `idproyecto` INT NOT NULL,
  `descripcion` TEXT NOT NULL,
  `cantidad` INT NOT NULL,
  `monto` DOUBLE NOT NULL,
  `fecha` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idgasto`),
  FOREIGN KEY (idproyecto) REFERENCES proyectos(idproyecto)
  );  
CREATE TABLE `login` (
  `idlogin` INT NOT NULL AUTO_INCREMENT,
  `idpersonal` INT NOT NULL,
  `usuario` VARCHAR(50),
  `password` VARCHAR(300),
  `estado` VARCHAR(15),
  PRIMARY KEY (`idlogin`),
  FOREIGN KEY (idpersonal) REFERENCES personal(idpersonal)
  );