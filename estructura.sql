CREATE DATABASE  IF NOT EXISTS `siplan2019`;
use siplan2019;
-- ====================================================================================================================================
-- Dependencias
-- ====================================================================================================================================

DROP TABLE IF EXISTS `sectores`;
CREATE TABLE `sectores` (
  `id_sector` tinyint(4) NOT NULL AUTO_INCREMENT,
  `sector` varchar(45) NOT NULL,
  PRIMARY KEY (`id_sector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Sectores de las dependencias';

DROP TABLE IF EXISTS `dependencias`;
CREATE TABLE `dependencias` (
  `id_dependencia` smallint(6) NOT NULL COMMENT 'Identificador de la Dependencia',
  `id_sector` tinyint(4) NOT NULL COMMENT 'Identificador del Sector al que pertenece la dependencia, relacionado con la tabla sectores',
  `nombre` varchar(128) NOT NULL COMMENT 'Nombre de la dependencia',
  `acronimo` varchar(16) NOT NULL COMMENT 'Acronimo de la dependencia',
  `nom_titular` varchar(200) NOT NULL,
  `cargo_titular` varchar(200) NOT NULL,
  `tipo` varchar(3) NOT NULL,
  PRIMARY KEY (`id_dependencia`),
  KEY `id_sector` (`id_sector`),
  KEY `acronimo` (`acronimo`),
  CONSTRAINT `dependencia_sector` FOREIGN KEY (`id_sector`) REFERENCES `sectores` (`id_sector`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='nombre de las dependencias';

-- ====================================================================================================================================
-- Usuarios
-- ====================================================================================================================================

DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE `perfiles` (
  `id_perfil` tinyint(4) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` smallint(6) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT '1',
  `id_perfil` tinyint(4) NOT NULL,
  `id_dependencia` smallint(6) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `area` varchar(128) DEFAULT NULL,
  `cargo` varchar(128) DEFAULT NULL,
  `correo` varchar(256) DEFAULT NULL,
  `tel_oficina` varchar(128) DEFAULT NULL,
  `extension` varchar(45) DEFAULT NULL,
  `tel_cel` varchar(45) DEFAULT NULL,
  `extraordinario` char(1) DEFAULT '0',
  `trim_habilitado` int(2) DEFAULT NULL,
  `permisos` char(1) DEFAULT '0',
  `f_captura_prog01` varchar(10) DEFAULT NULL,
  `i_captura_prog01` varchar(10) DEFAULT NULL,
  `siglas_usu` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  KEY `id_perfil` (`id_perfil`),
  KEY `id_dependencia` (`id_dependencia`),
  CONSTRAINT `usuario_dependencia` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id_dependencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- ====================================================================================================================================
-- Historial
-- ====================================================================================================================================


DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id_evento` smallint(6) NOT NULL AUTO_INCREMENT,
  `evento` varchar(32) NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `historial`;
CREATE TABLE `historial` (
  `id_usuario` smallint(6) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `evento` smallint(6) NOT NULL,
  `ipaddress` varchar(15) NOT NULL,
  KEY `historial_usuario_idx` (`id_usuario`),
  KEY `historial_evento_idx` (`evento`),
  CONSTRAINT `historial_evento` FOREIGN KEY (`evento`) REFERENCES `eventos` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `historial_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- ====================================================================================================================================
-- Programas Presupuestarios ------------------
-- ====================================================================================================================================

CREATE TABLE `proyectos` (
  `id_proyecto` int(11) NOT NULL AUTO_INCREMENT,
  `id_dependencia` varchar(3) NOT NULL,
  `id_eje` varchar(2) NOT NULL,
  `id_linea` smallint(6) NOT NULL,
  `id_estrategia` smallint(6) NOT NULL,
  `estatus` char(1) NOT NULL DEFAULT '0',
  `grado` tinyint(4) NOT NULL,
  `no_proyecto` smallint(6) NOT NULL,
  `nombre` text NOT NULL,
  `clasificacion` tinyint(4) DEFAULT NULL,
  `inversion` double DEFAULT NULL,
  `ponderacion` float DEFAULT NULL,
  `unidad_medida` varchar(128) DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `prog_sem` float DEFAULT NULL,
  `g_vulnerable` tinyint(4) DEFAULT NULL,
  `beneficiarios_h` int(11) DEFAULT NULL,
  `beneficiarios_m` int(11) DEFAULT NULL,
  `justificacion` text,
  `finalidad` smallint(6) DEFAULT NULL,
  `funcion` mediumint(9) DEFAULT NULL,
  `subfuncion` mediumint(9) DEFAULT NULL,
  `proposito` text,
  `observaciones` text,
  `anual_pr` varchar(4) DEFAULT '2018',
  `uresponsable` varchar(128) DEFAULT NULL,
  `titular` varchar(256) DEFAULT NULL,
  `objetivo` text,
  `pnd_eje` char(1) DEFAULT NULL,
  `pnd_objetivo` char(2) DEFAULT NULL,
  `pnd_estrategia` char(3) DEFAULT NULL,
  `pnd_linea_accion` char(3) DEFAULT NULL,
  `prog_pres` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_proyecto`),
  KEY `id_dependencia` (`id_dependencia`),
  KEY `id_eje` (`id_eje`),
  KEY `id_linea` (`id_linea`),
  KEY `id_estrategia` (`id_estrategia`),
  KEY `no_proyecto` (`no_proyecto`),
  KEY `finalidad` (`finalidad`),
  KEY `funcion` (`funcion`),
  KEY `subfuncion` (`subfuncion`),
  KEY `pnd_eje` (`pnd_eje`),
  KEY `pnd_objetivo` (`pnd_objetivo`),
  KEY `pnd_estrategia` (`pnd_estrategia`),
  KEY `pnd_linea_accion` (`pnd_linea_accion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Programas Presupuestarios';






-- Fin Programas Presupuestarios ------------------
-- ====================================================================================================================================






-- ====================================================================================================================================
-- Indicadores ------------------
-- ====================================================================================================================================
CREATE TABLE `siplan2019`.`indicadores_fin` (
  `id_indicador` INT NOT NULL AUTO_INCREMENT,
  `id_pp` INT NOT NULL,
  `nombre` VARCHAR(256) NOT NULL,
  `objetivo` TEXT NOT NULL,
  `metodo` TEXT NOT NULL,
  `tipo` TINYINT NOT NULL,
  `dimension` TINYINT NOT NULL,
  `frecuencia` TINYINT NOT NULL,
  `sentido` TINYINT NOT NULL,
  `u_medida` VARCHAR(256) NOT NULL,
  `meta` VARCHAR(16) NOT NULL,
  `medio_verificacion` TEXT NOT NULL,
  `supuesto` TEXT NOT NULL,
  PRIMARY KEY (`id_indicador`))ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `indicadores_proposito` (
  `id_indicador` INT NOT NULL AUTO_INCREMENT,
  `id_pp` INT NOT NULL,
  `nombre` VARCHAR(256) NOT NULL,
  `objetivo` TEXT NOT NULL,
  `metodo` TEXT NOT NULL,
  `tipo` TINYINT NOT NULL,
  `dimension` TINYINT NOT NULL,
  `frecuencia` TINYINT NOT NULL,
  `sentido` TINYINT NOT NULL,
  `u_medida` VARCHAR(256) NOT NULL,
  `meta` VARCHAR(16) NOT NULL,
  `medio_verificacion` TEXT NOT NULL,
  `supuesto` TEXT NOT NULL,
  PRIMARY KEY (`id_indicador`))ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `indicadores_componente` (
  `id_indicador` INT NOT NULL AUTO_INCREMENT,
  `id_componente` INT NOT NULL,
  `nombre` VARCHAR(256) NOT NULL,
  `objetivo` TEXT NOT NULL,
  `metodo` TEXT NOT NULL,
  `tipo` TINYINT NOT NULL,
  `dimension` TINYINT NOT NULL,
  `frecuencia` TINYINT NOT NULL,
  `sentido` TINYINT NOT NULL,
  `u_medida` VARCHAR(256) NOT NULL,
  `meta` VARCHAR(16) NOT NULL,
  `medio_verificacion` TEXT NOT NULL,
  `supuesto` TEXT NOT NULL,
  PRIMARY KEY (`id_indicador`))ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `indicadores_actividad` (
  `id_indicador` INT NOT NULL AUTO_INCREMENT,
  `id_actividad` INT NOT NULL,
  `nombre` VARCHAR(256) NOT NULL,
  `objetivo` TEXT NOT NULL,
  `metodo` TEXT NOT NULL,
  `tipo` TINYINT NOT NULL,
  `dimension` TINYINT NOT NULL,
  `frecuencia` TINYINT NOT NULL,
  `sentido` TINYINT NOT NULL,
  `u_medida` VARCHAR(256) NOT NULL,
  `meta` VARCHAR(16) NOT NULL,
  `medio_verificacion` TEXT NOT NULL,
  `supuesto` TEXT NOT NULL,
  PRIMARY KEY (`id_indicador`))ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tipo_indicador` (
  `id_tipo_indicador` TINYINT NOT NULL AUTO_INCREMENT,
  `tipo_indicador` VARCHAR(16),
PRIMARY KEY (`id_tipo_indicador`)
);

CREATE TABLE `dimension_indicador` (
  `id_dimension` TINYINT NOT NULL AUTO_INCREMENT,
  `dimension` VARCHAR(16),
PRIMARY KEY (`id_dimension`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `frecuencia_indicador` (
  `id_frecuencia` TINYINT NOT NULL AUTO_INCREMENT,
  `frecuencia` VARCHAR(16),
PRIMARY KEY (`id_frecuencia`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `sentido_indicador` (
  `id_sentido` TINYINT NOT NULL AUTO_INCREMENT,
  `sentido` VARCHAR(16),
PRIMARY KEY (`id_sentido`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `siplan2019`.`indicadores_fin` 
ADD INDEX `fin_tipo_idx` (`tipo` ASC),
ADD INDEX `fin_dimension_idx` (`dimension` ASC),
ADD INDEX `fin_frecuencia_idx` (`frecuencia` ASC),
ADD INDEX `fin_sentido_idx` (`sentido` ASC);
ALTER TABLE `siplan2019`.`indicadores_fin` 
ADD CONSTRAINT `fin_tipo`
  FOREIGN KEY (`tipo`)
  REFERENCES `siplan2019`.`tipo_indicador` (`id_tipo_indicador`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fin_dimension`
  FOREIGN KEY (`dimension`)
  REFERENCES `siplan2019`.`dimension_indicador` (`id_dimension`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fin_frecuencia`
  FOREIGN KEY (`frecuencia`)
  REFERENCES `siplan2019`.`frecuencia_indicador` (`id_frecuencia`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fin_sentido`
  FOREIGN KEY (`sentido`)
  REFERENCES `siplan2019`.`sentido_indicador` (`id_sentido`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
  
  
  
  CREATE  TABLE IF NOT EXISTS `siplan2019`.`proyectos_ppi` (
  `id_proyecto_ppi` INT NOT NULL AUTO_INCREMENT ,
  `id_proyecto` INT(11) NOT NULL ,
  `nom_proyecto_ppi` TEXT NOT NULL ,
  PRIMARY KEY (`id_proyecto_ppi`) ,
  INDEX `fk_proyectos_ppi_proyectos1` (`id_proyecto` ASC) ,
  CONSTRAINT `fk_proyectos_ppi_proyectos1`
    FOREIGN KEY (`id_proyecto` )
    REFERENCES `siplan2019`.`proyectos` (`id_proyecto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8 AUTO_INCREMENT=31
COLLATE = utf8_general_ci



CREATE  TABLE IF NOT EXISTS `siplan2019`.`proyectos_ppp` (
  `id_proyecto_ppp` INT NOT NULL AUTO_INCREMENT ,
  `id_proyecto` INT(11) NOT NULL ,
  `nom_proyecto_ppp` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_proyecto_ppp`) ,
  INDEX `fk_proyectos_ppp_proyectos1` (`id_proyecto` ASC) ,
  CONSTRAINT `fk_proyectos_ppp_proyectos1`
    FOREIGN KEY (`id_proyecto` )
    REFERENCES `siplan2019`.`proyectos` (`id_proyecto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci


CREATE  TABLE IF NOT EXISTS `siplan2019`.`unidad_responsable` (
  `id_unidad_responsable` INT NOT NULL AUTO_INCREMENT ,
  `id_dependencia` SMALLINT(6) NOT NULL ,
  `num_dir_unidad_responsable` SMALLINT(2) ZEROFILL NOT NULL ,
  `nom_unidad_responsable` TINYTEXT NOT NULL ,
  PRIMARY KEY (`id_unidad_responsable`) ,
  INDEX `fk_unidad_responsable_dependencias1` (`id_dependencia` ASC) ,
  CONSTRAINT `fk_unidad_responsable_dependencias1`
    FOREIGN KEY (`id_dependencia` )
    REFERENCES `siplan2019`.`dependencias` (`id_dependencia` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB


CREATE  TABLE IF NOT EXISTS `siplan2019`.`trasversales` (
  `id_trasversal` INT NOT NULL AUTO_INCREMENT ,
  `nom_trasversal` TINYTEXT NOT NULL ,
  PRIMARY KEY (`id_trasversal`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci




CREATE TABLE IF NOT EXISTS `siplan2019`.`componentes` (
  `id_componente` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_proyecto` bigint(20) NOT NULL,
  `descripcion` text NOT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `unidad_medida` int(11) DEFAULT NULL,
  `cantidad` bigint(20) DEFAULT NULL,
  `ponderacion` float DEFAULT NULL,
  `unidad_responsable` text,
  `no_componente` int(11) DEFAULT NULL,
  `ped_eje` varchar(45) DEFAULT NULL,
  `ped_linea` varchar(45) DEFAULT NULL,
  `ped_estrategia` varchar(45) DEFAULT NULL,
  `estatus` char(1) DEFAULT '1',
  `prog_pres` int(11) DEFAULT NULL,
  `cve_trasversal` SMALLINT( 3 ) ZEROFILL NOT NULL DEFAULT 0,
  
  PRIMARY KEY (`id_componente`),
  KEY `id_proyecto` (`id_proyecto`),
  KEY `id_tipo` (`id_tipo`),
  KEY `unidad_medida` (`unidad_medida`),
  KEY `no_componente` (`no_componente`),
  KEY `ped_eje` (`ped_eje`),
  KEY `ped_linea` (`ped_linea`),
  KEY `ped_estrategia` (`ped_estrategia`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
COLLATE = utf8_general_ci




