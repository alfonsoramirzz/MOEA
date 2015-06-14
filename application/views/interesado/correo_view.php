<!DOCTYPE html>
<html>

<?php 
    $this->load->view('head/librerias_view'); 
    ?>
	<body>
		<div class = "container">
			<div>
				
				<h2>Correo</h2>
				
				<?php 
				$v1 = $_GET['var'];
					echo form_open('auth/enviarCorreo');?>
				<form action="?" method="post">
				<div class = "form-group">
					<label for "email">Email:</label>
					<input type="email" class "form-control" name="email" id"email" placeholder ="Email" required>
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
                 <input type="button" class="btn btn-success" value="atras"> 
                </a>
			</form>
				

				<?php
					echo form_close();
				?>
				


				
								
			</div>

				
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/acciones.js"></script>


    
	</body>

</html>		