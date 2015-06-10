<?php 
    $this->load->view('head/librerias_view'); 
    $this->load->view('header/header_view');  
    #$this->load->view('pagina_principal/carousel_view');
?>
<div id="page-content-wrapper" class="container-fluid">
 <?php $this->load->view('pagina_principal/contenido_principal'); ?>
</div>
<?php 
    $this->load->view('footer/footer_view');
 ?>