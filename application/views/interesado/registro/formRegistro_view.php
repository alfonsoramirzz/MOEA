<?php 
	$this->load->view('head/librerias_view'); 
    $this->load->view('header/header_view', $logeado, $user);
 ?>
<div id="page-content-wrapper" class="container-fluid">
<div class="container registro">    
   <div class="row">
		<h2>Completar tu registro</h2> 	
		<div class="span6 center">
			<form action="create_user" method="POST">
				<div class="form-group">				 
				      <div id="infoMessage"><?php echo $message;?></div>
				</div>
				<div class="form-group ">
					<label>Nombre:</label>
					<input  class="form-control" type="text" name="nombre" 
							pattern="[A-Za-z\s]+" placeholder="Ejemplo: MARIO ALEJANDRO" 
							value="<?php echo $nombre ?>"/>
				</div>
				<div class="form-group ">								
					<label>Apellido Paterno:</label>
					<input type="text" name="apellidoP" class="form-control" 
							pattern="[A-Za-záéíóúñÁÉÍÓÚÑ\s]*" placeholder="Ejemplo: DEL ANGEL"  
							value="<?php echo $apellidoP ?>"/>
				</div>
				<div class="form-group ">
					<label>Apellido Maternospan<strong class="noObligatorios">*</strong>:</label>
					<input type="text" name="apellidoM" class="form-control" 
							pattern="[A-ZÁÉÍÓÚÑa-záéíóúñ\s]*" placeholder="Ejemplo: DEL ANGEL"
							value="<?php echo $apellidoM ?>"/>
				</div>
				<div class="form-group ">
					<label>Teléfono:</label>
					<input type="text" name="telefono" class="form-control" pattern="[0-9]{4}[-]{1}[0-9]{2}[-]{1}[0-9]{2}[-]{1}[0-9]{2}" 
					placeholder="Ejemplo: 2281-81-79-53" value="<?php echo $telefono ?>"/>
				</div>
				<div class="form-group ">
					<label>CURP:</label>
					<input type="text" name="curp" class="form-control" 
							pattern="[A-Za-z]{4}[0-9]{6}[A-Za-z]{6}[0-9]{2}" placeholder="Ejemplo: ROVJ901121MDFJLN01"
							value="<?php echo $curp ?>" />
				</div>				
				<div class="form-group">
					<label>E-Mail:</label>
					<input type="text" name="email"class="form-control" 
						placeholder="Ejemplo: usuario@serviciocorreo.com"
						value="<?php echo $email ?>"/>
				</div>
				<div class="form-group">
					<label>Contraseña:</label>
					<input type="password" name="password" class="form-control" 
					value="<?php echo $password; ?>"/>
				</div>
				<div class="form-group">
					<label>Verificar contraseña:</label>
					<input type="password" name="password_confirm" class="form-control"
					value="<?php echo $password_confirm; ?>"/>
				</div>
				
				<div class="form-group">
					<label>Facebook, Twitter, Google+<strong class="noObligatorios">*</strong>: </label>
					<input type="text" name="ftg1" class="form-control"  
					 placeholder="Ejemplo: ALEJANDRITA BONITA " 
					value="<?php echo $ftg1; ?>"/><br>
					<input type="text" name="ftg2" class="form-control"  
					 placeholder="Ejemplo: ALEJANDRITA BONITA " 
					value="<?php echo $ftg2; ?>"/><br>
				</div>
				<div class="form-group">
					<label>Matrícula/Número de personal:</label>
					<input type="text" name="matricula" class="form-control" 
					pattern="[S]{1}[0-9]{8}" placeholder="Ejemplo: S10011096 "
					value="<?php echo $matricula; ?>"/>					
				</div>
				<div class="form-group">
					<label>Facultad:</label>
					<select class="form-control selection" name="facultad"/>
					  <option>Administracion</option>
					  <option />Antropologia</option>
					  <option />Arquitectura</option>
					  <option />Artes plasticas</option>
					  <option />Bioanalisis</option>
					  <option />Biologia</option>
					  <option />Ciencias administrativas y saciales</option>
					  <option />Ciencias Agricolas</option>
					  <option />Contaduria, Administracion ySistemas</option>
					  <option />Danza</option>
					  <option />Derecho</option>
					  <option />Economia</option>
					  <option />Enfermeria</option>
					  <option />Estadística e informática</option>
					  <option />Biologico-Agropecuario</option>
					  <option />Filosofia</option>
					  <option />Fisica e Innteigencia Artificial</option>
					  <option />Idiomas</option>
					  <option />Ingeniería Civil</option>
					  <option />Ingeniería Mecánica Eléctrica</option>
					  <option />Ingenieria Química</option>
					  <option />Instrumentación Electrónica</option>
					  <option />Letras Españolas</option>
					  <option />Matemáticas</option>
					  <option />Medicina</option>
					  <option />Música</option>
					  <option />Nutrición</option>
					  <option />Odontología</option>
					  <option />Pedagogía</option>
					  <option />Psicología</option>
					  <option />Química Farmacéutica Biológica</option>
					  <option />Teatro</option>
					</select>									
				</div>
				<div class="form-group">
					<label>Semestre<strong class="noObligatorios">*</strong>:</label>
					<select class="form-control selection" name="semestre"/>
					  <option>Primer semestre</option>
					  <option>Segundo Semestre</option>
					  <option>Tercer Semestre</option>
					  <option>Cuarto Semestre</option>	
					  <option>Quinto Semestre</option>
					  <option>Sexto semestre</option>
					  <option>Septimo Semestre</option>
					  <option>Octavo semestre</option>
					  <option>Noveno Semestre</option>
					  <option>Decimo Semestre</option>
					  <option>Onceavo Semestre</option>
					  <option>Doceavo Semestre</option>
					  <option>No Aplica</option>
					</select>
				</div>

				<div class="form-group">
					<label>Promedio:</label>
					<input type="text" name="promedio" class="form-control"  
					pattern="[0-9]{1,2}[\.]{1}[0-9]{1,2}" placeholder="Ejemplo: 9.89"
					value="<?php echo $promedio; ?>"/>					
				</div>
				<div class="form-group">
					<label>Área de Inscripción:</label>
					<select class="form-control selection" name="area"/>
					  <option>Ciencias de la Salud</option>
					  <option>Tecnica</option>
					  <option>Economico- Administrativo</option>
					  <option>Humanidades</option>
					  <option>Artes</option>
					  <option>Biologico-Agropecuario</option>
					</select>
				</div>
				<div class="form-group">
					<label>Situación Actual:</label>
					<select class="form-control" name="situacionActual"/>
					  <option>Estudiante</option>
					  <option>Egresado</option>
					  <option>Académico</option>						  
					</select>
				</div>
				<div class="form-group">
					<label>Región:</label>
					<select class="form-control" name="region">
					  <option>Xalapa</option>
					  <option>Veracruz</option>
					  <option>Orizaba-Córdoba</option>
					  <option>Coatzacoalcos-Minatitlán</option>
					  <option>Poza Rica-Tuxpan</option>						  
					</select>
				</div>
				<div class="form-group">
					<label>Nivel de Interes:</label>
					<select class="form-control" name="nivel">
					  <option>Estancias cortas</option>
					  <option>Maestría</option>
					  <option>Doctorado</option>
					  <option>Licenciatura</option>
					  <option>Cursos de Actualización</option>
					  <option>Especialidad o Diplomado</option>
					</select>
				</div>
				<div class="form-group">
					<label>Área de Interés:</label>
					<select class="form-control" name="area">
					  <option>Ciencias de la Salud</option>
					  <option>Técnica</option>
					  <option>Económico-Administrativo</option>
					  <option>Humanidades</option>
					  <option>Artes</option>
					  <option>Biológico-Agropecuario</option>
					</select>
				</div>
				<div class="form-group">
					<label>Idiomas:</label><br>
					<label>Opcion 1:</label>
					<select class="form-control" name="idioma1">
					  <option>Aleman</option>
					  <option>Chino</option>
					  <option>Frances</option>
					  <option>Ingles</option>
					   <option>Italiano</option>
					  <option>Mandarin</option>
					</select>				
				</div>
				<div class="form-group">
					<label>Opcion 2:</label>
					<select class="form-control" name="idioma2">
					  <option>Aleman</option>
					  <option>Chino</option>
					  <option>Frances</option>
					  <option>Ingles</option>
					   <option>Italiano</option>
					  <option>Mandarin</option>
					  <option>No Aplica</option>
					</select>								
				</div>
				<div class="form-group">
					<label>Opcion 3:</label>
					<select class="form-control" name="idioma3">
					  <option>Aleman</option>
					  <option>Chino</option>
					  <option>Frances</option>
					  <option>Ingles</option>
					   <option>Italiano</option>
					  <option>Mandarin</option>
					  <option>No Aplica</option>
					</select>								
				</div>
				<div class="form-group">
					<label>Opciones de Paises:</label>	
					<label>Opcion 1:</label>
					<input type="text" name="pais1" class="form-control" pattern="[A-ZÁÉÍÓÚÑa-záéíóúñ]*" placeholder="Ejemplo: UK"
					 value="<?php echo $pais1; ?>"/><br>
					<label>Opcion 2<strong class="noObligatorios">*</strong>:</label>
					<input type="text" name="pais2" class="form-control" pattern="[A-ZÁÉÍÓÚÑa-záéíóúñ]*" placeholder="Ejemplo: ALEMANIA"
					 value="<?php echo $pais2; ?>"/><br>
					<label>Opcion 3<strong class="noObligatorios">*</strong>:</label>
					<input type="text" name="pais3" class="form-control" pattern="[A-ZÁÉÍÓÚÑa-záéíóúñ]*" placeholder="Ejemplo: EEUU"
					 value="<?php echo $pais3; ?>"/><br>	
				</div>	
				<div class="form-group">
					<label>Solicitas beca:</label>
					<select class="form-control" name="beca">
					  <option>SI</option>
					  <option>NO</option>
					</select>								
				</div>
				<label>Campos no obligatorios<strong class="noObligatorios">*</strong></label><br>	
				<input type="submit" name="guardar" value="Guardar" />														
			</form>	
		</div>
	</div>
</div>
<?php 
    $this->load->view('footer/footer_view');
 ?>