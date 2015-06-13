<?php 
    $this->load->view('head/librerias_view'); 
    $this->load->view('header/header_view', $logeado, $user);
 ?>

 <div class="container registro">
	<div class="row">
         <div class="col-md-12">
           <h1 class="page-head-line">Registrar Ciudad</h1><br>
         </div>       
  	</div>
                
    <div class="row">
       <div class="panel panel-default">
			<div class="panel-heading">
				Registro de Ciudad
			</div> 	
			<div class="panel-body">
				<form action="crear_ciudad" method="POST">
					<div class="form-group">                 
                <div id="infoMessage"><?php echo $message;?></div>
          </div>
          <div class="form-group col-md-6">
            <label>País:</label>
            <select name="pais" class="form-control">
            <?php foreach ($pais as $row) { ?>
                <option> <?php echo $row->pais;?> </option>;
            <?php } ?>
            </select>
            
          </div>
          <div class="form-group col-md-6">
          <br>
            <a href="crear_pais">ADD</a>
          </div>

					<div class="form-group col-md-12">
						<label>Nombre de Ciudad:</label>

                        <?php 
                        $name = array(
                            'name'  => 'ciudad',
                            'id'    => 'txtNombre',
                            'class' => 'form-control',
                            'type'  => 'text',
                            'value' => $ciudad
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