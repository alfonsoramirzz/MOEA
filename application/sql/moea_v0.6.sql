/*
Navicat MySQL Data Transfer

Source Server         : MYSQL-FEI
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : moea

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-06-12 11:28:39
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of area
-- ----------------------------
INSERT INTO `area` VALUES ('1', 'Económico-Administrativo ');
INSERT INTO `area` VALUES ('2', 'Humanidades');
INSERT INTO `area` VALUES ('3', 'Artes');
INSERT INTO `area` VALUES ('4', 'Biológico-Agropecuaria ');
INSERT INTO `area` VALUES ('5', 'Ciencias de la Salud');
INSERT INTO `area` VALUES ('6', 'Técnica ');
INSERT INTO `area` VALUES ('7', 'FILOSOFIA');
INSERT INTO `area` VALUES ('8', 'COMERCIO');
INSERT INTO `area` VALUES ('9', 'CANADA');

-- ----------------------------
-- Table structure for ciudad
-- ----------------------------
DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(45) DEFAULT NULL,
  KEY `fk_ciudad_Lugar1_idx` (`idCiudad`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ciudad
-- ----------------------------
INSERT INTO `ciudad` VALUES ('1', 'CD. de México');
INSERT INTO `ciudad` VALUES ('2', 'Los Ángeles');
INSERT INTO `ciudad` VALUES ('3', 'Cambridge');
INSERT INTO `ciudad` VALUES ('4', 'Stanford');
INSERT INTO `ciudad` VALUES ('5', 'Cambridge');
INSERT INTO `ciudad` VALUES ('6', 'Oxford');
INSERT INTO `ciudad` VALUES ('7', 'Amsterdam');
INSERT INTO `ciudad` VALUES ('8', 'Hamburg');
INSERT INTO `ciudad` VALUES ('9', 'Taiwan');
INSERT INTO `ciudad` VALUES ('13', 'VERACRUZ');
INSERT INTO `ciudad` VALUES ('14', 'XALAPA');

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of convocatoria
-- ----------------------------
INSERT INTO `convocatoria` VALUES ('12', 'Convocatoria UNAM 1', '2015-05-07', '2015-06-30', 'Convocatoria de la Universidad autónoma de México', '1', '1', '1', '8', '1', '1');
INSERT INTO `convocatoria` VALUES ('13', 'Convocatoria UCLA 1', '2015-05-19', '2015-07-09', 'Convocatoria de la Universidad de California, Los Ángeles', '3', '2', '1', '9', '2', '1');
INSERT INTO `convocatoria` VALUES ('14', 'Convocatoria MIT 1', '2015-05-22', '2015-07-22', 'Convocatoria del Massachesetts Institute of Technology', '2', '3', '1', '9', '3', '1');
INSERT INTO `convocatoria` VALUES ('15', 'Convocatoria Hardvard 1', '2015-05-14', '2015-06-27', 'Convocatoria Harvard University', '3', '4', '3', '9', '3', '1');
INSERT INTO `convocatoria` VALUES ('16', 'Convocatoria Stanford 1', '2015-06-16', '2015-07-18', 'Convocatoria de la Stanford University', '2', '5', '5', '8', '4', '1');
INSERT INTO `convocatoria` VALUES ('17', 'Convocatoria Cambridge 1', '2015-04-21', '2015-07-23', 'Convocatoria de University of Cambridge', '3', '6', '5', '9', '5', '1');
INSERT INTO `convocatoria` VALUES ('18', 'Convocatoria Oxford 1', '2015-08-27', '2015-10-21', 'Convocatoria de Oxford Unversity', '2', '7', '4', '8', '6', '1');
INSERT INTO `convocatoria` VALUES ('19', 'Convocatoria Amsterdam 1', '2015-07-24', '2015-09-23', 'Convocatoria de University of Amsterdam', '3', '8', '6', '9', '7', '1');
INSERT INTO `convocatoria` VALUES ('20', 'Convocatoria Hamburg 1', '2015-04-20', '2015-07-09', 'Convocatoria de Universität Hamburg', '1', '9', '2', '9', '8', '1');
INSERT INTO `convocatoria` VALUES ('21', 'Convocatoria Taiwan 1', '2015-05-19', '2015-08-27', 'Convocatoria de National Taiwan University', '2', '10', '1', '8', '9', '1');
INSERT INTO `convocatoria` VALUES ('22', 'Convocatoria UNAM 2', '2015-11-26', '2016-01-21', 'Convocatoria de la Universidad autónoma de México', '3', '1', '6', '8', '1', '1');
INSERT INTO `convocatoria` VALUES ('23', 'Convocatoria UCLA 2', '2016-02-12', '2016-04-13', 'Convocatoria de la Universidad de California, Los Ángeles', '2', '2', '3', '9', '2', '1');
INSERT INTO `convocatoria` VALUES ('24', 'Convocatoria MIT 2', '2015-10-14', '2015-12-22', 'Convocatoria del Massachesetts Institute of Technology', '2', '3', '2', '8', '3', '1');
INSERT INTO `convocatoria` VALUES ('25', 'Convocatoria Hardvard 2', '2015-08-19', '2015-09-17', 'Convocatoria Harvard University', '2', '4', '1', '9', '3', '1');
INSERT INTO `convocatoria` VALUES ('26', 'Convocatoria Stanford 2', '2016-04-15', '2016-05-17', 'Convocatoria de la Stanford University', '3', '5', '5', '9', '4', '1');
INSERT INTO `convocatoria` VALUES ('27', 'Convocatoria Cambridge 2', '2015-09-10', '2015-12-25', 'Convocatoria de University of Cambridge', '2', '6', '2', '9', '5', '1');
INSERT INTO `convocatoria` VALUES ('28', 'Convocatoria Oxford 2', '2015-11-21', '2016-01-12', 'Convocatoria de Oxford Unversity', '3', '7', '1', '8', '6', '1');
INSERT INTO `convocatoria` VALUES ('29', 'Convocatoria Amsterdam 2', '2016-08-17', '2016-10-21', 'Convocatoria de University of Amsterdam', '3', '8', '3', '9', '7', '1');
INSERT INTO `convocatoria` VALUES ('30', 'Convocatoria Hamburg 2', '2015-12-16', '2016-03-08', 'Convocatoria de Universität Hamburg', '2', '9', '2', '8', '8', '1');
INSERT INTO `convocatoria` VALUES ('31', 'Convocatoria Taiwan 2', '2016-03-15', '2016-05-19', 'Convocatoria de National Taiwan University', '3', '10', '4', '8', '9', '1');
INSERT INTO `convocatoria` VALUES ('33', 'ALFONSO', '2001-03-15', '2001-03-16', 'ADASD', '1', '1', '1', '9', '1', '1');
INSERT INTO `convocatoria` VALUES ('34', 'ALFONSO SDSF', '2001-03-15', '2001-03-16', 'ASDSD', '1', '1', '1', '9', '1', '1');
INSERT INTO `convocatoria` VALUES ('35', 'TALLER2', '2015-06-19', '2015-09-23', 'TALLER 2', '1', '11', '1', '10', '11', '1');

-- ----------------------------
-- Table structure for correo
-- ----------------------------
DROP TABLE IF EXISTS `correo`;
CREATE TABLE `correo` (
  `idCorreo` int(11) NOT NULL AUTO_INCREMENT,
  `idPrograma` int(11) NOT NULL,
  `matricula` varchar(9) NOT NULL,
  PRIMARY KEY (`idCorreo`,`idPrograma`,`matricula`),
  KEY `fk_interesado_has_convocatoria_convocatoria1_idx` (`idPrograma`),
  KEY `fk_interesado_has_convocatoria_interesado1_idx` (`matricula`),
  CONSTRAINT `fk_correo_has_interesado` FOREIGN KEY (`matricula`) REFERENCES `interesado` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_interesado_has_convocatoria_convocatoria1` FOREIGN KEY (`idPrograma`) REFERENCES `convocatoria` (`idPrograma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of correo
-- ----------------------------

-- ----------------------------
-- Table structure for cuenta
-- ----------------------------
DROP TABLE IF EXISTS `cuenta`;
CREATE TABLE `cuenta` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) DEFAULT NULL,
  `otraCuenta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cuenta
-- ----------------------------
INSERT INTO `cuenta` VALUES ('1', 'correo1@algo.com', 'otro1@algo.com');
INSERT INTO `cuenta` VALUES ('2', 'correo2@algo.com', 'otro2@algo.com');
INSERT INTO `cuenta` VALUES ('3', 'correo3@algo.com', 'otro3@algo.com');
INSERT INTO `cuenta` VALUES ('4', 'Lorenzo.alfonso.9', 'alfonsini9');
INSERT INTO `cuenta` VALUES ('5', 'Lorenzo.alfonso.9', 'alfonsini9');
INSERT INTO `cuenta` VALUES ('6', 'Cesar Lagunes Avendano', 'CLAGUNES');
INSERT INTO `cuenta` VALUES ('7', '', '');

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
-- Records of cuestionario
-- ----------------------------
INSERT INTO `cuestionario` VALUES ('1', 'otro', 'si', 'si', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of datospersonales
-- ----------------------------
INSERT INTO `datospersonales` VALUES ('1', 'Juan', 'Hernández', 'Garcia', '2281123456', 'HEGJ900814HVZ03');
INSERT INTO `datospersonales` VALUES ('2', 'Lucia', 'Rodriguez', 'Pérez', '2281653421', 'ROPL910106MVZ05');
INSERT INTO `datospersonales` VALUES ('3', 'Gabriel', 'Guevara', 'Garcia', '2281451265', 'GUGG880416HVZ04');
INSERT INTO `datospersonales` VALUES ('4', 'ALFONSO', 'RAMIREZ', 'ZARATE', '2288-60-37-94', 'RAZL900905HVZMRR03');
INSERT INTO `datospersonales` VALUES ('5', 'ALFONSO', 'RAMIREZ', 'ZARATE', '2288-60-37-94', 'RAZL900905HVZMRR03');
INSERT INTO `datospersonales` VALUES ('6', 'LORENZO ALFONSO', 'RAMIREZ', 'ZARATE', '2288-60-37-94', 'RAZL900905HVZMRR03');
INSERT INTO `datospersonales` VALUES ('7', 'LORENZO ALFONSO', 'RAMIREZ', 'ZARATE', '2288-60-37-94', 'RAZL900905HVZMRR03');
INSERT INTO `datospersonales` VALUES ('8', 'LORENZO ALFONSO', 'RAMIREZ', 'ZARATE', '2288-60-37-94', 'RAZL900905HVZMRR03');
INSERT INTO `datospersonales` VALUES ('9', 'LORENZO ALFONSO', 'RAMIREZ', 'ZARATE', '2288-60-37-94', 'RAZL900905HVZMRR03');
INSERT INTO `datospersonales` VALUES ('10', 'LORENZO ALFONSO', 'RAMIREZ', 'ZARATE', '2288-60-37-94', 'RAZL900905HVZMRR03');
INSERT INTO `datospersonales` VALUES ('11', 'LORENZO ALFONSO', 'RAMIREZ', 'ZARATE', '2288-60-37-94', 'RAZL900905HVZMRR03');
INSERT INTO `datospersonales` VALUES ('12', 'LORENZO ALFONSO', 'RAMIREZ', 'ZARATE', '2288-60-37-94', 'RAZL900905HVZMRR03');
INSERT INTO `datospersonales` VALUES ('13', 'LORENZO ALFONSO', 'RAMIREZ', 'ZARATE', '2288-60-37-94', 'RAZL900905HVZMRR03');
INSERT INTO `datospersonales` VALUES ('14', 'CESAR', 'LAGUNES', 'AVENDANO', '2281-84-67-08', 'LAAC920812HVZGVS03');
INSERT INTO `datospersonales` VALUES ('15', 'julian', 'GALVAN', 'VIVEROS', '2281-71-50-66', 'GAVJ310592HVZLVL07');

-- ----------------------------
-- Table structure for facultad
-- ----------------------------
DROP TABLE IF EXISTS `facultad`;
CREATE TABLE `facultad` (
  `idFacultad` int(11) NOT NULL AUTO_INCREMENT,
  `nombreFacultad` varchar(45) NOT NULL,
  `areaAdscripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idFacultad`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of facultad
-- ----------------------------
INSERT INTO `facultad` VALUES ('1', 'Nutrición', 'Ciencias de la salud');
INSERT INTO `facultad` VALUES ('2', 'Derecho', 'Humanidades');
INSERT INTO `facultad` VALUES ('3', 'Estadistica e Informática', 'Económico-Administrativo');
INSERT INTO `facultad` VALUES ('4', 'Administracion', 'Ciencias de la Salud');
INSERT INTO `facultad` VALUES ('5', 'Administracion', 'Ciencias de la Salud');
INSERT INTO `facultad` VALUES ('6', 'Administracion', 'Ciencias de la Salud');
INSERT INTO `facultad` VALUES ('7', 'Administracion', 'Ciencias de la Salud');
INSERT INTO `facultad` VALUES ('8', 'Administracion', 'Ciencias de la Salud');
INSERT INTO `facultad` VALUES ('9', 'Administracion', 'Ciencias de la Salud');
INSERT INTO `facultad` VALUES ('10', 'Administracion', 'Ciencias de la Salud');
INSERT INTO `facultad` VALUES ('11', 'Administracion', 'Ciencias de la Salud');
INSERT INTO `facultad` VALUES ('12', 'Administracion', 'Ciencias de la Salud');
INSERT INTO `facultad` VALUES ('13', 'Administracion', 'Ciencias de la Salud');
INSERT INTO `facultad` VALUES ('14', 'Estadística e informática', 'Económico-Administrativo');
INSERT INTO `facultad` VALUES ('15', 'Administracion', 'Ciencias de la Salud');
INSERT INTO `facultad` VALUES ('16', 'Administracion', 'Ciencias de la Salud');

-- ----------------------------
-- Table structure for favoritos
-- ----------------------------
DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE `favoritos` (
  `idFavoritos` int(11) NOT NULL AUTO_INCREMENT,
  `idPrograma` int(11) NOT NULL,
  `matricula` varchar(9) NOT NULL,
  PRIMARY KEY (`idFavoritos`),
  KEY `fk_Programa_has_Interesado_Interesado1_idx` (`matricula`),
  KEY `fk_Programa_has_Interesado_Programa1_idx` (`idPrograma`),
  CONSTRAINT `fk_Programa_has_Interesado_Programa1` FOREIGN KEY (`idPrograma`) REFERENCES `convocatoria` (`idPrograma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_interesado_favorito1` FOREIGN KEY (`matricula`) REFERENCES `interesado` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of favoritos
-- ----------------------------

-- ----------------------------
-- Table structure for grado
-- ----------------------------
DROP TABLE IF EXISTS `grado`;
CREATE TABLE `grado` (
  `idGrado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idGrado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of grado
-- ----------------------------
INSERT INTO `grado` VALUES ('1', 'Licenciatura');
INSERT INTO `grado` VALUES ('2', 'Maestria');
INSERT INTO `grado` VALUES ('3', 'Doctorado');
INSERT INTO `grado` VALUES ('4', 'PROFESOR');

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
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', 'Administrator');
INSERT INTO `groups` VALUES ('2', 'members', 'General User');
INSERT INTO `groups` VALUES ('3', 'registrado', 'General User');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of idioma
-- ----------------------------
INSERT INTO `idioma` VALUES ('4', 'Aleman', 'Ingles', 'Italiano');
INSERT INTO `idioma` VALUES ('5', 'Aleman', 'Aleman', 'Aleman');
INSERT INTO `idioma` VALUES ('6', 'Aleman', 'Aleman', 'Aleman');
INSERT INTO `idioma` VALUES ('7', 'Aleman', 'Aleman', 'Aleman');
INSERT INTO `idioma` VALUES ('8', 'Aleman', 'Aleman', 'Aleman');
INSERT INTO `idioma` VALUES ('9', 'Aleman', 'Aleman', 'Aleman');
INSERT INTO `idioma` VALUES ('10', 'Aleman', 'Aleman', 'Aleman');
INSERT INTO `idioma` VALUES ('11', 'Aleman', 'Aleman', 'Aleman');
INSERT INTO `idioma` VALUES ('12', 'Aleman', 'Aleman', 'Aleman');
INSERT INTO `idioma` VALUES ('13', 'Aleman', 'Aleman', 'Aleman');
INSERT INTO `idioma` VALUES ('14', 'Aleman', 'Aleman', 'Aleman');
INSERT INTO `idioma` VALUES ('15', 'Ingles', 'Aleman', 'Frances');
INSERT INTO `idioma` VALUES ('16', 'Aleman', 'Aleman', 'Aleman');
INSERT INTO `idioma` VALUES ('17', 'Aleman', 'Aleman', 'Aleman');

-- ----------------------------
-- Table structure for interesado
-- ----------------------------
DROP TABLE IF EXISTS `interesado`;
CREATE TABLE `interesado` (
  `matricula` varchar(9) NOT NULL,
  `areaInteres` varchar(45) NOT NULL,
  `semestre` varchar(45) NOT NULL,
  `solicitaBeca` varchar(2) NOT NULL,
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
  KEY `matricula` (`matricula`),
  CONSTRAINT `fk_Interesado_Facultad1` FOREIGN KEY (`Facultad_idFacultad`) REFERENCES `facultad` (`idFacultad`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Interesado_Idioma1` FOREIGN KEY (`Idioma_idIdioma`) REFERENCES `idioma` (`idIdioma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Interesado_datosPersonales1` FOREIGN KEY (`datosPersonales_iddatosPersonales`) REFERENCES `datospersonales` (`iddatosPersonales`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Interesado_otroPerfil1` FOREIGN KEY (`otroPerfil_idotroPerfil`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Interesado_paises` FOREIGN KEY (`pais_idpais`) REFERENCES `paisesinteresado` (`idpais`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_users_interesado` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of interesado
-- ----------------------------
INSERT INTO `interesado` VALUES ('S10011059', 'CESAR', 'CESAR', 'SI', '8', '21', '15', '16', '6', '14', 'Estudiante', 'Estancias cortas', '13');
INSERT INTO `interesado` VALUES ('S10011069', 'julian', 'julian', 'SI', '8', '22', '16', '17', '7', '15', 'Estudiante', 'Estancias cortas', '14');
INSERT INTO `interesado` VALUES ('S12011258', 'LORENZO ALFONSO', 'LORENZO ALFONSO', 'SI', '9', '20', '14', '15', '5', '13', 'Estudiante', 'Maestría', '12');

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
-- Records of login_attempts
-- ----------------------------

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
  CONSTRAINT `pais_lugar_fk` FOREIGN KEY (`idPaisLugar`) REFERENCES `paisconvo` (`idPaisConvo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lugar
-- ----------------------------
INSERT INTO `lugar` VALUES ('1', '1', '1');
INSERT INTO `lugar` VALUES ('2', '2', '2');
INSERT INTO `lugar` VALUES ('3', '2', '3');
INSERT INTO `lugar` VALUES ('4', '2', '4');
INSERT INTO `lugar` VALUES ('5', '3', '5');
INSERT INTO `lugar` VALUES ('6', '3', '6');
INSERT INTO `lugar` VALUES ('7', '4', '7');
INSERT INTO `lugar` VALUES ('8', '5', '8');
INSERT INTO `lugar` VALUES ('9', '6', '9');
INSERT INTO `lugar` VALUES ('10', '1', '13');
INSERT INTO `lugar` VALUES ('11', '1', '14');

-- ----------------------------
-- Table structure for paisconvo
-- ----------------------------
DROP TABLE IF EXISTS `paisconvo`;
CREATE TABLE `paisconvo` (
  `idPaisConvo` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPaisConvo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of paisconvo
-- ----------------------------
INSERT INTO `paisconvo` VALUES ('1', 'México');
INSERT INTO `paisconvo` VALUES ('2', 'EUA');
INSERT INTO `paisconvo` VALUES ('3', 'UK');
INSERT INTO `paisconvo` VALUES ('4', 'Holanda');
INSERT INTO `paisconvo` VALUES ('5', 'Alemania');
INSERT INTO `paisconvo` VALUES ('6', 'China');
INSERT INTO `paisconvo` VALUES ('7', 'CANADA');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of paisesinteresado
-- ----------------------------
INSERT INTO `paisesinteresado` VALUES ('1', 'UK', 'EUA', 'China');
INSERT INTO `paisesinteresado` VALUES ('2', 'EUA', 'España', 'Alemania');
INSERT INTO `paisesinteresado` VALUES ('3', 'Rusia', 'Japón', 'Chile');
INSERT INTO `paisesinteresado` VALUES ('4', 'UK', 'ALEMANIA', 'FRANCIA');
INSERT INTO `paisesinteresado` VALUES ('5', 'UK', 'ALEMANIA', 'FRANCIA');
INSERT INTO `paisesinteresado` VALUES ('6', 'UK', 'ALEMANIA', 'FRANCIA');
INSERT INTO `paisesinteresado` VALUES ('7', 'UK', 'ALEMANIA', 'FRANCIA');
INSERT INTO `paisesinteresado` VALUES ('8', 'UK', 'ALEMANIA', 'FRANCIA');
INSERT INTO `paisesinteresado` VALUES ('9', 'UK', 'ALEMANIA', 'FRANCIA');
INSERT INTO `paisesinteresado` VALUES ('10', 'UK', 'ALEMANIA', 'FRANCIA');
INSERT INTO `paisesinteresado` VALUES ('11', 'UK', 'ALEMANIA', 'FRANCIA');
INSERT INTO `paisesinteresado` VALUES ('12', 'UK', 'ALEMANIA', 'FRANCIA');
INSERT INTO `paisesinteresado` VALUES ('13', 'UK', 'EUA', 'ITALIA');
INSERT INTO `paisesinteresado` VALUES ('14', 'españa', 'alemania', 'inglaterra');

-- ----------------------------
-- Table structure for universidad
-- ----------------------------
DROP TABLE IF EXISTS `universidad`;
CREATE TABLE `universidad` (
  `idUniversidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idUniversidad`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of universidad
-- ----------------------------
INSERT INTO `universidad` VALUES ('1', 'Universidad Nacional Autónoma de México ');
INSERT INTO `universidad` VALUES ('2', 'University of California, Los Angeles (UCLA)');
INSERT INTO `universidad` VALUES ('3', 'Massachusetts Institute of Technology');
INSERT INTO `universidad` VALUES ('4', 'Harvard University');
INSERT INTO `universidad` VALUES ('5', 'Stanford University');
INSERT INTO `universidad` VALUES ('6', 'University of Cambridge');
INSERT INTO `universidad` VALUES ('7', 'University of Oxford');
INSERT INTO `universidad` VALUES ('8', 'University of Amsterdam');
INSERT INTO `universidad` VALUES ('9', 'Universität Hamburg');
INSERT INTO `universidad` VALUES ('10', 'National Taiwan University');
INSERT INTO `universidad` VALUES ('11', 'UV');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', null, null, 'kCoYq/SoBFCvDFlzlkvi0e', '1268889823', '1434124819', '1', 'Admin', 'istrator', 'ADMIN', '0');
INSERT INTO `users` VALUES ('20', '::1', 'LORENZO ALFONSO RAMIREZ', '$2y$08$DWbbkbvOooqNnVTiZv5CZukGFNDeLKkeYkm6khL7d16HmFvQ2RVGq', null, 'prueba@prueba.com', null, null, null, 'V5KRAByMm4XnZeP.PdceZO', '1434093181', '1434096236', '1', 'LORENZO ALFONSO', 'RAMIREZ ZARATE', '', '2288-60-37-94');
INSERT INTO `users` VALUES ('21', '192.168.1.68', 'CESAR LAGUNES', '$2y$08$6hqhnf11bfTfF84omoZ2tOjtqgCL8ShJcE9KXdu0D3MK4Ql9SklIG', null, 'clagunes25@gmail.com', null, null, null, 'EEQw/cLnMdNpLZWQjvXv7e', '1434125215', '1434125234', '1', 'CESAR', 'LAGUNES AVENDANO', '', '2281-84-67-08');
INSERT INTO `users` VALUES ('22', '172.72.34.76', 'JULIAN GALVAN', '$2y$08$x6K4WwoglO2QvyxLI0e1Augia1GXgcClrVSlVx9DPY9m5dO150LUi', null, 'jgv3192@gmail.com', null, null, null, 'OGTBGDDgxx1ztbp.4JnTUe', '1434126379', '1434126431', '1', 'julian', 'GALVAN VIVEROS', '', '2281-71-50-66');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('1', '1', '1');
INSERT INTO `users_groups` VALUES ('2', '1', '2');
INSERT INTO `users_groups` VALUES ('22', '20', '3');
INSERT INTO `users_groups` VALUES ('23', '21', '3');
INSERT INTO `users_groups` VALUES ('24', '22', '3');

-- ----------------------------
-- View structure for conview
-- ----------------------------
DROP VIEW IF EXISTS `conview`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `conview` AS SELEcT 
        `convocatoria`.`idPrograma` AS `idconv`,
        `convocatoria`.`nombreconv` AS `nombre`,
        `convocatoria`.`fechaInicio` AS `fi`,
        `convocatoria`.`fechaFin` AS `ff`,
        `convocatoria`.`descripcion` AS `desc`,
        `Grado`.`nombre` AS `grado`,
        `Universidad`.`nombre` AS `uni`,
        `convocatoria`.`promedioSolicitado` AS `prom`,
        `Area`.`nombreAreaFormacion` AS `area`,
        `paisConvo`.`pais` AS `pais`,
        `convocatoria`.`estado` AS `edo`
    FROM
        ((((`convocatoria`
        JOIN `grado` ON ((`grado`.`idGrado` = `convocatoria`.`Grado_idGrado`)))
        JOIN `area` ON ((`area`.`idArea` = `convocatoria`.`Area_idArea`)))
        JOIN `universidad` ON ((`universidad`.`idUniversidad` = `convocatoria`.`universidad_idUniversidad1`)))
        JOIN `lugar` ON ((`lugar`.`idLugar` = `convocatoria`.`lugar_idLugar`))
        JOIN `paisConvo` ON ((`paisConvo`.`idPaisConvo` = `lugar`.`idPaisLugar`))) ;
