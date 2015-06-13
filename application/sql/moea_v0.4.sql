/*
Navicat MySQL Data Transfer

Source Server         : MYSQL-FEI
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : moea

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-06-11 19:18:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for area
-- ----------------------------
DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `idArea` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAreaFormacion` varchar(45) NOT NULL,
  PRIMARY KEY (`idArea`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ciudad
-- ----------------------------
DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(45) DEFAULT NULL,
  KEY `fk_ciudad_Lugar1_idx` (`idCiudad`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for convocatoria
-- ----------------------------
DROP TABLE IF EXISTS `convocatoria`;
CREATE TABLE `convocatoria` (
  `idPrograma` int(11) NOT NULL AUTO_INCREMENT,
  `nombreConv` varchar(45) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `descripcion` text,
  `Grado_idGrado` int(11) NOT NULL,
  `Universidad_idUniversidad1` int(11) NOT NULL,
  `Area_idArea` int(11) NOT NULL,
  `promedioSolicitado` int(11) DEFAULT NULL,
  `Lugar_idLugar` int(11) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idPrograma`),
  KEY `fk_Programa_Grado1_idx` (`Grado_idGrado`),
  KEY `fk_Programa_Universidad2_idx` (`Universidad_idUniversidad1`),
  KEY `fk_Programa_Area1_idx` (`Area_idArea`),
  KEY `fk_Programa_Lugar1_idx` (`Lugar_idLugar`),
  CONSTRAINT `fk_Programa_Area1` FOREIGN KEY (`Area_idArea`) REFERENCES `area` (`idArea`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Programa_Grado1` FOREIGN KEY (`Grado_idGrado`) REFERENCES `grado` (`idGrado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Programa_Lugar1` FOREIGN KEY (`Lugar_idLugar`) REFERENCES `lugar` (`idLugar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Programa_Universidad2` FOREIGN KEY (`Universidad_idUniversidad1`) REFERENCES `universidad` (`idUniversidad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for correo
-- ----------------------------
DROP TABLE IF EXISTS `correo`;
CREATE TABLE `correo` (
  `idCorreo` int(11) NOT NULL AUTO_INCREMENT,
  `idPrograma` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  PRIMARY KEY (`idCorreo`,`idPrograma`,`matricula`),
  KEY `fk_interesado_has_convocatoria_convocatoria1_idx` (`idPrograma`),
  KEY `fk_interesado_has_convocatoria_interesado1_idx` (`matricula`),
  CONSTRAINT `fk_interesado_has_convocatoria_convocatoria1` FOREIGN KEY (`idPrograma`) REFERENCES `convocatoria` (`idPrograma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_interesado_has_convocatoria_interesado1` FOREIGN KEY (`matricula`) REFERENCES `interesado` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for cuenta
-- ----------------------------
DROP TABLE IF EXISTS `cuenta`;
CREATE TABLE `cuenta` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) DEFAULT NULL,
  `otraCuenta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for cuestionario
-- ----------------------------
DROP TABLE IF EXISTS `cuestionario`;
CREATE TABLE `cuestionario` (
  `idcuestionario` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta1` varchar(300) NOT NULL,
  `respuesta2` varchar(300) NOT NULL,
  `respuesta3` varchar(300) NOT NULL,
  `idFavoritos` int(11) NOT NULL,
  PRIMARY KEY (`idcuestionario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for datospersonales
-- ----------------------------
DROP TABLE IF EXISTS `datospersonales`;
CREATE TABLE `datospersonales` (
  `iddatosPersonales` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL,
  `apellidoM` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `curp` varchar(45) NOT NULL,
  PRIMARY KEY (`iddatosPersonales`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for facultad
-- ----------------------------
DROP TABLE IF EXISTS `facultad`;
CREATE TABLE `facultad` (
  `idFacultad` int(11) NOT NULL AUTO_INCREMENT,
  `nombreFacultad` varchar(45) NOT NULL,
  `areaAdscripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idFacultad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for favoritos
-- ----------------------------
DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE `favoritos` (
  `idFavoritos` int(11) NOT NULL AUTO_INCREMENT,
  `idPrograma` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  PRIMARY KEY (`idFavoritos`),
  KEY `fk_Programa_has_Interesado_Interesado1_idx` (`matricula`),
  KEY `fk_Programa_has_Interesado_Programa1_idx` (`idPrograma`),
  CONSTRAINT `fk_Programa_has_Interesado_Interesado1` FOREIGN KEY (`matricula`) REFERENCES `interesado` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Programa_has_Interesado_Programa1` FOREIGN KEY (`idPrograma`) REFERENCES `convocatoria` (`idPrograma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for grado
-- ----------------------------
DROP TABLE IF EXISTS `grado`;
CREATE TABLE `grado` (
  `idGrado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idGrado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for idioma
-- ----------------------------
DROP TABLE IF EXISTS `idioma`;
CREATE TABLE `idioma` (
  `idIdioma` int(11) NOT NULL AUTO_INCREMENT,
  `idioma1` varchar(45) NOT NULL,
  `idioma2` varchar(45) DEFAULT NULL,
  `idioma3` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idIdioma`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for interesado
-- ----------------------------
DROP TABLE IF EXISTS `interesado`;
CREATE TABLE `interesado` (
  `matricula` int(11) NOT NULL,
  `areaInteres` varchar(45) NOT NULL,
  `semestre` varchar(45) NOT NULL,
  `solicitaBeca` int(11) NOT NULL,
  `promedio_solicitante` int(11) DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Facultad_idFacultad` int(11) NOT NULL,
  `Idioma_idIdioma` int(11) NOT NULL,
  `otroPerfil_idotroPerfil` int(11) NOT NULL,
  `datosPersonales_iddatosPersonales` int(11) NOT NULL,
  `situacionActual` varchar(45) DEFAULT NULL,
  `nivelDeInteres` varchar(45) DEFAULT NULL,
  `pais_idpais` int(11) NOT NULL,
  PRIMARY KEY (`matricula`,`Usuario_idUsuario`),
  KEY `fk_Interesado_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Interesado_Facultad1_idx` (`Facultad_idFacultad`),
  KEY `fk_Interesado_Idioma1_idx` (`Idioma_idIdioma`),
  KEY `fk_Interesado_otroPerfil1_idx` (`otroPerfil_idotroPerfil`),
  KEY `fk_Interesado_datosPersonales1_idx` (`datosPersonales_iddatosPersonales`),
  KEY `fk_Interesado_paises` (`pais_idpais`),
  CONSTRAINT `fk_Interesado_Facultad1` FOREIGN KEY (`Facultad_idFacultad`) REFERENCES `facultad` (`idFacultad`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Interesado_Idioma1` FOREIGN KEY (`Idioma_idIdioma`) REFERENCES `idioma` (`idIdioma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Interesado_datosPersonales1` FOREIGN KEY (`datosPersonales_iddatosPersonales`) REFERENCES `datospersonales` (`iddatosPersonales`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Interesado_otroPerfil1` FOREIGN KEY (`otroPerfil_idotroPerfil`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Interesado_paises` FOREIGN KEY (`pais_idpais`) REFERENCES `paisesinteresado` (`idpais`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_users_interesado` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lugar
-- ----------------------------
DROP TABLE IF EXISTS `lugar`;
CREATE TABLE `lugar` (
  `idLugar` int(11) NOT NULL AUTO_INCREMENT,
  `idPaisLugar` int(11) NOT NULL,
  `idCiudadLugar` int(11) NOT NULL,
  PRIMARY KEY (`idLugar`,`idCiudadLugar`,`idPaisLugar`),
  KEY `ciudad_pais_fk` (`idCiudadLugar`),
  KEY `pais_conv_fk` (`idPaisLugar`),
  CONSTRAINT `ciudad_pais_fk` FOREIGN KEY (`idCiudadLugar`) REFERENCES `ciudad` (`idCiudad`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pais_conv_fk` FOREIGN KEY (`idPaisLugar`) REFERENCES `paisconvo` (`idPaisConvo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for paisconvo
-- ----------------------------
DROP TABLE IF EXISTS `paisconvo`;
CREATE TABLE `paisconvo` (
  `idPaisConvo` int(11) NOT NULL,
  `pais` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPaisConvo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for paisesinteresado
-- ----------------------------
DROP TABLE IF EXISTS `paisesinteresado`;
CREATE TABLE `paisesinteresado` (
  `idpais` int(11) NOT NULL AUTO_INCREMENT,
  `pais1` varchar(45) DEFAULT NULL,
  `pais2` varchar(45) DEFAULT NULL,
  `pais3` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpais`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for universidad
-- ----------------------------
DROP TABLE IF EXISTS `universidad`;
CREATE TABLE `universidad` (
  `idUniversidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idUniversidad`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
