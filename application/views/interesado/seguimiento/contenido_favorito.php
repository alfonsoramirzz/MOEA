<!--Inician convocatorias-->
	<div class="contenido">
	<?php
		if ($convocatorias!=FALSE)
		{
		$i = 0;
		foreach($convocatorias->result() as $convocatoria)
		{


	?>

	<div class="caja">
		<?php if ($i % 6 == 0){ ?>
	    <div class="azul">
		<?php } ?>
		<?php if ($i % 6 == 1){ ?>
	    <div class="verde">
		<?php } ?>
		<?php if ($i % 6 == 2){ ?>
	    <div class="morado">
		<?php } ?>
		<?php if ($i % 6 == 3){ ?>
	    <div class="naranja">
		<?php } ?>
		<?php if ($i % 6 == 4){ ?>
	    <div class="aqua">
		<?php } ?>
		<?php if ($i % 6 == 5){ ?>
	    <div class="amarino">
		<?php } ?>

		<div class="panel-heading">
             <?= $convocatoria->nombre ?>
        </div>
		</div>
		<div class="panel-body">
                    <p><?= word_limiter($convocatoria->descripcion, 20) ?>
                    
					<form action="<?=base_url()?>index.php/auth/showConvocatoria" method="post" accept-charset="utf-8">
					<input type="hidden" name="id" value="<?=$convocatoria->id?>" id="id" maxlength="30" size="40" class="form-control" required />
					<input type="hidden" name="userid" value="<?=$user->id?>" id="id" maxlength="30" size="40" class="form-control" required />
					<p style='text-align: right;'>
					<input type="submit" name="register" value="Ver Más" class="btn btn-success" />
					</p>
        			</form>


                    </p>




         </div>


	</div>


	<?php
		$i=$i+1;
	} //fin del foreach
	}//fin del if !=false
	else{
		echo "No hay datos<br>";
	}
	?>
    <!--Terminan convocatorias-->
   <!--div contenido -->
 </div>

 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <center>
	  <h2><font color=white><i class='glyphicon glyphicon-pencil' ></i>Encuesta</font></h2>
	  <iframe id="encuesta" src="<?=base_url()?>index.php/interesado_seg/encuesta/" width='400PX' height='400px'></iframe><br>
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></center>
</div>


<script>
function generaurl(id){
	document.getElementById("encuesta").src="<?=base_url()?>index.php/auth/ver_encuesta/"+id;
	//alert(document.getElementById("encuesta").src);
}
</script>
