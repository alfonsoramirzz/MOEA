<?php 
	$this->load->view('head/librerias_view'); 
    $this->load->view('header/header_view', $logeado, $user);
 ?>              
<div class="container succesRegistro">     
	<h3>Usuario registrado exitosamente!</h3> 
	<span><?php echo $id; ?></span>        
</div>
<?php 
    $this->load->view('footer/footer_view');
 ?>