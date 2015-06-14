<?php 
    $this->load->view('head/librerias_view'); 
    $this->load->view('header/header_consulta');  
    $this->load->view('pagina_principal/carousel_view');
?>
<div id="page-content-wrapper" class="container-fluid">
 <?php $this->load->view('interesado/mostrar_informacion/contenido_principal'); ?>
</div>
<?php 
    $this->load->view('footer/footer_view');
 ?>