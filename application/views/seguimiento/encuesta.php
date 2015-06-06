<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="es-mx">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Saúl Salazar Méndez">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Encuesta</title>
    <!--REQUIRED STYLE SHEETS-->
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="<?=base_url()?>recursos/bootstrap/3.3.4/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="<?=base_url()?>recursos/bootstrap/3.3.4/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="<?=base_url()?>recursos/bootstrap/3.3.4/css/style.css" rel="stylesheet" />
	
	</head>
	
	
	
<body>
<form name="formulario" method="post" action="<?=base_url()?>index.php/main/guardaCalendario">
<input type='text' value='<?=$id?>' hidden>
  <label>
    ¿Porqué medio te enteraste del programa?
  </label>
 
<div class="radio">
  <label>
    <input type="radio" name="p1" value="1" >
    Del sistema de promoción (MOEA)
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="p1" id="opciones_2" value="2">    
    TV UV
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="p1" id="opciones_2" value="3">    
    Periodico Universo
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="p1" id="opciones_2" value="4">    
    Otro
  </label>
</div>

<label>¿Te fuiste?</label>
<div class="radio">
  <label>
    <input type="radio" name="p2" id="opciones_2" value="4">    
    Sí
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="p2" id="opciones_2" value="4">    
    No
  </label>
</div>


<label>¿Fuiste becado?</label>
<div class="radio">
  <label>
    <input type="radio" name="p3" id="opciones_2" value="4">    
    Sí
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="p3" id="opciones_2" value="4">    
    No
  </label>
</div>




 
</div> <button type='submit' class='btn btn-primary'>Guardar</button>
	 </form>
	 
	</body>
	
	<script>
		function cambia(id){
			var val=document.getElementById(id).value;
			if (val==0)
			{
				document.getElementById(id).value=1;
				document.getElementById('btn'+id).style='background-color: LightSeaGreen 									;';
				document.getElementById('btn'+id).value='S';
			}else{
				document.getElementById(id).value=0;
				document.getElementById('btn'+id).style='background-color: orange;';
				document.getElementById('btn'+id).value='N';
			}
		}
		<?php 
		if ($pila!=false){
		  foreach($pila as $kiko) {
		      echo 'cambia("'.$kiko.'");
		      ';
		  }
		  
		 
		}
		?>
	
	</script>
	
	
	
	</htm>
