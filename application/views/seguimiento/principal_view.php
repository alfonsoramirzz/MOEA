<?php 
    $this->load->view('head/librerias_view'); 
    $this->load->view('seguimiento/menu_view');  
    $this->load->view('seguimiento/carousel_view');
?>
<div id="page-content-wrapper" class="container-fluid">
 <?php $this->load->view('seguimiento/contenido_principal'); ?>
</div>
<?php 
    $this->load->view('footer/footer_view');
 ?>