<!--Inician convocatorias-->      
<br /><br /><br />
<iframe id="consultor" src='' hidden ></iframe>
<h1 align="center">Convocatorias vigentes</h1><br />
<?php
$contador_de_colores=0;
//$numero_de_filas=$numero_filas; 
$color_de_caja=array('azul','verde','morado','naranja','amarino','aqua');

$userid=$dataUser['user']->id;
$correos=$this->Seguimiento_model->obtenerProgramasQueSePidioCorreo($matricula_u);

foreach($datos_convocatoria->result() as $convocatoria)
{
	
	$estado=$convocatoria->estado;
		if($estado == 1){
	if($contador_de_colores <= 5)
	{
		
		echo "<div class='contenido'>";
			echo "<div class='caja'>";	
	    		echo "<div class='$color_de_caja[$contador_de_colores]'>";
					echo"<div class='panel-heading'>";
						echo $convocatoria->nombreConv;       	 
        			echo"</div>";
				echo"</div>";
			 	echo"<div class='panel-body'>";
				
						$strDescription=$convocatoria->descripcion;
					echo mb_strcut($strDescription,0,50)."...";
					$id=$convocatoria->idPrograma;
					?>
					<form action="<?=base_url()?>index.php/auth/showConvocatoriaCorreo" method="post" accept-charset="utf-8">
					<input type="hidden" name="id" value="<?=$id?>" id="id" maxlength="30" size="40" class="form-control" required />
					<input type="hidden" name="userid" value="<?=$userid?>" id="id" maxlength="30" size="40" class="form-control" required />
					<p style='text-align: right;'>
					<input type="submit" name="register" value="Ver Más" class="btn btn-success" />
	
					</p>
        			</form>
					
					<?php
					$megusta=0;
					if ($tablas_favoritas!=FALSE){
						foreach($tablas_favoritas->result() as $favo){
							if ($favo->idPrograma == $id){
								$megusta=1;
								break;
							}
						}
					}
					
					
					
					?>
					<table width=100% >
					<tr>
					<td>
					<!--<form  id='megusta_form<?=$id?>' action="<?=base_url()?>Auth/megusta" method="post" accept-charset="utf-8">-->
					<!-- <input type="hidden" name="id" value="<?=$id?>" id="id" maxlength="30" size="40" class="form-control" required />
					<input type="hidden" name="userid" value="<?=$userid?>" id="id" maxlength="30" size="40" class="form-control" required />-->
					<?php
					if ($megusta==0){
						?>
						
						<button name="megusta" class="btn btn-primary" onclick='megusta(<?=$id?>,<?=$userid?>);'>
						<span id="start<?=$id?>" class='glyphicon glyphicon-star' style='color:black;'></span> 
						me gusta 
						</button>
						<!--<i class='glyphicon glyphicon-star-empty'></i>
						<input type="submit" name="megusta" value="Me Gusta" onclick='swapColor(1)' class='btn btn-primary'>-->
						<?php						
					}
					else{
						?>
						
						<button name="megusta" class="btn btn-primary" onclick='megusta(<?=$id?>,<?=$userid?>);'>
						<span id="start<?=$id?>" class='glyphicon glyphicon-star' style='color:orange;'></span> 
						me gusta 
						</button>
						
						<!-- <button type="submit" name="megusta" value="Me Gusta" onclick='swapColor(1)' class='btn btn-danger'>-->
						<?php						
					}
					?>
					</td>
					<td>
					<?php
					$carta=0;
					if ($correos!=FALSE){
						foreach($correos->result() as $corre){
							if ($corre->idPrograma == $id){
								$carta=1;
								break;
							}
						}
					}
					if ($carta==1){
						echo "<i class='glyphicon glyphicon-envelope'  style='font-size:30px'></i>";
					}
					?>
					</td>
					</tr>
					</table>
					
					<!--</form>-->
					<?php
        		echo"</div>";	
			echo"</div>";
		echo"</div>";
		
		$contador_de_colores++; 
		if($contador_de_colores == 6) 
		{
			$contador_de_colores=0;
		}
		}
	}		
}
?>         

<script>
function megusta(id,usuario){
	var cad = "start"+id;
	if (document.getElementById(cad).style.color =="black"){
		document.getElementById(cad).style.color="orange";
	}else{
		document.getElementById(cad).style.color="black";
	}
	var url="<?=base_url()?>index.php/auth/megusta/"+usuario+"/"+id;
	document.getElementById("consultor").src=url;
}
</script>
<!--Terminan convocatorias-->