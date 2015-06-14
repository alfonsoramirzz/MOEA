<?php 
	$datos["convocatorias"]=$convocatorias;
	$datos["user_id"] = $user->id;
    $this->load->view('head/librerias_view'); 
    $this->load->view('header/header_view', $logeado, $user);
    //$this->load->view('seguimiento/carousel_view');
?>

<div id="page-content-wrapper" class="container-fluid">
<br>
<br><center><h1>Mi Historial</h1></center>
 <?php $this->load->view('interesado/seguimiento/contenido_historial',$datos); ?>
</div>
<?php 
    $this->load->view('footer/footer_view');
 ?>
