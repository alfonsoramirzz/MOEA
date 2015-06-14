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
			   echo "</br></br></br>";
			   foreach($data2->result() as $convo){
				   echo "<h4>Universidad:</h4>";
				   echo $convo->nombreConv;
				   echo "<h4>Pais:</h4>";
				   echo $convo->pais;
				   echo "<h4>Area:</h4>";
				   echo $convo->nombreAreaFormacion;
				    echo "</br>";
			   }
			   echo "<h4>Promedio solicitado:</h4>";
			   echo $convocatoria->promedioSolicitado;
			   echo "</br>";
			   echo "<strong>Fecha Inicio: </strong>";
			   echo $convocatoria->fechaInicio;
			   echo "<strong>   Fecha Fin: </strong>";
			   echo $convocatoria->fechaFin;
			echo"</div>";
}
?>
<?php 
    $this->load->view('footer/footer_view');
 ?>