-- MySQL dump 10.13  Distrib 5.6.21, for Linux (x86_64)
--
-- Host: localhost    Database: moea
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Area`
--

DROP TABLE IF EXISTS `Area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Area` (
  `idArea` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAreaFormacion` varchar(45) NOT NULL,
  PRIMARY KEY (`idArea`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Area`
--

LOCK TABLES `Area` WRITE;
/*!40000 ALTER TABLE `Area` DISABLE KEYS */;
INSERT INTO `Area` VALUES (3,'Robotica'),(4,'Inteligencia artificial');
/*!40000 ALTER TABLE `Area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Convocatoria`
--

DROP TABLE IF EXISTS `Convocatoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Convocatoria` (
  `idPrograma` int(11) NOT NULL AUTO_INCREMENT,
  `nombreConv` varchar(45) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `descripcion` text,
  `Grado_idGrado` int(11) NOT NULL,
  `Universidad_idUniversidad1` int(11) NOT NULL,
  `Area_idArea` int(11) NOT NULL,
  `promedioSolicitado` float DEFAULT NULL,
  `Lugar_idLugar` int(11) NOT NULL,
  `edo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idPrograma`),
  KEY `fk_Programa_Grado1_idx` (`Grado_idGrado`),
  KEY `fk_Programa_Universidad2_idx` (`Universidad_idUniversidad1`),
  KEY `fk_Programa_Area1_idx` (`Area_idArea`),
  KEY `fk_Programa_Lugar1_idx` (`Lugar_idLugar`),
  CONSTRAINT `fk_Programa_Area1` FOREIGN KEY (`Area_idArea`) REFERENCES `Area` (`idArea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Programa_Grado1` FOREIGN KEY (`Grado_idGrado`) REFERENCES `Grado` (`idGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Programa_Lugar1` FOREIGN KEY (`Lugar_idLugar`) REFERENCES `Lugar` (`idLugar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Programa_Universidad2` FOREIGN KEY (`Universidad_idUniversidad1`) REFERENCES `Universidad` (`idUniversidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Convocatoria`
--

LOCK TABLES `Convocatoria` WRITE;
/*!40000 ALTER TABLE `Convocatoria` DISABLE KEYS */;
INSERT INTO `Convocatoria` VALUES (19,'prueba modificacion 2','2015-01-03','2015-01-01','test modificacion 2',1,1,3,10,1,0),(20,'Inteligencia artificial','2015-01-01','2017-02-02','Prueba',1,2,4,10,2,1);
/*!40000 ALTER TABLE `Convocatoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Facultad`
--

DROP TABLE IF EXISTS `Facultad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Facultad` (
  `idFacultad` int(11) NOT NULL,
  `nombreFacultad` varchar(45) NOT NULL,
  `areaAdscripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idFacultad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Facultad`
--

LOCK TABLES `Facultad` WRITE;
/*!40000 ALTER TABLE `Facultad` DISABLE KEYS */;
/*!40000 ALTER TABLE `Facultad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Grado`
--

DROP TABLE IF EXISTS `Grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Grado` (
  `idGrado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idGrado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Grado`
--

LOCK TABLES `Grado` WRITE;
/*!40000 ALTER TABLE `Grado` DISABLE KEYS */;
INSERT INTO `Grado` VALUES (1,'Licenciatura');
/*!40000 ALTER TABLE `Grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Idioma`
--

DROP TABLE IF EXISTS `Idioma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Idioma` (
  `idIdioma` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idIdioma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Idioma`
--

LOCK TABLES `Idioma` WRITE;
/*!40000 ALTER TABLE `Idioma` DISABLE KEYS */;
/*!40000 ALTER TABLE `Idioma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Interesado`
--

DROP TABLE IF EXISTS `Interesado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Interesado` (
  `matricula` int(11) NOT NULL,
  `areaInteres` varchar(45) NOT NULL,
  `semestre` varchar(45) NOT NULL,
  `solicitaBeca` int(11) NOT NULL,
  `promedio_solicitante` int(11) DEFAULT NULL,
  `Facultad_idFacultad` int(11) NOT NULL,
  `Idioma_idIdioma` int(11) NOT NULL,
  `otroPerfil_idotroPerfil` int(11) NOT NULL,
  `datosPersonales_iddatosPersonales` int(11) NOT NULL,
  `users_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`matricula`),
  KEY `fk_Interesado_Facultad1_idx` (`Facultad_idFacultad`),
  KEY `fk_Interesado_Idioma1_idx` (`Idioma_idIdioma`),
  KEY `fk_Interesado_otroPerfil1_idx` (`otroPerfil_idotroPerfil`),
  KEY `fk_Interesado_datosPersonales1_idx` (`datosPersonales_iddatosPersonales`),
  KEY `fk_Interesado_users1_idx` (`users_id`),
  CONSTRAINT `fk_Interesado_Facultad1` FOREIGN KEY (`Facultad_idFacultad`) REFERENCES `Facultad` (`idFacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_Idioma1` FOREIGN KEY (`Idioma_idIdioma`) REFERENCES `Idioma` (`idIdioma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_datosPersonales1` FOREIGN KEY (`datosPersonales_iddatosPersonales`) REFERENCES `datosPersonales` (`iddatosPersonales`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_otroPerfil1` FOREIGN KEY (`otroPerfil_idotroPerfil`) REFERENCES `cuenta` (`idCuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Interesado`
--

LOCK TABLES `Interesado` WRITE;
/*!40000 ALTER TABLE `Interesado` DISABLE KEYS */;
/*!40000 ALTER TABLE `Interesado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Lugar`
--

DROP TABLE IF EXISTS `Lugar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Lugar` (
  `idLugar` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(100) NOT NULL,
  PRIMARY KEY (`idLugar`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Lugar`
--

LOCK TABLES `Lugar` WRITE;
/*!40000 ALTER TABLE `Lugar` DISABLE KEYS */;
INSERT INTO `Lugar` VALUES (1,'Mexico'),(2,'EUA'),(4,'España');
/*!40000 ALTER TABLE `Lugar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Universidad`
--

DROP TABLE IF EXISTS `Universidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Universidad` (
  `idUniversidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idUniversidad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Universidad`
--

LOCK TABLES `Universidad` WRITE;
/*!40000 ALTER TABLE `Universidad` DISABLE KEYS */;
INSERT INTO `Universidad` VALUES (1,'Universidad Veracruzana'),(2,'UA');
/*!40000 ALTER TABLE `Universidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `Lugar_idLugar` int(11) NOT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  KEY `fk_ciudad_Lugar1_idx` (`Lugar_idLugar`),
  CONSTRAINT `fk_ciudad_Lugar1` FOREIGN KEY (`Lugar_idLugar`) REFERENCES `Lugar` (`idLugar`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES (1,'Veracruz'),(2,'Arizona');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `conView`
--

DROP TABLE IF EXISTS `conView`;
/*!50001 DROP VIEW IF EXISTS `conView`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `conView` AS SELECT 
 1 AS `idconv`,
 1 AS `nombre`,
 1 AS `fi`,
 1 AS `ff`,
 1 AS `desc`,
 1 AS `grado`,
 1 AS `uni`,
 1 AS `prom`,
 1 AS `area`,
 1 AS `pais`,
 1 AS `edo`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta` (
  `idCuenta` int(11) NOT NULL DEFAULT '0',
  `correo` varchar(100) DEFAULT NULL,
  `otraCuenta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuestionario`
--

DROP TABLE IF EXISTS `cuestionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuestionario` (
  `idcuestionario` int(11) NOT NULL,
  `respuesta1` varchar(300) NOT NULL,
  `respuesta2` varchar(300) NOT NULL,
  `respuesta3` varchar(300) NOT NULL,
  `Interesado_matricula` int(11) NOT NULL,
  PRIMARY KEY (`idcuestionario`),
  KEY `fk_cuestionario_Interesado1_idx` (`Interesado_matricula`),
  CONSTRAINT `fk_cuestionario_Interesado1` FOREIGN KEY (`Interesado_matricula`) REFERENCES `Interesado` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuestionario`
--

LOCK TABLES `cuestionario` WRITE;
/*!40000 ALTER TABLE `cuestionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuestionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datosPersonales`
--

DROP TABLE IF EXISTS `datosPersonales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datosPersonales` (
  `iddatosPersonales` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL,
  `apellidoM` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `curp` varchar(45) NOT NULL,
  PRIMARY KEY (`iddatosPersonales`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datosPersonales`
--

LOCK TABLES `datosPersonales` WRITE;
/*!40000 ALTER TABLE `datosPersonales` DISABLE KEYS */;
/*!40000 ALTER TABLE `datosPersonales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favoritos`
--

DROP TABLE IF EXISTS `favoritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favoritos` (
  `Interesado_matricula` int(11) NOT NULL,
  `Convocatoria_idPrograma` int(11) NOT NULL,
  PRIMARY KEY (`Interesado_matricula`,`Convocatoria_idPrograma`),
  KEY `fk_Interesado_has_Convocatoria_Convocatoria1_idx` (`Convocatoria_idPrograma`),
  KEY `fk_Interesado_has_Convocatoria_Interesado1_idx` (`Interesado_matricula`),
  CONSTRAINT `fk_Interesado_has_Convocatoria_Convocatoria1` FOREIGN KEY (`Convocatoria_idPrograma`) REFERENCES `Convocatoria` (`idPrograma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_has_Convocatoria_Interesado1` FOREIGN KEY (`Interesado_matricula`) REFERENCES `Interesado` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favoritos`
--

LOCK TABLES `favoritos` WRITE;
/*!40000 ALTER TABLE `favoritos` DISABLE KEYS */;
/*!40000 ALTER TABLE `favoritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,NULL,'4oUREesVnON51Ooiuu1V2O',1268889823,1433263527,1,'Admin','istrator','ADMIN','0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `conView`
--

/*!50001 DROP VIEW IF EXISTS `conView`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `conView` AS select `Convocatoria`.`idPrograma` AS `idconv`,`Convocatoria`.`nombreConv` AS `nombre`,`Convocatoria`.`fechaInicio` AS `fi`,`Convocatoria`.`fechaFin` AS `ff`,`Convocatoria`.`descripcion` AS `desc`,`Grado`.`nombre` AS `grado`,`Universidad`.`nombre` AS `uni`,`Convocatoria`.`promedioSolicitado` AS `prom`,`Area`.`nombreAreaFormacion` AS `area`,`Lugar`.`pais` AS `pais`,`Convocatoria`.`edo` AS `edo` from ((((`Convocatoria` join `Grado` on((`Grado`.`idGrado` = `Convocatoria`.`Grado_idGrado`))) join `Area` on((`Area`.`idArea` = `Convocatoria`.`Area_idArea`))) join `Universidad` on((`Universidad`.`idUniversidad` = `Convocatoria`.`Universidad_idUniversidad1`))) join `Lugar` on((`Lugar`.`idLugar` = `Convocatoria`.`Lugar_idLugar`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-02 23:34:14
