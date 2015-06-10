-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: moea
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `idArea` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAreaFormacion` varchar(45) NOT NULL,
  PRIMARY KEY (`idArea`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Economico');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `Lugar_idLugar` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(45) DEFAULT NULL,
  KEY `fk_ciudad_Lugar1_idx` (`Lugar_idLugar`),
  CONSTRAINT `fk_ciudad_Lugar1` FOREIGN KEY (`Lugar_idLugar`) REFERENCES `lugar` (`idLugar`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES (0,'LA HABANA');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `conview`
--


--
-- Table structure for table `convocatoria`
--

DROP TABLE IF EXISTS `convocatoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  CONSTRAINT `fk_Programa_Area1` FOREIGN KEY (`Area_idArea`) REFERENCES `area` (`idArea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Programa_Grado1` FOREIGN KEY (`Grado_idGrado`) REFERENCES `grado` (`idGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Programa_Lugar1` FOREIGN KEY (`Lugar_idLugar`) REFERENCES `lugar` (`idLugar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Programa_Universidad2` FOREIGN KEY (`Universidad_idUniversidad1`) REFERENCES `universidad` (`idUniversidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convocatoria`
--

LOCK TABLES `convocatoria` WRITE;
/*!40000 ALTER TABLE `convocatoria` DISABLE KEYS */;
INSERT INTO `convocatoria` VALUES (0,'TEST1','2015-05-05','2015-12-12','Esta es una prueba',1,1,1,8,1,1),(1,'México-Holanda Orange Tulip scholarship','2015-10-09','2015-12-08','Nuffic Neso, la oficina de representación oficial de la educación superior holandesa en México anuncia que se encuentra abierta la convocatoria para participar en el programa Orange Tulip Scholarship, el cual ofrece más de  90 becas para  mexicanos que deseen estudiar programas impartidos en inglés de licenciatura y maestría en los países bajos.\n\nOrange Tulip Scholarship está financiado por 28 Instituciones de educación superior en Holanda internacionalmente reconocidas por su alto nivel académico tales como University of Amsterdam, University of Groningen, TU Delft University of Technology, Tias Business School y Utrecht Summer School entre otras.\n\nSe ofrecen programas en todas las áreas de estudio dentro de las cuales se encuentran las de  ciencias sociales, económicas y de negocios (entre otros los MBA), derecho e ingenierías, arte, medicina y administración. Este año por primera vez hay posibilidades para mexicanos interesados en estudios de posgrado en el campo del cine.\n\nLa fecha límite general de recepción de solicitudes para el Orange Tulip Scholarship 2015/2016 es el 1 de abril de 2015. Sin embargo, algunas becas pueden tener otras fechas límite. Revisa cuidadosamente las páginas de cada beca.\n\nLas becas pueden ser parciales o completas, dependiendo de la Institución patrocinadora.\n\nTe invitamos a visitar la página donde encontrarás toda la información y los sencillos pasos que deberás seguir para poder participar.\n\nhttps://www.nesolatinoamerica.org/becas/mexico/orange-tulip-scholarship\n\nVer convocatoria completa:\n\nhttps://www.nesolatinoamerica.org/files/documentos/orange-tulip-scholarship/convocatoria-orange-tulip-scholarship-2015-2016.pdf\n\n \n\nPreguntas info@nesomexico.org',1,1,1,10,1,0),(2,'ERASMUS 2014','2015-06-08','2015-08-10','El programa Erasmus Mundus (EM) fue creado hace 27 años con el objetivo de fomentar la movilidad de estudiantes de licenciatura y posgrado y la formación de cuadros administrativos. \nInicialmente era sólo entre universidades europeas. \nEn los últimos dos años, la Universidad Veracruzana ha sido invitada a participar en al menos 12 consorcios del programa. Para el periodo 2014 al 2017, se han autorizado seis consorcios para Latinoamérica y la UV participa en dos de ellos como Universidad socia y en uno como universidad asociada.',1,1,1,8,1,1),(3,'Curso de verano kanagwa','2015-05-08','2015-07-08','La Coordinación de Movilidad Estudiantil y Académica de la Dirección de Relaciones Internacionales de la Universidad Veracruzana, invita a todos los interesados a participar en el curso especial de japonés y cultura japonesa. \n\n \n\nLa fecha límite de solicitud es el 31 de marzo.\n\n \n\nEste programa ofrece clases que tienen como objetivo mejorar las habilidades de comunicación en japonés, incluye visitas de estudio durante los fines de semana sin costo extra a destinos como Kamakura, Hakone, Tokyo, entre otros. Incorpora actividades de inmersión en la cultura tradicional japonesa como la ceremonia del té, caligrafía, Ikebana, arquitectura japonesa y el teatro tradicional japonés Kabuki.\n\nTendrás la oportunidad de interactuar con los estudiantes de la Universidad de Kanagawa y practicar el japonés alrededor del campus universitario o en el área local de compras para conocer la vida real  japonesa. Las clases y conferencias sobre Japón como historia, economía y política, cultura pop japonesa se impartirán en inglés y las actividades pueden incluir el diálogo con estudiantes japoneses. Los cursos tendrán 10 estudiantes por clase y cada uno de ellos recibirá un reporte de calificación final.\n\n \n\n¡Estudia japonés y vive la cultura japonesa con participantes de diferentes países!\n\n \n\nLos estudiantes y académicos de la Universidad Veracruzana tendrán un precio especial.',1,1,1,9,1,1),(4,'UNESCO','2015-08-08','2015-07-07','Cátedra Regional UNESCO Mujer, Ciencia y Tecnología en América Latina (FLACSO- Argentina), punto focal para ALC del Programa Internacional “GenderinSITE” (Gender in Science, Innovation, Technology and Engineering), anuncia el inicio de sus actividades 2014-2015.\n\n \n\nVersión en línea:\n\nhttp://www.catunescomujer.org/mails/2014/06_30/mail01.htm\n\n \n\nhttp://www.prigepp.org/media/documentos/GIS_ulltimo_junio_2014.pdf',1,1,1,9,1,1),(5,'Convocatoria UNAM','2015-06-05','2015-10-11','La Universidad Veracruzana a través de la Dirección General de Relaciones Internacionales y su Coordinación de Movilidad Estudiantil y Académica en conjunto con la Universidad Nacional Autónoma de México y la Dirección General de Cooperación e Internacionalización.\n\nCONVOCAN\n\nA los académicos e Investigadores a participar presentando sus propuestas de actividades de cooperación, organizadas en:\n\n    Proyecto de Investigación\n    Programa de Apoyo a la Docencia\n    Programa de Difusión de la Cultura y/o Divulgación\n\nFuentes de Financiamiento. Este apoyo consiste en que los viáticos de los académicos se dividen entre ambas instituciones de la siguiente manera:\n\n    Académico de la UV en la UNAM:\n\n    Transporte viaje redondo asumido por la entidad (facultad o instituto) de la UV que envía.\n    Alimentación y hospedaje por la dependencia de la UNAM que recibe.\n\n    Académico de la UNAM en la UV:\n\n    Transporte viaje redondo asumido por la entidad de la UNAM que envía.\n    Alimentación y hospedaje por la dependencia (facultad o instituto) de la UV que recibe.\n\n** Este programa no cubre en ningún caso el pago de honorarios o sueldo a los académicos que apoyen de la UNAM. \n\nPROCESO\n\n    Los académicos de la UV interesados en desarrollar un proyecto en colaboración con la UNAM deben establecer contacto con el académico de dicha institución con quién desean trabajar. Cabe mencionar que se deberá revisar  la relación de entidades académicas y dependencias de la UNAM que participan en la convocatoria, con las “ligas” a las correspondientes páginas web UNAM: www.unam.com.mx\n    Deberá presentar oficio aval por parte de Entidad Académica, llenar el Forrmato de Solicitud y enviarlo por email adjuntando el Curriculum del Académico  responsable y de los Académicos participantes, Protocolo del Proyecto de Investigación, Temario y cronograma de actividades, todos los documentos  en formato PDF (imprescindible), a la siguiente dirección electrónica: elvigarcia@uv.mx (los archivos no deben exceder un tamaño de 1.5MB).\n\nMayor información de lunes a viernes, de 9:00 a 15:00 horas, con la LAE. Elvira García Carvajal, en la Coordinación  de Movilidad Estudiantil y Académica Calle Zamora # 25, Col. Centro, C.P. 91000, Xalapa, Veracruz, México. Teléfono: (01-228) 842-17-00, ext. 17658, correo electrónico: elvigarcia@uv.mx\n\n \n\nLa fecha de cierre de la presente convocatoria es el día 27 de octubre del año en curso.\n\n \n\n ',1,1,1,8,1,1),(6,'Becas MEXFITEC 2015-2016','2015-03-02','2015-05-06','CONVOCATORIA INTERNA DE LA UNIVERSIDAD VERACRUZANA  A CANDIDATOS A BECARIOS 2015-2016\n\n La Dirección General de Relaciones Internacionales de la Universidad Veracruzana convoca a alumnos de ingeniería para ser candidatos a becarios  del programa MEXFITEC (MEXico Francia Ingenieros TECnología)  para formar el grupo de estudiantes mexicanos que realizarán un año de estudios (2015-2016), en las Grandes Escuelas de Ingeniería en Francia. El objetivo de esta convocatoria interna es propiciar entre los candidatos el estudio del idioma francés y que estén mejor preparados para la convocatoria oficial.\n\nLos becarios seleccionados para la convocatoria  contaran con los siguientes beneficios:\n\n     Cada becario contará con el apoyo de 2 tutores (un profesor mexicano y otro francés) para el seguimiento académico;\n     El gobierno de Francia, a través de la Embajada de Francia en México y de Campus France, brindará a los estudiantes mexicanos apoyo para facilitar los trámites de visa, de alojamiento en Francia, y cualquiera que requiera su intervención, etc.\n     El gobierno de Francia cubrirá los costos de inscripción y colegiaturas en las escuelas francesas;\n     El gobierno de los Estados Unidos Mexicanos cubrirá los gastos de transporte México-París-México y la manutención de los estudiantes en Francia;\n     El gobierno de los Estados Unidos Mexicanos pagará a los becarios mexicanos, clases intensivas de francés complementarias durante 5 semanas en Francia;\n     El gobierno mexicano cubrirá el costo del seguro de gastos médicos;\n\nLos candidatos a becarios deberán cubrir los siguientes requisitos:\n\nPrimera etapa:  (septiembre 2014) \n\n    Haber cursado del tercero al quinto semestre del nivel de licenciatura en ingeniería;\n    Buen desempeño escolar (promedio superior a 8.5);\n    Dominio básico del idioma francés,\n\n \n\nSegunda etapa: (enero 2015)\n\n    Entregar dos cartas de motivos personales para concursar por la beca, de forma impresa con una extensión máxima de 2 cuartillas en idiomas español y francés, con fotografías originales a color;\n\n    Llenar el formato de expediente académico, acordado entre México y Francia. (Dossier de presentación en español y en francés con fotografías originales a color);\n    Presentar un examen psicométrico de personalidad;\n    Presentar examen médico en el que se especifique el padecimiento o no padecimiento de enfermedades crónico degenerativas, (en caso de que se padezca alguna enfermedad de este tipo incluir el tratamiento médico sugerido y la forma de continuar con éste en caso de obtener la beca);\n    Historial académico (Kardex);\n    Copia legible del acta de nacimiento;\n    Pasaporte con vigencia superior a un año;\n\n \n\n Tercera etapa: (abril 2015) \n\n    Inscribirse en sitio web de Campus France http://www.mexique.campusfrance.org/pagina/la-inscripcion-a-campusfrance-es-obligatoria\n    Presentar la documentación para el trámite de visa (revisar la página de Campus France);\n    Presentar una carta compromiso del tutor mexicano asignado para dar seguimiento permanente al becario durante la estancia en Francia, y comunicación constante con el tutor francés asignado, para acordar la carga académica que llevará a cabo el estudiante mexicano;\n    Presentar una carta poder en la que el alumno autoriza a la SEP recoger el pasaporte y la respectiva visa en las instalaciones de la Embajada de Francia en México.\n',1,1,1,8,1,1),(7,'ISLA internship','2015-05-13','2015-05-28','El Instituto de Estudios Latino Americanos de Rumanía ofrece a los estudiantes calificados de la UE y América Latina y el Caribe la oportunidad de ganar experiencia práctica y adquirir un profundo conocimiento en el campo de los estudios latinoamericanos a través de un programa de prácticas online.\r\n\r\n \r\n\r\nLa duración del programa es de 2 meses, no requiere viajes de algún tipo y no es retribuido.\r\n\r\n \r\n\r\nTodas las actividades se harán online, a través de medios como el correo electrónico, Skype, Facebook etc. Al final del programa, todos los participantes que habrán cumplido sus tareas recibirán un certificado y formaran parte de nuestra red de Alumni.\r\n\r\n \r\n\r\nLos temas del programa serán variados en lo que se refiere al contenido, incluyendo actividades de investigación científica, traducciones, artículos para la Revista Europea de Estudios Latino Americanos (bajo proceso de inscripción en bases de datos internacionales) o para el Newsletter del Instituto de Estudios Latino Americanos, informes analíticos sobre temas relacionados con estudios latino americanos, informes de políticas, monitoreo media, actividades relacionadas con el Master de Estudios Latino Americanos de la Escuela Nacional de Estudios Politicos y Administrativos (http://www.isla.eu.com/es/master-de-estudios-latino-americanos/) o promoción de las actividades del Instituto de Estudios Latino América.\r\n\r\n \r\n\r\nRequerimientos:\r\n\r\n    Ser estudiante de un programa de grado o posgrado en una universidad de la Unión Europea o de Latino América y Caribe\r\n    Tener competencias linguisticas en inglés o español.  Conocimientos de francés, portugués o rumano representan una ventaja.\r\n    Tener un fuerte interés para los estudios latino americanos\r\n\r\n \r\n\r\nSi cumples los criterios de elegibilidad anteriores, manda tu aplicación a través de un CV (en inglés o español) y una carta de motivación (no más de una página escrita en español, francés, portugués o rumano) en el siguiente correo electrónico: isla@dri.snspa.ro antes del 30 de noviembre 2014. Los candidatos recibirán la respuesta sobre su aplicación hasta el 3 de diciembre 2014. El programa empezará el 5 de diciembre 2014.',1,1,1,10,1,1),(8,'Fundación Carolina','2015-01-01','2015-11-10','La Fundación Carolina ha abierto una nueva edición de su convocatoria de becas, correspondiente al curso académico 2015-2016. En esta 15ª edición se ofertan 540 becas, según la siguiente relación: 304 becas de postgrado, 112 de doctorado y estancias cortas postdoctorales (incluyendo renovaciones), 29 de movilidad de profesores brasileños, 50 becas de la Escuela Complutense de Verano, 15 becas del Programa de Emprendimiento y 30 de Estudios institucionales.',1,1,1,10,1,1),(9,'TEST 3 ------','2015-03-03','2015-12-12','prueba de test 3',1,1,1,9,0,0),(10,'TEST 4','2015-03-03','2015-12-12','jfvsdvksdvs',1,1,1,9,0,1),(11,'FKKFDSKDSKFKLDSKL','2015-03-03','2015-12-12','fdsfdsflksavsd,lña',1,1,1,8,0,1);
/*!40000 ALTER TABLE `convocatoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
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
INSERT INTO `cuenta` VALUES (1,'sadsadsa@sasa.com','sdaodsa');
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuestionario`
--

DROP TABLE IF EXISTS `cuestionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuestionario` (
  `idcuestionario` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta1` varchar(300) NOT NULL,
  `respuesta2` varchar(300) NOT NULL,
  `respuesta3` varchar(300) NOT NULL,
  `idFavoritos` int(11) NOT NULL,
  PRIMARY KEY (`idcuestionario`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuestionario`
--

LOCK TABLES `cuestionario` WRITE;
/*!40000 ALTER TABLE `cuestionario` DISABLE KEYS */;
INSERT INTO `cuestionario` VALUES (0,'otro','si','si',1);
/*!40000 ALTER TABLE `cuestionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datospersonales`
--

DROP TABLE IF EXISTS `datospersonales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datospersonales` (
  `iddatosPersonales` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL,
  `apellidoM` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `curp` varchar(45) NOT NULL,
  PRIMARY KEY (`iddatosPersonales`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datospersonales`
--

LOCK TABLES `datospersonales` WRITE;
/*!40000 ALTER TABLE `datospersonales` DISABLE KEYS */;
INSERT INTO `datospersonales` VALUES (1,'saul','salazar','mendez','1234','azul123456');
/*!40000 ALTER TABLE `datospersonales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facultad`
--

DROP TABLE IF EXISTS `facultad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facultad` (
  `idFacultad` int(11) NOT NULL AUTO_INCREMENT,
  `nombreFacultad` varchar(45) NOT NULL,
  `areaAdscripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idFacultad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facultad`
--

LOCK TABLES `facultad` WRITE;
/*!40000 ALTER TABLE `facultad` DISABLE KEYS */;
INSERT INTO `facultad` VALUES (1,'Informatica','Economico-Administrativo');
/*!40000 ALTER TABLE `facultad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favoritos`
--

DROP TABLE IF EXISTS `favoritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favoritos` (
  `idFavoritos` int(11) NOT NULL AUTO_INCREMENT,
  `idPrograma` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  PRIMARY KEY (`idFavoritos`),
  KEY `fk_Programa_has_Interesado_Interesado1_idx` (`matricula`),
  KEY `fk_Programa_has_Interesado_Programa1_idx` (`idPrograma`),
  CONSTRAINT `fk_Programa_has_Interesado_Interesado1` FOREIGN KEY (`matricula`) REFERENCES `interesado` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Programa_has_Interesado_Programa1` FOREIGN KEY (`idPrograma`) REFERENCES `convocatoria` (`idPrograma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


CREATE TABLE IF NOT EXISTS `correo` (
  `matricula` INT(11) NOT NULL,
  `idPrograma` INT(11) NOT NULL,
  PRIMARY KEY (`matricula`, `idPrograma`),
  INDEX `fk_interesado_has_convocatoria_convocatoria1_idx` (`idPrograma` ASC),
  INDEX `fk_interesado_has_convocatoria_interesado1_idx` (`matricula` ASC),
  CONSTRAINT `fk_interesado_has_convocatoria_interesado1`
    FOREIGN KEY (`matricula`)
    REFERENCES `interesado` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_interesado_has_convocatoria_convocatoria1`
    FOREIGN KEY (`idPrograma`)
    REFERENCES `convocatoria` (`idPrograma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;




--
-- Dumping data for table `favoritos`
--

LOCK TABLES `favoritos` WRITE;
/*!40000 ALTER TABLE `favoritos` DISABLE KEYS */;
INSERT INTO `favoritos` VALUES (1,1,100),(2,5,100),(4,11,100);
/*!40000 ALTER TABLE `favoritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grado` (
  `idGrado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idGrado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
INSERT INTO `grado` VALUES (1,'Licenciatura');
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'members','General User'),(3,'interesado','');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idioma`
--

DROP TABLE IF EXISTS `idioma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idioma` (
  `idIdioma` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `idioma2` VARCHAR(45) NULL,
  `idioma3` VARCHAR(45) NULL,
  PRIMARY KEY (`idIdioma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idioma`
--

LOCK TABLES `idioma` WRITE;
/*!40000 ALTER TABLE `idioma` DISABLE KEYS */;
INSERT INTO `idioma` VALUES (1,'español','ingles','chino');
/*!40000 ALTER TABLE `idioma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interesado`
--

DROP TABLE IF EXISTS `interesado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interesado` (
  `matricula` int(11) NOT NULL,
  `areaInteres` varchar(45) NOT NULL,
  `semestre` varchar(45) NOT NULL,
  `solicitaBeca` int(11) NOT NULL,
  `promedio_solicitante` int(11) DEFAULT NULL,
  `Usuario_idUsuario` int(11) DEFAULT NULL,
  `Facultad_idFacultad` int(11) NOT NULL,
  `Idioma_idIdioma` int(11) NOT NULL,
  `otroPerfil_idotroPerfil` int(11) NOT NULL,
  `datosPersonales_iddatosPersonales` int(11) NOT NULL,
  `situacionActual` VARCHAR(45) NULL,
  `nivelDeInteres` VARCHAR(45) NULL,
  `pais_idpais` INT NOT NULL,
  PRIMARY KEY (`matricula`),
  KEY `fk_Interesado_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Interesado_Facultad1_idx` (`Facultad_idFacultad`),
  KEY `fk_Interesado_Idioma1_idx` (`Idioma_idIdioma`),
  KEY `fk_Interesado_otroPerfil1_idx` (`otroPerfil_idotroPerfil`),
  KEY `fk_Interesado_datosPersonales1_idx` (`datosPersonales_iddatosPersonales`),
  CONSTRAINT `fk_Interesado_Facultad1` FOREIGN KEY (`Facultad_idFacultad`) REFERENCES `facultad` (`idFacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_Idioma1` FOREIGN KEY (`Idioma_idIdioma`) REFERENCES `idioma` (`idIdioma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_datosPersonales1` FOREIGN KEY (`datosPersonales_iddatosPersonales`) REFERENCES `datospersonales` (`iddatosPersonales`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_otroPerfil1` FOREIGN KEY (`otroPerfil_idotroPerfil`) REFERENCES `cuenta` (`idCuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interesado`
--

LOCK TABLES `interesado` WRITE;
/*!40000 ALTER TABLE `interesado` DISABLE KEYS */;
INSERT INTO `interesado` VALUES (100,'informatica','6',1,8,2,1,1,1,1,'soltero','poco',1);
/*!40000 ALTER TABLE `interesado` ENABLE KEYS */;
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
-- Table structure for table `lugar`
--

DROP TABLE IF EXISTS `lugar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lugar` (
  `idLugar` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(100) NOT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idLugar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugar`
--

LOCK TABLES `lugar` WRITE;
/*!40000 ALTER TABLE `lugar` DISABLE KEYS */;
INSERT INTO `lugar` VALUES (0,'CUBA',NULL),(1,'España','Madrid');
/*!40000 ALTER TABLE `lugar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `universidad`
--

DROP TABLE IF EXISTS `universidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `universidad` (
  `idUniversidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idUniversidad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `universidad`
--

LOCK TABLES `universidad` WRITE;
/*!40000 ALTER TABLE `universidad` DISABLE KEYS */;
INSERT INTO `universidad` VALUES (1,'Universidad Autónoma de Tamaulipas');
/*!40000 ALTER TABLE `universidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,NULL,'yz4kusYvTYTvxheIbmR8cu',1268889823,1433549602,1,'Admin','istrator','ADMIN','0'),(2,'127.0.0.1','saul salazar','$2y$08$rCLViW0KxurEjUJTDjdXEe4..Wv9BkE0R78C8m3PlEv1hz6.j8H56',NULL,'saul.salazar.mendez@outlook.com',NULL,NULL,NULL,'4kpURLBC9iPODg7ujoOuue',1430469658,1433550339,1,'saul','salazar','particular','1478252695');
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
  `user_id` int(11) NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

CREATE TABLE IF NOT EXISTS `pais` (
  `idpais` INT NOT NULL AUTO_INCREMENT,
  `pais1` VARCHAR(45) NULL,
  `pais2` VARCHAR(45) NULL,
  `pais3` VARCHAR(45) NULL,
  PRIMARY KEY (`idpais`))
ENGINE = InnoDB;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(3,2,3);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `perfil` tinyint(4) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `conview`
--

CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `conView` AS
    SELECT 
        `convocatoria`.`idPrograma` AS `idconv`,
        `convocatoria`.`nombreConv` AS `nombre`,
        `convocatoria`.`fechaInicio` AS `fi`,
        `convocatoria`.`fechaFin` AS `ff`,
        `convocatoria`.`descripcion` AS `desc`,
        `grado`.`nombre` AS `grado`,
        `universidad`.`nombre` AS `uni`,
        `convocatoria`.`promedioSolicitado` AS `prom`,
        `area`.`nombreAreaFormacion` AS `area`,
        `lugar`.`pais` AS `pais`,
        `convocatoria`.`estado` AS `edo`
    FROM
        ((((`convocatoria`
        JOIN`grado` ON ((`grado`.`idGrado` = `convocatoria`.`grado_idGrado`)))
        JOIN`area` ON ((`area`.`idArea` = `convocatoria`.`area_idArea`)))
        JOIN `universidad` ON ((`universidad`.`idUniversidad` = `convocatoria`.`universidad_idUniversidad1`)))
        JOIN `lugar` ON ((`lugar`.`idLugar` = `convocatoria`.`Lugar_idLugar`)));

/*!50001 DROP VIEW IF EXISTS `conview`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `conview` AS select `convocatoria`.`idPrograma` AS `idconv`,`convocatoria`.`nombreConv` AS `nombre`,`convocatoria`.`fechaInicio` AS `fi`,`convocatoria`.`fechaFin` AS `ff`,`convocatoria`.`descripcion` AS `desc`,`grado`.`nombre` AS `grado`,`universidad`.`nombre` AS `uni`,`convocatoria`.`promedioSolicitado` AS `prom`,`area`.`nombreAreaFormacion` AS `area`,`lugar`.`pais` AS `pais`,`convocatoria`.`estado` AS `edo` from ((((`convocatoria` join `grado` on((`grado`.`idGrado` = `convocatoria`.`Grado_idGrado`))) join `area` on((`area`.`idArea` = `convocatoria`.`Area_idArea`))) join `universidad` on((`universidad`.`idUniversidad` = `convocatoria`.`Universidad_idUniversidad1`))) join `lugar` on((`lugar`.`idLugar` = `convocatoria`.`Lugar_idLugar`))) */;
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

-- Dump completed on 2015-06-06  0:16:40
