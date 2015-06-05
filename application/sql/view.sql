CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SEcURITY DEFINER
VIEW `conView` AS
    SELEcT 
        `convocatoria`.`idPrograma` AS `idconv`,
        `convocatoria`.`nombreconv` AS `nombre`,
        `convocatoria`.`fechaInicio` AS `fi`,
        `convocatoria`.`fechaFin` AS `ff`,
        `convocatoria`.`descripcion` AS `desc`,
        `Grado`.`nombre` AS `grado`,
        `Universidad`.`nombre` AS `uni`,
        `convocatoria`.`promedioSolicitado` AS `prom`,
        `Area`.`nombreAreaFormacion` AS `area`,
        `Lugar`.`pais` AS `pais`,
        `convocatoria`.`edo` AS `edo`
    FROM
        ((((`convocatoria`
        JOIN `grado` ON ((`grado`.`idGrado` = `convocatoria`.`Grado_idGrado`)))
        JOIN `area` ON ((`area`.`idArea` = `convocatoria`.`Area_idArea`)))
        JOIN `universidad` ON ((`universidad`.`idUniversidad` = `convocatoria`.`universidad_idUniversidad1`)))
        JOIN `lugar` ON ((`lugar`.`idLugar` = `convocatoria`.`lugar_idLugar`)));