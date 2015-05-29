drop database moea;
CREATE SCHEMA IF NOT EXISTS `moea` ;
USE `moea` ;

-- -----------------------------------------------------
-- Table `moea`.`groups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`groups` (
  `id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL,
  `description` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `moea`.`login_attempts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`login_attempts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` VARCHAR(15) NOT NULL,
  `login` VARCHAR(100) NOT NULL,
  `time` INT(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `moea`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` VARCHAR(15) NOT NULL,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `salt` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(100) NOT NULL,
  `activation_code` VARCHAR(40) NULL DEFAULT NULL,
  `forgotten_password_code` VARCHAR(40) NULL DEFAULT NULL,
  `forgotten_password_time` INT(11) UNSIGNED NULL DEFAULT NULL,
  `remember_code` VARCHAR(40) NULL DEFAULT NULL,
  `created_on` INT(11) UNSIGNED NOT NULL,
  `last_login` INT(11) UNSIGNED NULL DEFAULT NULL,
  `active` TINYINT(1) UNSIGNED NULL DEFAULT NULL,
  `first_name` VARCHAR(50) NULL DEFAULT NULL,
  `last_name` VARCHAR(50) NULL DEFAULT NULL,
  `company` VARCHAR(100) NULL DEFAULT NULL,
  `phone` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `moea`.`users_groups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`users_groups` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `group_id` MEDIUMINT(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uc_users_groups` (`user_id` ASC, `group_id` ASC),
  INDEX `fk_users_groups_users1_idx` (`user_id` ASC),
  INDEX `fk_users_groups_groups1_idx` (`group_id` ASC),
  CONSTRAINT `fk_users_groups_groups1`
    FOREIGN KEY (`group_id`)
    REFERENCES `moea`.`groups` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `moea`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `moea`.`Facultad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`Facultad` (
  `idFacultad` INT NOT NULL,
  `nombreFacultad` VARCHAR(45) NOT NULL,
  `areaAdscripcion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idFacultad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moea`.`Idioma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`Idioma` (
  `idIdioma` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idIdioma`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moea`.`cuenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`cuenta` (
  `idCuenta` INT NULL DEFAULT NULL,
  `correo` VARCHAR(100) NULL DEFAULT NULL,
  `otraCuenta` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idCuenta`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moea`.`datosPersonales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`datosPersonales` (
  `iddatosPersonales` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellidoP` VARCHAR(45) NOT NULL,
  `apellidoM` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `curp` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`iddatosPersonales`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moea`.`Interesado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`Interesado` (
  `matricula` INT NOT NULL,
  `areaInteres` VARCHAR(45) NOT NULL,
  `semestre` VARCHAR(45) NOT NULL,
  `solicitaBeca` INT NOT NULL,
  `promedio_solicitante` INT NULL DEFAULT NULL,
  `Facultad_idFacultad` INT NOT NULL,
  `Idioma_idIdioma` INT NOT NULL,
  `otroPerfil_idotroPerfil` INT NOT NULL,
  `datosPersonales_iddatosPersonales` INT NOT NULL,
  `users_id` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`matricula`),
  INDEX `fk_Interesado_Facultad1_idx` (`Facultad_idFacultad` ASC),
  INDEX `fk_Interesado_Idioma1_idx` (`Idioma_idIdioma` ASC),
  INDEX `fk_Interesado_otroPerfil1_idx` (`otroPerfil_idotroPerfil` ASC),
  INDEX `fk_Interesado_datosPersonales1_idx` (`datosPersonales_iddatosPersonales` ASC),
  INDEX `fk_Interesado_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_Interesado_Facultad1`
    FOREIGN KEY (`Facultad_idFacultad`)
    REFERENCES `moea`.`Facultad` (`idFacultad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_Idioma1`
    FOREIGN KEY (`Idioma_idIdioma`)
    REFERENCES `moea`.`Idioma` (`idIdioma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_otroPerfil1`
    FOREIGN KEY (`otroPerfil_idotroPerfil`)
    REFERENCES `moea`.`cuenta` (`idCuenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_datosPersonales1`
    FOREIGN KEY (`datosPersonales_iddatosPersonales`)
    REFERENCES `moea`.`datosPersonales` (`iddatosPersonales`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `moea`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moea`.`Grado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`Grado` (
  `idGrado` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idGrado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moea`.`Universidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`Universidad` (
  `idUniversidad` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUniversidad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moea`.`Area`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`Area` (
  `idArea` INT NOT NULL AUTO_INCREMENT,
  `nombreAreaFormacion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idArea`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moea`.`Lugar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`Lugar` (
  `idLugar` INT NOT NULL AUTO_INCREMENT,
  `pais` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idLugar`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moea`.`Convocatoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`Convocatoria` (
  `idPrograma` INT NOT NULL AUTO_INCREMENT,
  `nombreConv` VARCHAR(45) NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NOT NULL,
  `descripcion` TEXT NULL DEFAULT NULL,
  `Grado_idGrado` INT NOT NULL,
  `Universidad_idUniversidad1` INT NOT NULL,
  `Area_idArea` INT NOT NULL,
  `promedioSolicitado` INT NULL DEFAULT NULL,
  `Lugar_idLugar` INT NOT NULL,
  PRIMARY KEY (`idPrograma`),
  INDEX `fk_Programa_Grado1_idx` (`Grado_idGrado` ASC),
  INDEX `fk_Programa_Universidad2_idx` (`Universidad_idUniversidad1` ASC),
  INDEX `fk_Programa_Area1_idx` (`Area_idArea` ASC),
  INDEX `fk_Programa_Lugar1_idx` (`Lugar_idLugar` ASC),
  CONSTRAINT `fk_Programa_Grado1`
    FOREIGN KEY (`Grado_idGrado`)
    REFERENCES `moea`.`Grado` (`idGrado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Programa_Universidad2`
    FOREIGN KEY (`Universidad_idUniversidad1`)
    REFERENCES `moea`.`Universidad` (`idUniversidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Programa_Area1`
    FOREIGN KEY (`Area_idArea`)
    REFERENCES `moea`.`Area` (`idArea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Programa_Lugar1`
    FOREIGN KEY (`Lugar_idLugar`)
    REFERENCES `moea`.`Lugar` (`idLugar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moea`.`cuestionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`cuestionario` (
  `idcuestionario` INT NOT NULL,
  `respuesta1` VARCHAR(300) NOT NULL,
  `respuesta2` VARCHAR(300) NOT NULL,
  `respuesta3` VARCHAR(300) NOT NULL,
  `Interesado_matricula` INT NOT NULL,
  PRIMARY KEY (`idcuestionario`),
  INDEX `fk_cuestionario_Interesado1_idx` (`Interesado_matricula` ASC),
  CONSTRAINT `fk_cuestionario_Interesado1`
    FOREIGN KEY (`Interesado_matricula`)
    REFERENCES `moea`.`Interesado` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moea`.`favoritos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`favoritos` (
  `Interesado_matricula` INT NOT NULL,
  `Convocatoria_idPrograma` INT NOT NULL,
  PRIMARY KEY (`Interesado_matricula`, `Convocatoria_idPrograma`),
  INDEX `fk_Interesado_has_Convocatoria_Convocatoria1_idx` (`Convocatoria_idPrograma` ASC),
  INDEX `fk_Interesado_has_Convocatoria_Interesado1_idx` (`Interesado_matricula` ASC),
  CONSTRAINT `fk_Interesado_has_Convocatoria_Interesado1`
    FOREIGN KEY (`Interesado_matricula`)
    REFERENCES `moea`.`Interesado` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interesado_has_Convocatoria_Convocatoria1`
    FOREIGN KEY (`Convocatoria_idPrograma`)
    REFERENCES `moea`.`Convocatoria` (`idPrograma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moea`.`ciudad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `moea`.`ciudad` (
  `Lugar_idLugar` INT NOT NULL,
  `ciudad` VARCHAR(45) NULL,
  INDEX `fk_ciudad_Lugar1_idx` (`Lugar_idLugar` ASC),
  CONSTRAINT `fk_ciudad_Lugar1`
    FOREIGN KEY (`Lugar_idLugar`)
    REFERENCES `moea`.`Lugar` (`idLugar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
