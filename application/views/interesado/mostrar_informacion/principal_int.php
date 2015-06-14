<?php 
    $this->load->view('head/librerias_view'); 
	$datos["user_id"] = $user->id;
	//$this->load->view('header/header_consulta');  
    //$this->load->view('pagina_principal/carousel_view');
	 $this->load->view('header/header_view', $logeado, $user); 
    //$this->load->view('seguimiento/carousel_view');
?>
<div id="page-content-wrapper" class="container-fluid">
 <?php $this->load->view('interesado/mostrar_informacion/contenido_megusta'); ?>
</div>
<?php 
    $this->load->view('footer/footer_view');
 ?>