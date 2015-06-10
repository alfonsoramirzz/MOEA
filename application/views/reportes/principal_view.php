<?php 
    $this->load->view('head/librerias_view'); 
    $this->load->view('header/menu_view');  
    //$this->load->view('pagina_principal/carousel_view');
?>
<br><br>
<div id="page-content-wrapper" class="container-fluid">
<div class="contenido">
 <?php $this->load->view('reportes/reportes_view'); ?>
 </div>
</div>
<br><br>
<?php 
    $this->load->view('footer/footer_view');
 ?>