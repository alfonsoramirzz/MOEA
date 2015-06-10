<?php //$this->load->view('header/header_view') ?>
<?php 
foreach ($datos_convocatoria->result() as $convocatoria) 
{
	echo "<h1>$convocatoria->nombreConv</h1>";
}
?>


<?php //$this->load->view('footer/footer_view')?>