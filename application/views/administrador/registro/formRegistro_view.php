<?php 
    $this->load->view('head/librerias_view'); 
    $this->load->view('header/header_view', $logeado, $user);
 ?>
<div id="page-content-wrapper" class="container-fluid">
 <div class="container registro">    
	<div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Registrar convocatoria</h1><br>
        </div>       
       <div class="panel panel-default"> 	
			<div class="panel-body">
				<form action="crear_convocatoria" method="POST">
					<div class="form-group">
                        <div class="form-group">                 
                              <div id="infoMessage"><?php echo $message;?></div>
                        </div>
						<label>Nombre de convocatoria:</label>
                        <?php 
                        $name = array(
                            'required' => true,
                            'name'  => 'nombre',
                            'id'    => 'txtNombre',
                            'class' => 'form-control',
                            'type'  => 'text',
                            'value' => $nombre
                        );
                        echo form_input($name);?>
						<br>	
                        <table width="100%">
                        <tr>
                        <td width="50%">
						<label>Área de interes:</label>
                        <select name="area" class="form-control">
                        <?php foreach ($area as $row) { ?>
                            <option> <?php echo $row->nombreAreaFormacion;?> </option>;
                        <?php } ?>
                        </select>
                        </td>
                        <td width="50%" align="center">
                        <br>
                        <a href="crear_area">ADD</a>
                        </td>
                        </tr>
                        </table>
						<br>

                        <table width="100%">
                        <tr>
                        <td width="50%">
						<label>País:</label>
                        <select name="pais" class="form-control">
                        <?php foreach ($pais as $row) { ?>
                            <option> <?php echo $row->pais;?> </option>;
                        <?php } ?>
                        </select>			
						</td>
                        <td width="50%" align="center">
                        <br>
                        <a href="crear_pais">ADD</a>
                        </td>
                        </tr>
                        </table>
                        <br>

						<table width="100%">
                        <tr>
                        <td width="50%">
						<label>Ciudad:</label>
                        <select name="ciudad" class="form-control">
                        <?php foreach ($ciudad as $row) { ?>
                            <option> <?= $row->ciudad;?> </option>;
                        <?php } ?>
                        </select>
                        </td>
                        <td width="50%" align="center">
                        <br>
                        <a href="crear_ciudad">ADD</a>
                        </td>
                        </tr>
                        </table>

						<br>
                        <table width="100%">
                        <tr>
                        <td width="50%">
						<label>Grado:</label>
                        <select name="grado" class="form-control">
                        <?php foreach ($grado as $row) { ?>
                            <option> <?= $row->nombre;?> </option>;
                        <?php } ?>
                        </select>
                        </td>
                        <td width="50%" align="center">
                        <br>
                        <a href="crear_grado">ADD</a>
                        </td>
                        </tr>
                        </table>
						
                        <br>
						<label>Promedio:</label>
						<input type="number" class="form-control" name="promedio" 
                                step="0.1" min="6" max="10" value="<?php echo $promedio; ?>" required>   			
						<br>

						<table width="100%">
						<tr>
						<td width="50%">
						<label>Fecha inicial:</label>
						<input type="date" class="form-control" name="fechaI" value="<?php echo $fechaI; ?>" required>
						</td>

						<td width="50%">
						<label>Fecha Final:</label>
						<input type="date" class="form-control" name="fechaF" value="<?php echo $fechaF; ?>" required>
						</td>
						</tr>
						</table>
						<br>

                        <table width="100%">
                        <tr>
                        <td width="50%">
						<label>Universidad:</label>
						<select name="universidad" class="form-control" onchange="changeTest()">  
						<?php foreach ($uni as $row) { ?>
                            <option > <?= $row->nombre;?> </option>;
                        <?php } ?>
						</select>
                        </td>
                        <td width="50%" align="center">
                        <br>
                        <a href="crear_universidad">ADD</a>
                        </td>
                        </tr>
                        </table>

						<br>
						<label>Descripción:</label>
                        <?php
                        $desc = array(
                            'required' => true,
                            'name'  => 'desc',
                            'id'    => 'txtDesc',
                            'rows'  => '5', 
                            'cols'  => '40',
                            'class' => 'form-control',
                            'value' => $desc
                        );
                        echo form_textarea($desc);?>					
						<br>
						<button type="submit" class="btn btn-primary">Registrar convocatoria</button>											
					</div>				
				</form>	
			</div>			      
       </div> 
    </div>    
</div>
<?php 
    $this->load->view('footer/footer_view');
 ?>