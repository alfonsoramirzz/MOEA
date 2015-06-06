<!--Inician convocatorias-->      
<br /><br /><br />
<h1 align="center">Convocatorias vigentes</h1><br />
<?php
$contador_de_colores=0;
//$numero_de_filas=$numero_filas; 
$color_de_caja=array('azul','verde','morado','naranja','amarino','aqua');

$userid=$dataUser['user']->id;

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
					<form action="<?=base_url()?>Auth/showConvocatoria" method="post" accept-charset="utf-8">
					<input type="hidden" name="id" value="<?=$id?>" id="id" maxlength="30" size="40" class="form-control" required />
					<input type="hidden" name="userid" value="<?=$userid?>" id="id" maxlength="30" size="40" class="form-control" required />
					<p style='text-align: right;'>
					<input type="submit" name="register" value="Ver Más" class="btn btn-success" />
	
					</p>
        			</form>
					<?php
					$megusta=0;
					foreach($tablas_favoritas->result() as $favo){
						if ($favo->idPrograma == $id){
							$megusta=1;
							break;
						}
					}
					
					?>
					<form  id='megusta_form<?=$id?>' action="<?=base_url()?>Auth/megusta" method="post" accept-charset="utf-8">
					<input type="hidden" name="id" value="<?=$id?>" id="id" maxlength="30" size="40" class="form-control" required />
					<input type="hidden" name="userid" value="<?=$userid?>" id="id" maxlength="30" size="40" class="form-control" required />
					<?php
					if ($megusta==0){
						?>
						<!--<button name="megusta" class="btn btn-primary" onclick='swapColor(<?=$id?>);'> Me gusta </button>-->
						<input type="submit" name="megusta" value="Me Gusta" onclick='swapColor(1)' class='btn btn-primary'>
						<?php						
					}
					else{
						?>
						<!--<button name="megusta" class="btn btn-danger" onclick='swapColor(<?=$id?>);'> No me gusta </button>-->
						<input type="submit" name="megusta" value="Me Gusta" onclick='swapColor(1)' class='btn btn-danger'>
						<?php						
					}?>
					
					
					</form>
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
function swapColor(id){
	/*var cad = "megusta_form"+id;
	alert(cad);
	document.getElementBy(cad).submit();*/
}
</script>
<!--Terminan convocatorias-->