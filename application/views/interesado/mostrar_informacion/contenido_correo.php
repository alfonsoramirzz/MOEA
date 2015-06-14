<?php 
    $this->load->view('head/librerias_view'); 
    $this->load->view('header/header_consulta');  
    //$this->load->view('pagina_principal/carousel_view');
?>
<?php
foreach($data->result() as $convocatoria){
			echo "<div class='fondo'>";	
			   echo "<div class='titulo'>";
						echo "<p><h3>";echo $convocatoria->nombreConv; echo"</p></h3></br>";     	 
			   echo "</div>";
			   echo $convocatoria->descripcion;
			   echo "</br></br></br>";
			   foreach($data2->result() as $convo){
				   echo "<h4>Universidad:</h4>";
				   echo $convo->nombreConv;
				   echo "<h4>Pais:</h4>";
				   echo $convo->pais;
				   echo "<h4>Area:</h4>";
				   echo $convo->nombreAreaFormacion;
				    echo "</br>";
			   }
			   echo "<h4>Promedio solicitado:</h4>";
			   echo $convocatoria->promedioSolicitado;
			   echo "</br>";
			   echo "<strong>Fecha Inicio: </strong>";
			   echo $convocatoria->fechaInicio;
			   echo "<strong>   Fecha Fin: </strong>";
			   echo $convocatoria->fechaFin;
			echo"</div>";
			?>
			<div>
				
				<h2>Correo</h2>
				
					<?php 
					$v1 = $this->Seguimiento_model->obtenerMatricula($user->id);
						echo form_open('auth/enviarCorreo');?>
						<input name='idprograma' type='text' value="<?=$convocatoria->idPrograma?>" hidden />
					<form action="?" method="post">
					<div class = "form-group">
						<label for "email">Email:</label>
						<input value='<?php echo $user->email; ?>' 
						type="email" class "form-control" name="email" id="email" 
						placeholder ="Email" readonly>
					</div>
					<div class = "form-group">
						<label for "asunto">Asunto:</label>
						<input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto" required>
					</div>
					<br>
					<div class ="form-group">
						<label for "dudas">Dudas: </label>
						<textarea class="form-control" name="dudas" id="dudas" rows="3" resize ="none" placeholder ="Escribe tus dudas sobre la convocatoria" required></textarea>
					</div>
					<div class = "form-group">
						<input type="hidden" class="form-control" name="mat" id="mat" placeholder="Asunto" value="<?php echo $v1?>">
					</div>
					<?php
					?>
					<a href="../auth/principal">
					<input type="submit" class="btn btn-success" value="Enviar" onclick="myFunction()" >
					</a>
					
								
					<input type="reset" class="btn btn-danger "value="Borrar">
					<a href="../verConv">
					 <input type="button" class="btn btn-success" value="Atras"> 
					</a>
				</form>
					

					<?php
						echo form_close();
					?>		
			</div>
			
			<?php
			
}
?>
<?php 
    $this->load->view('footer/footer_view');
 ?>