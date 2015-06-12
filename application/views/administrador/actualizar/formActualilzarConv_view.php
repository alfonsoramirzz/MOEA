<?php 
    $this->load->view('head/librerias_view'); 
    $this->load->view('header/header_view', $logeado, $user);
 ?>

 <div class="container registro">
		<div class="row">
             <div class="col-md-12">
               <h1 class="page-head-line">Actualizar convocatoria</h1><br>
             </div>       
      	</div>
       	<div class="panel panel-default">
			<div class="panel-heading">
				Actualizacion de convocatorias
			</div> 	
			<div class="panel-body">
				<?= form_open('adm/actualizarConvocatoria'); ?>
					<div class="form-group">
						<label>Nombre de convocatoria:</label>
                        <input type="hidden" name="id" value="<?= $convocatoria->result()[0]->idconv;?>">
                        <?php 
                        $name = array(
                            'required' => true,
                            'name'  => 'name',
                            'id'    => 'txtNombre',
                            'class' => 'form-control',
                            'type'  => 'text',
                            'value' => $convocatoria->result()[0]->nombre
                        );
                        echo form_input($name);?>
						<br>	

                        <table width="100%">
                        <tr>
                        <td width="50%">
						<label>Área de interes:</label>
                        <select name="area" class="form-control">
                        <?php foreach ($area as $row) { ?>
                            <option> <?= $row->nombreAreaFormacion;?> </option>;
                        <?php } ?>
                        </select>
                        </td>
                        <td width="50%" align="center">
                        <br>
                        <a href="<?= base_url()?>index.php/adm/agregarArea" target="_blank">ADD</a>
                        </td>
                        </tr>
                        </table>
						<br>

                        <table width="100%">
                        <tr>
                        <td width="50%">
						<label>País:</label>
                        <select name="pais" class="form-control">
                        <?php foreach ($lugar as $row) { ?>
                            <option> <?= $row->pais;?> </option>;
                        <?php } ?>
                        </select>			
						</td>
                        <td width="50%" align="center">
                        <br>
                        <a href="<?= base_url()?>index.php/adm/agregarPais" target="_blank">ADD</a>
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
                        <a href="<?= base_url()?>index.php/adm/agregarCiudad" target="_blank">ADD</a>
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
                        <a href="<?= base_url()?>index.php/adm/agregarGrado" target="_blank">ADD</a>
                        </td>
                        </tr>
                        </table>
						
                        <br>
						<label>Promedio:</label>
						<input type="number" class="form-control" name="prom" 
                        step="0.1" min="6" max="10" value="<?=$convocatoria->result()[0]->prom?>"required>    			
						<br>

						<table width="100%">
						<tr>
						<td width="50%">
						<label>Fecha inicial:</label>
						<input type="date" class="form-control" name="fechaI" value="<?=$convocatoria->result()[0]->fi?>" required>
						</td>

						<td width="50%">
						<label>Fecha Final:</label>
						<input type="date" class="form-control" name="fechaF" value="<?=$convocatoria->result()[0]->ff?>" required>
						</td>
						</tr>
						</table>
						<br>

                        <table width="100%">
                        <tr>
                        <td width="50%">
						<label>Universidad:</label>
						<select name="universidad" class="form-control">
						<?php foreach ($uni as $row) { ?>
                            <option> <?= $row->nombre;?> </option>;
                        <?php } ?>
						</select>
                        </td>
                        <td width="50%" align="center">
                        <br>
                        <a href="<?= base_url()?>index.php/adm/agregarUniversidad" target="_blank">ADD</a>
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
                            'value' => $convocatoria->result()[0]->desc
                        );
                        echo form_textarea($desc);?>					
						<br>
						<button class="btn btn-primary">
							Actualizar convocatoria						
						</button>
					</div> 

				<?= form_close();?>
                <a href="<?=base_url()?>adm/eliminar/<?= $convocatoria->result()[0]->idconv;?>">                           
                    <button class="btn btn-danger" onclick="return confirm('Desea Eliminar');">Eliminar</button>
                </a>                        
			</div>			      
       	</div>     
                
    </div>
          