<?php 
	$datos["convocatorias"]=$convocatorias;
	$datos["user_id"] = $user->id;
    $this->load->view('head/librerias_view'); 
    $this->load->view('seguimiento/menu_view');  
    //$this->load->view('seguimiento/carousel_view');
?>

<div id="page-content-wrapper" class="container-fluid">
<br>
<br><center><h1>Mis convocatorias</h1></center>
 <?php $this->load->view('seguimiento/contenido_principal',$datos); ?>
</div>
<?php 
    $this->load->view('footer/footer_view');
 ?>
