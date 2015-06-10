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
			echo"</div>";
}
?>
<?php 
    $this->load->view('footer/footer_view');
 ?>