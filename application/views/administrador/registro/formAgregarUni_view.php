<?php 
    $this->load->view('head/librerias_view'); 
    $this->load->view('header/header_view', $logeado, $user);
 ?>

 <div class="container registro">
	<div class="row">
         <div class="col-md-12">
           <h1 class="page-head-line">Registrar Universidad</h1><br>
         </div>       
  	</div>
                
    <div class="row">
       <div class="panel panel-default">
			<div class="panel-heading">
				Registro de Universidad
			</div> 	
			<div class="panel-body">
				<form action="crear_universidad" method="POST">
					<div class="form-group">                 
                          <div id="infoMessage"><?php echo $message;?></div>
                    </div>
					<div class="form-group">
						<label>Nombre de Universidad:</label>

                        <?php 
                        $name = array(
                            'name'  => 'universidad',
                            'id'    => 'txtNombre',
                            'class' => 'form-control',
                            'type'  => 'text',
                            'value' => $universidad
                        );
                        echo form_input($name);?>
										
						<br>
						<button type="submit" class="btn btn-primary">Registrar</button>											
					</div>				
				</form>	
			</div>			      
       </div>                     
      </div>
</div>

<?php 
    $this->load->view('footer/footer_view');
 ?>