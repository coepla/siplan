CREATE DATABASE `siplan2019`  DEFAULT CHARACTER SET utf8;
use siplan2019;

-- ====================================================================================================================================
-- Dependencias
-- ====================================================================================================================================

CREATE TABLE `sectores` (
  `id_sector` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `sector` varchar(45) NOT NULL,
  PRIMARY KEY (`id_sector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Catalogo Sectores de las dependencias';

CREATE TABLE `dependencias` (
  `id_dependencia` tinyint(3) unsigned NOT NULL COMMENT 'Identificador de la Dependencia',
  `id_sector` tinyint(4) unsigned NOT NULL COMMENT 'Identificador del Sector al que pertenece la dependencia, relacionado con la tabla sectores',
  `nombre` varchar(128) NOT NULL COMMENT 'Nombre de la dependencia',
  `acronimo` varchar(16) NOT NULL COMMENT 'Acronimo de la dependencia',
  `nom_titular` varchar(200) NOT NULL,
  `cargo_titular` varchar(200) NOT NULL,
  `tipo` varchar(3) NOT NULL,
  PRIMARY KEY (`id_dependencia`),
  KEY `dep_sector_idx` (`id_sector`),
  CONSTRAINT `dep_sector` FOREIGN KEY (`id_sector`) REFERENCES `sectores` (`id_sector`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Catalogo dependencias dependencias';

-- ====================================================================================================================================
-- Usuarios
-- ====================================================================================================================================

CREATE TABLE `perfiles` (
  `id_perfil` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `perfil` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Catalogo perfiles';

CREATE TABLE `usuarios` (
  `id_usuario` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `activo` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `id_perfil` tinyint(3) unsigned NOT NULL,
  `id_dependencia` tinyint(3) unsigned NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `area` varchar(128) DEFAULT NULL,
  `cargo` varchar(128) DEFAULT NULL,
  `correo` varchar(256) DEFAULT NULL,
  `tel_oficina` varchar(128) DEFAULT NULL,
  `extension` varchar(45) DEFAULT NULL,
  `tel_cel` varchar(45) DEFAULT NULL,
  `extraordinario` tinyint(4) DEFAULT '0',
  `trim_habilitado` tinyint(3) unsigned DEFAULT NULL,
  `permisos` tinyint(3) unsigned DEFAULT '0',
  `f_captura_prog01` date DEFAULT NULL,
  `i_captura_prog01` date DEFAULT NULL,
  `siglas_usu` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `usuario_perfil_idx` (`id_perfil`),
  KEY `usuario_dep_idx` (`id_dependencia`),
  CONSTRAINT `usuario_dep` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id_dependencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ====================================================================================================================================
-- Historial
-- ====================================================================================================================================

CREATE TABLE `eventos` (
  `id_evento` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `evento` varchar(32) NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `historial` (
  `id_usuario` smallint(5) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `evento` smallint(5) unsigned NOT NULL,
  `ipaddress` varchar(15) NOT NULL,
  KEY `historial_usuario_idx` (`id_usuario`),
  KEY `historial_evento_idx` (`evento`),
  CONSTRAINT `historial_evento` FOREIGN KEY (`evento`) REFERENCES `eventos` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `historial_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ====================================================================================================================================
-- Programas Presupuestarios ------------------
-- ====================================================================================================================================

CREATE TABLE `eje` (
  `id_eje` tinyint(1) NOT NULL,
  `eje` varchar(45) NOT NULL,
  PRIMARY KEY (`id_eje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `linea` (
  `id_linea` tinyint(2) NOT NULL,
  `id_eje` tinyint(1) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  PRIMARY KEY (`id_linea`),
  KEY `linea_eje_idx` (`id_eje`),
  CONSTRAINT `linea_eje` FOREIGN KEY (`id_eje`) REFERENCES `eje` (`id_eje`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `estrategias` (
  `id_estrategia` smallint(3) NOT NULL,
  `id_linea` tinyint(2) NOT NULL,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id_estrategia`),
  KEY `estrategias_linea_idx` (`id_linea`),
  CONSTRAINT `estrategias_linea` FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id_linea`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `finalidad` (
  `id_finalidad` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_finalidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `funcion` (
  `id_funcion` tinyint(2) NOT NULL AUTO_INCREMENT,
  `id_finalidad` tinyint(1) NOT NULL,
  `id_funf` smallint(6) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(1500) DEFAULT NULL,
  PRIMARY KEY (`id_funcion`),
  KEY `funcion_finalidad_idx` (`id_finalidad`),
  KEY `fun_fun_fin` (`id_funf`),
  CONSTRAINT `funcion_finalidad` FOREIGN KEY (`id_finalidad`) REFERENCES `finalidad` (`id_finalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `subfuncion` (
  `id_subfuncion` smallint(3) NOT NULL AUTO_INCREMENT,
  `id_finalidad` tinyint(1) NOT NULL,
  `id_funcion_f` smallint(6) NOT NULL,
  `id_subf` smallint(6) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  PRIMARY KEY (`id_subfuncion`),
  KEY `subf_fun_f` (`id_funcion_f`),
  KEY `subf_finalidad_idx` (`id_finalidad`),
  CONSTRAINT `subf_finalidad` FOREIGN KEY (`id_finalidad`) REFERENCES `finalidad` (`id_finalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `subf_funcion_f` FOREIGN KEY (`id_funcion_f`) REFERENCES `funcion` (`id_funf`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `pnd_ejes` (
  `id_pnd_eje` tinyint(1) NOT NULL,
  `pnd_eje` varchar(128) NOT NULL,
  PRIMARY KEY (`id_pnd_eje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `pnd_objetivos` (
  `id_pnd_objetivo` tinyint(2) NOT NULL AUTO_INCREMENT,
  `pnd_objetivo` text NOT NULL,
  `id_pnd_eje` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pnd_objetivo`),
  KEY `id_pnd_eje` (`id_pnd_eje`),
  CONSTRAINT `pnd_objetivo_eje` FOREIGN KEY (`id_pnd_eje`) REFERENCES `pnd_ejes` (`id_pnd_eje`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `pnd_estrategias` (
  `id_pnd_estrategia` smallint(3) NOT NULL AUTO_INCREMENT,
  `pnd_estrategia` text NOT NULL,
  `id_pnd_objetivo` tinyint(2) NOT NULL,
  `id_pnd_eje` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pnd_estrategia`),
  KEY `id_pnd_objetivo` (`id_pnd_objetivo`),
  KEY `id_pnd_eje` (`id_pnd_eje`),
  CONSTRAINT `pnd_estrategia_eje` FOREIGN KEY (`id_pnd_eje`) REFERENCES `pnd_ejes` (`id_pnd_eje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pnd_estrategia_objetivo` FOREIGN KEY (`id_pnd_objetivo`) REFERENCES `pnd_objetivos` (`id_pnd_objetivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `pnd_lineas_accion` (
  `id_pnd_linea_accion` smallint(3) NOT NULL AUTO_INCREMENT,
  `linea_accion` text,
  `id_pnd_eje` tinyint(1) DEFAULT NULL,
  `id_pnd_objetivo` tinyint(2) DEFAULT NULL,
  `id_pnd_estrategia` smallint(3) DEFAULT NULL,
  PRIMARY KEY (`id_pnd_linea_accion`),
  KEY `id_pnd_eje` (`id_pnd_eje`),
  KEY `id_pnd_objetivo` (`id_pnd_objetivo`),
  KEY `id_pnd_estrategia` (`id_pnd_estrategia`),
  CONSTRAINT `pnd_linea_eje` FOREIGN KEY (`id_pnd_eje`) REFERENCES `pnd_ejes` (`id_pnd_eje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pnd_linea_estrategias` FOREIGN KEY (`id_pnd_estrategia`) REFERENCES `pnd_estrategias` (`id_pnd_estrategia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pnd_linea_objetivo` FOREIGN KEY (`id_pnd_objetivo`) REFERENCES `pnd_objetivos` (`id_pnd_objetivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `programas_presupuestarios` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `clave` char(1) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clave_UNIQUE` (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `proyectos` (
  `id_proyecto` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_dependencia` tinyint(3) unsigned NOT NULL,
  `id_eje` tinyint(1) NOT NULL,
  `id_linea` tinyint(2) NOT NULL,
  `id_estrategia` smallint(3) NOT NULL,
  `estatus` char(1) NOT NULL DEFAULT '0',
  `grado` tinyint(4) NOT NULL,
  `no_proyecto` smallint(6) NOT NULL,
  `nombre` text NOT NULL,
  `clasificacion` tinyint(1) DEFAULT NULL,
  `inversion` double DEFAULT NULL,
  `ponderacion` float DEFAULT NULL,
  `unidad_medida` varchar(128) DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `prog_sem` float DEFAULT NULL,
  `g_vulnerable` tinyint(2) DEFAULT NULL,
  `beneficiarios_h` int(11) DEFAULT NULL,
  `beneficiarios_m` int(11) DEFAULT NULL,
  `justificacion` text,
  `finalidad` tinyint(1) DEFAULT NULL,
  `funcion` tinyint(2) DEFAULT NULL,
  `subfuncion` smallint(3) DEFAULT NULL,
  `proposito` text,
  `observaciones` text,
  `anual_pr` varchar(4) DEFAULT '2019',
  `uresponsable` smallint(6) DEFAULT NULL,
  `titular` varchar(256) DEFAULT NULL,
  `objetivo` text,
  `pnd_eje` tinyint(1) DEFAULT NULL,
  `pnd_objetivo` tinyint(2) DEFAULT NULL,
  `pnd_estrategia` smallint(3) DEFAULT NULL,
  `pnd_linea_accion` smallint(3) DEFAULT NULL,
  `prog_pres` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id_proyecto`),
  KEY `fk_proyecto_dep_idx` (`id_dependencia`),
  CONSTRAINT `fk_proyecto_dep` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id_dependencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Programas Presupuestarios';



CREATE TABLE `proyectos_ppi` (
  `id_proyecto_ppi` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_proyecto` smallint(6) NOT NULL,
  `nom_proyecto_ppi` text NOT NULL,
  PRIMARY KEY (`id_proyecto_ppi`),
  KEY `fk_proyectos_ppi_proyectos1` (`id_proyecto`),
  CONSTRAINT `fk_proyectos_ppi_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

CREATE TABLE `proyectos_ppp` (
  `id_proyecto_ppp` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_proyecto` smallint(6) NOT NULL,
  `nom_proyecto_ppp` varchar(45) NOT NULL,
  PRIMARY KEY (`id_proyecto_ppp`),
  KEY `fk_proyectos_ppp_proyectos1` (`id_proyecto`),
  CONSTRAINT `fk_proyectos_ppp_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ====================================================================================================================================
-- Componentes y Actividades ------------------
-- ====================================================================================================================================

CREATE TABLE `u_medida_prog01` (
  `id_unidad` smallint(6) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_unidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tipo_unidad_prog01` (
  `id_tipo_unidad` smallint(6) NOT NULL,
  `id_tipo` smallint(6) DEFAULT NULL,
  `id_unidad` smallint(6) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_unidad`),
  KEY `id_tipo` (`id_tipo`),
  KEY `id_unidad` (`id_unidad`),
  CONSTRAINT `tipo_unidad_medida` FOREIGN KEY (`id_unidad`) REFERENCES `u_medida_prog01` (`id_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `unidad_medida_prog02` (
  `id_unidad` smallint(6) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_unidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `u_responsable` (
  `id_u_responsable` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_dependencia` tinyint(3) unsigned NOT NULL,
  `no_u_responsable` tinyint(2) unsigned zerofill NOT NULL,
  `u_responsable` varchar(256) NOT NULL,
  PRIMARY KEY (`id_u_responsable`),
  KEY `u_responsable_dep_idx` (`id_dependencia`),
  CONSTRAINT `u_responsable_dep` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id_dependencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `transversales` (
  `id_trasversal` smallint(3) unsigned zerofill NOT NULL,
  `nom_trasversal` tinytext NOT NULL,
  PRIMARY KEY (`id_trasversal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `componentes` (
  `id_componente` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_proyecto` smallint(6) NOT NULL,
  `descripcion` text NOT NULL,
  `id_tipo` smallint(6) NOT NULL,
  `unidad_medida` smallint(6) NOT NULL,
  `cantidad` bigint(20) DEFAULT NULL,
  `ponderacion` float DEFAULT NULL,
  `unidad_responsable` smallint(6) NOT NULL,
  `no_componente` tinyint(2) unsigned zerofill NOT NULL,
  `ped_eje` tinyint(4) NOT NULL,
  `ped_linea` tinyint(4) NOT NULL,
  `ped_estrategia` smallint(6) NOT NULL,
  `estatus` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `prog_pres` tinyint(4) NOT NULL,
  `cve_trasversal` smallint(3) unsigned zerofill NOT NULL DEFAULT '000',
  PRIMARY KEY (`id_componente`),
  KEY `componente_tipo_idx` (`id_tipo`),
  KEY `componente_unidad_idx` (`unidad_medida`),
  KEY `componente_proyecto_idx` (`id_proyecto`,`prog_pres`),
  KEY `componente_u_responsable_idx` (`unidad_responsable`),
  KEY `componente_ped_eje_idx` (`ped_eje`),
  KEY `componente_ped_linea_idx` (`ped_linea`),
  KEY `componente_prog_pres_idx` (`prog_pres`),
  KEY `componente_cve_transversal_idx` (`cve_trasversal`),
  KEY `componente_estrategia_idx` (`ped_estrategia`),
  CONSTRAINT `componente_estrategia` FOREIGN KEY (`ped_estrategia`) REFERENCES `estrategias` (`id_estrategia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_linea` FOREIGN KEY (`ped_linea`) REFERENCES `linea` (`id_linea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_ped_eje` FOREIGN KEY (`ped_eje`) REFERENCES `eje` (`id_eje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_prog_pres` FOREIGN KEY (`prog_pres`) REFERENCES `programas_presupuestarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_unidad_prog01` (`id_tipo_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_tipo_unidad` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_unidad_prog01` (`id_tipo_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_transversal` FOREIGN KEY (`cve_trasversal`) REFERENCES `transversales` (`id_trasversal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_u_responsable` FOREIGN KEY (`unidad_responsable`) REFERENCES `u_responsable` (`id_u_responsable`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_unidad` FOREIGN KEY (`unidad_medida`) REFERENCES `u_medida_prog01` (`id_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `acciones` (
  `id_accion` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_componente` smallint(6) NOT NULL,
  `id_proyecto` smallint(6) NOT NULL,
  `id_dependencia` tinyint(3) unsigned NOT NULL,
  `descripcion` text NOT NULL,
  `id_tipo` smallint(6) NOT NULL,
  `unidad_medida` smallint(6) NOT NULL,
  `cantidad` bigint(20) DEFAULT NULL,
  `ponderacion` float DEFAULT NULL,
  `demanda` tinyint(1) DEFAULT NULL,
  `no_accion` tinyint(4) unsigned zerofill DEFAULT NULL,
  `ped` tinyint(4) NOT NULL,
  `descripcion_actividad` text NOT NULL,
  `tipo_descripcion` varchar(45) NOT NULL,
  `per_gen` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_accion`),
  KEY `accion_componente_idx` (`id_componente`),
  KEY `accion_proyecto_idx` (`id_proyecto`),
  KEY `accion_dependencia_idx` (`id_dependencia`),
  KEY `accion_u_medida_idx` (`unidad_medida`),
  KEY `accion_tipo_medida_idx` (`id_tipo`),
  CONSTRAINT `accion_componente` FOREIGN KEY (`id_componente`) REFERENCES `componentes` (`id_componente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `accion_dependencia` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id_dependencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `accion_proyecto` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `accion_tipo_medida` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_unidad_prog01` (`id_tipo_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `accion_u_medida` FOREIGN KEY (`unidad_medida`) REFERENCES `u_medida_prog01` (`id_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `resultados` (
  `id_resultado` smallint(5) unsigned NOT NULL,
  `id_accion` smallint(6) NOT NULL,
  `enero_r` varchar(45) DEFAULT '0',
  `febrero_r` varchar(45) DEFAULT '0',
  `marzo_r` varchar(45) DEFAULT '0',
  `abril_r` varchar(45) DEFAULT '0',
  `mayo_r` varchar(45) DEFAULT '0',
  `junio_r` varchar(45) DEFAULT '0',
  `julio_r` varchar(45) DEFAULT '0',
  `agosto_r` varchar(45) DEFAULT '0',
  `septiembre_r` varchar(45) DEFAULT '0',
  `octubre_r` varchar(45) DEFAULT '0',
  `noviembre_r` varchar(45) DEFAULT '0',
  `diciembre_r` varchar(45) DEFAULT '0',
  PRIMARY KEY (`id_resultado`),
  UNIQUE KEY `id_accion_UNIQUE` (`id_accion`),
  CONSTRAINT `resultado_accion` FOREIGN KEY (`id_accion`) REFERENCES `acciones` (`id_accion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ====================================================================================================================================
--  Indicadores ------------------
-- ====================================================================================================================================

CREATE TABLE `tipo_indicador` (
  `id_tipo_indicador` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tipo_indicador` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_indicador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `dimension_indicador` (
  `id_dimension` tinyint(4) NOT NULL AUTO_INCREMENT,
  `dimension` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_dimension`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `frecuencia_indicador` (
  `id_frecuencia` tinyint(4) NOT NULL AUTO_INCREMENT,
  `frecuencia` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_frecuencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `sentido_indicador` (
  `id_sentido` tinyint(4) NOT NULL AUTO_INCREMENT,
  `sentido` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_sentido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `formulas` (
`id_formula` tinyint not null auto_increment,
`formula` varchar(32) not null,
primary key (`id_formula`)
)engine=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `indicadores` (
  `id_indicador` int(11) NOT NULL AUTO_INCREMENT,
  `nivel_indicador` tinyint(1) unsigned not null,
  `id_padre` smallint(6) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `objetivo` text NOT NULL,
  `metodo` tinyint(4) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `dimension` tinyint(4) NOT NULL,
  `frecuencia` tinyint(4) NOT NULL,
  `sentido` tinyint(4) NOT NULL,
  `u_medida` varchar(256) NOT NULL,
  `meta` varchar(16) NOT NULL,
  `medio_verificacion` text NOT NULL,
  `supuesto` text NOT NULL,
  PRIMARY KEY (`id_indicador`),
  KEY `indicador_formula_idx` (`metodo`),
  KEY `indicador_tipo_idx` (`tipo`),
  KEY `indicador_dimension_idx` (`dimension`),
  KEY `indicador_frecuencia_idx` (`frecuencia`),
  KEY `indicador_sentido_idx` (`sentido`),
  CONSTRAINT `indicador_dimension` FOREIGN KEY (`dimension`) REFERENCES `dimension_indicador` (`id_dimension`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `indicador_formula` FOREIGN KEY (`metodo`) REFERENCES `formulas` (`id_formula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `indicador_frecuencia` FOREIGN KEY (`frecuencia`) REFERENCES `frecuencia_indicador` (`id_frecuencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `indicador_sentido` FOREIGN KEY (`sentido`) REFERENCES `sentido_indicador` (`id_sentido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `indicador_tipo` FOREIGN KEY (`tipo`) REFERENCES `tipo_indicador` (`id_tipo_indicador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `variables_indicadores` (
  `id_indicador` int(11) NOT NULL,
  `var1` varchar(256) NOT NULL,
  `var2` varchar(256) DEFAULT NULL,
  `var3` varchar(256) DEFAULT NULL,
  `var4` varchar(256) DEFAULT NULL,
  `var5` varchar(256) DEFAULT NULL,
  `var6` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_indicador`),
  CONSTRAINT `var_indicador` FOREIGN KEY (`id_indicador`) REFERENCES `indicadores` (`id_indicador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `periodos_evaluacion`(
`id_periodo_evaluacion` tinyint not null auto_increment,
`periodo` varchar (12),
PRIMARY KEY (`id_periodo_evaluacion`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `resultados_indicadores` (
  `id_resultado_indicador` int(11) NOT NULL AUTO_INCREMENT,
  `id_indicador` int(11) NOT NULL,
  `periodo_evaluacion` tinyint(4) NOT NULL,
  `resultado_var1` varchar(8) NOT NULL,
  `resultado_var2` varchar(8) DEFAULT NULL,
  `resultado_var3` varchar(8) DEFAULT NULL,
  `resultado_var4` varchar(8) DEFAULT NULL,
  `resultado_var5` varchar(8) DEFAULT NULL,
  `resultado_var6` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id_resultado_indicador`),
  KEY `result_indiocador_idx` (`id_indicador`),
  CONSTRAINT `result_indiocador` FOREIGN KEY (`id_indicador`) REFERENCES `indicadores` (`id_indicador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
