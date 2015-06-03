<label for=""><?php echo $tipo; ?></label><br>
  <select id="tipoReporte" name="tipoReporte">
  	<option>Seleccione un <?php echo $tipo; ?>...</option>
  	<?php foreach ($query as $value): ?>
  		<option onclick="verReportContenido()"><?php echo $value->nombre; ?>
  		</option>
  	<?php endforeach ?>
  </select>