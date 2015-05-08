<link type="text/css" rel="stylesheet" href="http://localhost/ejemplo/assets/grocery_crud/themes/flexigrid/css/flexigrid.css" />
<link type="text/css" rel="stylesheet" href="http://localhost/ejemplo/assets/grocery_crud/css/jquery_plugins/fancybox/jquery.fancybox.css" />
<link type="text/css" rel="stylesheet" href="http://localhost/ejemplo/assets/grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css" />
<script src="http://localhost/ejemplo/assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
<script src="http://localhost/ejemplo/assets/grocery_crud/js/jquery_plugins/jquery.noty.js"></script>
<script src="http://localhost/ejemplo/assets/grocery_crud/js/jquery_plugins/config/jquery.noty.config.js"></script>
<script src="http://localhost/ejemplo/assets/grocery_crud/js/common/lazyload-min.js"></script>
<script src="http://localhost/ejemplo/assets/grocery_crud/js/common/list.js"></script>
<script src="http://localhost/ejemplo/assets/grocery_crud/themes/flexigrid/js/cookies.js"></script>
<script src="http://localhost/ejemplo/assets/grocery_crud/themes/flexigrid/js/flexigrid.js"></script>
<script src="http://localhost/ejemplo/assets/grocery_crud/js/jquery_plugins/jquery.form.min.js"></script>
<script src="http://localhost/ejemplo/assets/grocery_crud/js/jquery_plugins/jquery.numeric.min.js"></script>
<script src="http://localhost/ejemplo/assets/grocery_crud/themes/flexigrid/js/jquery.printElement.min.js"></script>
<script src="http://localhost/ejemplo/assets/grocery_crud/js/jquery_plugins/jquery.fancybox-1.3.4.js"></script>
<script src="http://localhost/ejemplo/assets/grocery_crud/js/jquery_plugins/jquery.easing-1.3.pack.js"></script>
<script src="http://localhost/ejemplo/assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js"></script>
<style type='text/css'>
	body
	{
		font-family: Arial;
		font-size: 14px;
	}
	a {
	    color: blue;
	    text-decoration: none;
	    font-size: 14px;
	}
	a:hover
	{
		text-decoration: underline;
	}
</style>
<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    Seleccione el reporte <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a onclick="">Por Área de Conocimiento</a></li>
    <li><a onclick="">Por Perfil Acádemico</a></li>
    <li><a onclick="">Por Pais</a></li>
    <li><a onclick="">Por universidad</a></li>
  </ul>
</div>
<a type="button" class="btn btn-default" onclick="verReportContenido('sd')">GENERAR</a>
<div>
		<?php echo $output; ?>
</div>